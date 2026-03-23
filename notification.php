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
            <h1> Notification </h1> <span> <a class="link" href="dashboard.php">Dashboard /</a> Notification</span>
        </div>
        <section class="container-fluid" id="site-main">
            <div class="w-100 pt -mb" align="center">
                <h1> Recent activities</h1>
            </div> 
            <div class="content grid cols-1 ">
                <?php
                    $uid = $_SESSION['USER_ID'];
                    $role = $_SESSION['ROLE'];
                    $runquery = "select * from notification where user_id = '$uid' and user_role = '$role' ORDER by id DESC ";
                    $result = mysqli_query($dbconnection, $runquery);
                    $count = mysqli_num_rows($result);
                    if ($count){
                        while ($row = mysqli_fetch_assoc($result)){   
                      
                            $runquery2 = "update `notification` set active = '0' where user_id = '$uid' and user_role = '$role' ";
                            $result2 = mysqli_query($dbconnection, $runquery2);
                ?>
                <div class="con">
                <h2> <?php echo $row['title']; ?> </h2> 
                <br>
                <p class="font2"><?php echo $row['body']; ?></p>
                <div align="right">
                    <?php echo $row['date']; ?>
                </div>
                </div>
               
               <?php } }else{
                     $uid = $_SESSION['USER_ID'];
                     $runquery = "select * from notification where user_id = '$uid' and user_role = 'employee' ORDER by id DESC ";
                     $result = mysqli_query($dbconnection, $runquery);
                     $count2 = mysqli_num_rows($result);
                     if ($count2){
                         while ($row = mysqli_fetch_assoc($result)){  
                        $runquery2 = "update `notification` set active = '0' where user_id = '$uid' and user_role = 'employee' ";
                        $result2 = mysqli_query($dbconnection, $runquery2);
                ?>
                    <div class="con">
                    <h2> <?php echo $row['title']; ?> </h2> 
                    <br>
                    <p class="font2"><?php echo $row['body']; ?></p>
                    <div align="right">
                        <?php echo $row['date']; ?>
                    </div>
                    </div>
                <?php } } } ?>
            </div>
        </section>
    </div>  
    <div class="foot grid cols-1 lg-cols-2 lg-cols-3"> 
        <?php include('footer.php') ?>
    </div>  
</body>
</html>