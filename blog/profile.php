<?php
include 'partials/header1.php';
?>

    <br><br><br>
    <section>
        <div class="divide">
            <section class="profile-info">
                <img src="./images/avatar1.jpg" alt="Profile Picture" class="profile-pic">
                <div class="profile-details" style="position:relative; top:-20px">
                    
                    <a href="profile.php">
                    <h1 style="position:relative; top:22px; font-size:37px;">Jane Doe</h1></a>
                    <p  style="width: 650px; 
                    
                    border-radius: 8px;
                     color: white;
                     background-color:#0f0f3e ;
                     overflow: hidden;
                     width: 650px;
                     font-size:17px;
                    position:relative;
                    right:12px;
                    top:21px;
                    border:none;
                    left:3.8px;
                    ">Creative Designer | Traveler</p>
                    
                
                <!--
                    <textarea placeholder="Add bio" style="width: 650px; 
                    
                    border-radius: 8px;
                     color: white;
                     background-color:#0f0f3e ;
                     overflow: hidden;
                     width: 650px;
                     font-size:17px;
                    position:relative;
                    right:21px;
                    top:14px;
                    border:none;
                    " >Creative Designer | Traveler</textarea>-->
                </div>
                <h4 style="background-color:black ; color:#5854c7; border-radius: 5px;padding: 6.5px; position:relative; right:43%; bottom: 60px; ">Admin</h4>
                <button class="edit-pp-btn" type="submit" style="position: absolute; left: 85%;"><a href="edit-profile.php">Edit profile</a</button>
                
            </section>
            <a href="#" style="cursor:default ;">
            <div style="border: 2px solid white;width:2000px ;position: relative;right: 150px;top:-2px;margin:0; "></div></a>
            <section class="content">
                <aside class="left-column">
                    <!--
                    <div class="about">
                        <h3>About Me</h3>
                        <p>Passionate about design and exploring new cultures. I love capturing moments through my lens.</p>
                    </div>
                    <a href="#" style="cursor: text;">
                        <div class="about">
                            <h3>About me</h3>
                            <p>Passionate about design and exploring new cultures. I love capturing moments through my lens.</p>
                        </div>
                    </a>-->




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

                            <a href="add-post.php"> <textarea style="border-color: #0056b3; position: relative; right: 3px; " placeholder="Create a blog..."></textarea></a>

                        </div>
                    </div>



                </main>
            </section>
        </div>
    </section>


<?php
include 'partials/footer.php';
?>
