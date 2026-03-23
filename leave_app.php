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
            <?php if(!$_SESSION['ROLE']) {?>
                <h1> Leave Application </h1> <span> <a class="link" href="e_dashboard.php">Dashboard /</a> Leave Application </span>
            <?php } else { ?>
                <h1> Leave Request </h1> <span> <a class="link" href="dashboard.php">Dashboard /</a> Leave Request </span>
            <?php } ?>
        </div>
        <?php
            if($_SESSION['ROLE']) {
                $runquery = "select l.id, l.employee_name,l.employee_id,l.leave_id,l.start_date,l.end_date,l.off_days,l.date_applied,l.status,t.name from `leave` as l join `leave_type` as t on l.leave_id=t.id order by id desc";
            }
            else{
                $eid = $_SESSION['USER_ID'];
                $runquery = "select l.id, l.employee_name,l.employee_id,l.leave_id,l.start_date,l.end_date,l.off_days,l.date_applied,l.status,t.name from `leave` as l join `leave_type` as t on l.leave_id=t.id where employee_id = '$eid' order by id desc ";
            }    
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
            <br><br>
            <?php if(!$_SESSION['ROLE']) {?>
                <div class="py-5" align="center">
                    <a href="apply.php"> <button class="btn btn-primary btn-shadow"><h1> Apply for Leave </h1></button>  </a>
                </div>
                <?php } ?>
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
                            while($row = mysqli_fetch_assoc($result)){ 
                                $name = $row['employee_name'];
                                $emp_id = $row['employee_id'];
                                ?>
                            <tr align="center">
                                <td> <?php echo $i?> </td>
                                <td> <?php echo $name; ?> </td>
                                <td> <?php echo $emp_id;
                                    $sql = " select email from employee where name = '$name' and id = '$emp_id'";
                                    $res = mysqli_query($dbconnection, $sql);
                                    $erow = mysqli_fetch_assoc($res);
                                        $email = $erow['email'];
                                ?> </td>
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
                                            echo "Declined";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php if(!$_SESSION['ROLE']) {
                                        if($row['status'] == 1){
                                    ?>
                                    <a href="apply.php?id=<?php echo $row['id'];?>"> <button class="btn btn-primary">Edit</button>  </a>
                                    <!-- <a href="delete.php?id=&type=delete_leave"> <button class="btn btn-primary">Delete</button> </a> -->
                                    <button class="btn btn-primary delete_leave" value="<?php echo $row['id'];?>">Delete</button>
                                    <?php }
                                        } else {
                                            if($row['status'] == 1){
                                    ?>
                                            
                                        <select class="input2" name="" id="" onchange="update_leave_status('<?php echo $row['id'];?>','<?php echo $name;?>','<?php echo $email;?>','<?php echo $emp_id;?>',this.options[this.selectedIndex].value)">
                                            <option value="">Update Status</option>
                                            <option value="2">Approve</option>
                                            <option value="3">Decline</option>
                                        </select>
                                    <?php
                                            } 
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
    <script>
        function update_leave_status(id,name,email,emp_id,select_value)
        {
            window.location.href='update.php?id='+id+'&name='+name+'&email='+email+'&emp_id='+emp_id+'&type=update&status='+select_value;
        }
    </script> 
    <div class="foot"> 
        <?php include('footer.php') ?>
    </div>  
</body>
</html>