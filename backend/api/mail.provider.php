<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMaiuse PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';ler\PHPMailer\Exception;

function send_mail($data){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "your-email@gmail.com";
    $mail->Password   = "your-gmail-password";
    $mail->IsHTML(true);
    $mail->AddAddress($data['customer']['email'], $data['customer']['name']);
    $mail->SetFrom("from-email@gmail.com", "from-name");
    //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
    $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
    $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
    $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
    $mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
}
?>