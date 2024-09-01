<?php
include 'partials/header.php';

// Fetch items from the database
$query = "SELECT * FROM items";
$items = mysqli_query($connection, $query);
?>

<section class="search__bar">
</section>
<!-- ========== End of search ================== -->


<section class="posts">
    <div class="container posts__container">

        <!-- Show success or error messages -->
        <?php
        // Check for success message
        if (isset($_SESSION['add-payment-success'])) {
            echo "<script>alert('" . $_SESSION['add-payment-success'] . "');</script>";
            unset($_SESSION['add-payment-success']); // Clear the message after displaying
        }

        // Check for failure message
        if (isset($_SESSION['add-payment'])) {
            echo "<script>alert('" . $_SESSION['add-payment'] . "');</script>";
            unset($_SESSION['add-payment']); // Clear the message after displaying
        }
        ?>

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
                                <?= $item['price'] ?> MMK
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
