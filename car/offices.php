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
<html >
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
			Office Management
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Our Offices</h2>
						<div class="right">
							
							
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Location</th>
								<th>City</th>
								
							</tr>
							<?php
								include 'config.php';
								//$select = "SELECT * FROM cars WHERE status = 'Available'";//available at he adim part in general walla nsheel el avilable w yetla3lo kolo????
                                //"SELECT * FROM cars where 
                                $select = "SELECT * FROM office ";
								$result = $conn->query($select);
								while($row =$result->fetch_assoc()){
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $row['location'] ?></a></h3></td>
								<td><?php echo $row['city'] ?></td>
								
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
						<div class="cl">&nbsp;</div>
						
						
						<p>SEARCH FOR OFFICE</a></p>
                            </p>
						<!-- Sort -->    
						<form class="form-horizontal" action="" method="post" > 
						<label class="col-md-3 control-label" for="searchinput">Gender</label>
<select name='location' onchange='' required>
<option disabled selected>location</option>
<?php   
$oflocqu = "SELECT DISTINCT `location` FROM office";     
$ofloc= mysqli_query($conn, $oflocqu);
$arrayoflocqu= array();  
//$rw=mysqli_fetch_assoc($rs);


while ($location = $ofloc->fetch_array()) {
	$arrayoflocqu[]=$location['location'];
}


foreach($arrayoflocqu as $valuee)
{

echo "<option value\"$valuee\">$valuee</option>";
}  

?>
</select>
</div>
<div> 

<br>
<label class="col-md-3 control-label" for="searchinput">City:  </label>
<select name='city' onchange='' required>
<option disabled selected>city</option>
<?php   




$city_qu = "SELECT DISTINCT `city` FROM office";     
$of_city = mysqli_query($conn, $city_qu);
$arraycity= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($city = $of_city->fetch_array()) {
	$arraycity[]=$city['city'];
}


foreach($arraycity as $value)
{

echo "<option value\"$value\">$value</option>";
}  

?>
</select>
</div>
<div> 


<br>
<td colspan="2" style="text-align:center">
			   <p></p>
			   <input class="btn btn-primary" type="submit" name="create" value="Search">
		  </td >

</form>

<?php

if(isset($_POST['create']))
{


$location = $_POST['location'];
$_SESSION['location']=$location;

$city = $_POST['city'];
$_SESSION['city']=$city;
echo $_SESSION['city'];
echo $_SESSION['location'];
echo '<script >';
echo 'window.location="osearch.php"';
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