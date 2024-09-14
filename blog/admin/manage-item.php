<?php
include 'partials/header.php';

// Delete items with zero stock
$delete_query = "DELETE FROM items WHERE stock = 0";
mysqli_query($connection, $delete_query);

// Fetch items from the database (excluding those with zero stock)
$query = "SELECT * FROM items WHERE stock > 0";
$items = mysqli_query($connection, $query);

function truncate_description($text, $max_lines = 4)
{
    // Approximate characters per line
    $chars_per_line = 50; // Adjust this value based on your CSS line length
    $max_length = $chars_per_line * $max_lines;

    if (strlen($text) <= $max_length) {
        return $text;
    }

    $truncated = substr($text, 0, $max_length);
    $last_space = strrpos($truncated, ' ');
    if ($last_space !== false) {
        $truncated = substr($truncated, 0, $last_space);
    }
    return $truncated . '...';
}
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
                <li><a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a></li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <li><a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                            <h5>Manage Category</h5>
                        </a></li>
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
                <?php endif; ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Items</h2>
            <div class="scroll_table">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = mysqli_fetch_assoc($items)) : ?>
                            <tr>
                                <td><?= htmlspecialchars($item['title']) ?></td>
                                <td><?= htmlspecialchars(truncate_description($item['description'], 4)) ?></td>
                                <td><?= htmlspecialchars($item['stock']) ?></td>
                                <td><?= htmlspecialchars($item['price']) ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-item.php?id=<?= $item['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-item.php?id=<?= $item['id'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
