<?php
require 'config/database.php';

// get profile data if edit profile button was clicked
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $bio = filter_var($_POST['bio'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // validate input values
    if (!$firstname) {
        $_SESSION['edit-profile'] = "Please enter your First Name";
    } elseif (!$lastname) {
        $_SESSION['edit-profile'] = "Please enter your Last Name";
    } elseif (!$username) {
        $_SESSION['edit-profile'] = "Please enter your Username";
    } elseif (!$email) {
        $_SESSION['edit-profile'] = "Please enter your Email";
    } elseif (strlen($bio) > 150) {
        $_SESSION['edit-profile'] = "Please ensure the bio is no more than 120 characters.";
    } else {
        // check if username or email already exist in database
        $user_check_query = "SELECT * FROM users WHERE (username='$username' OR email='$email') AND id!=$id";
        $user_check_result = mysqli_query($connection, $user_check_query);
        if (mysqli_num_rows($user_check_result) > 0) {
            $_SESSION['edit-profile'] ="Username or Email already exist";
        } else {
            // handle avatar upload if a new file is provided
            if (!empty($avatar['name'])) {
                // Delete existing avatar if there is one
                $user_query = "SELECT avatar FROM users WHERE id = $id";
                $user_result = mysqli_query($connection, $user_query);
                $user = mysqli_fetch_assoc($user_result);
                if ($user['avatar']) {
                    $avatar_path = './images/' . $user['avatar'];
                    unlink($avatar_path);
                }
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
                    if ($avatar['size'] < 1000000) {
                        // upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['edit-profile'] = "File size too big. Should be less than 1mb";
                    }
                } else {
                    $_SESSION['edit-profile'] = "File should be png, jpg, or jpeg";
                }
            }
        }
    }

    // redirect back to edit profile page if there was any problem
    if (isset($_SESSION['edit-profile'])) {
        //pass form data back to edit profile page 
        $_SESSION['edit-profile-data'] = $_POST;
        header('location: ' . ROOT_URL . 'edit-profile.php');
        die();
    } else {
        if (isset($avatar_name)) {
            // Update profile information with avatar
            $update_query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', bio='$bio', avatar='$avatar_name' WHERE id=$id";
            mysqli_query($connection, $update_query);
        }else {
            // Update profile information without avatar
            $update_profile_query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', bio='$bio' WHERE id=$id";
            mysqli_query($connection, $update_profile_query);
        }

        if (!mysqli_errno($connection)) {
            // redirect to profile
            header('location: ' . ROOT_URL . 'profile.php');
            die();
        }
        // $_SESSION['edit-profile'] = var_dump($user['username']);

    }  

} else {
    // if button wasn't clicked, bounce back to edit profile page
    header('location: ' . ROOT_URL . 'edit-profile.php');
    die();
}