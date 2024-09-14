<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // fetch data from form
    $user_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $old_password = filter_var($_POST['old_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$old_password) {
        $_SESSION['change-password'] = "Please enter your old password";
    } elseif (strlen($new_password) < 8 || strlen($confirm_password) < 8) {
        $_SESSION['change-password'] = "Password should be 8+ characters";
    } else {
        // fetch the stored hashed password from the database
        $password_fetch_query = "SELECT password FROM users WHERE id = $user_id";
        $password_fetch_result = mysqli_query($connection, $password_fetch_query);
        $password = mysqli_fetch_assoc($password_fetch_result);

        $stored_hashed_password = $password['password'];    

        // verify the old password  
        if (password_verify($old_password, $stored_hashed_password)) {
            // check if new password matches confirm password
        
            if ($new_password === $confirm_password) {
                // hash the new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // update the password in the database
                $update_query = "UPDATE users SET password = '$hashed_new_password' WHERE id = $user_id";
                $update_result = mysqli_query($connection, $update_query);

                if (mysqli_errno($connection)) {
                    echo '<script>
                            alert("Failed to update password.");
                            window.location.href = "change-password.php";
                        </script>';
                } else {
                    echo '<script>
                            alert("Your password has been changed successfully!");
                            window.location.href = "index.php";
                        </script>';
                }
            } else {
                $_SESSION['change-password'] = "Passwords do not match";
            }
        } else {
            $_SESSION['change-password'] = "Incorrect old password";
        }
    }

    // redirect back to signup page if there was any problem
    if (isset($_SESSION['change-password'])) {
        header('location: ' . ROOT_URL . 'change-password.php');
        die();
    }
}
?>
