<?php
require 'config/database.php';

// get signup form data if signup button was clicked
if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // validate input values
    if (!$username) {
        $_SESSION['signup'] = "Please enter your Username";
    } elseif (!$email) {
        $_SESSION['signup'] = "Please enter your Email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Password should be 8+ characters";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Please add avatar";
    } else {
        // check if passwords don't match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords do not match";
        } else {
            // hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // check if username or email already exist in database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] ="Username or Email already exist";
            } else {
                // work on avatar
                // rename avatar
                $time = time(); // make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                // make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if (in_array($extension, $allowed_files)) {
                    //make sure image is not too large (1mb+)
                    if ($avatar['size'] < 5000000) {
                        // upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "File size too big. Should be less than 5mb";
                    }
                } else {
                    $_SESSION['signup'] = "File should be png, jpg, or jpeg";
                }
                $_SESSION['user-id'] = $user_record['id'];
            }
        }
    }

    // redirect back to signup page if there was any problem
    if (isset($_SESSION['signup'])) {
        //pass form data back to sign up page  
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        // insert new user into user table 
        $insert_user_query = "INSERT INTO users SET username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // Get the ID of the newly created user
            $new_user_id = mysqli_insert_id($connection);
            
            // Set the user ID in the session
            $_SESSION['user-id'] = $new_user_id;
        
            // Redirect to the home page
            header('location: ' . ROOT_URL . 'index.php');
            die();
        } 
    }  

} else {
    // if button wasn't clicked, bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}