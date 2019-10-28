<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'vendor/autoload.php';
    require("dbconnect.php");

    $fname = $_POST['fnameInput'];
    $lname = $_POST['lnameInput'];
    $email = $_POST['emailInput'];
    $message = $_POST['messageInput'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'trackitsales@gmail.com';
    $mail->Password = 'Trackit123';
    $mail->setFrom('sender@example.com');
    $mail->addAddress($email);
    $mail->Subject = 'Track It Support';
    $mail->Body = "Hi " . $fname . " " . $lname . ",\r\nThanks for contacting us. You sent us the following message:\r\n\n" . $message . "\r\n\nWe will respond to your request as soon as possible.\r\n-Track It Support Team";
    $mail->send();

}
