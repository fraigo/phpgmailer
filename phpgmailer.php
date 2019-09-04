<?php

require_once(dirname(__FILE__)."/PHPMailer/Exception.php");
require_once(dirname(__FILE__)."/PHPMailer/PHPMailer.php");
require_once(dirname(__FILE__)."/PHPMailer/SMTP.php");

function gmailer($to, $subject, $message, $isHtml = false, $gmail_user=null, $gmail_pass = null){

    $mail = new PHPMailer\PHPMailer\PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML($isHtml);
    $mail->Username = $gmail_user ?: getenv("GMAIL_USER");
    $mail->Password = $gmail_pass ?: getenv("GMAIL_PASS");
    $mail->SetFrom($gmail_user ?: getenv("GMAIL_USER"));
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}
