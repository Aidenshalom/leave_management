<?php
    require ('dbconnect.php');

    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $days = $_POST['days'];
        $user_id = $_SESSION['USER_ID'];
        $role = $_SESSION['ROLE'];

        $today =  date("Y-m-d H:i:s");

        $runquery = " insert into leave_type(name, days) values('$name', '$days') ";
        $result = mysqli_query($dbconnection,$runquery);
        if (!$result)
        {
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','".$name." was not added successfully.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
            header('location:leave_type.php');
            die();
        }
        else
        {
            $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','".$name." was successfully added to leave types.','$today','1')";
            $result = mysqli_query($dbconnection,$runquery);
            $_SESSION['success'] = "<h1>".$name." added successfully</h1>";
            header('location:leave_type.php');
            die();
        }
    }
    mysqli_close($dbconnection);
?>