<?php session_start();
include 'config.php';
if (!isset($_SESSION["admin_ssn"])) {
    echo '<script >';
    echo 'window.location="index.php"';
    echo '</script>';
    exit;
}
?>
<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>REservatiosn</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all"/>

</head>
<body>
<!-- Header -->
<div id="header">
    <div class="shell">

        <?php
        include 'menu.php';
        ?>
    </div>


    <div id="container">
        <div class="shell">

            <div class="small-nav">
                <a href="index.php">Dashboard</a>
                <span>&gt;</span>
                Client Requests
            </div>

            <br/>
            <div id="main">
                <div class="cl">&nbsp;</div>

                <div id="content">

                    <div class="box">
                        <!-- Box Head -->
                        <div class="box-head">


                        </div>

                        <div class="table">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="16"><input type="checkbox" class="checkbox"/></th>
                                    <th>Res nu</th>
                                    <th>Car plate</th>
                                    <th>Customer id</th>
                                    <th>amount</th>
                                    <th>Paid</th>
                                    <th>pickup loc</th>
                                    <th>Drop loc</th>
                                    <th>pickup time</th>
                                    <th>Drop time</th>
                                    <th>Is paid</th>
                                    <th>payment date</th>


                                </tr>
                                <?php
                                include 'config.php';
                                $select = "SELECT * FROM RESERVATION  ";//available at he adim part in general
                                //"SELECT * FROM cars where 
                                $result = $conn->query($select);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox"/></td>
                                        <td><h3><a href="#"><?php echo $row['reservation_no'] ?></a></h3></td>
                                        <td><?php echo $row['car_plateid'] ?></td>
                                        <td><a href="#"><?php echo $row['customer_id'] ?></a></td>
                                        <td><?php echo $row['amount'] ?></td>
                                        <td><?php echo $row['paid'] ?></td>
                                        <td><?php echo $row['pickup_loc'] ?></td>
                                        <td><a href="#"><?php echo $row['drop_loc'] ?></a></td>

                                        <td><?php echo $row['pickup_time'] ?></td>
                                        <td><a href="#"><?php echo $row['drop_time'] ?></a></td>
                                        <td><?php echo $row['paid'] ?></td>
                                        <td><?php echo $row['payment_date'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>


                            <!-- Pagging -->
                            <div class="pagging">
                                <div class="left">Showing 1-12 of 44</div>
                                <div class="right">
                                    <a href="#">Previous</a>
                                    <a href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">245</a>
                                    <span>...</span>
                                    <a href="#">Next</a>
                                    <a href="#">View all</a>
                                </div>
                            </div>
                            <!-- End Pagging -->

                        </div>
                        <h2><input type="submit" onclick="window.print()" value="Print Here"/></h2>

                    </div>
                    <!-- End Box -->

                </div>
                <!-- End Content -->


                <div id="sidebar">

                    <!-- Box -->
                    <div class="box">

                        <!-- Box Head -->
                        <div class="box-head">
                            <h2>Management</h2>
                        </div>
                        <!-- End Box Head-->

                        <div class="box-content">

                            <div class="cl">&nbsp;</div>


                            <p>SEARCH FOR Reservation</a></p>
                            </p>
                            <!-- Sort -->
                            <form class="form-horizontal" action="" method="post">
                                <div>
                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">pickup date : </label>
                                    <input type="date" class="form-control" id="pickup_time" name="pickup_time"
                                           placeholder="pickup time">
                                </div>
                                <div>
                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">drop date : </label>
                                    <input type="date" class="form-control" id="drop_time" name="drop_time"
                                           placeholder="drop time">
                                </div>
                                <div>
                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">payments_from : </label>
                                    <input type="date" class="form-control" id="payments_from " name="payments_from"
                                           placeholder="payments_from">
                                </div>
                                <div>
                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">payments_to: </label>
                                    <input type="date" class="form-control" id="payments_to" name="payments_to"
                                           placeholder="payments_to">
                                </div>
                                <div>
                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">reservation number
                                        : </label>
                                    <select name='reservation_no' onchange='' required>
                                        <option disabled selected>reservation</option>
                                        <?php


                                        $resno_qu = "SELECT  `reservation_no` FROM reservation";
                                        $resno = mysqli_query($conn, $resno_qu);
                                        $arrayresno = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($reservation_no = $resno->fetch_array()) {
                                            $arrayresno[] = $reservation_no['reservation_no'];
                                        }


                                        foreach ($arrayresno as $value) {

                                            echo "<option value\"$value\">$value</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div>
                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput"> reservation_time : </label>
                                    <select name='reservation_time' onchange='' required>
                                        <option disabled selected>reservation</option>
                                        <?php

                                        $reservation_time_qu = "SELECT DISTINCT `reservation_time` FROM reservation ";
                                        $reservationtime = mysqli_query($conn, $reservation_time_qu);
                                        $arrayreservation_time = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($reservation_time = $reservationtime->fetch_array()) {
                                            $arrayreservation_time[] = $reservation_time['reservation_time'];
                                        }


                                        foreach ($arrayreservation_time as $value) {

                                            echo "<option value\"$value\">$value</option>";
                                        }

                                        ?>
                                    </select>


                                </div>
                                <div>

                                    <br>


                                    <label class="col-md-3 control-label" for="searchinput">amount : </label>
                                    <select name='amount' onchange='' required>
                                        <option disabled selected>Amount</option>
                                        <?php


                                        $amount_qu = "SELECT DISTINCT `amount` FROM reservation";
                                        $amountt = mysqli_query($conn, $amount_qu);
                                        $arrayamount = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($amount = $amountt->fetch_array()) {
                                            $arrayamount[] = $amount['amount'];
                                        }


                                        foreach ($arrayamount as $value) {

                                            echo "<option value\"$value\">$value</option>";
                                        }

                                        ?>
                                    </select>

                                </div>

                                <div>
                                    <br>

                                    <label class="col-md-3 control-label" for="searchinput">customer id: </label>
                                    <select name='customer_id' onchange='' required>
                                        <option disabled selected>customer_id</option>
                                        <?php


                                        $customer_id_qu = "SELECT DISTINCT `customer_id` FROM reservation";
                                        $customer_idd = mysqli_query($conn, $customer_id_qu);
                                        $arraycustomer_idd = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($customer_id = $customer_idd->fetch_array()) {
                                            $arraycustomer_idd[] = $customer_id['customer_id'];
                                        }


                                        foreach ($arraycustomer_idd as $value) {

                                            echo "<option value\"$value\">$value</option>";
                                        }

                                        ?>
                                    </select>
                                    <br>

                                </div>
                                <div>
                                    <br>

                                    <label class="col-md-3 control-label" for="searchinput">car_plateid : </label>
                                    <select name='car_plateid' onchange='' required>
                                        <option disabled selected>car_plateid</option>
                                        <?php

                                        $car_plateid_qu = "SELECT DISTINCT `car_plateid` FROM reservation";
                                        $carplateid = mysqli_query($conn, $car_plateid_qu);
                                        $arraycarplateid = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($car_plateid = $carplateid->fetch_array()) {
                                            $arraycarplateid[] = $car_plateid['car_plateid'];
                                        }


                                        foreach ($arraycarplateid as $value) {

                                            echo "<option value\"$value\">$value</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div>

                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">pick-up location</label>
                                    <select name='pickup_loc' onchange='' required>
                                        <option disabled selected>pickup_up</option>
                                        <?php
                                        $pickup_locqu = "SELECT DISTINCT `pickup_loc` FROM reservation";
                                        $pickup_locc = mysqli_query($conn, $pickup_locqu);
                                        $arraypickup_locc = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($pickup_loc = $pickup_locc->fetch_array()) {
                                            $arraypickup_locc[] = $pickup_loc['pickup_loc'];
                                        }


                                        foreach ($arraypickup_locc as $valuee) {

                                            echo "<option value\"$valuee\">$valuee</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div>

                                    <br>
                                    <label class="col-md-3 control-label" for="searchinput">drop_loc </label>
                                    <select name='drop_loc' onchange='' required>
                                        <option disabled selected>drop_loc</option>
                                        <?php


                                        $drop_loc_qu = "SELECT DISTINCT `drop_loc` FROM reservation";
                                        $drop_locc = mysqli_query($conn, $drop_loc_qu);
                                        $arraydrop_locc = array();
                                        //$rw=mysqli_fetch_assoc($rs);


                                        while ($drop_loc = $drop_locc->fetch_array()) {
                                            $arraydrop_locc[] = $drop_loc['drop_loc'];
                                        }


                                        foreach ($arraydrop_locc as $value) {

                                            echo "<option value\"$value\">$value</option>";
                                        }

                                        ?>
                                    </select>

                                    <br>
                                    <td colspan="2" style="text-align:center">
                                        <p></p>
                                        <input class="btn btn-primary" type="submit" name="create" value="Search">
                                    </td>


                            </form>


                        </div>
                    </div>
                    </section>
                    <!-- End Sort -->
                    <!--  ////////////////////////front////////////////-->

                    <?php

                    if (isset($_POST['create'])) {

                        $drop_time = $_POST['drop_time'];
                        $_SESSION['drop_time'] = $drop_time;
                        $pickup_time = $_POST['pickup_time'];
                        $_SESSION['pickup_time'] = $pickup_loc;

                        $payments_from = $_POST['payments_from'];
                        $_SESSION['payments_from'] = $payments_from;

                        $payments_to = $_POST['payments_to'];
                        $_SESSION['payments_to'] = $payments_to;


                        $drop_loc = $_POST['drop_loc'];
                        $_SESSION['drop_loc'] = $drop_loc;

                        $pickup_loc = $_POST['pickup_loc'];
                        $_SESSION['pickup_loc'] = $pickup_loc;

                        $customer_id = $_POST['customer_id'];
                        $_SESSION['customer_id'] = $customer_id;


                        $reservation_time = $_POST['reservation_time'];
                        $_SESSION['reservation_time'] = $reservation_time;

                        $car_plateid = $_POST['car_plateid'];
                        $_SESSION['car_plateid'] = $car_plateid;

                        $amount = $_POST['amount'];
                        $_SESSION['amount'] = $amount;

                        $reservation_no = $_POST['reservation_no'];
                        $_SESSION['reservation_no'] = $reservation_no;

                        echo '<script >';
                        echo 'window.location="rsearch.php"';
                        echo '</script>';
                        exit;


                    }
                    ?>


                </div>
            </div>
            <!-- End Box -->
        </div>
        <!-- End Sidebar -->

        <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
    <div class="shell">
		
		<span class="right">
			</a>
		</span>
    </div>
</div>
<!-- End Footer -->

</body>
</html>