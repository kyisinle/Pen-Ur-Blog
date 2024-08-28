<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM items WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $item = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/manage-item.php');
    die();
}
?>

<section class="form__section">
    <div class="container form__scetion-container">
        <h2>Edit User</h2>
        <form action="<?= ROOT_URL ?>admin/edit-item-logic.php" method="POST">
            <input type="hidden" value="<?= $item['id'] ?>" name="id">
            <label for="title">Title</label>
            <input id="title" type="text" value="<?= $item['title'] ?>" name="title" placeholder="Title">
            <label for="description">Description</label>
            <input id="description" type="text" value="<?= $item['description'] ?>" name="description" placeholder="Description">
            <label for="price">Price</label>
            <input id="price" type="text" value="<?= $item['price'] ?>" name="price" placeholder="Price">
            <button type="submit" name="submit" class="btn">Update item</button>
        </form>
    </div>
</section>


<?php
include '../partials/footer.php';
?>
