<?php
    require ('dbconnect.php');
    if(isset($_POST['delet'])){
        $l_id = mysqli_real_escape_string($dbconnection,$_POST['l_id']);
        $user_id = $_SESSION['USER_ID'];
        $role = $_SESSION['ROLE'];

        $today =  date("Y-m-d H:i:s");

        $runquery = "delete from leave_type where id = '$l_id' ";
        $result = mysqli_query($dbconnection,$runquery);
        if($result){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully deleted a leave type.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            // $_SESSION['success'] = "<h1>Leave type deleted successfully</h1>";
            // header('location:leave_type.php');
            // die();
            echo 200;
        }
        else{
            echo 500;
        }
    }

    if(isset($_POST['delete_employee'])){
        $id = mysqli_real_escape_string($dbconnection,$_POST['id']);

        $check_img_query = "SELECT * FROM employee where id = '$id' ";
        $img_result = mysqli_query($dbconnection, $check_img_query);
        $row_img = mysqli_fetch_array($img_result);
        $image = $row_img['image'];
        $user_id = $_SESSION['USER_ID'];
        $role = $_SESSION['ROLE'];

        $today =  date("Y-m-d H:i:s");

        $runquery = "delete from employee where id = '$id' ";
        $result = mysqli_query($dbconnection,$runquery);

        if($result)
        {
                if(file_exists(''.$image.'')){
                    unlink(''.$image.'');
                }
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully deleted a leave type.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                echo 200;
        }
        else
        {
            echo 500;
        }
        // header('location:employee.php');
        // die();
    }

    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($dbconnection,$_POST['id']);
        $user_id = $_SESSION['USER_ID'];
        $role = $_SESSION['ROLE'];

        $today =  date("Y-m-d H:i:s");

        $runquery = " delete from department where id = '$id' ";
        $result = mysqli_query($dbconnection,$runquery);
        if($result){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully deleted a leave type.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            echo 200;
        } 
        else{
            echo 500;
        }
    }

    if(isset($_POST['delete_leave'])){
        $id = mysqli_real_escape_string($dbconnection,$_POST['id']);
        $user_id = $_SESSION['USER_ID'];
        $role = 'employee';

        $today =  date("Y-m-d H:i:s");

        $runquery = " delete from `leave` where id = '$id' ";
        $result = mysqli_query($dbconnection,$runquery);
        if($result){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully deleted a leave type.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            echo 200;
        } 
        else{
            echo 500;
        }
    }
?>