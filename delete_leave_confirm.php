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
            <h1> Delete Leave </h1> <span> <a class="link" href="leave_type.php">Leave Type /</a> Delete Leave</span>
        </div>
        <section class="container-fluid" id="site-main">
            <?php 
                if(isset($_GET['type']) && $_GET['type']=='delet' && isset($_GET['id'])){
                $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
                $runquery = " select * from leave_type where id = '$id' ";
                $result = mysqli_query($dbconnection,$runquery);
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $name = $row['name'];
                $days = $row['days'];
                }
            ?>
            <div class="request">
                <div align="center">
                    <h1>Are You Sure You want to delete Leave</h1>
                </div>
                <br>
                <div>
                    <form action="delete.php?id=<?php echo $id;?>&type=delet" method="post">
                        <label for="name">Leave Name</label>
                        <input class="input" type="text" value="<?php echo $name;?>" name="name" id="name" placeholder="Enter Leave Name"required>
                        <label for="days">Days</label>
                        <input class="input" type="text" value="<?php echo $days;?>" name="days" id="days" placeholder="Enter leave days" required>
                        <input type="submit" class="btn btn-primary btn-shadow w-100 text-lg" name="submit" id="submit" value="SUBMIT">
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