<?php
    require('dbconnect.php');

    if(isset($_POST['submit'])){
        $leave_id = $_POST['leave'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $days = $_POST['days'];
        $employee_name = $_SESSION['USERNAME'];
        $employee_id = $_SESSION['USER_ID'];
        $department_id = $_SESSION['DEPARTMENT'];
        $user_id = $_SESSION['USER_ID'];
        $role = 'employee';

        $today =  date("Y-m-d H:i:s");

        $runquery1 = " select * from leave_type where id = '$leave_id' ";
        $result1 = mysqli_query($dbconnection,$runquery1);
        while ( $row = mysqli_fetch_assoc($result1) ) 
            {
                $name = $row['name'];
                $ddays = $row['days'];		
                $id = $row['id'];
            
            $eid = $_SESSION['USER_ID'];
            $runquery2 = " select sum(off_days) as total_days from `leave` where leave_id = '$id' and employee_id = '$eid' and status = '2' ";
            $result2 = mysqli_query($dbconnection,$runquery2);
            $count = mysqli_num_fields($result2);
            while ( $row2 = mysqli_fetch_assoc($result2) ) 
            {
                if($count>0){

                    $tdays = $row2['total_days'];
                    $remdays = $ddays - $tdays;
                }
               
            } 
            
        }   
        if($remdays >= $days)
        {
        
        $runquery = " insert into `leave` (employee_name,employee_id,department_id,leave_id,start_date,end_date,off_days,date_applied,status) values('$employee_name','$employee_id','$department_id','$leave_id','$sdate','$edate','$days','$today','1' ) ";
    
        $result = mysqli_query($dbconnection,$runquery);

        if($result){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully applied for leave, The admin will review it soon.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['success'] = "<h1>Leave Application Successful</h1>";
            header('location:leave_app.php');
            die();
        }
        else
        {
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Leave application failed.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['error'] = "<h1>Leave Application Failed</h1>";
            header('location:leave_app.php');
            die();
        }
        }
        else{
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','You can\'t apply for leave longer than the remaining days in your leave balance, check your leave balance.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['error'] = "<h1>Leave Application Failed <br> Check your leave balance before applying again</h1>";
            header('location:leave_balance.php');
        }
        
    }

    if(isset($_GET['id']) && isset($_POST['update'])){
        $id = $_GET['id'];
        $leave_id = $_POST['leave'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $days = $_POST['days'];
        $employee_name = $_SESSION['USERNAME'];
        $employee_id = $_SESSION['USER_ID'];
        $department_id = $_SESSION['DEPARTMENT'];
        $user_id = $_SESSION['USER_ID'];
        $role = 'employee';

        $today =  date("Y-m-d H:i:s");

        $runquery = "UPDATE `leave` SET employee_name='$employee_name',employee_id='$employee_id',department_id='$department_id',leave_id='$leave_id',start_date='$sdate',end_date='$edate',off_days='$days' WHERE id='$id' ";
    
        $result = mysqli_query($dbconnection,$runquery);

        if($result){
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully updated your leave application, The admin will review it soon.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['success'] = "<h1>Leave application updated successfully</h1>";
            header('location:leave_app.php');
            die();
        }
        else
        {
            die ("Could not execute update query: check your query " . mysqli_error($dbconnection) ." Click here to try again. <a href='apply.php'> Go back </a>");
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Leave update failed.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['error'] = "<h1>Could not execute update query: check your query " . mysqli_error($dbconnection) ."</h1>";
            header('location:leave_app.php');
            die();
        }
        
    }
?>