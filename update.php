<?php
    require ('dbconnect.php');
    require_once('sendmail.php');

    if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['emp_id'])){
        $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
        $name = mysqli_real_escape_string($dbconnection,$_GET['name']);
        $email = mysqli_real_escape_string($dbconnection,$_GET['email']);
        $user_id = mysqli_real_escape_string($dbconnection,$_GET['emp_id']);
        $status = mysqli_real_escape_string($dbconnection,$_GET['status']);
        $role = 'employee';

        $today =  date("Y-m-d H:i:s");

        $runquery = "update `leave` set status = '$status' where id = '$id' ";
        $result = mysqli_query($dbconnection,$runquery);
        if($result && $status == 2){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','Your leave application has been <i><b>approved</b></i>.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            approveLeave($email, $name );
            $_SESSION['success'] = "<h1>You have successfully approved a leave request</h1>";
            header('location:leave_app.php');
            die();
        }
        elseif($result && $status == 3){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','Your leave application has been <i><b>Declined</b></i>.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            declineLeave($email, $name );
            $_SESSION['success'] = "<h1>You have successfully declined a leave request</h1>";
            header('location:leave_app.php');
            die();
        } 
    }

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
        echo $id;
    }