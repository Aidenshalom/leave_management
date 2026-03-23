<?php
    include('dbconnect.php');

    if(isset($_POST['a_login']) && isset($_POST['email']) && isset($_POST['password'])){
        $email = mysqli_real_escape_string($dbconnection,$_POST['email']);
        $password = mysqli_real_escape_string($dbconnection,$_POST['password']);
        $runquery = " select * from admin where email = '$email' and password = '$password'";
        $result = mysqli_query($dbconnection,$runquery);
        $count = mysqli_num_rows($result);
        if ($count>0)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['USER_ID'] = $row['id'];
            $_SESSION['USERNAME'] = $row['name'];
            $_SESSION['IMAGE'] = $row['image'];
            // $session_id = $_SESSION['USER_ID'];
            header('location: dashboard.php');
            die();
            
        }
        else
        {
            $_SESSION['error']= "Please enter correct login details <br> Or try to login as an employee";
            header('location: index.php');
            die();
        }
    }

        if (isset($_POST['submit']))
        {
            //Get Form Data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $cpassword = $_POST['cpassword'];
            $user_id = $_SESSION['USER_ID'];
            $role = $_SESSION['ROLE'];

            $today =  date("Y-m-d H:i:s");

            if (($_FILES['image']['name'] != ""))
            {
                // Where the file is going to be stored
                $target_dir = "assets/admin/";
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
                    header ("Location: add_admin.php");
                }
                else
                {
                    move_uploaded_file($temp_name,$path_filename_ext);
                    
                    //Prepare SQL query
                    $strInsert = "insert into admin(name,email,phone,password,role,dob,age,gender,address,image,date_added) values('$name','$email','$phone','$cpassword','$role','$dob','$age','$gender','$address','$path_filename_ext','$today')";

                    if (!mysqli_query($dbconnection,$strInsert)) 
                    {
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Admin registration failed.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                        header ("Location: add_admin.php");
                    }
                    else
                    {
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully registered an admin.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['success'] = "<h1>Admin registration successful</h1>";
                        header ("Location: add_admin.php");
                    }
                }
            }
        }

        if (isset($_POST['id']) && isset($_POST['update']))
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $user_id = $_SESSION['USER_ID'];
            $role = $_SESSION['ROLE'];

            $today =  date("Y-m-d H:i:s");

            $runquery = "UPDATE admin SET name = '$name', email = '$email', phone = '$phone', dob = '$dob', age = '$age', gender = '$gender', address = '$address' WHERE id = '$id' ";
            $result = mysqli_query($dbconnection,$runquery);
            if (!$result)
            {
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Admin registration failed.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                header('location:profile.php?id= '.$_SESSION['USER_ID']);
                die();
            }
            else
            {
                $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully updated your profile.','$today','1')";
                $result = mysqli_query($dbconnection,$runquery);
                $_SESSION['success'] = "<h1>Profile upated successfully</h1>";
                header('location:profile.php?id= '.$_SESSION['USER_ID']);
                die();
            }
        }

        if(isset($_POST['change']) && isset($_FILES['image']))
        {
            $id = $_POST['id'];
            $old_image = $_POST['old_image'];
            $user_id = $_SESSION['USER_ID'];
            $role = $_SESSION['ROLE'];

            $today =  date("Y-m-d H:i:s");
            
            if (($_FILES['image']['name'] != ""))
            {
                $target_dir = "assets/admin/";
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
                    header('location:profile.php?id= '.$_SESSION['USER_ID']);
                    die();
                }
                else
                {
                    $runquery = "UPDATE admin SET image='$update_image' WHERE id='$id' ";

                    $result = mysqli_query($dbconnection, $runquery);

                    if($result)
                    {
                        if($file != NULL){
                            if(file_exists(''.$old_image.'')){
                                unlink(''.$old_image.'');
                            }
                            move_uploaded_file($temp_name,$update_image);
                        }
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Success message','$user_id','$role','You have successfully updated your profile photo.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['success'] = "<h1>Profile photo upated successfully</h1>";
                        header('location:profile.php?id= '.$_SESSION['USER_ID']);
                        die();
                    }
                    else
                    {
                        $runquery = "insert into notification(title,user_id,user_role,body,date,active) values('Error message','$user_id','$role','Profile update failed.','$today','1')";
                        $result = mysqli_query($dbconnection,$runquery);
                        $_SESSION['error'] = "<h1>Could not execute insert query: check your query " . mysqli_error($dbconnection) ." </h1>";
                        header('location:profile.php?id= '.$_SESSION['USER_ID']);
                        die();
                    }
                }
            
        }
        mysqli_close($dbconnection);    
        
        
?>
