<?php
include 'partials/header1.php';
?>

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
                <button class="edit-pp-btn" type="submit" style="position: absolute; left: 85%;"><a href="edit-profile.php">Edit profile</a</button>
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

                            <a href="add-post.php"> <textarea style="border-color: #0056b3;" placeholder="Create a blog..."></textarea></a>

                        </div>
                    </div>



                </main>
            </section>
        </div>
    </section>


<?php
include 'partials/footer.php';
?>
