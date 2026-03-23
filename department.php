<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
    ?>
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
                <h1> Department </h1> <span><a class="link" href="dashboard.php">Dasboard /</a> Department</span>
        </div>
        <section class="container-fluid" id="site-main">
            <?php 
                $runquery = " select * from department order by id desc";
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
                <div class="py-5" align="center">
                    <a href="add_department.php"> <button class="btn btn-primary btn-shadow"><h1> Add Department </h1></button>  </a>
                </div>
                <div class="overflow">
                    <table class="table" cellspacing="20px" cellpadding="20%">
                        <thead>
                            <tr>
                                <th> S/N </th>
                                <th> DEPARTMENT ID</th>
                                <th> DEPARTMENT </th>
                                <th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr align="center">
                                <td> <?php echo $i?> </td>
                                <td> <?php echo $row['id'];?> </td>
                                <td> <?php echo $row['department'];?> </td>
                                <td> <a href="add_department.php?id=<?php echo $row['id'];?>"> <button class="btn btn-primary">Edit</button>  </a><br>
                                    <!-- <a href="delete.php?id=?>&type=delete"> <button class="btn btn-primary">Delete</button> </a> -->
                                    <button class="btn btn-primary delete" value="<?php echo $row['id'];?>">Delete</button>
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
    <div class="foot"> 
        <?php include('footer.php') ?>
    </div>  
</body>
</html>