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
    $mail->addAddress('trackitsales@gmail.com');
    $mail->Subject = 'Contacted By ' . $fname . " " . $lname;
    $mail->Body = "Name: " . $fname . " " . $lname . "\r\nEmail: " . $email . "\r\n\nMessage:\r\n" . $message;
    $mail->send();

}
