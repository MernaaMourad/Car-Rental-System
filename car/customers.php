<?php session_start();
include 'config.php';
if (!isset($_SESSION["admin_ssn"])) {
    echo '<script >';
    echo 'window.location="index.php"';
    echo '</script>';
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Client Requests
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Client Requests</h2>
						<div class="right">
							<label>search requests</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					
					<div class="table">
						<table width="70%" border="0" cellspacing="0" cellpadding="0">
            <tr>
								<th width="5"><input type="checkbox" class="checkbox" /></th>
								<th>  Name</th>
								<th>last name</th>
								<th>Phone</th>
								<th> email</th>
								<th>customer Ssn</th>
								<th>Gender</th>
								<th>Balance</th>
								<th>Street</th>
								<th>city</th>
								<th>State </th>
								<th width="110" class="ac"><a href="#">Control</a></th>
							</tr>
							<?php
								include 'config.php';
								$select = "SELECT * FROM customer ";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><?php echo $row['fname'] ?></td>
								<td><?php echo $row['lname'] ?></td>
								<td><?php echo $row['phone'] ?></td>
								<td><?php echo $row['email'] ?></td>
                <td><?php echo $row['customer_ssn'] ?></td>
								<td><?php echo $row['gender'] ?></td>
								<td><?php echo $row['remaining_balance'] ?></td>							
								<td><?php echo $row['street'] ?></td>
                <td><?php echo $row['city'] ?></td>
								<td><?php echo $row['state_name'] ?></td>
								
								
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
						
						
						<p>SEARCH FOR CUSTOMER</a></p>
                            </p>
						<!-- Sort -->    
				



        <p>
        

                <p>
				<form class="form-horizontal" action="" method="post" >


<label class="col-md-3 control-label" for="searchinput">First_name : </label>
<select name='fname' onchange='' required>
<option disabled selected>first_name</option>
<?php   



$fnam_qu = "SELECT DISTINCT fname FROM customer";     
$fnam = mysqli_query($conn, $fnam_qu);
$arrayfn= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($fname= $fnam->fetch_array()) {
 $arrayfn[]=$fname['fname'];
}


foreach($arrayfn as $value)
{

echo "<option value\"$value\">$value</option>";
}  
?>
</select>

</div> 
<div>      
<br>
<label class="col-md-3 control-label" for="searchinput"> last_name    : </label>
<select name='lname' onchange='' required>
<option disabled selected>last_name</option>
<?php   




$lnam_qu = "SELECT DISTINCT lname FROM customer ";     
$lastname = mysqli_query($conn, $lnam_qu);
$arrayl= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($lname = $lastname->fetch_array()) {
 $arrayl[]=$lname ['lname'];
}


foreach($arrayl as $value)
{

echo "<option value\"$value\">$value</option>";
}  

?>
</select>



</div> 
<div>

<br>


<label class="col-md-3 control-label" for="searchinput">Phone  :  </label>
<select name='phone' onchange='' required>
<option disabled selected>phone</option>
<?php   




$phone_qu = "SELECT DISTINCT phone FROM customer";     
$ph = mysqli_query($conn, $phone_qu);
$arrayph= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($phone = $ph->fetch_array()) {
 $arrayph[]=$phone['phone'];
}


foreach($arrayph as $value)
{

echo "<option value\"$value\">$value</option>";
}  

?>
</select>

</div>

<div> 
<br>

<label class="col-md-3 control-label" for="searchinput">Email:  </label>
<select name='email' onchange='' required>
<option disabled selected>email</option>
<?php   




$email_qu = "SELECT DISTINCT email FROM customer";     
$cu_email = mysqli_query($conn, $email_qu);
$arrayemail= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($email = $cu_email->fetch_array()) {
	$arrayemail[]=$email['email'];
}


foreach($arrayemail as $value)
{

echo "<option value\"$value\">$value</option>";
}  

?>
</select>
<br>

</div>
<div>
	<br>

<label class="col-md-3 control-label" for="searchinput">SSN :  </label>
<select name='customer_ssn' onchange='' required>
<option disabled selected>customer_ssn</option>
<?php   

$ssn_qu = "SELECT DISTINCT customer_ssn FROM customer ";     
$cu_ssn = mysqli_query($conn, $ssn_qu);
$arrayssn= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($customer_ssn = $cu_ssn->fetch_array()) {
 $arrayssn[]=$customer_ssn['customer_ssn'];
}


foreach($arrayssn as $value)
{

echo "<option value\"$value\">$value</option>";
}  

?>
</select>
</div>
<div> 

<br>
<label class="col-md-3 control-label" for="searchinput">Gender</label>
<select name='gender' onchange='' required>
<option disabled selected>gender</option>
<?php   
$cu_g = "SELECT DISTINCT gender FROM customer";     
$gen = mysqli_query($conn, $cu_g);
$arrayg= array();  
//$rw=mysqli_fetch_assoc($rs);


while ($cu_g = $gen->fetch_array()) {
	$arrayg[]=$cu_g['gender'];
}


foreach($arrayg as $valuee)
{

echo "<option value\"$valuee\">$valuee</option>";
}  

?>
</select>
</div>
<div> 

<br>
<label class="col-md-3 control-label" for="searchinput">street:  </label>
<select name='street' onchange='' required>
<option disabled selected>street</option>
<?php   




$st_qu = "SELECT DISTINCT street FROM customer";     
$str = mysqli_query($conn, $st_qu);
$arraystr= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($street = $str->fetch_array()) {
 $arraystr[]=$street['street'];
}


foreach($arraystr as $value)
{

echo "<option value\"$value\">$value</option>";
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




$city_qu = "SELECT DISTINCT city FROM customer";     
$cit = mysqli_query($conn, $city_qu);
$arrayci= array();  
 //$rw=mysqli_fetch_assoc($rs);

 
while ($city = $cit->fetch_array()) {
 $arrayci[]=$city['city'];
}


foreach($arrayci as $value)
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
<br>
<?php

if(isset($_POST['create']))
{


$fname = $_POST['fname'];
$_SESSION['fname']=$fname;

$lname = $_POST['lname'];
$_SESSION['lname']=$lname;


$email = $_POST['email'];
$_SESSION['email']=$email;

$phone= $_POST['phone'];
$_SESSION['phone']=$phone;

$customer_ssn= $_POST['customer_ssn'];
$_SESSION['customer_ssn']=$customer_ssn;

$street= $_POST['street'];
$_SESSION['street']=$street;


$city= $_POST['city'];
$_SESSION['city']=$city;

 echo '<script >';
 echo 'window.location="cusearch.php"';
 echo '</script>';
exit;


}
?> 
			
				 
			
         <!-- End Sort -->
						
					
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

<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
	
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>