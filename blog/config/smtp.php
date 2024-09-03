<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//Server settings
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'penurblog.pub@gmail.com';
$mail->Password   = 'msbp yqme esdy vuqj'; // App-specific password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;
$mail->isHTML(true);

// Set the sender address
$mail->setFrom('penurblog.pub@gmail.com', 'Pen Ur Blog');

return $mail;
?>
