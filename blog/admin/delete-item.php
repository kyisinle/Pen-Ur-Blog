<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch the item from the database
    $query = "SELECT * FROM items WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $item = mysqli_fetch_array($result);

    // Make sure we got back only one item
    if (mysqli_num_rows($result) == 1) {
        $thumbnail_name = $item['thumbnail'];
        $thumbnail_path = '../images/' . $thumbnail_name;

        // Delete image if available
        if ($thumbnail_name && file_exists($thumbnail_path)) {
            unlink($thumbnail_path);
        }

        // Delete item from the database
        $delete_item_query = "DELETE FROM items WHERE id = $id";
        $delete_item_result = mysqli_query($connection, $delete_item_query);

        if (mysqli_errno($connection)) {
            $_SESSION['delete-item'] = "Couldn't delete '{$item['title']}'";
        } else {
            $_SESSION['delete-item-successful'] = "'{$item['title']}' was successfully deleted";
        }
    } else {
        $_SESSION['delete-item'] = "Item not found.";
    }
} else {
    $_SESSION['delete-item'] = "No ID provided.";
}

header('Location: ' . ROOT_URL . 'admin/manage-item.php');
die();
