<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
 
$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '107021027@gm.asia.edu.tw';
    $mail->Password = 'just6224go';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
 
    $mail->setFrom('107021027@gm.asia.edu.tw', 'Jimmy');
    $mail->addAddress('judy890226@gmail.com', 'Recipient1');
    $mail->addAddress('107021027@gm.asia.edu.tw');
    //$mail->addReplyTo('noreply@example.com', 'noreply');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
 
    //Attachments
    //$mail->addAttachment('/backup/myfile.tar.gz');
 
    //Content
    $mail->isHTML(true); 
    $mail->Subject = 'Test Mail Subject!';
    $mail->Body    = 'This is SMTP Email Test';
 
    $mail->send();
    echo 'Message has been sent';
    header('Location:http://210.70.80.21/~k107021027/mainPage.php');
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}