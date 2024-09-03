<?php
include 'partials/header.php';

//fetch categories from database
$query="SELECT *FROM categories" ;
$categories=mysqli_query($connection,$query);
?>


<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"  class="active"><i class="uil uil-pen"></i>
                    <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                    <h5>Manage Post</h5>
                    </a>
                </li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-item.php"><i class="uil uil-pen"></i>
                    <h5>Add Item</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-item.php"><i class="uil uil-pen"></i>
                    <h5>Manage Item</h5>
                    </a>
                </li>
                <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                    <h5>Add Admin</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php"><i class="uil uil-users-alt"></i>
                    <h5>Manage User</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                    <h5>Manage Category</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>
        
        <main>
            <h2>Add Post</h2>
            <div class="alert__message error">
                <p>This is an error message</p>
            </div>
            <form action="<?=  ROOT_URL?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="title"placeholder="Title">
                <select name="category">
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?=$category['id'] ?>"><?=$category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea rows="10" name="body"placeholder="Body"></textarea>

                <?php if(isset($_SESSION['user_is_admin'])): ?>   
                    <div class="form__control inline">
                        <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                        <label for="is_featured">Featured</label>
                    </div>
                <?php endif ?>
               
                <div class="form__control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="thumbnail"id="thumbnail">
                </div>
                <button type="submit" name="submit"class="btn">Add Post</button>
            </form>
        </main>
    </div>
</section>


<?php
include '../partials/footer.php';
?>
