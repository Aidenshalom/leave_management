<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
    ?>

    <style>
        .e-img
        {
            width: 150px;
            background: #3c00a0;
            border-radius: 50%;
            height: 150px;
            overflow:hidden;
        }

        .e-img img
        {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <?php include ('menu.php'); ?>
        <div class="topbar grid cols-1 lg-cols-2 lg-cols-3">
            <?php 
                include('logo_text.php');
            ?>
        </div>
        <div class="focus">
            <h1> Employee Section </h1> <span> <a class="link" href="dashboard.php">Dashboard /</a> Employee Section </span>
        </div>
        <section class="container-fluid" id="site-main">
            <?php
                $runquery = "select * from employee order by id asc";
                $result = mysqli_query($dbconnection,$runquery);
            ?>
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
                     <a href="add_employee.php"><button class="btn btn-primary btn-shadow"><h1> Add New Employee</h1></button></a>
                </div>
                <div class="overflow">
                    <table class="table" cellspacing="20px" cellpadding="20%">
                        <thead>
                            <tr>
                                <th> S/N </th>
                                <th> FULL NAME  </th>
                                <th> DEPARTMENT ID </th>
                                <th> PHOTO  </th>
                                <th> STATUS  </th>
                                <th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                while ( $row = mysqli_fetch_assoc($result))
                                {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $dept_id = $row['department_id'];
                                    $date_added = $row['date_added'];
                                    $image = $row['image'];
                            ?>
                            <tr align="center">
                                <td> <?php echo "$i"; ?> </td>
                                <td> <?php echo "$name"; ?> </td>
                                <td> <?php echo "$dept_id"; ?> </td>
                                <td> 
                                    <div class="e-img"> 
                                        <img width="100px" src="<?php echo "$image"; ?>" alt="" style="border-radius:"> 
                                    </div> 
                                </td>
                                <td> active </td>
                                <td> <a href="add_employee.php?id=<?php echo "$id"; ?>"><button class="btn btn-primary"> Edit </button> </a>
                                <!-- <a href="delete.php?id=&type=delete_employee"><button class="btn btn-primary"> Delete </button></a> -->
                                    <button class="btn btn-primary delete_employee"  value="<?php echo "$id";?>"> Delete </button>
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