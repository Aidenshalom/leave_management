<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
    ?>
    <style>
        #site-main .font2
{
    font-size: 1.5em;   
}

.ol{
    list-style: disc;
}
    </style>
</head>
<body>
    <div class="container">
        <?php include ('menu.php'); ?>
        <div class="topbar grid cols-1 lg-cols-2 lg-cols-3">
        <?php 
            include('logo_text.php');
        ?> 
        </div>
        <div class="focus">
            <h1> Leave Balance </h1> <span> <a class="link" href="e_dashboard.php">Dashboard /</a> Leave Balance</span>
        </div>
        <section class="container-fluid" id="site-main">
            <div align="center">
                <br><br>
                <div class="success">
                    <?php if(isset( $_SESSION['success'])){
                        echo "<br>";
                        echo  $_SESSION['success'];
                        echo "<br>";
                        unset( $_SESSION['success']);                  
                        }
                    ?>
                </div>
                <div class="error">
                    <?php if(isset( $_SESSION['error'])){
                        echo "<br>";
                        echo  $_SESSION['error'];
                        echo "<br>";
                        unset( $_SESSION['error']);                  
                        }
                    ?>
                </div>
            </div> 
            <div class="content grid cols-1 lg-cols-2 lg-cols-3">
                <?php
                    $runquery = " select * from leave_type ";
                    $result = mysqli_query($dbconnection,$runquery);
                    if (!$result)
                    {
                        die('Could Not Get Record');
                    }
                    else
                    {
                        while ( $row = mysqli_fetch_assoc($result) ) 
                        {
                            $name = $row['name'];
                            $days = $row['days'];		
                            $id = $row['id'];
                            
                ?>
                <div class="con_l">
                    <h2><?php echo "$name"; ?></h2>
                    <br>
                    <ol class="ol">
                        <li><span class="font2">Given days : <?php echo "$days"." ". "days"; ?> </span></li>
                        
                    
                    <?php
                        $eid = $_SESSION['USER_ID'];
                        $runquery2 = " select sum(off_days) as total_days from `leave` where leave_id = '$id' and employee_id = '$eid' and status = '2' ";
                        $result2 = mysqli_query($dbconnection,$runquery2);
                        $count = mysqli_num_fields($result2);
                        while ( $row2 = mysqli_fetch_assoc($result2) ) 
                        {
                            // $status = $row2['status'];
                            if($count>0){
                                // $off_days = $row2['off_days'];
                                // echo $off_days.'days' ;
                                // $eid = $_SESSION['USER_ID'];
                                // $run = " select sum(off_days) as total_days from `leave` where leave_id = '$id' and employee_id = '$eid' and status = '2' ";
                                // $res = mysqli_query($dbconnection,$run);
                                // $cal = mysqli_fetch_assoc($res);

                                $tdays = $row2['total_days'];
                                // echo $tdays.'days' ;
                                $remdays = $days - $tdays;
                            } 
                        }
                    ?>
                        <li><span class="font2">Used Days : <?php echo "$tdays"." ". "days"; ?> </span></li>
                        <li><span class="font2">Remaining Days : <?php echo "$remdays"." ". "days"; ?> </span></li>
                    </ol>
                </div>
                <?php
                    }
                }
                mysqli_close($dbconnection); 
                ?>
            </div>
        </section>
            
    </div>  
    <div class="foot"> 
        <?php include('footer.php') ?>
    </div>  
</body>
</html>