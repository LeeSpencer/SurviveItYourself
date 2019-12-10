<?php

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               			 // Enable verbose debug output

$mail->isSMTP();                                      			 // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  								 // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               			 // Enable SMTP authentication
$mail->Username = 'johndoe@email.com';                       	 // SMTP username
$mail->Password = '********';                           		 // SMTP password
$mail->SMTPSecure = 'tls';                            			 // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    			 // TCP port to connect to

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->setFrom($email, $name);
$mail->addAddress('johndoe@email.com', 'John Doe');                // Add a recipient

$mail->Subject = 'SIY Customer Contact, ' . $name;
$mail->Body    = $message . '<br/><br/>Name: ' . $name . '<br/>Email: ' . $email;
$mail->AltBody = $message . '-------Email: ' . $email;


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo '<br/>Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location: success.html');
}
?>
