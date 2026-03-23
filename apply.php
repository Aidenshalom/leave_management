<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('head.php');
        $id='';
        $leave_id = '';
        $sdate = '';
        $edate = '';
        $days = '';

        


        if(isset($_GET['id'])){
            $id = mysqli_real_escape_string($dbconnection,$_GET['id']);
            $runquery = " select * from `leave` where id = '$id' ";
            $result = mysqli_query($dbconnection,$runquery);
            $row = mysqli_fetch_assoc($result);
            $leave_id = $row['leave_id'];
            $sdate = $row['start_date'];
            $edate = $row['end_date'];
            $days = $row['off_days'];
        }   
    ?>
    <link href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> -->
    <script>
        // $(document).ready(function(){
            
        // });
    </script>
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
                <h1> Apply For Leave </h1> <span> <a class="link" href="leave_app.php">Leave Application /</a> Apply For Leave </span>
        </div>
        <?php
            $query = "select * from leave_type";
            $res = mysqli_query($dbconnection,$query);
        ?>
        <section class="container-fluid" id="site-main">
            <div class="request">
                <div align="center">
                    <h1>Apply For Leave</h1>
                </div>
                <br>
                <div>
                    <form action="apply_result.php?id=<?php echo "$id"; ?>" method="post">
                        <label for="leave">Leave Type</label>
                        <select class="input" name="leave" id="leave" required>
                            <option value="">Select leave type</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($res))
                            {
                                if($leave_id== $row['id']){
                                    echo "<option selected='selected' value=". $row['id'] .">". $row['name'] . " </option>";
                                }
                                else{
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <label for="leave_from">Start Date</label>
                        <input class="input" type="text" id="sdate" name="sdate" value="<?php echo "$sdate"; ?>" placeholder="mm/dd/yyyy"  required>
                        <label for="leave_to">Resumption Date</label>
                        <input class="input" type="text" id="edate" name="edate" value="<?php echo $edate; ?>" onmouseenter="getdays()" placeholder="mm/dd/yyyy" required>
                        <label for="days">days</label>
                        <div id="sample"></div>
                        <input class="input" type="text" name="days" id="days" placeholder="leave days" onmouseenter="getdays()" value="<?php echo $days; ?>" required readonly>
                        <br>
                        <?php
                            if($id>0){
                                echo '<input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="update" id="update" value="Update" onmouseenter="getdays()">';
                            }
                            else{
                        ?>
                        <input type="submit" class="w-100 text-lg btn btn-primary btn-shadow" name="submit" id="submit" value="Submit" onmouseenter="getdays()">
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
    <script>
        // date validdation
        var date = new Date();
        var tdate = date.getDate();
        if(tdate < 10)
        {
            tdate = "0" + tdate;
        }
        var month = date.getMonth() + 1;
        if(month < 10)
        {
            month = "0" + month;
        }
        var year = date.getUTCFullYear();
        var minDate = year + "-" + month + "-" + tdate;
        document.getElementById("sdate").setAttribute('min', minDate)
        document.getElementById("edate").setAttribute('min', minDate)
        // console.log(minDate);
        
        function addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
        }

        const DISABLED_DATES = ['03/11/2022'];
        const today = new Date();

        if(today.getDay() === 5){
        DISABLED_DATES.push(addDays(today, 3)); 
        }

        const elem = document.querySelector('#sdate');
        const datepicker = new Datepicker(elem, {
        pickLevel: 0,
        daysOfWeekDisabled: [0,6],
        autohide: 1,
        datesDisabled: DISABLED_DATES,
        minDate: addDays(today, 0),
        // maxDate: addDays(today, 60)
        })

        const elem1 = document.querySelector('#edate');
        const datepicker1 = new Datepicker(elem1, {
        pickLevel: 0,
        daysOfWeekDisabled: [0,6],
        autohide: 1,
        weekstart: 1,
        weekend: 5,
        datesDisabled: DISABLED_DATES,
        minDate: addDays(today, 1),
        // maxDate: addDays(today, 60)
        })

//         function calcBusinessDays(startDate, endDate) {
//     var day = moment(startDate);
//     var businessDays = 0;
//     while (day.isSameOrBefore(endDate,'day')) {
//         if (day.day()!=0 && day.day()!=6) businessDays++;
//         day.add(1,'d');
//     }
//     return businessDays;
// }


function getdays(){
            let sdate = new Date(document.getElementById("sdate").value);
            let edate = new Date(document.getElementById("edate").value);
            
            // checking if dates are valid 
            // if valid calc days
            if (sdate.getTime() && edate.getTime()){
                var day = new Date;
                day.getDay() === 0 || day.getDay() === 6;

                
                let timedifference = edate.getTime() - sdate.getTime();
    
                // converting milliseconds into days

                let days = timedifference/(1000 * 3600 * 24);

                let wholeWeeks = days / 7 | 0;
               
                let newdays = wholeWeeks * 5;

                if (days % 7) {
                    sdate.setDate(sdate.getDate() + wholeWeeks * 7);
                    
                    while (sdate < edate) {
                        sdate.setDate(sdate.getDate() + 1);

                    // If day isn't a Sunday or Saturday, add to business days
                    if (sdate.getDay() != 0 && sdate.getDay() != 6) {
                        ++newdays;
                    }
                    }
                }

                // console.log(newdays);

                 document.getElementById("days").value = newdays;
            }
        };

            
    </script>
</body>
</html>