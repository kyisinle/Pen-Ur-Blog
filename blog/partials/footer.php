<?php
// Fetch 5 random categories
$category_query = "SELECT * FROM categories ORDER BY RAND() LIMIT 5";
$category_result = mysqli_query($connection, $category_query);
?>

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
                    <?php while ($category = mysqli_fetch_assoc($category_result)): ?>
                        <li><a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>"><?= htmlspecialchars($category['title']); ?></a></li>
                    <?php endwhile ?>
                </ul>
            </article>
            <article>
                <h4>Learn More</h4>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="shop.php">Shop</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; 2024 PEN UR BLOG</small>
        </div>
    </footer>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
</body>

</html>
