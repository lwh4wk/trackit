<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'trackitsales@gmail.com';
    $mail->Password = 'Trackit123';
    $mail->setFrom('trackitsales@gmail.com');
    $mail->addAddress($_SESSION['user']);
    $mail->Subject = 'Succesfully Registered';
    $mail->Body = 'Thank you for creating an account with us. To continue with the purchase of a subscription please visit https://trackit-cs4753.herokuapp.com and login.';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be send. Mailer Error: {$mail->ErrorInfo}";
}
