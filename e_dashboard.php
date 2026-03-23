<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    include('head.php');
?>
</head>
<style>
.dashboard_image
{
    width: 100%;
    display: flex;
    justify-content: center;
}

.img
{
    width: 450px;
    background: #3c00a0;
    border-radius: 5%;
    height: 450px;
    overflow: hidden;
}

.img img
{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.shadow{
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
}
.fprofile{
    padding: 10px;
}
.fprofile h2{
    padding: 20px;
    text-transform: uppercase;
}
.col2 h1{
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
</style>
<body>
    <div class="container">
        <?php include ('menu.php'); ?>
        <div class="topbar grid cols-1 lg-cols-2 lg-cols-3">
        <?php 
            include('logo_text.php');
            $id = $_SESSION['USER_ID'];
            $runquery = " select * from employee where id = '$id' ";
            $result = mysqli_query($dbconnection,$runquery);
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $dob = $row['dob'];
            $age = $row['age'];
            $gender = $row['gender'];
            $department = $row['department_id'];
            $image = $row['image'];
            $address = $row['address'];
        ?> 
        </div>
        <div class="focus">
            <h1> Dashboard </h1> <span> <a class="link" href="e_dashboard.php">Home /</a> Employee`s Dashboard</span>
        </div>
        <section class="container-fluid" id="site-main">
            <div align="center">
                <br> <br>  
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
            <div class="content shadow">
                <h1 align="center">EMPLOYEE`S PROFILE</h1>
                <div class="grid cols-1 lg-cols-2">
                    <div width="50%">
                        <br>
                        <div class="dashboard_image">
                            <div class="img">
                                <img src="<?php echo $image; ?>" alt="" width="100%">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div width="50%" class="fprofile">
                        <br>
                        <br>
                        <h2>FULL NAME : <?php echo $name; ?></h2>
                        <h2>EMAIL : <?php echo $email; ?></h2>
                        <h2>PHONE : <?php echo $phone; ?></h2>
                        <h2>GENDER : <?php echo $gender; ?></h2>
                        <h2>DEPARTMENT ID : <?php echo $department; ?> </h2>
                    </div>
                </div>
                <div align="right">
                    <a href="e_profile.php?id=<?php echo $_SESSION['USER_ID']; ?>">
                        <button class="btn btn-primary btn-shadow"> Edit Profile</button>
                    </a>
                </div>
            </div>
            <div class="content grid cols-1 lg-cols-2 lg-cols-3">
            <div class="con">
                    <span class="font"> <i class="fa-solid fa-spinner"></i></span>
                    <h2>Pending Leave Request</h2>
                    <br>
                    <?php
                            $eid = $_SESSION['USER_ID'];
                            $runquery = "select * from `leave` where status = '1' and employee_id = '$eid'";
                            $result = mysqli_query($dbconnection, $runquery);
                            if($count = mysqli_num_rows($result))
                            {
                                echo"<span class='font'>".$count."</span>";
                            }
                            else{
                                echo"<span class='font'>0</span>";
                            }
                    ?>  
                </div>
                <div class="con">
                    <span class="font"> <i class="fa-regular fa-circle-xmark"></i></span> 
                    <h2>Declined Leave Request</h2>
                    <br>
                    <?php
                            $eid = $_SESSION['USER_ID'];
                            $runquery = "select * from `leave` where status = '3' and employee_id = '$eid'";
                            $result = mysqli_query($dbconnection, $runquery);
                            if($count = mysqli_num_rows($result))
                            {
                                echo"<span class='font'>".$count."</span>";
                            }
                            else{
                                echo"<span class='font'>0</span>";
                            }
                    ?>  
                </div>
                <div class="con">
                    <span class="font"> <i class="fa-solid fa-circle-check"></i></span>
                    <h2>Approved Leave Request</h2>
                    <br>
                    <?php
                            $eid = $_SESSION['USER_ID'];
                            $runquery = "select * from `leave` where status = '2' and employee_id = '$eid'";
                            $result = mysqli_query($dbconnection, $runquery);
                            if($count = mysqli_num_rows($result))
                            {
                                echo"<span class='font'>".$count."</span>";
                            }
                            else{
                                echo"<span class='font'>0</span>";
                            }
                    ?>  
                </div>
            </div>
            <div class="request">
            <?php
                $runquery = "select l.id, l.employee_name,l.employee_id,l.leave_id,l.start_date,l.end_date,l.off_days,l.date_applied,l.status,t.name from `leave` as l join `leave_type` as t on l.leave_id=t.id where employee_id = '$eid' ";
                $result = mysqli_query($dbconnection,$runquery);
            ?>
            <summary class="text-lg"> Requests </summary>
            <div class="overflow">
                    <table class="table" cellspacing="20px" cellpadding="20%">
                        <thead>
                            <tr>
                            <th> S/N </th>
                                <th> EMPLOYEE NAME </th>
                                <th> EMPLOYEE ID </th>
                                <th> LEAVE ID </th>
                                <th> LEAVE TYPE </th>
                                <th> START DATE </th>
                                <th> RESUMPTION DATE </th>
                                <th> DAYS </th>
                                <th> DATE ADDED </th>
                                <th> STATUS </th>
                                <th width="10%"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr align="center">
                                <td> <?php echo $i?> </td>
                                <td> <?php echo $row['employee_name'];?> </td>
                                <td> <?php echo $row['employee_id'];?> </td>
                                <td> <?php echo $row['leave_id'];?> </td>
                                <td> <?php echo $row['name'];?> </td>
                                <td> <?php echo $row['start_date'];?> </td>
                                <td> <?php echo $row['end_date'];?> </td>
                                <td> <?php echo $row['off_days'];?> </td>
                                <td> <?php echo $row['date_applied'];?> </td>
                                <td>
                                    <?php 
                                        if($row['status'] == 1){
                                            echo "Pending";
                                        }
                                        if($row['status'] == 2){
                                            echo "Approved";
                                        }
                                        if($row['status'] == 3){
                                            echo "Rejected";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>  
    <div class="foot grid cols-1 lg-cols-2 lg-cols-3"> 
        <?php include('footer.php') ?>
    </div>  
</body>
</html>