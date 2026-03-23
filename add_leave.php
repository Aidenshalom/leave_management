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
            <h1> Add Leave </h1> <span> <a class="link" href="leave_type.php">Leave Type /</a> Add Leave</span>
        </div>
        <section class="container-fluid" id="site-main">
            <div class="request">
                <div align="center">
                    <h1>Leave Form</h1>
                </div>
                <br>
                <div>
                    <form action="add_leave_result.php" method="post">
                        <label for="name">Leave Type</label>
                        <input class="input" type="text" name="name" id="name" placeholder="Enter Leave Type" required>
                        <label for="days">Days</label>
                        <input class="input" type="text" name="days" id="days" placeholder="Enter leave days" required>
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