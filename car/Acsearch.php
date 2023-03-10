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
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to delete this car?")){
				window.location.href ='delete_car.php?id='+id;
			}
		}
        function sureToApprove2(id){
			if(confirm("Are you sure you want to edit this car?")){
				window.location.href ='edit_car.php?id='+id;
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
			search result
		</div>
		
		<br />
		
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
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Car Model</th>
								<th>Car plateid</th>
								<th>Hire Price</th>
                                <th>Car color</th>
                                <th>car year</th>
                                <th>capacity</th>
                                <th>Status</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
                         
                        include 'config.php';
                        
                        $sql="SELECT * FROM CARS WHERE 1  ";
                        
                        if (isset($_SESSION['car_color'])){
                          $temp=  $_SESSION['car_color'];
                        $sql=$sql."AND car_color='$temp'";
                        
                        }
                        if (isset($_SESSION['location'])){
                            $temp=  $_SESSION['location'];
                            $sql=$sql."AND location='$temp'";
                        
                        }
                        if (isset($_SESSION['capacity'])){
                            $temp=  $_SESSION['capacity'];
                            $sql=$sql."AND capacity='$temp'";
                        
                        }
                        if (isset($_SESSION['car_model'])){
                            $temp=  $_SESSION['car_model'];
                            $sql=$sql."AND car_model='$temp'";
                        
                        }
                        if (isset($_SESSION['hire_cost'])){
                            $temp=  $_SESSION['hire_cost'];
                            $sql=$sql."AND hire_cost='$temp'";
                        
                        }
                        if (isset($_SESSION['car_mileage'])){
                            $temp=  $_SESSION['car_mileage'];
                            $sql=$sql."AND car_mileage='$temp'";
                        
                        }
                           
						$rs = $conn->query($sql);
						while($rws = $rs->fetch_assoc()){
                            
                    
          
			?> 
							
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $rws['car_model'] ?></a></h3></td>
								<td><?php echo $rws['car_plateid'] ?></td>
								<td><?php echo $rws['hire_cost'] ?></a> $per day</td>
                                <td><?php echo $rws['car_color'] ?></td>
                                <td><?php echo $rws['car_year'] ?></td>
                                <td><?php echo $rws['capacity'] ?></td>
                                <td><?php echo $rws['status'] ?></td>
                                <td><?php echo $rws['car_mileage'] ?></td>
								<td><a href="javascript:sureToApprove(<?php echo $rws['car_plateid'];?>)" class="ico del">Delete</a><a  href="javascript:sureToApprove2(<?php echo $rws['car_plateid'];?>)" class="ico edit"><span>Edit</span></a></a></td>
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
					<h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>
					
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
							
           
                </p>	
         <!-- End Sort -->
						
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