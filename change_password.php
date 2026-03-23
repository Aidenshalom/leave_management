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
                <h1> Change Password </h1> <span> <a class="link" href="dashboard.php">Dashboard /</a> Change Password </span>
        </div>
        <section class="container-fluid" id="site-main">
            <div class="request">
                <div align="center">
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
                <br> <br>  
                    <form name="myform" action="password.php?id=<?php echo $_SESSION['USER_ID']; ?>" method="post">
                        <label for="password">Input Old Password</label>
                        <input class="input" type="password" name="old_password" id="old_password" placeholder="Enter old Password" required>
                        <label for="password">Create New Password</label>
                        <input class="input" type="password" name="password" id="password" placeholder="Enter Admin Password" required>
                        <label for="cpassword">Confirm New Password</label>
                        <input class="input" type="password" name="cpassword" id="cpassword" placeholder="Confirm Admin Password" onkeyup="validate()" required>
                        <span class="msg" id="msg" style="font-size:2em;"></span>
                        <br>
                        <?php  if($_SESSION['ROLE']) { ?>
                        <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="change" id="change" value="Submit">
                        <?php }
                                else{       
                        ?>
                        <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="e_change" id="change" value="submit">
                        <?php }?>
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