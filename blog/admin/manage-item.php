<?php
include 'partials/header.php';

// Define the number of items per page
$items_per_page = 3;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure the page number is at least 1

// Calculate the offset for the SQL query
$offset = ($page - 1) * $items_per_page;

// Fetch the total number of items from the database
$total_items_query = "SELECT COUNT(*) AS total FROM items";
$total_items_result = mysqli_query($connection, $total_items_query);
$total_items_row = mysqli_fetch_assoc($total_items_result);
$total_items = $total_items_row['total'];

// Fetch items for the current page from the database
$query = "SELECT * FROM items LIMIT $items_per_page OFFSET $offset";
$items = mysqli_query($connection, $query);

// Calculate the total number of pages
$total_pages = ceil($total_items / $items_per_page);
?>

<section class="dashboard">
    <!-- Show success or error messages -->
    <?php if (isset($_SESSION['add-item-success'])) : ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-item-success'];
                unset($_SESSION['add-item-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-item-success'])) : ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-item-success'];
                unset($_SESSION['edit-item-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-item-successful'])) : ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-item-successful'];
                unset($_SESSION['delete-item-successful']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['add-item'])) : ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['add-item'];
                unset($_SESSION['add-item']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-item'])) : ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-item'];
                unset($_SESSION['edit-item']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-item'])) : ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-item'];
                unset($_SESSION['delete-item']);
                ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li><a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a></li>
                <li><a href="index.php"><i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>
                    </a></li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <li><a href="add-item.php"><i class="uil uil-create-dashboard"></i>
                            <h5>Add Item</h5>
                        </a></li>
                    <li><a href="manage-item.php" class="active"><i class="uil uil-box"></i>
                            <h5>Manage Item</h5>
                        </a></li>
                    <li><a href="add-user.php"><i class="uil uil-user-plus"></i>
                            <h5>Add Admin</h5>
                        </a></li>
                    <li><a href="manage-users.php"><i class="uil uil-users-alt"></i>
                            <h5>Manage User</h5>
                        </a></li>
                    <li><a href="add-category.php"><i class="uil uil-edit"></i>
                            <h5>Add Category</h5>
                        </a></li>
                    <li><a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                            <h5>Manage Category</h5>
                        </a></li>
                <?php endif; ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = mysqli_fetch_assoc($items)) : ?>
                        <tr>
                            <td><?= $item['title'] ?></td>
                            <td><?= $item['description'] ?></td>
                            <td><?= $item['price'] ?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-item.php?id=<?= $item['id'] ?>" class="btn sm">Edit</a></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete-item.php?id=<?= $item['id'] ?>" class="btn sm danger">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div style="display: flex; margin-top: 20px; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                <div>
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>" class="buyit__button">
                            &larr; Prev
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?= $page + 1 ?>" class="buyit__button">
                        Next &rarr;
                    </a>
                <?php endif; ?>
            </div>

    </div>
    </main>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
