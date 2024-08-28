<?php
include 'partials/header.php';

if (isset($_SESSION['user-id'])) {
    $user_id = $_SESSION['user-id'];
} else {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch item details from the database
    $query = "SELECT * FROM items WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $item = mysqli_fetch_assoc($result);

    if ($item) {
        // Item found
        $title = $item['title'];
        $description = $item['description'];
        $price = $item['price'];
        $thumbnail = $item['thumbnail'];
    } else {
        echo "<p>Item not found.</p>";
        exit;
    }
} else {
    echo "<p>No item ID provided.</p>";
    exit;
}
?>

<section class="singlepost">
    <div class="container singlepost__container">
        <!-- title -->
        <h2><?= htmlspecialchars($title) ?></h2>
        <!-- thumbnail -->
        <div class="singlepost__thumbnail">
            <img src="./images/<?= htmlspecialchars($thumbnail) ?>" alt="Item Thumbnail">
        </div>
        <!-- description and price in a single line -->
        <div>
            <!-- description -->
            <p class="singlepost__description">
                <?= htmlspecialchars($description) ?>
            </p>
            <!-- price -->
            <div style="display: flex; flex-direction:row;">
                <button style="margin-right: 10px;" class="buyit__button">Price: $<?= htmlspecialchars($price) ?></button>
                <!-- Form to handle the purchase -->
                <form action="payment.php" method="get">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <input type="hidden" name="title" value="<?= htmlspecialchars($title) ?>">
                    <input type="hidden" name="price" value="<?= htmlspecialchars($price) ?>">
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                    <button type="submit" class="buyit__button">Buy It</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!--==============END OF SINGLE POST-->

<?php
include 'partials/footer.php';
?>
