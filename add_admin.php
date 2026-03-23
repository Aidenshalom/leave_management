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
                <h1> Add Admin </h1> <span> <a class="link" href="dasboard.php">Dashboard /</a> Add New Admin</span>
        </div>
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
                <div align="center">
                    <h1>Input Admin Details</h1>
                </div>
                <br>
                <div>
                    <form name="myform" action="add_admin_result.php" method="post" enctype="multipart/form-data">
                        <label for="name">Admin Name</label>
                        <input class="input" type="text" name="name" id="name" placeholder="Enter Admin Name" required>
                        <label for="email">Admin Email</label>
                        <input class="input" type="email" name="email" id="email" placeholder="Enter Admin Email" required>
                        <label for="phone">Admin Mobile Phone</label>
                        <input class="input" type="text" name="phone" id="phone" placeholder="Enter Admin Phone Number" required>
                        <input class="input" type="hidden" name="role" id="role" value="Admin" required>
                        <label for="dob">Admin Birth Date</label>
                        <input class="input" type="date" name="dob" id="dob" placeholder="Enter Admin Birth Date" onkeyup="getAge()" required>
                        <label for="age">Admin Age</label>
                        <input class="input" type="text" name="age" id="age" placeholder="Enter Admin Age" required>
                        <label for="gender">Admin Gender</label>
                        <select class="input" name="gender" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                        <label for="image">Admin Image</label>
                        <input class="input" type="file" name="image" id="image" placeholder="Enter Admin Image" required>
                        <label for="address">Address</label>
                        <input class="input" type="text" name="address" id="address" placeholder="Enter Admin Address" required>
                        <label for="password">Create Admin Password</label>
                        <input class="input" type="password" name="password" id="password" placeholder="Enter Admin Password" required>
                        <label for="cpassword">Confirm Admin Password</label>
                        <input class="input" type="password" name="cpassword" id="cpassword" placeholder="Confirm Admin Password" onkeyup="validate()" required>
                        <span class="msg" id="msg" style="font-size:2em;"></span>
                        <br>
                        <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="submit" id="submit" value="Submit">
                    </form>
                </div>
            </div>
        </section>
    </div>  
    <div class="foot"> 
        <?php include('footer.php') ?>
    </div>  
    <script>
        function validate(){
        let upass = document.myform.password.value;
        let cpass = document.myform.cpassword.value;

        if(upass == cpass){
            document.getElementById("msg").innerText = "";
        }
        else
        {
            document.getElementById("msg").innerText = "Password did`nt match";
        }
    }

 
        var todayDate = new Date();
        var pmonth = todayDate.getMonth() + 1;
        if(pmonth < 10)
        {
            pmonth = "0" + pmonth;
        }
        var pyear = todayDate.getUTCFullYear();
        var pdate = todayDate.getDate();
        if(pdate < 10)
        {
            pdate = "0" + pdate;
        }

        var maxDate = pyear + "-" + pmonth + "-" + pdate;
        document.getElementById("dob").setAttribute('max', maxDate)
        // console.log(maxDate)

        function getAge(){
            var dob = document.getElementById("dob");
            var age = document.getElementById("age");

            age = pyear - dob;

            console.log(age)

        } 

    </script>
</body>
</html>