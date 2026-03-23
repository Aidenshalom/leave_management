<?php
    function sendEmployeeRecord($useremail, $cpassword){
        $to      = $useremail;
        $subject = 'New Horizons';
        $message = '<h1>You have been successfully added to the leave system by the Admin </h1>
                <h3> Here are your login details </h3>
                <h2> Username :'. $useremail . ' </h2>
                <h2> Password :' .$cpassword . ' </h2>
                <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>';
        $headers = 'From: [olamilekanmuhammed68]@gmail.com' . "\r\n" .
                    'MIME-Version:1.0' . "\r\n" . 
                    'Content-type: text/html; charset=utf-8';
        if(mail($to, $subject, $message, $headers))
            echo "Email sent";
        else
            echo "Email sending failed";

    }

    function approveLeave($useremail, $name ){
        $to      = $useremail;
        $subject = 'Leave Application Status';
        $message = ' <h1> Hello, ' .$name . ' </h1>
                 <br>
                 <h1>Your Leave Application has been <i><b>APPROVED</b></i> by the Admin </h1>
                <h3> log in to the website for more details  </h3>
                 <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>';
        $headers = 'From: [New Horizons]@gmail.com' . "\r\n" .
                    'MIME-Version:1.0' . "\r\n" . 
                    'Content-type: text/html; charset=utf-8';
        if(mail($to, $subject, $message, $headers))
            echo "Email sent";
        else
            echo "Email sending failed";    
    }

    function declineLeave($useremail, $name ){
        $to      = $useremail;
        $subject = 'Leave Application Status';
        $message = ' <h1> Hello, ' .$name . ' </h1>
                <br>
                <h1>Your Leave Application has been <i><b>DECLINED</b></i> by the Admin </h1>
                <h3> log in to the website for more details  </h3>
                <h3> <a href="http://localhost/Leave/"> Visit Website </a> </h3>';
        $headers = 'From: [New Horizons]@gmail.com' . "\r\n" .
                    'MIME-Version:1.0' . "\r\n" . 
                    'Content-type: text/html; charset=utf-8';
        if(mail($to, $subject, $message, $headers))
            echo "Email sent";
        else
            echo "Email sending failed";    
    }
?>