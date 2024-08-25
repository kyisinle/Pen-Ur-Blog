<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $opinion = $_POST['opinion'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'penurblog.pub@gmail.com';
        $mail->Password   = 'msbp yqme esdy vuqj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('penurblog.pub@gmail.com', 'Pen Ur Blog');
        $mail->addAddress('penurblog.pub@gmail.com', 'Pen Ur Blog');

        // Content
        $mail->isHTML(true); 
        $mail->Subject = 'New Review Submitted';
        $mail->Body    = "<p><strong>Username:</strong> $username</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Rating:</strong> $rating stars</p>
                          <p><strong>Opinion:</strong> $opinion</p>";
        $mail->AltBody = "Username: $username\nEmail: $email\nRating: $rating stars\nOpinion: $opinion";

        $mail->send();

        echo '<script>
                alert("Your review has landed safely in our hands!");
                window.location.href = "index.php";
            </script>';
    } catch (Exception $e) {
        echo '<script>
                alert("Review could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");
                window.location.href = "index.php";
            </script>';
    }
}
?>
