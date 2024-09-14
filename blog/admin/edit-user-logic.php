<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // get updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // check for valid input
    if (!$username) {
        $_SESSION['edit-user'] = "Invalid form input on edit page.";
    } else {
        // check if username already exist in database
        $user_check_query = "SELECT * FROM users WHERE username='$username' AND id != '$id'";
        $user_check_result = mysqli_query($connection, $user_check_query);
        if (mysqli_num_rows($user_check_result) > 0) {
            $_SESSION['edit-user'] = "Username or Email already exist";
        } else {
            // update user
            $query = "UPDATE users SET username='$username', is_admin=$is_admin WHERE id=$id LIMIT 1";
            $result = mysqli_query($connection, $query);

            if (mysqli_errno($connection)) {
                $_SESSION['edit-user'] = "Failed to update user.";
            } else {
                $_SESSION['edit-user-success'] = "User $username updated successfully";
            }
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();
