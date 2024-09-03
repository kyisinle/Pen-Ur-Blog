<?php
include 'partials/header.php'; 

// get back form data if there was an error
$firstname = $_SESSION['edit-profile-data']['firstname'] ?? $user['firstname'];
$lastname = $_SESSION['edit-profile-data']['lastname'] ?? $user['lastname'];
$username = $_SESSION['edit-profile-data']['username'] ?? $user['username'];
$email = $_SESSION['edit-profile-data']['email'] ?? $user['email'];
$bio = $_SESSION['edit-profile-data']['bio'] ?? $user['bio'];
// delete session data 
unset($_SESSION['edit-profile-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Profile</h2>
        <?php if (isset($_SESSION['edit-profile'])): ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['edit-profile'];
                    unset($_SESSION['edit-profile']);
                    ?>
                </p> 
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>edit-profile-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" value="<?= $id ?>" name="id">
            <input type="text" value="<?= $firstname ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $lastname ?>" name="lastname" placeholder="Last Name">
            <input type="text" value="<?= $username ?>" name="username" placeholder="Username">
            <input type="email" value="<?= $email ?>" name="email" placeholder="Email">
            <input type="text" value="<?= $bio ?>" name="bio" placeholder="Edit Bio">
            <div class="form__control">
                <label for="avatar">Change Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Update</button>
        </form>
    </div>
</section>
 

<?php
include 'partials/footer.php';
?>