<?php
    require ('dbconnect.php');

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $days = $_POST['days'];
        $user_id = $_SESSION['USER_ID'];
        $role = $_SESSION['ROLE'];

        $today =  date("Y-m-d H:i:s");

        $runquery = "update leave_type set name = '$name', days = '$days' where id = '$id' ";
        $result = mysqli_query($dbconnection,$runquery);
        if (!$result)
        {
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','".$name." was not updated successfully.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
            header('location:leave_type.php');
            die();
        }
        else
        {
            echo "".$name." Updated successfully ";
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully upated ".$name.".','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['success'] = "<h1>".$name." updated successfully</h1>";
            header('location:leave_type.php');
            die();
        }
    }
    mysqli_close($dbconnection);
?>