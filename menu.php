<?php
    if(!isset($_SESSION['USER_ID'])){
        header('location:index.php');
        die();
  }
?>
<div class="sidebar">
            <ul>
                <li class="logo">
                    <a href="#">
                        <span class="icon">
                            <img src="css/assets/logo3.png" alt="" width="40px">
                        </span>
                        <span class="text">NEW HORIZONS <br> LEAVE <br> MANAGEMENT</span>
                    </a>
                </li>
                <?php if($_SESSION['ROLE']>0) {?>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="employee.php">
                        <span class="icon"><i class="fa-solid fa-user-group"></i></span>
                        <span class="text">Employee Section</span>
                    </a>
                </li>
                <li>
                    <a href="leave_type.php">
                        <span class="icon"><i class="fa-solid fa-id-badge"></i></span>
                        <span class="text">Leave Section</span>
                    </a>
                </li>
                <li>
                    <a href="department.php">
                        <span class="icon"><i class="fa-solid fa-building-user"></i></span>
                        <span class="text">Department</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php?id=<?php echo $_SESSION['USER_ID']; ?>">
                        <span class="icon"><i class="fa-solid fa-id-badge"></i></span>
                        <span class="text">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="leave_app.php">
                        <span class="icon"><i class="fa fa-envelope-open" aria-hidden="true"></i></span>
                        <span class="text">Leave Requests</span>
                    </a>
                </li>
                <div class="log">
                    <li>
                        <div class="submenu">
                            <ol>
                                <li> <a href="add_admin.php"> Add New Admin </a> </li>
                                <li> <a href="change_password.php"> Change Password </a> </li>
                            </ol>
                        </div>
                        <a>
                            <span class="icon">
                                <div class="imgme">
                                    <img src="<?php echo $_SESSION['IMAGE']; ?>" alt="">
                                </div>
                            </span>
                            <span class="text"> <?php echo $_SESSION['USERNAME']; ?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="logout_admin.php">
                            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span class="text">Logout</span>
                        </a>
                    </li>
                </div>
                <?php } else { ?>
                    <li>
                    <a href="e_dashboard.php">
                        <span class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="leave_balance.php">
                        <span class="icon"><i class="fa fa-balance-scale" aria-hidden="true"></i></span>
                        <span class="text">Leave Balance</span>
                    </a>
                </li>
                <li>
                    <a href="leave_app.php">
                        <span class="icon"><i class="fa fa-book" aria-hidden="true"></i></span>
                        <span class="text">Leave Application</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="e_profile.php?id=<?php echo $_SESSION['USER_ID']; ?>">
                        <span class="icon"><i class="fa-solid fa-id-badge"></i></span>
                        <span class="text">Profile</span>
                    </a>
                </li> -->
                <div class="log">
                    <li>
                        <div class="submenu">
                            <ol>
                                <li> <a href="change_password.php"> Change Password </a> </li>
                            </ol>
                        </div>
                        <a>
                            <span class="icon">
                                <div class="imgme">
                                    <img src="<?php echo $_SESSION['IMAGE']; ?>" alt="">
                                </div>
                            </span>
                            <span class="text"> <?php echo $_SESSION['USERNAME']; ?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="logout_employee.php">
                            <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span class="text">Logout</span>
                        </a>
                    </li>
                </div>
                <?php }?>
            </ul>
        </div>