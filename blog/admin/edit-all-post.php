<?php
include 'partials/header.php';

// fetch categories from database
$category_query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $category_query);


// fetch post data from database if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>


<section class="form__section">
    <div class="container form__section-container">
        <h3><?= $post['title'] ?></h3>
        <form action="<?= ROOT_URL ?>admin/edit-all-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>" <?php if ($category['id'] == $post['category_id']) echo 'selected'; ?> ><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" <?php if ($post['is_featured'] == 1) echo 'checked'; ?> >
                <label for="is_featured">Featured</label>
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>


<?php
include '../partials/footer.php';
?>