<?php session_start();
include 'config.php';
if (!isset($_SESSION["admin_ssn"])) {
    echo '<script >';
    echo 'window.location="index.php"';
    echo '</script>';
    exit;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Edit page</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all"/>

    <!--	<script type="text/javascript">  
        function validateForm() {
      
      $pick=document.forms["Form"]["pickup_time"].value;
      $drop=document.forms["Form"]["drop_time"].value;
      
      var varnow=new Date();
      var var2=varnow.toISOString().split('T')[0];
      if(new Date($pick).getTime()<new Date(var2).getTime()){
       alert("pick up time must be greater than current time");
         return false;
      }
      
       if($pick>=$drop ){
         alert("drop off date and time must be after pick-up date and time");
         return false;
       }    
    }
    -->


</head>
<body>
<div id="header">
    <div class="shell">

        <?php
        include 'menu.php';
        ?>
    </div>
</div>
</div>

<div id="container">
    <div class="shell">

        <div class="small-nav">
            <a href="index.php">Dashboard</a>
            <span>&gt;</span>
            Edit Car
        </div>

        <br/>

        <div id="main">
            <div class="cl">&nbsp;</div>
            <div id="content">

                <div class="box">
                    <div class="box-head">
                        <h2>Edit your Car</h2>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form">

                           
                                <p>
                                    <span class="req">max 20 symbols</span>
                                    <label>Car new Hire Price </label>
                                    <input type="number" step="0.01" class="field size1" name="hire_cost"/>
                                <ul>
                                    <input type="submit" class="button" value="update" name="sendcost"/>
                                    </p>

                                    <p>
                                        <span class="req">In Terms of Passenger Seats</span>
                                        <label>New Car Capacity</label>
                                        <input type="number" class="field size1" name="capacity">
                                    <ul>
                                        <input type="submit" class="button" value="update" name="sendcapacity"/>
                                        </p>
                                        <p>
                                            <span class="req">Available/ Out of service</span>

                                            <label class="col-md-3 control-label" for="searchinput">Car status</label>
                                            <select name="status" id="status" onchange='' required>
                                                <option disabled selected>status</option>

                                                <option value="Available">Available</option>
                                                <option value="Out of Service">Out of Service</option>


                                            </select>


                                        <ul>
                                            <input type="submit" class="button" value="update" name="sendstatus"/>
                                            </p>
                                            <p>
                                                <span class="req"></span>
                                                <label>Car mileage</label>
                                                <input type="text" class="field size1" name="car_mileage">
                                            <ul>
                                                <input type="submit" class="button" value="update" name="sendmile"/>
                                                </p>

                        </div>

                        <div class="buttons">
                            <input type="submit" class="button" value="update all" name="sendall"/>
                        </div>

                    </form>
                    <?php


                    if (isset($_POST['sendcost'])) {

                        if ($_POST['hire_cost'] == "") {

                            echo '<script language="javascript">';
                            echo 'alert("please enter hire_cost")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="edit_car.php"';
                            echo '</script>';
                            exit;


                        }


                        $id = $_REQUEST['id'];


                        $hire_cost = $_POST['hire_cost'];
                        $qr = "UPDATE cars SET hire_cost='$hire_cost' Where car_plateid='$id' ";
                        $res = $conn->query($qr);
                        if ($res === TRUE) {
                            echo "<script type = \"text/javascript\">
							alert(\"Car $id Successfully updated \");
						 window.location = (\"add_cars.php\")
						   </script>";
                        } //	}
                        else 'Failed';
                    }
                    if (isset($_POST['sendcapacity'])) {

                        if ($_POST['capacity'] == "") {

                            echo '<script language="javascript">';
                            echo 'alert("please enter capacity")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="edit_car.php"';
                            echo '</script>';
                            exit;


                        }


                        $id = $_REQUEST['id'];


                        $capacity = $_POST['capacity'];
                        $qr = "UPDATE cars SET capacity='$capacity' Where car_plateid='$id' ";
                        $res = $conn->query($qr);
                        if ($res === TRUE) {
                            echo "<script type = \"text/javascript\">
							alert(\"Car $id Successfully updated \");
						 window.location = (\"add_cars.php\")
						   </script>";
                        } //	}
                        else 'Failed';
                    }


                    if (isset($_POST['sendstatus'])) {
                        if (!isset($_POST['status'])) {

                            echo '<script language="javascript">';
                            echo 'alert("please enter status")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="add_cars.php"';
                            echo '</script>';
                            exit;


                        }
                        $date = date('y-m-d');
                        $id = $_REQUEST['id'];
                        $sqlrev = "SELECT * FROM  reservations R WHERE R.car_plateid='$id' AND R.drop_time >'$date' ";
                        $res = mysqli_query($conn, $sqlrev);
                        if ($res) {
                            echo '<script language="javascript">';
                            echo 'alert("car is already reserved")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="add_cars.php"';
                            echo '</script>';
                            exit;
                        } else {

                            $status = $_POST['status'];
                            $oldstatusqu = "SELECT `status` FROM CARS WHERE car_plateid= '$id'";
                            $res = $conn->query($oldstatusqu);
                            $oldstatusrw = $res->fetch_array();
                            $oldstatus = $oldstatusrw ['status'];
                            if ($oldstatus == 'Available' and $status == 'Out of Service') {
                                $sqll = "INSERT INTO `STATUS` (car_plateid,`day`) VALUES('$id','$date')";
                                $rs = $conn->query($sqll);
                            }

                            if ($status == 'Available' and $oldstatus == 'Out of Service') {
                                $sql = "UPDATE `STATUS` SET `return_day`='$date' Where car_plateid='$id' AND  `return_day` IS NULL ";
                                $ress = $conn->query($sql);
                            }


                            $qr = "UPDATE cars SET `status`='$status' Where car_plateid='$id' ";
                            $res = $conn->query($qr);
                            if ($res === TRUE) {
                                echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
                            } //	}
                            else 'Failed';
                        }
                    }
                    if (isset($_POST['sendall'])) {
                        $count = 0;
                        if (!isset($_POST['status'])) {
                            $count = $count + 1;

                        }
                       
                        if ($_POST['capacity'] == "") {
                            $count = $count + 1;

                        }
                        if ($_POST['hire_cost'] == "") {
                            $count = $count + 1;

                        }
                        if ($_POST['car_mileage'] == "") {
                            $count = $count + 1;

                        }

                        if ($count > 0) {
                            echo '<script language="javascript">';
                            echo 'alert("please enter all required data")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="add_cars.php"';
                            echo '</script>';
                            exit;
                        }

                        $id = $_REQUEST['id'];

                        
                        $hire_cost = $_POST['hire_cost'];
                        $capacity = $_POST['capacity'];
                        $status = $_POST['status'];
                        $car_mileage = $_POST['car_mileage'];

                        $date = date('y-m-d');

                        $sqlrev = "SELECT * FROM  reservations R WHERE R.car_plateid='$id' AND R.drop_time >'$date' ";
                        $res = mysqli_query($conn, $sqlrev);
                        if ($res) {
                            echo '<script language="javascript">';
                            echo 'alert("car is already reserved")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="add_cars.php"';
                            echo '</script>';
                            exit;
                        } else {


                            $oldstatusqu = "SELECT `status` FROM CARS WHERE car_plateid= '$id'";
                            $res = $conn->query($oldstatusqu);
                            $oldstatusrw = $res->fetch_array();
                            $oldstatus = $oldstatusrw ['status'];
                            if ($oldstatus == 'Available' and $status == 'Out of Service') {
                                $sqll = "INSERT INTO `STATUS` (car_plateid,`day`) VALUES('$id','$date')";
                                $rs = $conn->query($sqll);
                            }


                            if ($status == 'Available' and $oldstatus == 'Out of Service') {
                                echo "in";
                                $sql = "UPDATE `STATUS` SET `return_day`='$date' Where car_plateid='$id' AND `return_day` IS NULL ";
                                $ress = $conn->query($sql);
                            }


                            $qr = "UPDATE cars SET car_mileage='$car_mileage',hire_cost='$hire_cost',capacity='$capacity',status='$status' Where car_plateid='$id' ";
                            $res = $conn->query($qr);
                    
                            if ($res) {
                                echo "test3";
                                echo "<script type = \"text/javascript\">
									alert(\"Car $id Successfully updated \");
								 window.location = (\"add_cars.php\")
								   </script>";
                            } //	}
                            else 'Failed';
                        }
                    }


                    if (isset($_POST['sendmile'])) {
                        if (!isset($_POST['car_mileage'])) {

                            echo '<script language="javascript">';
                            echo 'alert("please enter mileage")';
                            echo '</script>';
                            echo '<script >';
                            echo 'window.location="edit_car.php"';
                            echo '</script>';
                            exit;


                        }

                        $id = $_REQUEST['id'];


                        $car_mileage = $_POST['car_mileage'];

                        $qr = "UPDATE cars SET car_mileage='$car_mileage' Where car_plateid='$id' ";
                        $res = $conn->query($qr);
                        if ($res === TRUE) {
                            echo "<script type = \"text/javascript\">
							alert(\"Car $id Successfully updated \");
						 window.location = (\"add_cars.php\")
						   </script>";
                        } //	
                        else 'Failed';
                    } ?>
                </div>

            </div>

            <div id="sidebar">

                <div class="box">

                    <div class="box-head">
                        <h2>Management</h2>
                    </div>

                    <div class="box-content">
                        <a href="add_cars.php" class="add-button"><span>View Our Vehicles</span></a>
                        <div class="cl">&nbsp;</div>

                        <p class="select-all"><input type="checkbox" class="checkbox"/><label>select all</label></p>
                        <p><a href="#">Delete Selected</a></p>

                        <!-- Sort
                        <div class="sort">
                            <label>Sort by</label>
                            <select class="field">
                                <option value="">Car Type</option>
                            </select>
                            <select class="field">
                                <option value="">Car Name</option>
                            </select>
                            <select class="field">
                                <option value="">Hire Price</option>
                            </select>
                        </div> -->

                    </div>
                </div>
            </div>

            <div class="cl">&nbsp;</div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="shell">
        <span class="left">  </span>
        <span class="right">
		</a>
		</span>
    </div>
</div>

</body>
</html>