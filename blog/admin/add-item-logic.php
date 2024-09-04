<?php
require 'config/database.php';

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['user_is_admin'])) {
    // If not logged in, redirect to the login page
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}

// Get add-item form data if submit button was clicked
if (isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['de<?php
require 'config/database.php';

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['user_is_admin'])) {
    // If not logged in, redirect to the login page
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}

// Get add-item form data if submit button was clicked
if (isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];
    $stock = filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT);

    // Validate input values
    if (!$title) {
        $_SESSION['add-item'] = "Please enter your title";
    } elseif (!$description) {
        $_SESSION['add-item'] = "Please enter your description";
    } elseif (!$price) {
        $_SESSION['add-item'] = "Please enter your price";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-item'] = "Please add a product thumbnail";
    } elseif ($stock < 0) {
        $_SESSION['add-item'] = "Stock cannot be negative";
    }

    // If there are any validation errors
    if (isset($_SESSION['add-item'])) {
        // Pass form data back to the add-item page 
        $_SESSION['add-item-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-item.php');
        die();
    } else {
        // Handle file upload for the thumbnail
        $time = time(); // Generate a unique name using the current timestamp
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // Allowed file types
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = strtolower(pathinfo($thumbnail_name, PATHINFO_EXTENSION));

        if (in_array($extension, $allowed_files)) {
            // Ensure the file is not too large (1MB+)
            if ($thumbnail['size'] < 1000000) {
                // Upload the thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-item'] = "File size too large. Should be less than 1MB";
            }
        } else {
            $_SESSION['add-item'] = "File should be png, jpg, or jpeg";
        }

        // If there are any file upload errors
        if (isset($_SESSION['add-item'])) {
            $_SESSION['add-item-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-item.php');
            die();
        } else {
            // Insert new item into the items table 
            $insert_item_query = "INSERT INTO items SET title='$title', description='$description', price='$price', thumbnail='$thumbnail_name', stock='$stock'";
            $insert_item_result = mysqli_query($connection, $insert_item_query);

            if (!mysqli_errno($connection)) {
                // Redirect to manage-item.php with success message
                $_SESSION['add-item-success'] = "Item added successfully.";
                header('location: ' . ROOT_URL . 'admin/manage-item.php');
                die();
            } else {
                // Handle query failure
                $_SESSION['add-item'] = "Failed to add item. Please try again.";
                header('location: ' . ROOT_URL . 'admin/add-item.php');
                die();
            }
        }
    }
} else {
    // If button wasn't clicked, bounce back to add-item page
    header('location: ' . ROOT_URL . 'admin/add-item.php');
    die();
}
scription'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];

    // Validate input values
    if (!$title) {
        $_SESSION['add-item'] = "Please enter your title";
    } elseif (!$description) {
        $_SESSION['add-item'] = "Please enter your description";
    } elseif (!$price) {
        $_SESSION['add-item'] = "Please enter your price";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-item'] = "Please add a product thumbnail";
    }

    // If there are any validation errors
    if (isset($_SESSION['add-item'])) {
        // Pass form data back to the add-item page 
        $_SESSION['add-item-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-item.php');
        die();
    } else {
        // Handle file upload for the thumbnail
        $time = time(); // Generate a unique name using the current timestamp
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // Allowed file types
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = strtolower(pathinfo($thumbnail_name, PATHINFO_EXTENSION));

        if (in_array($extension, $allowed_files)) {
            // Ensure the file is not too large (1MB+)
            if ($thumbnail['size'] < 1000000) {
                // Upload the thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-item'] = "File size too large. Should be less than 1MB";
            }
        } else {
            $_SESSION['add-item'] = "File should be png, jpg, or jpeg";
        }

        // If there are any file upload errors
        if (isset($_SESSION['add-item'])) {
            $_SESSION['add-item-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-item.php');
            die();
        } else {
            // Insert new item into the items table 
            $insert_item_query = "INSERT INTO items SET title='$title', description='$description', price='$price', thumbnail='$thumbnail_name'";
            $insert_item_result = mysqli_query($connection, $insert_item_query);

            if (!mysqli_errno($connection)) {
                // Redirect to manage-item.php with success message
                $_SESSION['add-item-success'] = "Item added successfully.";
                header('location: ' . ROOT_URL . 'admin/manage-item.php');
                die();
            } else {
                // Handle query failure
                $_SESSION['add-item'] = "Failed to add item. Please try again.";
                header('location: ' . ROOT_URL . 'admin/add-item.php');
                die();
            }
        }
    }
} else {
    // If button wasn't clicked, bounce back to add-item page
    header('location: ' . ROOT_URL . 'admin/add-item.php');
    die();
}
