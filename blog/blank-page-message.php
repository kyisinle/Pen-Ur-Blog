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
        <div class="centered-div">
            <p>
                <b>
                    <?php if (isset($_SESSION['email-sent'])) : ?>
                        <?= 
                            $_SESSION['email-sent'];
                            unset($_SESSION['email-sent']);
                        ?>
                    <?php elseif (isset($_SESSION['token-not-found'])) : ?>
                        <?= 
                            $_SESSION['token-not-found'];
                            unset($_SESSION['token-not-found']);
                        ?>
                    <?php elseif (isset($_SESSION['token-expired'])) : ?>
                        <?=
                            $_SESSION['token-expired'];
                            unset($_SESSION['token-expired']);
                        ?>
                    <?php endif ?>
                </b>
            </p>
            <small>Go to login <a href="signin.php">Click Here</a></small>
        </div>
    </body>
</html>