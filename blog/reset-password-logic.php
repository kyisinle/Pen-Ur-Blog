<?php
require 'config/database.php';

$token = $_POST['token'];
$new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$token_hash = hash("sha256", $token);

$query = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user['reset_token_expires_at']) <= time()) {
    die("token has expired");
}

if (strlen($new_password) < 8 || strlen($confirm_password) < 8) {
    $_SESSION['reset-password'] = "Password should be 8+ characters";
} else {
    if ($new_password !== $confirm_password) {
        $_SESSION['reset-password'] = "Passwords do not match";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $hashed_password, $user['id']);
        $stmt->execute();

        echo '<script>
                alert("Password updated. You can now login.");
                window.location.href = "signin.php";
            </script>';
    }
}

if (isset($_SESSION['reset-password'])) {
    //pass token back to reset password page  
    $_SESSION['reset-password-token'] = $_POST;
    header('location: ' . ROOT_URL . 'reset-password.php?token=' . $token);
    die();
}