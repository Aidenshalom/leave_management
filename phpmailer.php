<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// function sendEmployeeRecord($useremail, $cpassword){
    try {
        //Server settings
        // global $mail;
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'olamilekanmuhammed68@gmail.com';                     //SMTP username
        $mail->Password   = 'dfoybhjubqxaajgn';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('olamilekanmuhammed68@gmail.com', 'NEW HORIZONS');
        $mail->addAddress('lilaiden247@gmail.com', 'Employee');     //Add a recipient
        $mail->addReplyTo('olamilekan13052002@gmail.com', 'Information');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Leave Login Details';
        $mail->Body    = '
            <h1>You have been successfully added to the leave system by the Admin </h1>
            <h3> Here are your login details </h3>
            <h2> Username :useremail </h2>
            <h2> Password :$cpassword </h2>
            <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>
        ';
        $mail->AltBody = '
            <h1>You have been successfully added to the leave system by the Admin </h1>
            <h3> Here are your login details </h3>
            <h2> Username : $useremail  </h2>
            <h2> Password :$cpassword </h2>
            <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        } 
    
// }