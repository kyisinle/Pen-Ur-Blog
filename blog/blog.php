<?php
include 'partials/header.php';

// Define the number of posts per page
$posts_per_page = 9;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure the page number is at least 1

// Calculate the offset for the SQL query
$offset = ($page - 1) * $posts_per_page;

// Fetch the total number of posts from the database
$total_posts_query = "SELECT COUNT(*) AS total FROM posts";
$total_posts_result = mysqli_query($connection, $total_posts_query);
$total_posts_row = mysqli_fetch_assoc($total_posts_result);
$total_posts = $total_posts_row['total'];

// Fetch posts for the current page from the database
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT $posts_per_page OFFSET $offset";
$posts = mysqli_query($connection, $query);

// Calculate the total number of pages
$total_pages = ceil($total_posts / $posts_per_page);
?>


<section class="search__bar">
    <form class="container search__bar-container" action="<?= ROOT_URL ?>search.php" method="GET">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="Search">
        </div>
        <button type="submit" name="submit" class="btn">Go</button>
    </form>
</section>
<!--====================== END OF SEARCH ====================-->


<section class="posts">
    <div class="container posts__container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>">
                        <img src="./images/<?= $post['thumbnail'] ?>" alt="<?= $post['title'] ?>">
                    </a>
                </div>
                <div class="post__info">
                    <?php
                    // fetch category from categories table using category_id of post
                    $category_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                    <h3 class="post__title">
                        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                        <?= substr($post['body'], 0, 150) ?>...
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
                            <a href="<?= ROOT_URL ?>profile.php?id=<?= $author['id'] ?>">
                                <img src="./images/<?= $author['avatar'] ?>" alt="<?= $author['username'] ?>'s Avatar">
                            </a>
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
                </div>
            </article>
        <?php endwhile ?>
    </div>
    
    <div class="prev_next">
            <div class="prev">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>" class="buyit__button">
                        &larr; Prev
                    </a>
                <?php endif; ?>
            </div>
            <div class="next">
            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page + 1 ?>" class="buyit__button">
                    Next &rarr;
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--====================== END OF POSTS ====================-->


<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php
        $all_categories_query = "SELECT * FROM categories";
        $all_categories = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
            <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile ?>
    </div>
</section>
<!--====================== END OF CATEGORY BUTTONS ====================-->


<?php
include 'partials/footer.php';
?>
