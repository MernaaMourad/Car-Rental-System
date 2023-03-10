<?php
	include 'config.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Edit page</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
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
		
		<br />
		
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
									<span class="req">max 100 symbols</span>
									<label>New Car Model <span></span></label>
									<input type="text" class="field size1" name="car_model" />
                                    <ul>
                                    <input type="submit" class="button" value="update" name="sendmodel" />
								</p>	
								<p>
									<span class="req">max 20 symbols</span>
									<label>New Car plateid </label>
									<input type="text" class="field size1" name="car_plateid" />
                                    <ul>
                                    <input type="submit" class="button" value="update" name="sendid" />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Car new Hire Price </label>
									<input type="text" class="field size1" name="hire_cost" />
                                    <ul>
                                    <input type="submit" class="button" value="update" name="sendcost" />
								</p>
								<p>
									<span class="req">Current Images</span>
									<label>New car image  </label>
									<input type="file" class="field size1" name="image" />
                                    <ul>
                                    <input type="submit" class="button" value="update" name="sendimage" />
								</p>
								<p>
									<span class="req">In Terms of Passenger Seats</span>
									<label>New Car Capacity</label>
									<input type="text" class="field size1" name="capacity">
                                    <ul>
                                    <input type="submit" class="button" value="update" name="sendcapacity" />
								</p>	
                                <p>
									<span class="req">Available/ Not Available</span>
									<label>Car status</label>
									<input type="text" class="field size1" name="status" \required>
                                    <ul>
                                    <input type="submit" class="button" value="update" name="sendstatus" />
								</p>	
							
						</div>
						
						<div class="buttons">
							<input type="submit" class="button" value="update all" name="sendall" />
						</div>
						
					</form>
					<?php




							if(isset($_POST['sendmodel'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								$image = basename($_FILES['image']['name']);
								$car_model = $_POST['car_model'];
								$car_plateid = $_POST['car_plateid'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
                                $status = $_POST['status'];
								
								$qr = "UPDATE cars SET car_model='$car_model' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}
                            if(isset($_POST['sendid'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$target_path = "../cars/";	
								$car_plateid = $_POST['car_plateid'];
								$qr = "UPDATE cars SET car_plateid='$car_plateid' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}
                            if(isset($_POST['sendcost'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$hire_cost = $_POST['hire_cost'];
								$qr = "UPDATE cars SET hire_cost='$hire_cost' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}
                            if(isset($_POST['sendcapacity'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$target_path = "../cars/";
								$capacity = $_POST['capacity'];
								$qr = "UPDATE cars SET capacity='$capacity' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}
                            if(isset($_POST['sendimage'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								$image = basename($_FILES['image']['name']);
								$car_model = $_POST['car_model'];
								$car_plateid = $_POST['car_plateid'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
                                $status = $_POST['status'];
								
								$qr = "UPDATE cars SET car_model='$car_model' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}
                            if(isset($_POST['sendstatus'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$target_path = "../cars/";
                                $status = $_POST['status'];
								
								$qr = "UPDATE cars SET status='$status' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}if(isset($_POST['sendall'])){
								$id = $_REQUEST['id'];
                             echo "<script type = \"text/javascript\">
                             alert(\"Car $id Successfully updated \");
                          window.location = (\"add_cars.php\")
                            </script>";
                      
								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								$image = basename($_FILES['image']['name']);
								$car_model = $_POST['car_model'];
								$car_plateid = $_POST['car_plateid'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
                                $status = $_POST['status'];
								
								$qr = "UPDATE cars SET car_model='$car_model', car_plateid='$car_plateid',hire_cost='$hire_cost',capacity='$capacity',status='$status' Where car_id='$id' ";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_cars.php\")
											</script>";
									}
							//	}
								else 'Failed';
							}
						?>
				</div>

			</div>
			
			<div id="sidebar">
				
				<div class="box">
					
					<div class="box-head">
						<h2>Management</h2>
					</div>
					
					<div class="box-content">
						<a href="add_vehicles.php" class="add-button"><span>View Our Vehicles</span></a>
						<div class="cl">&nbsp;</div>
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">Delete Selected</a></p>
						
						<!-- Sort -->
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
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

<div id="footer">
	<div class="shell">
		<span class="left">&copy; <?php echo date("Y");?> - Sonko Rescue Team</span>
		<span class="right">
			Design by Consi</a>
		</span>
	</div>
</div>
	
</body>
</html>