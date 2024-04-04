<?php
// Load PHPMailer classes directly (no autoloading)

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sentOTPtoGmail($email, $OTP){
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'truongtienanh.work@gmail.com';                     //SMTP username
        $mail->Password   = 'vjpq kiuj szav xutd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('truongtienanh.work@gmail.com', 'ADmin');
        $mail->addAddress($email);               //Name is optional

        //Content
        $mail->isHTML(true);                                  //Set email    format to HTML
        $mail->Subject = '=?UTF-8?B?' . base64_encode('Mã OTP Để Đặt Lại Mật Khẩu') . '?=';
        $mail->Body    = 'Mã OTP của bạn là: ' . $OTP;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


