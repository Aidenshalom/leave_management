<div class="col py-2">
    <span class="text">NEW HORIZONS </span><br>
    <span class="text"> LEAVE </span><br>
    <span class="text">MANAGEMENT</span>

</div>
<div class="col2" align="center">
    <h1>WELCOME, <?php echo $_SESSION['USERNAME']; ?> </h1>
</div>
<div class="col3" align="center">
    <?php
        $uid = $_SESSION['USER_ID'];
        $role = $_SESSION['ROLE'];
        $runquery = "select * from notification where user_id = '$uid' and user_role = '$role' and active = '1' ";
        $result = mysqli_query($dbconnection, $runquery);
        $count = mysqli_num_rows($result);
    ?>
    <a href="notification.php">
        <button type="button" class="icon_button">
        <i class="fa-solid fa-bell"></i>
        <?php if($count) 
            {
                echo "<span class='icon_button_badge'>".$count."</span>";
            }
            else if(!$_SESSION['ROLE']){
                $uid = $_SESSION['USER_ID'];
                $runquery = "select * from notification where user_id = '$uid' and user_role = 'employee' and active = '1' ";
                $result = mysqli_query($dbconnection, $runquery);
                $count2 = mysqli_num_rows($result);
                 if($count2) 
            {
                echo "<span class='icon_button_badge'>".$count2."</span>";
            }
            }
        ?>
        </button>
    </a>   
</div> 