<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user-id'];
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $insert_comment_query = "INSERT INTO comment (content, user_id) VALUES ('$comment', $user_id)";

    if (mysqli_query($connection, $insert_comment_query)) {
        header("location: " . ROOT_URL . "post.php");
        die();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>