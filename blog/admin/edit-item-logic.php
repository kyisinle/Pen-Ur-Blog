<?php
require 'config/database.php';

if (isset($_POST['submit'])) {

    // Get updated form data and sanitize it
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = mysqli_real_escape_string($connection, trim($_POST['title']));
    $description = mysqli_real_escape_string($connection, trim($_POST['description']));
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Check for valid input
    if (empty($title) || empty($description) || empty($price)) {
        $_SESSION['error'] = "All fields are required.";
        header('Location: ' . ROOT_URL . 'admin/edit-item.php?id=' . $id);
        die();
    } else {
        // Update item in the database
        $query = "UPDATE items SET title='$title', description='$description', price=$price WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $_SESSION['edit-item-success'] = "Item successfully updated.";
        } else {
            $_SESSION['edit-item'] = "Failed to update item: " . mysqli_error($connection);
        }
    }
}
header('Location: ' . ROOT_URL . 'admin/manage-item.php');
die();
