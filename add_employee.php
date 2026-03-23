<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
        $id='';
        $name = '';
        $email ='';
        $phone = '';
        $dob = '';
        $age = '';
        $gender = '';
        $department = '';
        $address = '';
        $image = '';
        $password = '';
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
            $password = $row['password'];
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
                <h1> Employee Section </h1> <span> <a class="link" href="employee.php">Employee Section /</a> Add New Employee</span>
        </div>
        <?php
            $runquery = "select * from department order by department";
            $result = mysqli_query($dbconnection,$runquery);
        ?>
        <section class="container-fluid" id="site-main">
            <div class="request">
                <div align="center">
                    <h1>Input Employee Details</h1>
                </div>
                <br>
                <div>
                    <div><?php echo "$msg"; ?></div>
                    <form name="myform" action="add_employee_result.php?id=<?php echo "$id"; ?>" method="post" enctype="multipart/form-data">
                        <label for="name">Employee Name</label>
                        <input class="input" type="text" name="name" id="name" placeholder="Enter Employee Name" value="<?php echo $name; ?>" required>
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
                            <?php
                                if($id>0){
                            ?>
                            <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                            <option value="male">male</option>
                            <option value="female">Female</option>
                            <?php
                                }
                                else{
                            ?>
                            <option value="">Select Gender</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <?php
                                }
                            ?>
                        </select>
                        <label for="department">Department</label>
                        <select class="input" name="department" id="department" required>
                            <option>Select department</option>
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
                        <label for="image">Employee Image</label>
                        <input class="input" type="hidden" name="old_image" id="old_image" value="<?php echo $image; ?>">
                        <input class="input" type="file" name="image" id="image" placeholder="Enter Employee Image" required>
                        <label for="address">Address</label>
                        <input class="input" type="text" name="address" id="address" placeholder="Enter Employee Address" value="<?php echo $address; ?>" required>
                        <label for="password">Create Employee Password</label>
                        <input class="input" type="password" name="password" id="password" placeholder="Enter Employee Password" value="<?php echo $password; ?>" required>
                        <label for="cpassword">Confirm Employee Password</label>
                        <input class="input" type="password" name="cpassword" id="cpassword" placeholder="Confirm Employee Password" onkeyup="validate()" value="<?php echo $password; ?>" required>
                        <span class="msg" id="msg" style="font-size:2em;"></span>
                        <br>
                        <?php
                            if($id>0){
                                echo '<input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="update" id="update" value="Update">';
                            }
                            else{
                        ?>
                        <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="submit" id="submit" value="Submit">
                        <?php
                            } 
                        ?>
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