<?php
require 'config/constants.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <!--CUSTOM STYLESHEET-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <!--ICONSCOUT CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">PEN UR BLOG</a>
            <ul class="nav__items">
                <li><a href="blog.php">Blog</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="review.php">Review</a></li>
                <li><a href="contact.php">Contact</a></li>
                <!--<li><a href="signin.php">SignIn</a></li>-->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./images/avatar1.jpg">
                    </div>
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="user-dashboard.php">User board</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>


    <a href="profile.php">
        <div class="arr left">
            <div></div>
        </div>
    </a>

    <!--============END OF NAV ========-->
    <section class="form__section" style="padding-left: 15px;">
        <div class="container form__scetion-container">
            <h2>Edit Profile</h2>
            <div class="alert__message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <input type="text" placeholder="Username">
                <input type="email" placeholder="Email">
                <!--
                <input type="password" placeholder="Change Password">
                <input type="password" placeholder="Confirm Password">-->
                <div class="form__control">
                    <label for="avatar">Change Avatar</label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>
    </section>
    <footer>
        <div class="footer__socials">
            <a href="https://youtube.com/egatortutorials" target="_blank"><i class="uil uil-youtube"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">Art</a></li>
                    <li><a href="">Wild Life</a></li>
                    <li><a href="">Travel</a></li>
                    <li><a href="">Music</a></li>
                    <li><a href="">Science & Technology</a></li>
                    <li><a href="">Food</a></li>
                </ul>
            </article>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Support</a></li>
                    <li><a href="">Call Numbers</a></li>
                    <li><a href="">Email</a></li>
                    <li><a href="">Social Support</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Popular</a></li>
                    <li><a href="">Categories</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; 2024 PEN UR BLOG</small>
        </div>
    </footer>
    <script src="./main.js"></script>
</body>

</html>