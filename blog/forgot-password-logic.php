<?php
require 'config/database.php';

// Set the default time zone
date_default_timezone_set('Asia/Yangon');

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if ($email) {
    // Check if the email exists in the database
    $query = "SELECT email FROM users WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);

        // will be available for 15 minutes
        $expiry = date("Y-m-d H:i:s", time() + 60 * 15);

        $query = "UPDATE users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss", $token_hash, $expiry, $email);
        $stmt->execute();

        if ($connection->affected_rows) {
            require 'config/smtp.php';

            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = <<<END

            Click <a href="http://localhost/blog/reset-password.php?token=$token">here</a> to reset your password.

            END;

            try{
                $mail->send();
                $_SESSION['email-sent'] = "Message sent, please check your email inbox.";
                header("location: " . ROOT_URL . "blank-page-message.php");
                die();
            } catch (Exception $e) {
                echo '<script>
                        alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");
                        window.location.href = "forgot-password.php";
                    </script>';
            }
        } 
        
    } else {
        $_SESSION['forgot-password'] = "Email not found.";
        header("location: " . ROOT_URL . "forgot-password.php");
        die();

    }
} else {
    $_SESSION['forgot-password'] = "Please enter your email.";
    header("location: " . ROOT_URL . "forgot-password.php");
    die();
}