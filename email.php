<?php
    require_once ('./vendor/autoload.php');

use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

    //creating a transport object
    $transport = Transport::fromDsn('smtp://olamilekan13052002@gmail.com:nttsjutauumqcysa@smtp.gmail.com:456');

    //creating a mailer object
    $mailer = new Mailer($transport);

    $mailer;

    //creating an email object
    $email = (new Email());        

    //setting the from address
    $email->from('olamilekan13052002@gmail.com');

    //setting the to address
    $email->to('olamilekanmuhammed68@gmail.com');

    //setting a subject
    $email->subject('Leave Login Details');

    //setting plain text
    $email->text('Login Information ');


    //setting html body
    $email->html('
        <h1>You have been successfully added to the leave system by the Admin </h1>
        <h3> Here are your login details </h3>
        <h2> Username :hood </h2>
        <h2> Password :ade </h2>
        <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>
    ');

    //sending email
    $mailer->send($email);

    // function sendEmployeeRecord($useremail, $cpassword){
    //     //making mailer global
    //     global $mailer;

    //     //creating an email object
    //     $email = (new Email());        

    //     //setting the from address
    //     $email->from('olamilekan13052002@gmail.com');

    //     //setting the to address
    //     $email->to($useremail);

    //     //setting a subject
    //     $email->subject('Leave Login Details');

    //     //setting plain text
    //     $email->text('Login Information ');


    //     //setting html body
    //     $email->html('
    //         <h1>You have been successfully added to the leave system by the Admin </h1>
    //         <h3> Here are your login details </h3>
    //         <h2> Username :'. $useremail . ' </h2>
    //         <h2> Password :' .$cpassword . ' </h2>
    //         <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>
    //     ');

    //     //sending email
    //     $mailer->send($email);
    // }

    // function approveLeave($useremail, $name ){
    //     //making mailer global
    //     global $mailer;

    //     //creating an email object
    //     $email = (new Email());        

    //     //setting the from address
    //     $email->from('olamilekan13052002@gmail.com');

    //     //setting the to address
    //     $email->to($useremail);

    //     //setting a subject
    //     $email->subject('Leave Application Status');

    //     //setting plain text
    //     $email->text('Leave Status ');


    //     //setting html body
    //     $email->html('
    //         <h1> Hello, ' .$name . ' </h1>
    //         <br>
    //         <h1>Your Leave Application has been <i>APPROVED</i> by the Admin </h1>
    //         <h3> log in to the website for more details  </h3>
    //         <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>
    //     ');

    //     //sending email
    //     $mailer->send($email);
    // }

    // function declineLeave($useremail, $name ){
    //     //making mailer global
    //     global $mailer;

    //     //creating an email object
    //     $email = (new Email());        

    //     //setting the from address
    //     $email->from('olamilekan13052002@gmail.com');

    //     //setting the to address
    //     $email->to($useremail);

    //     //setting a subject
    //     $email->subject('Leave Login Details');

    //     //setting plain text
    //     $email->text('Login Information ');


    //     //setting html body
    //     $email->html('
    //         <h1> Hello, ' .$name . ' </h1>
    //         <br>
    //         <h1>Your Leave Application has been <i>DECLINED</i> by the Admin </h1>
    //         <h3> log in to the website for more details  </h3>
    //         <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>
    //     ');

    //     //sending email
    //     $mailer->send($email);
    // }
?>