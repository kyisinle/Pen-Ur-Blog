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
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/profilestyle.css">
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
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <!--============END OF NAV ========-->
    <br><br><br>
    <section>
        <div class="divide">


            <section class="profile-info">
                <img src="./images/avatar1.jpg" alt="Profile Picture" class="profile-pic">
                <div class="profile-details">
                    <h1>Jane Doe</h1>
                    <!--
                    <p>Creative Designer | Traveler</p>-->
                </div>
                <button class="edit-pp-btn" type="submit" style="position: absolute; left: 85%;"><a href="edit-profile.html">Edit profile</a</button>
            </section>
            <div style="border: 1px solid white;width:1900px ;position: absolute;right: -5px;"></div>
            <section class="content">
                <aside class="left-column">
                    <!--
                    <div class="about">
                        <h3>About Me</h3>
                        <p>Passionate about design and exploring new cultures. I love capturing moments through my lens.</p>
                    </div>-->
                    <a href="#" style="cursor: text;">
                        <div class="about">
                            <h3>About me</h3>
                            <p>Passionate about design and exploring new cultures. I love capturing moments through my lens.</p>
                        </div>
                    </a>




                    <div class="posts">
                        <h3>Recent Blogs</h3>
                        <div class="post">
                            <p><strong>Jane Doe:</strong> Just returned from an amazing trip to Bali!</p>
                        </div>
                        <div class="post">
                            <p><strong>Jane Doe:</strong> Exploring new design trends for my latest project.</p>
                        </div>
                    </div>
                </aside>
                <main class="right-column" style="padding-right: 70px;">
                    <div class="posts">
                        <h3>Create a blog</h3>
                        <div class="new-post">

                            <a href="add-post.html"> <textarea style="border-color: #0056b3;" placeholder="Create a blog..."></textarea></a>

                        </div>
                    </div>



                </main>
            </section>
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