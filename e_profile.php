<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
        $msg = '';

        if(isset($_POST['submit'])){
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if($password === $cpassword){
                header('location:add_admin_result.php');
            }
            else{
                $msg = "Password didn`t match";
            }
        }


        if(isset($_GET['id'])){
            $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
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
        }   
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
            <h1> Profile </h1> <span> <a class="link" href="e_dashboard.php">Dashboard /</a> Profile </span>
        </div>
        <?php
            $runquery = "select * from department order by department";
            $result = mysqli_query($dbconnection,$runquery);
        ?>
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
                <div class="div-img-div">
                    <div class="img-div">
                        <img src="<?php echo $image; ?>" alt="" width="100%">
                    </div>
                </div>
                <div class="flex">
                    <form action="add_employee_result.php" method="post" enctype="multipart/form-data">
                        <label for="image">Change Image</label>
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                        <input class="input" type="hidden" name="old_image" id="old_image" value="<?php echo $image; ?>">
                        <input class="w-100 input" type="file" name="image" id="image" required>
                        <input type="submit" class="text-lg btn btn-primary btn-shadow" name="change" id="change" value="change">
                    </form>
                </div>
                <br>
                <div>
                    <div><?php echo "$msg"; ?></div>
                    <form action="add_employee_result.php" method="post">
                        <label for="name">Employee Name</label>
                        <input class="input" type="hidden" name="id" id="id" value="<?php echo $id; ?>" required>
                        <input class="input" type="text" name="name" id="name" value="<?php echo $name; ?>" required>
                        <label for="email">Employee Email</label>
                        <input class="input" type="email" name="email" id="email" placeholder="Enter Employee Email" value="<?php echo $email; ?>" required>
                        <label for="phone">Employee Mobile Phone</label>
                        <input class="input" type="text" name="phone" id="phone" placeholder="Enter Employee Phone Number" value="<?php echo $phone; ?>" required>
                        <label for="dob">Employee Birth Date</label>
                        <input class="input" type="date" name="dob" id="dob" placeholder="Enter Employee Birth Date" value="<?php echo $dob; ?>" required>
                        <label for="age">Employee Age</label>
                        <input class="input" type="text" name="age" id="age" placeholder="Enter Employee Age" value="<?php echo $age; ?>" required>
                        <label for="gender">Employee Gender</label>
                       <select class="input" name="gender" id="gender" required>
                            <option value="<?php echo $gender ?>"><?php echo $gender ?> </option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                        <label for="department">Department</label>
                        <select class="input" name="department" id="department" required>
                            <option value="">Select department</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                if($department== $row['id']){
                                    echo "<option selected='selected' value=". $row['id'] .">". $row['department'] . " </option>";
                                }
                                else{
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['department'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <label for="address">Address</label>
                        <input class="input" type="text" name="address" id="address" placeholder="Enter Employee Address" value="<?php echo $address; ?>">
                        <br>
                        <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="e_update" id="e_update" value="Submit">
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