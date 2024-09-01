<?php
require 'config/constants.php';

if (isset($_GET['user_id']) && isset($_GET['id']) && isset($_GET['title'])) {
    $user_id = filter_var($_GET['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_GET['title'], FILTER_SANITIZE_NUMBER_INT);
} else {
    // If user_id or item_id is not provided, redirect back or show an error
    header('location: ' . ROOT_URL . 'shop.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="<?= ROOT_URL ?>payment-logic.php" method="POST">
            <div class="row">
                <div class="column">
                    <h3 class="title">Billing Address</h3>
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <input type="hidden" name="title" value="<?= htmlspecialchars($title) ?>">
                    <div class="input-box">
                        <span>Full Name :</span>
                        <input type="text" name="fullname" placeholder="Your Name Here" value="<?= $_SESSION['add-payment-data']['fullname'] ?? '' ?>">
                    </div>
                    <div class="input-box">
                        <span>Email: </span>
                        <input type="email" name="email" placeholder="example@example.com" value="<?= $_SESSION['add-payment-data']['email'] ?? '' ?>">
                    </div>
                    <div class="input-box">
                        <span>Phone no. :</span>
                        <input type="text" name="phone" placeholder="09 XXXXXXXXX" value="<?= $_SESSION['add-payment-data']['phone'] ?? '' ?>">
                    </div>
                    <div class="input-box">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="Room - Street - Locality" value="<?= $_SESSION['add-payment-data']['address'] ?? '' ?>">
                    </div>
                    <div class="input-box">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="Berlin" value="<?= $_SESSION['add-payment-data']['city'] ?? '' ?>">
                    </div>
                    <div class="input-box">
                        <span>State :</span>
                        <input type="text" name="state" placeholder="Germany" value="<?= $_SESSION['add-payment-data']['state'] ?? '' ?>">
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
        <?php unset($_SESSION['add-payment-data']) ?>
    </div>
</body>

</html>