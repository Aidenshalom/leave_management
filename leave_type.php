<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
    ?>
</head>
<body>
    <div class="container" id="container">
        <?php include ('menu.php'); ?>
        <div class="topbar grid cols-1 lg-cols-2 lg-cols-3">
        <?php 
            include('logo_text.php');
        ?> 
        </div>
        <div class="focus">
            <h1> Leave Types </h1> <span> <a class="link" href="dashboard.php">Dashboard /</a> Leave Types</span>
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
            <div class="w-100 pt -mb" align="center">
                 <a href="add_leave.php"><button class="w-50 btn btn-primary btn-shadow"><h1> Add Leave</h1></button></a>
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
                ?>
                <div class="con_l">
                    <h2><?php echo "$name"; ?></h2>
                    <br>
                    <span class="font"><?php echo "$days"." ". "days"; ?> </span>
                    <div class="upd">
                        <span> <a href="update_leave.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary"> UPDATE</button></a></span>
                        <!-- <span> <a href="delete_leave_confirm.php?id=<?php //echo $row['id'];?>&type=delet"><button class="btn btn-primary"> DELETE</button></a></span> -->
                        <span> <button type="button" class="btn btn-primary delet" value="<?php echo $row['id'];?>"> DELETE</button> </span>
                    </div>
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