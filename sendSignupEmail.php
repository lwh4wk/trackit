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
    $mail->setFrom('sender@example.com');
    $mail->addAddress('lhyltoncs@gmail.com');
    $mail->Subject = 'Subject';
    $mail->Body = 'body';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be send. Mailer Error: {$mail->ErrorInfo}";
}
