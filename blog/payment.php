<?php
require 'config/constants.php';
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
        <form action="">
            <div class="row">
                <div class="column">
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span>Full Name :</span>
                        <input type="text" placeholder="Your Name Here">
                    </div>
                    <div class="input-box">
                        <span>Email: </span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="input-box">
                        <span>Phone no. :</span>
                        <input type="text" placeholder="09 XXXXXXXXX">
                    </div>
                    <div class="input-box">
                        <span>Address :</span>
                        <input type="text" placeholder="Room - Street - Locality">
                    </div>
                    <div class="input-box">
                        <span>City :</span>
                        <input type="text" placeholder="Berlin">
                    </div>
                        <div class="input-box">
                            <span>State :</span>
                            <input type="text" placeholder="Germany">
                        </div>
                </div>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
