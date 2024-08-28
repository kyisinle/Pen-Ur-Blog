<?php
include 'partials/header.php';

// Fetch items from the database
$query = "SELECT * FROM items";
$items = mysqli_query($connection, $query);
?>

<section class="search__bar">
    <form class="container search__bar-container" action="">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="" placeholder="Search">
        </div>
        <button type="submit" class="btn">Go</button>
    </form>
</section>
<!-- ========== End of search ================== -->


<section class="posts">
    <div class="container posts__container">
        <?php if (mysqli_num_rows($items) > 0) : ?>
            <?php while ($item = mysqli_fetch_assoc($items)) : ?>
                <article class="post">
                    <div class="post__thumbnail">
                        <!-- thumbnail  -->
                        <a href="item.php?id=<?= $item['id'] ?>">
                            <img src="./images/<?= $item['thumbnail'] ?>" alt="<?= $item['title'] ?>">
                        </a>
                    </div>
                    <div class="post__info">
                        <!-- title -->
                        <h3 class="post__title">
                            <a href="item.php?id=<?= $item['id'] ?>">
                                <?= $item['title'] ?>
                            </a>
                        </h3>
                        <!-- description -->
                        <p class="post__body">
                            <?= $item['description'] ?>
                        </p>
                        <div>
                            <!-- price -->
                            <button disabled="disabled" class="buyit__button">
                                $<?= $item['price'] ?>
                            </button>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No items found.</p>
        <?php endif; ?>
    </div>
</section>
<!--============== End of posts-->

<?php
include 'partials/footer.php';
?>
