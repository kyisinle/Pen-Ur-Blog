<?php
require 'config/database.php';

if (isset($_POST['submit'])) {

    // get updated form data 
    $id = filter_var($_POST['id']);
    $title = filter_var($_POST['title']);
    $description = filter_var($_POST['description']);
    $price = filter_var($_POST['price']);

    // check for valid input 
    if (!$title || !$description || !$price) {
        $_SESSION['error'] = "Invalid from input on edit page.";
    } else {
        $query = "UPDATE items SET title='$title', description='$description', price=$price WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_error($connection)) {
            $_SESSION['edit-item'] = "Failed to update item";
        } else {
            $_SESSION['edit-item-success'] = "Item successfully updated";
        }
    }
}
header('location:' . ROOT_URL . 'admin/manage-item.php');
die();
