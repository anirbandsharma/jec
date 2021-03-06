<?php

include('connect.php');
// alumni
$alumni_total=mysqli_fetch_array(mysqli_query($con, "SELECT count(*) from alumni"));
$alumni_arrived=mysqli_fetch_array(mysqli_query($con, "SELECT count(*) from first_day where role = 'alumni'"));
$alumni_coupons=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(coupon) from first_day where role = 'alumni'"));

// faculty
$faculty_total=mysqli_fetch_array(mysqli_query($con, "SELECT count(*) from faculty"));
$faculty_arrived=mysqli_fetch_array(mysqli_query($con, "SELECT count(*) from faculty where coupon != 0 "));
$faculty_coupons=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(coupon) from faculty where coupon != 0 "));

// staff
$staff_total=mysqli_fetch_array(mysqli_query($con, "SELECT count(*) from staff"));
$staff_arrived=mysqli_fetch_array(mysqli_query($con, "SELECT count(*) from staff where coupon != 0 "));
$staff_coupons=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(coupon) from staff where coupon != 0 "));

// total
$alumni_total_contri=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total) from alumni"));
$first_alumni_total_contri=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total) from first_day where role = 'alumni' "));


$faculty_total_contri=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total) from faculty"));
$first_faculty_total_contri=mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total) from first_day where role = 'faculty' "));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEC Diamond Jubilee</title>
    <link rel="stylesheet" href="css/st.css">
    <link rel="stylesheet" href="css/widgets.css">
   
</head>

<body>



    <?php include('nav.php'); ?>

    <main>

        <div class="btn">
            <div class="btn__card" onclick="location.href='alumni_reg.php'">
                <p>Register Alumni</p>
            </div>
            <div class="btn__card" onclick="location.href='faculty_reg.php'">
                <p>Register Faculty</p>
            </div>
            <div class="btn__card" onclick="location.href='staff_reg.php'">
                <p>Register Staff</p>
            </div>
            <div class="btn__card" onclick="location.href='guest_reg.php'">
                <p>Register Guest</p>
            </div>
        </div>

        <center> <br>
            <div class="line"></div>
            <br>
        </center>



        <div class="counts">
            <div class="count__card">
                <center><h3><u>Alumni</u></h3></center>
                <p>
                    Total Registered : <strong><?php echo $alumni_total[0]; ?></strong> <button onclick="location.href='./viewalu.php'">View</button>
                </p>
                <p>
                    Total Arrived : <strong><?php echo $alumni_arrived[0]; ?></strong> <button onclick="location.href='viewalu_firstday.php'">View</button> 
                </p>
                <p>
                    Coupons distributed : <strong><?php echo $alumni_coupons[0]; ?></strong>
                </p>
            </div>
            <div class="count__card">
                <center><h3><u>Faculty</u></h3></center>
                <p>
                    Total Registered : <strong><?php echo $faculty_total[0]; ?></strong><button onclick="location.href='viewfac.php'">View</button>
                </p>
                <p>
                    Total Arrived : <strong><?php echo $faculty_arrived[0]; ?></strong><button onclick="location.href='viewfac_firstday.php'">View</button>
                </p>
                <p>
                    Coupons distributed : <strong><?php echo $faculty_coupons[0]; ?></strong>
                </p>
            </div>
            <div class="count__card">
                <center><h3><u>Staff</u></h3></center>
                <p>
                    Total Registered : <strong><?php echo $staff_total[0]; ?></strong><button onclick="location.href='viewstaff.php'">View</button>
                </p>
                <p>
                    Total Arrived : <strong><?php echo $staff_arrived[0]; ?></strong><button onclick="location.href='viewstaff_firstday.php'">View</button>
                </p>
                <p>
                    Coupons distributed : <strong><?php echo $staff_coupons[0]; ?></strong>
                </p>
            </div>
            <!-- <div class="count__card">
                <center><h3><u>Guest</u></h3></center>
                <p>
                    Total Registered : <strong><?php echo $guest_total[0]; ?></strong><button onclick="location.href='viewguest.php'">View</button>
                </p>
                <p>
                    Total Arrived : <strong><?php echo $guest_arrived[0]; ?></strong><button onclick="location.href='#'">View</button>
                </p>
                <p>
                    Coupons distributed : <strong><?php echo $guest_coupons[0]; ?></strong>
                </p>
            </div> -->
            <div class="count__card">
                <center><h3><u>Alumni Contribution</u></h3></center>
                <p>
                    Total Alumni Contribution : <strong>Rs. <?php echo $alumni_total_contri[0]; ?></strong>
                </p>
                <p>
                    New Alumni Contribution on 26th : <strong>Rs. <?php echo $first_alumni_total_contri[0]; ?></strong>
                </p>
                <p>
                    New Alumni Contribution on 27th : <strong>Rs. 0</strong>
                </p>
        </div>
        <div class="count__card">
                <center><h3><u>Faculty Contribution</u></h3></center>
                <p>
                    Total Alumni Contribution : <strong>Rs. <?php echo $faculty_total_contri[0]; ?></strong>
                </p>
                <p>
                    New Alumni Contribution on 26th : <strong>Rs. <?php echo $first_faculty_total_contri[0]; ?></strong>
                </p>
                <p>
                    New Alumni Contribution on 27th : <strong>Rs. 0</strong>
                </p>
        </div>
            
        </div>
           




    </main>


    <script src="modal-nav.js"></script>

</body>

</html>