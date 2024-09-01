<?php
require 'config/constants.php';
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
                <h2>Forgot Password</h2>
                <?php if (isset($_SESSION['forgot-password'])) : ?>
                    <div class="alert__message error">
                        <p>
                            <?= $_SESSION['forgot-password']; 
                            unset($_SESSION['forgot-password']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
                <form action="<?= ROOT_URL ?>forgot-password-logic.php" method="POST">
                    <small>Enter your email below to reset password.</small>
                    <input type="email" name="email" value="" placeholder="Email">
                    <button type="submit" name="submit" class="btn">Send</button>
                </form>
            </div>
        </section>
    </body>
</html>