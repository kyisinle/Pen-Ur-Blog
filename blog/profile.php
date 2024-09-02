<?php
include 'partials/header.php';

// Default to logged-in user if no 'id' is provided
$user_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : $_SESSION['user-id'];

// fetch user profile information
$user_query = "SELECT * FROM users WHERE id = $user_id";
$user_result = mysqli_query($connection, $user_query);
$user = mysqli_fetch_assoc($user_result);

// fetch all posts from posts table for the selected user
$posts_query = "SELECT posts.*, posts.id AS post_id, users.* FROM posts JOIN users ON posts.author_id = users.id WHERE users.id = $user_id ORDER BY posts.date_time DESC";
$posts = mysqli_query($connection, $posts_query);
$posts_count = mysqli_num_rows($posts);

// check if the user is logged in
$is_logged_in = isset($_SESSION['user-id']);
?>

<section>
    <div class="container divide">
        <section class="profile-info">
            <?php if (isset($_SESSION['user-id'])) : ?>
                <img src="<?= ROOT_URL . 'images/' . $user['avatar'] ?>" class="profile-pic">
                <div class="profile-details">
                    <h2>
                        <?=  $user['firstname'] . " " . $user['lastname'] ?>
                        <?php if ($user['is_admin'] == 1) : ?>
                            <b class="Admintag">Admin</b>
                        <?php endif ?>
                        <span> <?= "(" . $user['username'] . ")" ?> </span>
                    </h2>
                    <?php if (isset($user['bio'])) : ?>
                        <p> <?= $user['bio'] ?> </p>
                    <?php endif ?>
                </div>  
            <?php endif ?>
            <?php if ($is_logged_in && $user['id'] == $_SESSION['user-id']) : ?>
                <a href="edit-profile.php?id=<?= $user['id'] ?>" class="btn edit-btn">Edit profile</a>
            <?php endif ?>
        </section>
        <!--====================== END OF PROFILE ====================-->
        
        <section class="content">
            <?php if ($is_logged_in && $user['id'] == $_SESSION['user-id']) : ?>
                <a href="admin/add-post.php"> <textarea placeholder="Create a post..." rows="1"></textarea> </a>
            <?php endif ?>
            <div class="create-post">
                <h2>
                    <?php if ($is_logged_in && $user['id'] == $_SESSION['user-id']) : ?>
                         My Blogs
                    <?php else : ?>
                        <?= "{$user['username']}'s Blogs" ?>
                    <?php endif ?>
                </h2>
                <div class="post__container featured__container">
                    <?php if ($posts_count > 0) : ?>
                        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                            <div class="post__thumbnail">
                                <img src="./images/<?= $post['thumbnail'] ?>">
                            </div>
                            <div class="profile__post__info">
                                <?php
                                    // fetch category from categories table using category_id of post
                                    $category_id = $post['category_id'];
                                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                                    $category_result = mysqli_query($connection, $category_query);
                                    $category = mysqli_fetch_assoc($category_result);
                                ?>
                                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                                <h3 class="post__title">
                                    <a href="<?= ROOT_URL ?>post.php?id=<?= $post['post_id'] ?>"><?= $post['title'] ?></a>
                                </h3>
                                <p class="post__body">
                                    <?= substr($post['body'], 0, 300) ?>...
                                </p>
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
                                            By: <?= "{$author['firstname']} {$author['lastname']}" ?>
                                            <?php if ($user['is_admin'] == 1) : ?>
                                                <b class="admin_tag">Admin</b>
                                            <?php endif ?>
                                        </h5>
                                        <small>
                                            <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php else : ?>
                        <p>No posts available.</p>
                    <?php endif ?>
                </div>
            </div>
        </section>
        <!--====================== END OF PROFILE POSTS ====================-->

    </div>
</section>


<?php
include 'partials/footer.php';
?>
