<?php

  require_once "PHPMailer/PHPMailerAutoload.php";

  $firstname =  $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  $body = "Message from: " . $firstname . " " .$lastname . "\n\n" . $email . "\n\n" . $message ;

  $mail             = new PHPMailer();

  $mail->IsSMTP(); // telling the class to use SMTP
  $mail->Host       = "smtp.gmail.com"; // SMTP server
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                             // 1 = errors and messages
                                             // 2 = messages only
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "tls";
  $mail->Host       = "smtp.gmail.com";      // SMTP server
  $mail->Port       = 587;                   // SMTP port
  $mail->Username   = "nharan81@gmail.com";  // username
  $mail->Password   = "test";            // password

  $mail->SetFrom('nharan81@gmail.com', 'Test');

  $mail->Subject    = "Contact form!";

  $mail->MsgHTML($body);

  $address = "nharan81@gmail.com";
  $mail->AddAddress($address, "Test");

  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Message sent!";
  }


?>
