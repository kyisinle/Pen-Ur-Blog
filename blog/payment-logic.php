<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config/constants.php';
require 'config/database.php'; // Ensure the database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $item_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);

    // Store form data in session in case of error
    $_SESSION['add-payment-data'] = $_POST;

    // Validate form fields
    if (empty($fullname) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state)) {
        $_SESSION['add-payment'] = "All fields are required.";
        header('location: ' . ROOT_URL . 'payment.php?user_id=' . $user_id . '&id=' . $item_id);
        exit();
    }

    // Insert payment data into the database
    $insert_payment_query = "INSERT INTO payments SET item_id='$item_id', user_id='$user_id', fullname='$fullname', email='$email', phone='$phone', address='$address', city='$city', state='$state'";
    $insert_payment_result = mysqli_query($connection, $insert_payment_query);

    if (!mysqli_errno($connection)) {

        // Decrement stock by 1
        $update_stock_query = "UPDATE items SET stock = stock - 1 WHERE id = '$item_id'";
        $update_stock_result = mysqli_query($connection, $update_stock_query);

        if (!mysqli_errno($connection)) {
            // If the payment is processed successfully, send emails

            $mail = new PHPMailer(true);
            $adminmail = 'penurblog.pub@gmail.com';
            $user_subject = 'Payment Confirmation';
            $admin_subject = 'New Payment Received';

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'penurblog.pub@gmail.com'; // Replace with your SMTP username
                $mail->Password = 'msbp yqme esdy vuqj'; // Replace with your SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Send email to the user
                $mail->setFrom('penurblog.pub@gmail.com', 'Your Shop Name'); // Replace with your email
                $mail->addAddress($email, $fullname); // User's email
                $mail->isHTML(true);
                $mail->Subject = $user_subject;
                $mail->Body = "
                <html>
                <head>
                <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 80%;
                    margin: 20px auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    background-color: #007BFF;
                    color: #fff;
                    padding: 10px;
                    border-radius: 10px 10px 0 0;
                    text-align: center;
                }
                .content {
                    padding: 20px;
                }
                .content h2 {
                    margin-top: 0;
                }
                .content p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                </style>
                </head>
                <body>
                <div class='container'>
                <div class='header'>
                <h1>Payment Confirmation</h1>
                </div>
                <div class='content'>
                <p>Hello! Dear customer <strong>$fullname</strong>,</p>
                <p>You have successfully completed the payment for buying the <strong>$title</strong> with mobile wallet KPay. Here are the details:</p>
                <p><strong>Full Name:</strong> $fullname</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Address:</strong> $address</p>
                <p><strong>City:</strong> $city</p>
                <p><strong>State:</strong> $state</p>
                <p><strong>Item:</strong> $title</p>
                <p><strong>Price:</strong> $price</p>
                <p><strong>Purchase Date:</strong> " . date('Y-m-d H:i:s') . "</p>
                <p>If you have any questions, please contact us at <a href='mailto:penurblog@gmail.com'>penurblog@gmail.com</a>.</p>
                </div>
                </div>
                </body>
                </html>
                ";

                $mail->send();

                // Send email to the admin
                $mail->clearAddresses(); // Clear previous addresses
                $mail->addAddress($adminmail, 'Admin'); // Admin's email
                $mail->Subject = $admin_subject;
                $mail->Body = "
                <html>
                <head>
                <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 80%;
                    margin: 20px auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    background-color: #007BFF;
                    color: #fff;
                    padding: 10px;
                    border-radius: 10px 10px 0 0;
                    text-align: center;
                }
                .content {
                    padding: 20px;
                }
                .content h2 {
                    margin-top: 0;
                }
                .content p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                </style>
                </head>
                <body>
                <div class='container'>
                <div class='header'>
                <h1>New Payment Received</h1>
                </div>
                <div class='content'>
                <h2>Payment Details</h2>
                <p><strong>Full Name:</strong> $fullname</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Address:</strong> $address</p>
                <p><strong>City:</strong> $city</p>
                <p><strong>State:</strong> $state</p>
                <p><strong>Item:</strong> $title</p>
                <p><strong>Price:</strong> $price</p>
                </div>
                </div>
                </body>
                </html>
                ";

                $mail->send();

                // Redirect to success page with success message
                $_SESSION['add-payment-success'] = "Payment processed successfully.";
                header('location: ' . ROOT_URL . 'payment.php');
                die();
            } catch (Exception $e) {
                // Handle email sending failure
                $_SESSION['add-payment'] = "Payment processed, but failed to send email. Mailer Error: {$mail->ErrorInfo}";
                header('location: ' . ROOT_URL . 'payment.php?user_id=' . $user_id . '&id=' . $item_id);
                die();
            }
        } else {
            // Handle stock update failure
            $_SESSION['add-payment'] = "Failed to process payment. Please try again.";
            header('location: ' . ROOT_URL . 'payment.php?user_id=' . $user_id . '&id=' . $item_id);
            die();
        }
    } else {
        // Handle payment insertion failure
        $_SESSION['add-payment'] = "Failed to process payment. Please try again.";
        header('location: ' . ROOT_URL . 'payment.php?user_id=' . $user_id . '&id=' . $item_id);
        die();
    }
}
