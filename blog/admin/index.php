<?php
include 'partials/header.php';

// fetch current user's posts from database
$current_user_id = $_SESSION['user-id'];

// default to showing current user's posts
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'my_posts';

if ($user['is_admin'] == 1) {
    if ($filter === 'my_posts') {
        $query = "SELECT id, title, category_id, author_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
    } elseif ($filter === 'others_posts') {
        $query = "SELECT posts.id, posts.title, posts.category_id, posts.author_id, users.username FROM posts JOIN users ON posts.author_id = users.id WHERE posts.author_id != $current_user_id ORDER BY posts.id DESC";
    }
} else {
    $query = "SELECT id, title, category_id, author_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
}

$posts = mysqli_query($connection, $query);
?>


<section class="dashboard">
    <?php if (isset($_SESSION['add-post-success'])) : // shows if add post was successful
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-post-success'])) : // shows if edit post was successful
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-post'])) : // shows if edit post was NOT successful
    ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-post-success'])) : // shows if delete post was successful
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
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
                    <a href="index.php" class="active"><i class="uil uil-postcard"></i>
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
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <div class="filters">
                <h2>Manage Post</h2>
                <?php if ($user['is_admin'] == 1) : ?>
                    <!-- filter posts -->
                    <form method="GET" action="">
                        <select name="filter" onchange="this.form.submit()" class="filter__tag">
                            <option value="my_posts" <?= isset($_GET['filter']) && $_GET['filter'] === 'my_posts' ? 'selected' : '' ?>>My Posts</option>
                            <option value="others_posts" <?= isset($_GET['filter']) && $_GET['filter'] === 'others_posts' ? 'selected' : '' ?>>Others' Posts</option>
                        </select>
                    </form>
                <?php endif ?>
            </div>
            <?php if (mysqli_num_rows($posts) > 0) : ?>
                <div class="scroll_table">

                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <?php if ($filter == 'my_posts') : ?>
                                    <th>Edit</th>
                                <?php else : ?>
                                    <th>Edit</th>
                                    <th>Author Name</th>
                                <?php endif ?>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                                <!-- get category title of each post from categories table -->
                                <?php
                                $category_id = $post['category_id'];
                                $category_query = "SELECT title FROM categories WHERE id=$category_id";
                                $category_result = mysqli_query($connection, $category_query);
                                $category = mysqli_fetch_assoc($category_result);
                                ?>
                                <tr>
                                    <td><?= $post['title'] ?></td>
                                    <td><?= $category['title'] ?></td>
                                    <?php if ($filter == 'my_posts') : ?>
                                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                                    <?php else : ?>
                                        <td><?= $post['username'] ?></td>
                                        <td><a href="<?= ROOT_URL ?>admin/edit-all-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                                    <?php endif ?>
                                    <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <div class="alert__message error"><?= "No posts found" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>


<?php
include '../partials/footer.php';
?>