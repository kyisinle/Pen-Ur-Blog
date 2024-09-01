<?php
require 'config/constants.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?= ROOT_URL ?>css/style2.css">
        <title>Review</title>
    </head>
    <body>
        <div class="wrapper">
            <h3>Leave us a review !</h3>
            <form action="send-review.php" method="POST">
                <div class="rating">
                    <input type="number" name="rating" hidden>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                </div>
                <textarea name="username" cols="1" rows="1" placeholder="Username" require></textarea>
                <textarea name="email" input type="email" cols="1" rows="1" placeholder="Email" require></textarea>
                <textarea name="opinion" cols="30" rows="5" placeholder="Your opinion . . ." require></textarea>
                <div class="btn-group">
                    <button type="submit" class="btn submit">Submit</button>
                    <button class="btn cancel">Cancel</button>
                    <button class="btn cancel"><a href="index.php">Go Back</a></button>
                </div>
            </form>
        </div>
        <script src="<?= ROOT_URL ?>js/script.js"></script>
    </body>
</html>