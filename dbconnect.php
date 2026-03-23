<?php
    session_start(); 
    $session_id = session_id();  
    $dbconnection = mysqli_connect('localhost', 'root', '', 'leave');

    if(!$dbconnection)
    {
        die('database not found'. mysqli_error($dbconnection));
    }
    else{
        //  echo "success";
    }
?>