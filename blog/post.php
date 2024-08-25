<?php
include 'partials/header.php';

// fetch comments from database [not for specific post]
$cmd_id = $_SESSION['user-id'];

$query = "SELECT * FROM comment JOIN users ON comment.user_id = users.id ORDER BY comment.cmd_id DESC";
$result = mysqli_query($connection, $query);
?>

        <section class="singlepost">
            <div class="container singlepost__container">
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, nulla. Cumque magni accusantium, officia.</h2>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="./images/avatar2.jpg">
                    </div>
                    <div class="post__author-info">
                            <h5>By: Jane Doe</h5>
                            <small>July 01, 2024 - 07:23</small>
                    </div>
                </div>
                <div class="singlepost__thumbnail">
                    <img src="./images/blog1.jpg">
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et repellat labore, officiis nam reprehenderit doloremque ullam! Placeat hic, soluta dolore, molestiae est quis blanditiis debitis aut illum, et atque eveniet!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. In doloribus quidem veritatis. Saepe, dolorem id error similique ex dignissimos quidem tenetur omnis? Magni neque quae omnis, illo tenetur expedita eos.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et repellat labore, officiis nam reprehenderit doloremque ullam! Placeat hic, soluta dolore, molestiae est quis blanditiis debitis aut illum, et atque eveniet!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates harum est delectus quis ipsam itaque fugit? Sit harum quidem voluptatibus, pariatur, consectetur minus ullam unde molestiae beatae vitae distinctio et!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et repellat labore, officiis nam reprehenderit doloremque ullam! Placeat hic, soluta dolore, molestiae est quis blanditiis debitis aut illum, et atque eveniet!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga inventore sed quo culpa doloribus facere minima voluptatum. Neque delectus vel est maiores. Necessitatibus tenetur ut veniam doloribus inventore. Magni, tenetur?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et repellat labore, officiis nam reprehenderit doloremque ullam! Placeat hic, soluta dolore, molestiae est quis blanditiis debitis aut illum, et atque eveniet!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quis molestiae eius illum rerum iusto culpa, magnam numquam ad? Quo itaque officia rerum? Nulla tenetur adipisci ipsa eius atque in.
                </p>


                <!--=================== COMMENT-->

                <div class="comment-box">
                    <h3>Leave a Comment</h3>
                    <form action="post-comment-logic.php" method="POST">
                        <div class="input-group">
                            <label for="comment">Comment:</label>
                            <textarea id="comment" name="comment" rows="5" required></textarea>
                            <button type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>

                <h2>-Comments</h2>
                <?php while($comments = mysqli_fetch_assoc($result)) : ?>
                    <div class="cmt">
                        <div class="post__author-avatar">
                            <img src="<?= ROOT_URL . 'images/' . $comments['avatar'] ?>">
                        </div>
                        <div class="postcmt">
                            <h4> 
                                <?= $comments['username'] ?>
                                <?php if ($comments['is_admin'] == 1) : ?>
                                    <span class="admin_tag">Admin</span>
                                <?php endif ?>
                            </h4>
                            <div> <?= $comments['content'] ?> </div>
                        </div>
                    </div> 
                <?php endwhile ?> 
            </div>
        </section>
        
<!--==============END OF SINGLE POST-->


<?php
include 'partials/footer.php';
?>