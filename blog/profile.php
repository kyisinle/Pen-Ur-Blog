<?php
include 'partials/header.php';
?>

    <section>
        <div class="container divide">
            <section class="profile-info">
                <?php if (isset($_SESSION['user-id'])) : ?>
                    <img src="<?= ROOT_URL . 'images/' . $user['avatar'] ?>" class="profile-pic">
                    <div class="profile-details">
                        <h1>
                            <?=  $user['username'] ?>
                            <?php if ($user['is_admin'] == 1) : ?>
                                <span class="Admintag">Admin</span>
                            <?php endif ?>
                        </h1>
                        <?php if (isset($user['bio'])) : ?>
                            <p> <?= $user['bio'] ?> </p>
                        <?php endif ?>
                    </div>  
                <?php endif ?>
                <a href="<?= ROOT_URL ?>edit-profile.php?id=<?= $user['id'] ?>" class="btn edit-btn">Edit profile</a>
            </section>
        
            <div class="profileborder" ></div>
            <section class="content">
                <aside class="left-column">
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
                <main class="right-column" >
                    <div class="posts">
                        <h3>Create a blog</h3>
                        <div class="new-post">
                            <a href="add-post.php"> <textarea  placeholder="Create a blog..."></textarea></a>
                        </div>
                    </div>
                </main>
            </section>
        </div>
    </section>


<?php
include 'partials/footer.php';
?>
