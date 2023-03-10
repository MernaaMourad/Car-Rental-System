<?php session_start();
include 'config.php';
if (!isset($_SESSION['admin_ssn'])) {
    echo '<script >';
    echo 'window.location="index.php"';
    echo '</script>';
    echo"test";
    echo $_SESSION['admin_ssn'];
    exit;
}
?>
<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Admin Home</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all"/>
    <script type="text/javascript">
        

        function sureToApprove2(id) {
            if (confirm("Are you sure you want to edit this car?")) {
                window.location.href = 'edit_car.php?id=' + id;
            }
        }
    </script>
</head>
<body>
<!-- Header -->
<div id="header">
    <div class="shell">

        <?php
        include 'menu.php';
        ?>
    </div>
    <!-- End Main Nav -->
</div>
</div>

<div id="container">
    <div class="shell">

        <div class="small-nav">
            <a href="admindex.php">Dashboard</a>
            <span>&gt;</span>
            Cars Management
        </div>

        <br/>

        <div id="main">
            <div class="cl">&nbsp;</div>

            <div id="content">

                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2 class="left">Our Vehicles</h2>
                        <div class="right">


                        </div>
                    </div>

                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <th width="13"><input type="checkbox" class="checkbox"/></th>
                                <th>Car Model</th>
                                <th>Car plateid</th>
                                <th>Hire Price</th>
                                <th>Car color</th>
                                <th>capacity</th>
                                <th>car mileage</th>
                                <th>Status</th>
                                <th width="110" class="ac">Content Control</th>
                            </tr>
                            <?php
                            include 'config.php';
                            $sql="SELECT * FROM CARS C INNER JOIN `STATUS`  S ON C.car_plateid=S.car_plateid WHERE ";
                            $select = "SELECT * FROM cars ";
                            $result = $conn->query($select);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="checkbox"/></td>
                                    <td><h3><a href="#"><?php echo $row['car_model'] ?></a></h3></td>
                                    <td><?php echo $row['car_plateid'] ?></td>
                                    <td><?php echo $row['hire_cost'] ?></a> $per day</td>
                                    <td><?php echo $row['car_color'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['car_mileage'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><a
                                                href="javascript:sureToApprove2(<?php echo $row['car_plateid']; ?>)"
                                                class="ico edit"><span>Edit</span></a></a></td>
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

            <!-- Sidebar -->
            <div id="sidebar">

                <!-- Box -->
                <div class="box">

                    <!-- Box Head -->
                    <div class="box-head">
                        <h2>Management</h2>
                    </div>
                    <!-- End Box Head-->

                    <div class="box-content">
                        <a href="ADD.php" class="add-button"><span>Add new CARS</span></a>
                        <div class="cl">&nbsp;</div>


                        <p>SEARCH FOR CAR</a></p>
                        </p>
                        <!-- Sort -->

                        <form class="form-horizontal" action="" method="post">

                        <label class="col-md-3 control-label" for="searchinput"> date for status</label>
                    <input type="date" class="form-control" id="daystatus" name="daystatus"
                               placeholder="Date for status" required>
                    
                               
                               <label class="col-md-3 control-label" for="searchinput">car plate id </label>
                            <select name='car_plateid' onchange='' required>
                                <option disabled selected>car plate id</option>
                                <?php


                                $id_qu = "SELECT DISTINCT `car_plateid` FROM cars " ;
                                $car_id = mysqli_query($conn, $id_qu);
                                $arrayid = array();
                               


                                while ($car_plateid = $car_id->fetch_array()) {
                                    $arrayid[] = $car_plateid['car_plateid'];
                                }


                                foreach ($arrayid as $value) {

                                    echo "<option value\"$value\">$value</option>";
                                }
                                ?>
                            </select>

                    </div>



                            <label class="col-md-3 control-label" for="searchinput">Color </label>
                            <select name='car_color' onchange='' required>
                                <option disabled selected>color</option>
                                <?php


                                $color_qu = "SELECT DISTINCT `car_color` FROM cars ";
                                $car_colorr = mysqli_query($conn, $color_qu);
                                $arraycol = array();
                                //$rw=mysqli_fetch_assoc($rs);


                                while ($car_color = $car_colorr->fetch_array()) {
                                    $arraycol[] = $car_color['car_color'];
                                }


                                foreach ($arraycol as $value) {

                                    echo "<option value\"$value\">$value</option>";
                                }
                                ?>
                            </select>

                    </div>
                    <div>

                        <label class="col-md-3 control-label" for="searchinput">Capacity </label>
                        <select name='capacity' onchange='' required>
                            <option disabled selected>capacity</option>
                            <?php


                            $capacity_qu = "SELECT DISTINCT `capacity` FROM cars ";
                            $car_capacity = mysqli_query($conn, $capacity_qu);
                            $arraycap = array();
                            //$rw=mysqli_fetch_assoc($rs);


                            while ($capacity = $car_capacity->fetch_array()) {
                                $arraycap[] = $capacity['capacity'];
                            }


                            foreach ($arraycap as $value) {

                                echo "<option value\"$value\">$value</option>";
                            }

                            ?>
                        </select>


                    </div>
                    <div>


                        <label class="col-md-3 control-label" for="searchinput">Model </label>
                        <select name='car_model' onchange='' required>
                            <option disabled selected>model</option>
                            <?php


                            $model_qu = "SELECT DISTINCT `car_model` FROM cars ";
                            $car_modell = mysqli_query($conn, $model_qu);
                            $arraymod = array();
                            //$rw=mysqli_fetch_assoc($rs);


                            while ($car_model = $car_modell->fetch_array()) {
                                $arraymod[] = $car_model['car_model'];
                            }


                            foreach ($arraymod as $value) {

                                echo "<option value\"$value\">$value</option>";
                            }

                            ?>
                        </select>

                    </div>

                    <div>


                        <label class="col-md-3 control-label" for="searchinput">Location </label>
                        <select name='location' onchange='' required>
                            <option disabled selected>location</option>
                            <?php


                            $loc_qu = "SELECT DISTINCT `location` FROM cars  ";
                            $car_locationn = mysqli_query($conn, $loc_qu);
                            $arrayloc = array();
                            //$rw=mysqli_fetch_assoc($rs);


                            while ($location = $car_locationn->fetch_array()) {
                                $arrayloc[] = $location['location'];
                            }


                            foreach ($arrayloc as $value) {

                                echo "<option value\"$value\">$value</option>";
                            }

                            ?>
                        </select>


                    </div>
                    <div>
                        
                            <label class="col-md-3 control-label" for="searchinput">hire cost </label>
                            <select name='hire_cost' onchange='' required>
                                <option disabled selected>cost per day</option>
                                <?php

                                $cost_qu = "SELECT DISTINCT `hire_cost` FROM cars  ";
                                $hire_costt = mysqli_query($conn, $cost_qu);
                                $arraycost = array();
                                //$rw=mysqli_fetch_assoc($rs);


                                while ($hire_cost = $hire_costt->fetch_array()) {
                                    $arraycost[] = $hire_cost['hire_cost'];
                                }


                                foreach ($arraycost as $value) {

                                    echo "<option value\"$value\">$value</option>";
                                }

                                ?>
                            </select>
                    </div>
                    <div>


                        <label class="col-md-3 control-label" for="searchinput">mileage </label>
                        <select name='car_mileage' onchange='' required>
                            <option disabled selected>mileage</option>
                            <?php
                            $car_mileagequ = "SELECT DISTINCT `car_mileage` FROM cars  ";
                            $car_mileagee = mysqli_query($conn, $car_mileagequ);
                            $arraymile = array();
                            //$rw=mysqli_fetch_assoc($rs);


                            while ($car_mileage = $car_mileagee->fetch_array()) {
                                $arraymile[] = $car_mileage['car_mileage'];
                            }


                            foreach ($arraymile as $valuee) {

                                echo "<option value\"$valuee\">$valuee</option>";
                            }

                            ?>
                        </select>


                        <td colspan="2" style="text-align:center">
                            <p></p>
                            <input class="btn btn-primary" type="submit" name="create" value="Search">
                        </td>

                        </form>
                        <?php

                        if (isset($_POST['create'])) {
                        
                            $daystatus = $_POST['daystatus'];
                            $_SESSION['daystatus'] = $daystatus;

                            $car_color = $_POST['car_color'];
                            $_SESSION['car_color'] = $car_color;

                            $location = $_POST['location'];
                            $_SESSION['location'] = $location;


                            $car_mileage = $_POST['car_mileage'];
                            $_SESSION['car_mileage'] = $car_mileage;

                            $car_model = $_POST['car_model'];
                            $_SESSION['car_model'] = $car_model;

                            $hire_cost = $_POST['hire_cost'];
                            $_SESSION['hire_cost'] = $hire_cost;

                            $capacity = $_POST['capacity'];
                            $_SESSION['capacity'] = $capacity;
							
                            $car_plateid = $_POST['car_plateid'];
                            $_SESSION['car_plateid'] = $car_plateid;
                            echo '<script >';
                            echo 'window.location="csearch.php"';
                            echo '</script>';
                            exit;


                        }
                        ?>
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