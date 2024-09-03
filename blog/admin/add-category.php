<?php
include 'partials/header.php';

// get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
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
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-item.php"><i class="uil uil-create-dashboard"></i>
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
                <li>
                    <a href="add-category.php" class="active"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                    <h5>Manage Category</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>

        <main>
        <h2>Add Category</h2>
            <?php if (isset($_SESSION['add-category'])) : ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']) ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
                <input type="text" value="<?= $title ?>" name="title" placeholder="Title">
                <textarea rows="4" value="<?= $description ?>" name="description" placeholder="Description"></textarea>
                <button type="submit" name="submit" class="btn">Add Category</button>
            </form>
        </main>
    </div>
</section>


<?php
include '../partials/footer.php';
?>