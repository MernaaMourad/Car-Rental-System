<?php
session_start();
include 'config.php';
if (!isset($_SESSION["customer_ssn"])) {
    echo '<script >';
    echo 'window.location="index.php"';
    echo '</script>';
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        function validateForm() {

            $pick = document.forms["Form"]["pickup_time"].value;
            $drop = document.forms["Form"]["drop_time"].value;

            var varnow = new Date();
            var var2 = varnow.toISOString().split('T')[0];
            if (new Date($pick).getTime() < new Date(var2).getTime()) {
                alert("pick up time must be greater than current time");
                return false;
            }

            if ($pick >= $drop) {
                alert("drop off date and time must be after pick-up date and time");
                return false;
            }
        }

    </script>


    <title>YOURCAR-RENTAL</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>


<body>

<!-- Pre Header -->

<div id="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size:30px">Yourcar!!</span>
            </div>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/logo.png" weidth="70" height="70" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="customerlogout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="pre-header">
    <h2 class="pre-header" style="text-align: center">Find You Dream Cars For Hire</h2>
    <h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
</section>
</section><!--  end hero section  -->


<div class="pre-header">
    <div id="fom">
        <form name="Form" class="form-horizontal" method="post" action="" onsubmit="return validateForm();">
            <h3 style="text-align:left; color: #000099; font-weight:bold; text-decoration:underline">Reservation
                Area</h3>
            <table height="200" align="center">
                <tr>
                    <td>Pick-up date:</td>
                    <td><input type="date" class="form-control" id="pickup_time" name="pickup_time"
                               placeholder="pickup date&time" required>
                    </td>
                </tr>
                <tr>
                    <td>Drop-off date:</td>
                    <td><input type="date" class="form-control" id="drop_time" name="drop_time"
                               placeholder="Drop off date&time" required>
                    </td>
                </tr>
                <tr>
                    <td>Pickup location:</td>
                    <td>

                        <select name='pick_loc' onchange='' required>
                            <option disabled selected>pickup location</option>
                            <?php

                            $car_plateid = $_GET['id'];

                            $sqlloc = "SELECT * FROM  CARS C WHERE C.car_plateid='$car_plateid' ";
                            $rsloc = mysqli_query($conn, $sqlloc);
                            $rwloc = $rsloc->fetch_array();

                            //$rw=mysqli_fetch_assoc($rs);
                            $location = $rwloc['location'];

                            $sqloffice = "SELECT * FROM  OFFICE O WHERE O.location='$location' ";
                            $rsoffice = mysqli_query($conn, $sqloffice);
                            $array = array();
                            //$rw=mysqli_fetch_assoc($rs);


                            while ($rwoffice = $rsoffice->fetch_array()) {
                                $array[] = $rwoffice['city'];
                            }


                            foreach ($array as $value) {

                                echo "<option value\"$value\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Drop-off location:
                    </td>
                    <td><select name='drop_loc' onchange='' required>
                            <option disabled selected>dropoff location</option>
                            <?php

                            $sqllocc = "SELECT * FROM  CARS C WHERE C.car_plateid='$car_plateid' ";
                            $rslocc = mysqli_query($conn, $sqllocc);
                            $rwlocc = $rslocc->fetch_array();

                            //$rw=mysqli_fetch_assoc($rs);
                            $locationn = $rwlocc['location'];

                            $sqlofficee = "SELECT * FROM  OFFICE O WHERE O.location='$locationn' ";
                            $rsofficee = mysqli_query($conn, $sqlofficee);
                            $arrayy = array();
                            //$rw=mysqli_fetch_assoc($rs);


                            while ($rwofficee = mysqli_fetch_assoc($rsofficee)) {
                                $arrayy[] = $rwofficee['city'];
                            }
                            foreach ($arrayy as $valuee) {
                                echo "<option value\"$valuee\">$valuee</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>


                <td colspan="2" style="text-align:center">
                    <p></p>
                    <input class="btn btn-primary" type="submit" name="create" value="Reserve now">
                </td>
                </a>


        </form>
        </tr>
        </table>


    </div>
</div>
</section>


<?php

if (isset($_POST['create'])) {


    $pickup_loc = $_POST['pick_loc'];
    $drop_loc = $_POST['drop_loc'];


    if (!isset($_POST['pick_loc'])) {
        echo '<script language="javascript">';
        echo 'alert("please enter pickup location")';
        echo '</script>';
        echo '<script >';
        echo 'window.location="Reservation.php"';
        echo '</script>';

        exit;
    }
    if (!isset($_POST['drop_loc'])) {
        echo '<script language="javascript">';
        echo 'alert("please enter drop off location")';
        echo '</script>';
        echo '<script >';
        echo 'window.location="Reservation.php"';
        echo '</script>';

        exit;
    }


    $pickup_time = $_POST['pickup_time'];
    $_SESSION["pickup_time"] = $pickup_time;
    $drop_time = $_POST['drop_time'];
    $_SESSION["drop_time"] = $drop_time;


    $_SESSION["car_plateid"] = $car_plateid;

//selecting reservations that is reserved since making clashes
    $query = "SELECT * FROM RESERVATION R 
WHERE ( R.car_plateid='$car_plateid' 
AND 
(
  (
    ('$pickup_time' >= R.pickup_time AND '$drop_time' <= R.drop_time )
    OR
    ('$pickup_time' <= R.pickup_time AND '$drop_time' >= R.drop_time ) 
   )
OR
 (
   ('$pickup_time' >= R.pickup_time AND '$pickup_time' <= R.drop_time)
   OR
   ('$drop_time' >= R.pickup_time AND '$drop_time' <= R.drop_time)
 )
)
) 
GROUP BY R.car_plateid";


    $result = mysqli_query($conn, $query);
//$row = $result->fetch_array();
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($result && $count == 0) {


//if($result->num_rows = 0)
        //{   

        $queryamount = "SELECT * FROM  CARS C WHERE C.car_plateid='$car_plateid' ";
        $rs = mysqli_query($conn, $queryamount);
        $rw = $rs->fetch_array();
        //$rw=mysqli_fetch_assoc($rs);
        $hire_cost = $rw['hire_cost'];
        $starttime = strtotime($pickup_time);
        $endtime = strtotime($drop_time);
        $interval = $endtime - $starttime;
        //echo $interval;
        // $hours=date_interval_format($interval,'%h');
        $days = ceil($interval / 86400);
        $amount = $days * $hire_cost;
        $_SESSION["amount"] = $amount;
        /* echo $_SESSION["amount"];*/
        $customer_id = $_SESSION['customer_id'];

        $sqll = "INSERT INTO RESERVATION (`pickup_time` ,`drop_time`,`pickup_loc`  , `drop_loc`, `amount`, `customer_id`, `car_plateid`) 
       VALUES('$pickup_time','$drop_time','$pickup_loc','$drop_loc','$amount','$customer_id','$car_plateid')";


        $balancequery = "SELECT *FROM CUSTOMER WHERE customer_id='$customer_id' ";
        $rss = mysqli_query($conn, $balancequery);
        $bq = $rss->fetch_array();
        $remaining_balancee = $bq['remaining_balance'];
        $remaining_balance = $remaining_balancee + $amount;
        $_SESSION["remaining_balance"] = $remaining_balance;

        $ss = "UPDATE CUSTOMER SET remaining_balance='$remaining_balance'WHERE  customer_id='$customer_id' ";
        $ress = $conn->query($ss);
        if ($ress == TRUE) {

            // insert in database 
            $res = $conn->query($sqll);
            if ($res == TRUE) {

                echo '<script >';
                echo 'window.location="payment.php"';
                echo '</script>';

                exit;
            }
        }

    } /*  ;*/

    else {

        //echo "test2 ";
        echo '<script >';
        echo 'window.location="Reserved.php"';
        echo '</script>';
        exit;

    }
}
?>


</div>
<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
</div>

</section><!--  end search section  -->


<!-- Footer Starts Here -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <img src="assets/images/logo.png" weidth="70" height="70" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">How It Works ?</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Ends Here -->


<!-- Sub Footer Starts Here -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright-text">
                    <p>

                        <a rel="nofollow" href="https://www.facebook.com/tooplate"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sub Footer Ends Here -->


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>


</body>

</html>