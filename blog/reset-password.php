<?php
require 'config/database.php';

// get back tokenif there was an error
$token = $_SESSION['reset-password-token']['token'] ?? $_GET['token'] ?? '';
unset($_SESSION['reset-password-token']);

// $token = $_GET['token'];
$token_hash = hash("sha256", $token);

$query = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    $_SESSION['token-not-found'] = "The password reset link is no longer valid. Please request a new reset link.";
    header("location: " . ROOT_URL . "blank-page-message.php");
    die();
}

if (strtotime($user['reset_token_expires_at']) <= time()) {
    $_SESSION['token-expired'] = "The password reset link has expired. Please request a new link.";
    header("location: " . ROOT_URL . "blank-page-message.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title>PHP & MySQL Blog Application with Admin Panel</title>
        <!--CUSTOM STYLESHEET-->
        <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
        <!--ICONSCOUT CDN-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <section class="form__section"> 
            <div class="container form__section-container">
                <h2>Reset Password</h2>
                <?php if (isset($_SESSION['reset-password'])) : ?>
                    <div class="alert__message error">
                        <p>
                            <?= $_SESSION['reset-password']; 
                            unset($_SESSION['reset-password']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
                <form action="<?= ROOT_URL ?>reset-password-logic.php" method="POST">
                    <input type="hidden" name="token" value="<?= $token ?>"></input>
                    <input type="password" name="new_password" value="" placeholder="New Password">
                    <input type="password" name="confirm_password" value="" placeholder="Confirm Password">
                    <button type="submit" name="submit" class="btn">Confirm</button>
                </form>
            </div>
        </section>
    </body>
</html>