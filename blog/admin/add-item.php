<?php
include 'partials/header.php';
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <li>
                        <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-item.php" class="active"><i class="uil uil-create-dashboard"></i>
                            <h5>Add Item</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-item.php"><i class="uil uil-box"></i>
                            <h5>Manage Item</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-user.php"><i class="uil uil-user-plus"></i>
                            <h5>Add Admin</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php"><i class="uil uil-users-alt"></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </aside>

        <main>
            <h2>Add Item</h2>
            <?php if (isset($_SESSION['add-item'])) : ?>
                <div class="alert__message error">
                    <p><?= $_SESSION['add-item']; ?></p>
                    <?php unset($_SESSION['add-item']); ?>
                </div>
            <?php endif; ?>
            <form action="<?= ROOT_URL ?>admin/add-item-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="title" placeholder="Item name" value="<?= $_SESSION['add-item-data']['title'] ?? '' ?>">
                <textarea rows="10" name="description" placeholder="About your item..."><?= $_SESSION['add-item-data']['description'] ?? '' ?></textarea>
                <input type="text" name="stock" placeholder="Stock" value="<?= $_SESSION['add-item-data']['stock'] ?? '' ?>">
                <input type="text" name="price" placeholder="Price" value="<?= $_SESSION['add-item-data']['price'] ?? '' ?>">
                <div class="form__control">
                    <label for="thumbnail">Add photo</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Add Item</button>
            </form>
            <?php unset($_SESSION['add-item-data']); ?>
        </main>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
