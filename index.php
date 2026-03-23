<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ('head.php');
    ?>
</head>
<body>
    <div class="login_container">
        <video autoplay loop muted plays-inline class="background-vid">
            <source src="assets/background.mp4" type="video/mp4">
        </video>
        <div class="login_content">
            <h1>Welcome to New Horizons Leave Management System</h1>
            <div class="admin" id="admin">
                <h2 id="title">ADMIN PANEL</h2>
                <form action="add_admin_result.php" method="post">
                    <div class="inputbox" id="email">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" name="email" id="email" required>
                        <span>Username</span>
                    </div>
                    <br>
                    <div class="inputbox" id="password">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" id="password" required>
                        <span>Password </span>
                    </div> 
                    <br>
                    <input id="a_login" name="a_login" class="login_btn" type="submit" value="Login">
                    <br>
                    <div class="msg">
                        <?php if(isset( $_SESSION['error'])){
                            echo "<br>";
                            echo  $_SESSION['error'];
                            echo "<br>";
                            unset( $_SESSION['error']);                  
                            }
                        ?>    
                    </div>
                    <br>
                    <div>
                        <a href="e_login.php"><button type="button" id="toggle_btn" class="toggle_btn"> Go to Employee Panel </button> </a>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="login_foot grid cols-1 lg-cols-2 lg-cols-3"> 
        <?php include('footer.php') ?>
        </div>
    </div>
</body>

</html>