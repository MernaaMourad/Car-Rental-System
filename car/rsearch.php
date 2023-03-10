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
    <title>Reservation</title>
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

                                $sql = "SELECT * FROM reservation WHERE 1  ";

                                if (isset($_SESSION['reservation_no'])) {
                                    $temp = $_SESSION['reservation_no'];

                                    $sql = $sql . " AND reservation_no='$temp'";

                                }
                                if (isset($_SESSION['amount'])) {
                                    $temp = $_SESSION['amount'];
                                    $sql = $sql . " AND amount='$temp'";

                                }
                                if (isset($_SESSION['car_plateid'])) {
                                    $temp = $_SESSION['car_plateid'];
                                    $sql = $sql . " AND car_plateid='$temp'";

                                }
                                if (isset($_SESSION['customer_id'])) {
                                    $temp = $_SESSION['customer_id'];
                                    $sql = $sql . " AND customer_id='$temp'";

                                }
                                if (isset($_SESSION['pickup_loc'])) {
                                    $temp = $_SESSION['pick_up'];
                                    $sql = $sql . " AND pick_up='$temp'";

                                }
                                if (isset($_SESSION['drop_loc'])) {
                                    $temp = $_SESSION['drop_loc'];
                                    $sql = $sql . " AND drop_loc='$temp'";

                                }
                                if (isset($_SESSION['reservation_time'])) {
                                    $temp = $_SESSION['reservation_time'];
                                    $sql = $sql . " AND reservation_time='$temp'";

                                }
                                if ($_SESSION['pickup_time'] != "") {

                                    $temp = $_SESSION['pickup_time'];

                                    $sql = $sql . " AND pickup_time >='$temp'";

                                }
                                if ($_SESSION['drop_time'] != "") {
                                    $temp = $_SESSION['drop_time'];

                                    $sql = $sql . " AND  drop_time <='$temp'";

                                }


                                $rs = $conn->query($sql);
                                $rs = $conn->query($sql) or die($conn->error);

                                while ($row = $rs->fetch_assoc()) {


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
                    <!-- Sidebar -->
                    <div id="sidebar">
                        <!-- Box -->
                        <div class="box">

                            <!-- Box Head -->
                            <div class="box-head">
                                <h2>Total amount</h2>
                            </div>
                            <!-- End Box Head-->

                            <div class="box-content">


                                <table>
                                    <div class="table">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <th width="16"><input type="checkbox" class="checkbox"/></th>
                                                <th>Payment date</th>
                                                <th>amount</th>

                                            </tr>
                                            <?php
                                            $sqlamount = "SELECT payment_date,SUM(amount) as sumamount FROM reservation WHERE 1 ";

                                            if ($_SESSION['payments_from'] != "") {
                                                $temp = $_SESSION['payments_from'];

                                                $sqlamount = $sqlamount . "AND payment_date >= '$temp'";

                                            }
                                            if ($_SESSION['payments_to'] != "") {
                                                $temp = $_SESSION['payments_to'];

                                                $sqlamount = $sqlamount . " AND payment_date <='$temp'";
                                            }
                                            $sqlamount = $sqlamount . " AND  payment_date IS NOT NULL  GROUP BY payment_date";
                                            // echo $sqlamount;       
                                            $samount = mysqli_query($conn, $sqlamount);

                                            while ($amountt = mysqli_fetch_assoc($samount)) {


                                                ?>

                                                <tr>
                                                    <td><input type="checkbox" class="checkbox"/></td>
                                                    <td><h3><?php echo $amountt['payment_date'] ?></a></h3></td>
                                                    <td><?php echo $amountt['sumamount'] ?></td>

                                                </tr>


                                                <?php
                                            }
                                            ?>
                                        </table>
                                        <!-- Sort -->


                                        </p>
                                        <!-- End Sort -->

                                    </div>
                            </div>
                            <!-- End Box -->
                        </div>
                        <!-- End Sidebar -->

                    </div>
                    <!-- End Content -->


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