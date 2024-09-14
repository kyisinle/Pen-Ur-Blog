<?php
require 'config/database.php';

// make sure edit post button was clicked
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);

    // set is_featured to 0 if it was unchecked
    $is_featured = $is_featured == 1 ?: 0;


    // set is_featured of all posts to 0 if is_featured for this post is 1
    if ($is_featured == 1) {
        $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
        $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
    }

    // set thumbnail name if a new one was uploaded, else keep old thumbnail name
    $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

    $query = "UPDATE posts SET category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);


    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Post updated successfully";
    }
}

header('location: ' . ROOT_URL . 'admin/');
die();
