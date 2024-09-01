<?php
require 'config/database.php';

$post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);

// handle form submission for editing/adding comments
if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user-id'];
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
        // if edit_id is set, update the existing comment
        $edit_id = filter_var($_POST['edit_id'], FILTER_SANITIZE_NUMBER_INT);
        $update_comment_query = "UPDATE comment SET content='$comment' WHERE cmd_id=$edit_id AND user_id=$user_id";

        if (mysqli_query($connection, $update_comment_query)) {
            header("location: " . ROOT_URL . "post.php?id=" . $post_id);
            die();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        $insert_comment_query = "INSERT INTO comment (content, user_id, post_id) VALUES ('$comment', $user_id, $post_id)";

        if (mysqli_query($connection, $insert_comment_query)) {
            header("location: " . ROOT_URL . "post.php?id=" . $post_id);
            die();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}

// handle comment deletion if delete_id is set in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = filter_var($_GET['delete_id'], FILTER_SANITIZE_NUMBER_INT);
    $post_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $delete_comment_query = "DELETE FROM comment WHERE cmd_id=$delete_id";
    
    if (mysqli_query($connection, $delete_comment_query)) {
        header("location: " . ROOT_URL . "post.php?id=" . $post_id);
        exit();
    } else {
        echo "Error deleting comment: " . mysqli_error($connection);
    }
}
?>