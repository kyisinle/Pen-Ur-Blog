<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM items WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
    } else {
        header('Location: ' . ROOT_URL . 'admin/manage-item.php');
        die();
    }
} else {
    header('Location: ' . ROOT_URL . 'admin/manage-item.php');
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Item</h2>
        <form action="<?= ROOT_URL ?>admin/edit-item-logic.php" method="POST">
            <input type="hidden" value="<?= htmlspecialchars($item['id']) ?>" name="id">
            <label for="title">Title</label>
            <input id="title" type="text" value="<?= htmlspecialchars($item['title']) ?>" name="title" placeholder="Title">
            <label for="description">Description</label>
            <!-- <input id="description" type="text" value="<?= htmlspecialchars($item['description']) ?>" name="description" placeholder="Description"> -->
            <textarea id="description" type="text" rows="6" name="description" placeholder="Description"><?= htmlspecialchars($item['description']) ?></textarea>
            <label for="price">Price</label>
            <input id="price" type="text" value="<?= htmlspecialchars($item['price']) ?>" name="price" placeholder="Price">
            <button type="submit" name="submit" class="btn">Update Item</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
