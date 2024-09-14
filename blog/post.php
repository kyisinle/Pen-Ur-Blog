<?php
include 'partials/header.php';

// fetch post from database if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}

// fetch the comment to be edited if `edit_id` is set
$edit_comment = '';
if (isset($_GET['edit_id'])) {
    $edit_id = filter_var($_GET['edit_id'], FILTER_SANITIZE_NUMBER_INT);
    $edit_query = "SELECT content FROM comment WHERE cmd_id = $edit_id";
    $edit_result = mysqli_query($connection, $edit_query);
    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $edit_data = mysqli_fetch_assoc($edit_result);
        $edit_comment = $edit_data['content'];
    }
}

// fetch comments from database [not for specific post] 
$fetch_comment_query = "SELECT * FROM comment 
                        JOIN users ON comment.user_id = users.id 
                        WHERE comment.post_id = $id 
                        ORDER BY comment.cmd_id DESC";
$fetch_comment_result = mysqli_query($connection, $fetch_comment_query);

?>


<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__author">
            <?php
            // fetch author from users table using author_id
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            ?>


            <div class="post__author-avatar">
                <img src="./images/<?= $author['avatar'] ?>">
            </div>
            <div class="post__author-info">
                <h5>
                    By:
                    <a href="<?= ROOT_URL ?>profile.php?id=<?= $post['author_id'] ?>">
                        <?= "{$author['username']}" ?>
                    </a>
                    <?php if ($author['is_admin'] == 1) : ?>
                            <b class="admin_tag">Admin</b>
                    <?php endif ?>
                </h5>
                <small>
                    <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                </small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="./images/<?= $post['thumbnail'] ?>">
        </div>
        <p>
            <?= $post['body'] ?>
        </p>

        <!--=================== COMMENT-->

        <?php if (isset($_SESSION['user-id'])) : ?>
            <div class="comment-box">
                <h3>Leave a Comment</h3>
                <form action="comment-logic.php" method="POST">
                    <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="edit_id" value="<?= isset($_GET['edit_id']) ? $_GET['edit_id'] : '' ?>">
                    <div class="input-group">
                        <label for="comment">Comment:</label>
                        <textarea id="comment" name="comment" rows="5" required><?= $edit_comment ?></textarea>
                        <button type="submit" name="submit" class="btn submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        <?php endif ?>

        <div class="comment-box">
            <h3>Comments</h3>
            <?php if (mysqli_num_rows($fetch_comment_result) == 0) : ?>
                <p>No comments</p>
            <?php else : ?>
                <?php while($comments = mysqli_fetch_assoc($fetch_comment_result)) : ?>
                    <div class="cmt">
                        <div class="post__author-avatar">
                            <img src="<?= ROOT_URL . 'images/' . $comments['avatar'] ?>">
                        </div>
                        <div class="postcmt">
                            <h5> 
                                <?= $comments['username'] ?>
                                <?php if ($comments['is_admin'] == 1) : ?>
                                    <b class="admin_tag">Admin</b>
                                <?php endif ?>
                            </h5>
                            <div class="cmt-content"> <?= $comments['content'] ?> </div>
                            <?php if (isset($user) && $user['is_admin'] == 1) : ?>
                                <div class="edit-comment">
                                    <?php if ($comments['user_id'] == $user['id']) : ?>
                                        <a href="post.php?id=<?= $post['id'] ?>&edit_id=<?= $comments['cmd_id'] ?>"><b>Edit</b></a>
                                    <?php endif ?>
                                    <a href="comment-logic.php?id=<?= $post['id'] ?>&delete_id=<?= $comments['cmd_id'] ?>"><b>Delete</b></a>
                                </div>
                            <?php else : ?>
                                <div class="edit-comment">
                                    <?php if (isset($user) && $comments['user_id'] == $user['id']) : ?>
                                        <a href="post.php?id=<?= $post['id'] ?>&edit_id=<?= $comments['cmd_id'] ?>"><b>Edit</b></a>
                                        <a href="comment-logic.php?id=<?= $post['id'] ?>&delete_id=<?= $comments['cmd_id'] ?>"><b>Delete</b></a>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        </div>     
                    </div> 
                <?php endwhile ?>
            <?php endif ?>
        </div>
    </div>
</section>
<!--====================== END OF SINGLE POST ====================-->


<!-- JavaScript for focusing the textarea when edit -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editId = "<?= isset($_GET['edit_id']) ? $_GET['edit_id'] : '' ?>";
        if (editId) {
            const textarea = document.getElementById("comment");
            textarea.focus();
            textarea.selectionStart = textarea.value.length;
            textarea.selectionEnd = textarea.value.length;
        }
    });
</script>


<?php
include 'partials/footer.php';
?>