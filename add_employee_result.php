<?php
    include('dbconnect.php');
    require_once('sendmail.php');

        if(isset($_POST['e_login']) && isset($_POST['email']) && isset($_POST['password'])){
            $email = mysqli_real_escape_string($dbconnection,$_POST['email']);
            $password = mysqli_real_escape_string($dbconnection,$_POST['password']);
            $runquery = " select * from employee where email = '$email' and password = '$password'";
            $result = mysqli_query($dbconnection,$runquery);
            $count = mysqli_num_rows($result);
            if ($count>0)
            {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['ROLE'] = $row['role'];
                $_SESSION['USER_ID'] = $row['id'];
                $_SESSION['USERNAME'] = $row['name'];
                $_SESSION['IMAGE'] = $row['image'];
                $_SESSION['DEPARTMENT'] = $row['department_id'];
                // $session_id = $_SESSION['USER_ID'];
                header('location:e_dashboard.php');
                die();
                
            }
            else
            {
                $_SESSION['error']= "Please enter correct login details <br> Or try to login as an admin";
                header('location: e_login.php');
                die();
            }
        }

        if(isset($_GET['id']) && isset($_POST['update']))
        {
            $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $address = $_POST['address'];
            $cpassword = $_POST['cpassword'];
            $old_image = $_POST['old_image'];
            $user_id = $_SESSION['USER_ID'];
            $role = $_SESSION['ROLE'];

            $today =  date("Y-m-d H:i:s");

            if (($_FILES['image']['name'] != ""))
            {
                $target_dir = "assets/employee/";
                //$target_sub_dir = "employee/";
                
                $file = $_FILES['image']['name'];

                $update_image='';

                if ($file != NULL)
                {
                    $path = pathinfo($file);

                    $filename = $path['filename'];
                    $ext = $path['extension'];

                    $temp_name = $_FILES['image']['tmp_name'];

                    $path_filename_ext = $target_dir.$filename.".".$ext;
                    

                    $update_image = $path_filename_ext;
                }
                else
                {
                    $update_image = $old_image;
                }
                
            }
            // Check if file already exists
            if (file_exists($path_filename_ext)) 
            {
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Sorry, Image file already exists try again with another image.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['error'] = "<h1>Sorry, Image file already exists</h1>";
                header ("Location: employee.php");
                die();
            }
            else
            {

                $runquery = "UPDATE employee SET name='$name',email='$email',phone='$phone',dob='$dob',age='$age',gender='$gender',department_id='$department',image='$update_image',address='$address',password='$cpassword' WHERE id='$id' ";

                $result = mysqli_query($dbconnection, $runquery);

                if($result)
                {
                    if($file != NULL){
                        if(file_exists(''.$old_image.'')){
                            unlink(''.$old_image.'');
                        }
                        move_uploaded_file($temp_name,$update_image);
                    }
                    $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully updated an employee profile.','$today','1')";
                    $result = mysqli_query($dbconnection,$runquery);
                    $_SESSION['success'] = "<h1>Employee profile updated successful</h1>";
                    header ("Location: employee.php");
                }
                else
                {
                    $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Employee profile update failed.','$today','1')";
                    $result = mysqli_query($dbconnection,$runquery);
                    $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                    header ("Location: employee.php");
                }
            }    

        }

        if (isset($_POST['submit']))
        {
            //Get Form Data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $address = $_POST['address'];
            $cpassword = $_POST['cpassword'];
            $user_id = $_SESSION['USER_ID'];
            $role = $_SESSION['ROLE'];

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "invalid email";
            }

            $today =  date("Y-m-d H:i:s");

            if (($_FILES['image']['name'] != ""))
            {
                // Where the file is going to be stored
                $target_dir = "assets/employee/";
                // $target_sub_dir = "employee/";
                
                $file = $_FILES['image']['name'];
                $path = pathinfo($file);

                $filename = $path['filename'];
                $ext = $path['extension'];

                $temp_name = $_FILES['image']['tmp_name'];

                $path_filename_ext = $target_dir.$filename.".".$ext;
                //$path_filename_ext2 = $target_sub_dir.$filename.".".$ext;

                // Check if file already exists
                if (file_exists($path_filename_ext)) 
                {
                    $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Sorry, Image file already exists try again with another image.','$today','1')";
                    $result = mysqli_query($dbconnection,$runquery);
                    $_SESSION['error'] = "<h1>Sorry, Image file already exists</h1>";
                    header ("Location: employee.php");
                    die();
                }
                else
                {
                    move_uploaded_file($temp_name,$path_filename_ext);
                    
                    //Prepare SQL query
                    $strInsert = "insert into employee(name,email,phone,dob,age,gender,department_id,image,address,password,date_added) values('$name','$email','$phone','$dob','$age','$gender','$department','$path_filename_ext','$address','$cpassword', '$today')";

                    if (!mysqli_query($dbconnection,$strInsert)) 
                    {
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Employee registration failed.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                        header ("Location: employee.php");
                    }
                    else
                    {   
                        sendEmployeeRecord($email, $cpassword );

                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully registered an employee.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['success'] = "<h1>Employee registration successful</h1>";
                        header ("Location: employee.php");
                    }
                }
            }
        }

        if (isset($_POST['id']) && isset($_POST['e_update']))
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $address = $_POST['address'];
            $user_id = $_SESSION['USER_ID'];
            $role = 'employee';

            $today =  date("Y-m-d H:i:s");

            $runquery = "UPDATE employee SET name = '$name', email = '$email', phone = '$phone', dob = '$dob', age = '$age', gender = '$gender', department_id = '$department', address = '$address' WHERE id = '$id' ";
            $result = mysqli_query($dbconnection,$runquery);
            if (!$result)
            {
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Profile update failed.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['error'] = "<h1>profile update failed: check your query " . mysqli_error($dbconnection) ." </h1>";
                header ("Location: e_profile.php?id= ".$_SESSION['USER_ID']."");
            }
            else
            {
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully updated your profile.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['success'] = "<h1>Profile updated successfully</h1>";
                header('location:e_profile.php?id= '.$_SESSION['USER_ID']);
                die();
            }
        }

        if(isset($_POST['change']) && isset($_FILES['image']))
        {
            $id = $_POST['id'];
            $old_image = $_POST['old_image'];
            $user_id = $_SESSION['USER_ID'];
            $role = 'employee';

            $today =  date("Y-m-d H:i:s");


            if (($_FILES['image']['name'] != ""))
            {
                $target_dir = "assets/employee/";
                //$target_sub_dir = "employee/";
                
                $file = $_FILES['image']['name'];

                $update_image='';

                if ($file != NULL)
                {
                    $path = pathinfo($file);

                    $filename = $path['filename'];
                    $ext = $path['extension'];

                    $temp_name = $_FILES['image']['tmp_name'];

                    $path_filename_ext = $target_dir.$filename.".".$ext;
                    

                    $update_image = $path_filename_ext;
                }
                else
                {
                    $update_image = $old_image;
                }
                
            }
                // Check if file already exists
                if (file_exists($path_filename_ext)) 
                {
                    $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Sorry, Image file already exists try again with another image.','$today','1')";
                    $result = mysqli_query($dbconnection,$runquery);
                    $_SESSION['error'] = "<h1>Sorry, Image file already exists</h1>";
                    header ("Location: e_profile.php?id= ".$_SESSION['USER_ID']."");
                    die();
                }
                else
                {
                    $runquery = "UPDATE employee SET image='$update_image' WHERE id='$id' ";

                    $result = mysqli_query($dbconnection, $runquery);

                    if($result)
                    {
                        if($file != NULL){
                            if(file_exists(''.$old_image.'')){
                                unlink(''.$old_image.'');
                            }
                            move_uploaded_file($temp_name,$update_image);
                        }
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully updated your profile picture.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['success'] = "<h1>Profile picture updated successfully</h1>";
                        header('location:e_profile.php?id= '.$_SESSION['USER_ID']);
                        die();
                    }
                    else
                    {
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Photo update failed.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['error'] = "<h1>profile photo update failed: check your query " . mysqli_error($dbconnection) ." </h1>";
                        header ("Location: e_profile.php?id= ".$_SESSION['USER_ID']."");
                    }
                }
            
        }
        mysqli_close($dbconnection);      
?>
