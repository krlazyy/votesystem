<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_REQUEST['to'])){
 $to=$_REQUEST['to'];
 $subject=$_REQUEST['subject'];
 $content=$_REQUEST['message'];
 send_email($to,$subject,$content);
 }



function send_otp($to,$subject,$content){

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'krallseal@gmail.com';                     //SMTP username
    $mail->Password   = 'iqjkcnyndrzenlfw';                                    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('example@gmail.com', 'OTP For Login');
    $mail->addAddress($to, 'Verify Email');     //Add a recipient
  // $mail->addAttachment('./iics.txt');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    ="<font color='green' size='4'>Your OTP For Login: ".$content."<br>
    This OTP is Valid For Only One Time.
    </font>";
   

    $mail->send();
    echo 'OTP has been send successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}