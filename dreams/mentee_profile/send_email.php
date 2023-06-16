<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Set up PHPMailer
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'g64845236@gmail.com';
$mail->Password = 'eijkdzxqnidihfjn';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->setFrom('g64845236@gmail.com', 'let us dream');
$mail->addAddress($_POST['email']);
$mail->Subject = $_POST['title'];
$mail->Body = $_POST['summary'] . "\nScheduled Date: " . $_POST['date'] . "\nstart Time: " . $_POST['start_time'] . "\nEnd Timr: " . $_POST['end_time'] ;

try {
  $mail->send();
  echo 'Email sent successfully';
} catch (Exception $e) {
  echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
