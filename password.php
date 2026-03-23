<?php
    require ('dbconnect.php');

    if(isset($_POST['change']) && isset($_POST['old_password']) && isset($_GET['id'])){
        $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
        $old_password = mysqli_real_escape_string($dbconnection,$_POST['old_password']);
        $cpassword = mysqli_real_escape_string($dbconnection,$_POST['cpassword']);
        $user_id = $_SESSION['USER_ID'];
        $role = 'employee';

        $today =  date("Y-m-d H:i:s");

        $runquery = " select * from admin where password = '$old_password' and id = '$id'";
        $result = mysqli_query($dbconnection,$runquery);
        $count = mysqli_num_rows($result);
        if ($count>0)
        {   
            $sql = "update admin set password = '$cpassword' where id = '$id' ";
            $res = mysqli_query($dbconnection,$sql);
            if($res){
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully changed your password.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['success'] = "<h1>Password changed succesfully </h1>";
                header ("Location: dashboard.php");
            }
            else{
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Your password was not updated successfully.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                header('location:dashboard.php');
                die();
            }
        }
        else
        {
            $_SESSION['error'] = "<h1> PLease enter correct password </h1>";
            header('location:change_password.php');
            die();
        }
    }

    if(isset($_POST['e_change']) && isset($_POST['old_password']) && isset($_GET['id'])){
        $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
        $old_password = mysqli_real_escape_string($dbconnection,$_POST['old_password']);
        $cpassword = mysqli_real_escape_string($dbconnection,$_POST['cpassword']);
        $runquery = " select * from employee where password = '$old_password' and id = '$id'";
        $result = mysqli_query($dbconnection,$runquery);
        $count = mysqli_num_rows($result);
        if ($count>0)
        {   
            $sql = "update employee set password = '$cpassword' where id = '$id' ";
            $res = mysqli_query($dbconnection,$sql);
            if($res){
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully changed your password.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['success'] = "<h1>Password changed succesfully </h1>";
                header ("Location: e_dashboard.php");
            }
            else{
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Your password was not updated successfully.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                header('location:e_dashboard.php');
                die();
            }
        }
        else
        {
            $_SESSION['error'] = "<h1> PLease enter correct password </h1>";
            header('location:change_password.php');
            die();
        }
    }

?>
