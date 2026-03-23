<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
    ?>
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
                <h1> Add Department </h1> <span> <a class="link" href="department.php"> Department /</a> Add department</span>
        </div>
        <section class="container-fluid" id="site-main">
        <?php
        $department='';
        $id='';
        // $user_id = $_SESSION['USER_ID'];
        // $role = $_SESSION['ROLE'];
            if(isset($_GET['id'])){
                $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
                $runquery = " select * from department where id = '$id' ";
                $result = mysqli_query($dbconnection,$runquery);
                $row = mysqli_fetch_assoc($result);
                $department = $row['department'];
            }

            if(isset($_POST['department'])){
                $department = mysqli_real_escape_string($dbconnection,$_POST['department']);
                if ($id>0){
                    $runquery = " update department set department = '$department' where id = '$id' ";
                }else{
                    $runquery = " insert into department (department) values('$department') ";
                }
                $result = mysqli_query($dbconnection,$runquery);
                if($result && $id>0){
                    // $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully registered an admin.','$today','1')";
                    // $result = mysqli_query($dbconnection,$runquery);
                    $_SESSION['success'] = "<h1>Department updated successfully</h1>"; 
                    // header ("Location: add_department.php"); 
                }
                elseif ($result && $id<0) {
                    // $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully registered an admin.','$today','1')";
                    // $result = mysqli_query($dbconnection,$runquery);
                    $_SESSION['success'] = "<h1>Department added successfully</h1>";
                    // header('location:department.php');
                    // die();
                }
                
            }
        ?>
        <div class="request">
        <div align="center">
                    <?php if(isset( $_SESSION['success'])){
                        echo "<br>";
                        echo "<div class='success'>". $_SESSION['success']. "</div>" ;
                        echo "<br>";
                        unset( $_SESSION['success']);                  
                        }
                    ?>
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
            <div align="center">
                <h1>Department Form</h1>
            </div>
            <br>
            <div>
                <form method="post">
                    <label for="department">Department Name</label>
                    <input class="input" type="text" value="<?php echo $department ?>" name="department" id="department" placeholder="Enter Department Name" required>
                    <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="submit" id="submit" value="SUBMIT">
                </form>
            </div>
        </div>
        </section>
    </div>  
    <div class="foot"> 
        <?php include('footer.php') ?>
    </div>  
</body>
</html>