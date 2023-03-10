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
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to Approve this request?")){
				window.location.href ='approve.php?id='+id;
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
                         
                         
                         
                         $sql="SELECT * FROM customer WHERE 1  ";
                         
                         if (isset($_SESSION['fname'])){
                           $temp=  $_SESSION['fname'];
                         $sql=$sql."AND fname='$temp'";
                         
                         }
                         if (isset($_SESSION['lname'])){
                             $temp=  $_SESSION['lname'];
                             $sql=$sql."AND fname='$temp'";
                         
                         }
                         if (isset($_SESSION['phone'])){
                             $temp=  $_SESSION['phone'];
                             $sql=$sql."AND phone='$temp'";
                         
                         }
                         if (isset($_SESSION['email'])){
                             $temp=  $_SESSION['email'];
                             $sql=$sql."AND email='$temp'";
                         
                         }
                         if (isset($_SESSION['customer_ssn'])){
                             $temp=  $_SESSION['customer_ssn'];
                             $sql=$sql."AND customer_ssn='$temp'";
                         
                         }
                         if (isset($_SESSION['gender'])){
                             $temp=  $_SESSION['gender'];
                             $sql=$sql."AND gender='$temp'";
                         
                         }
                         if (isset($_SESSION['street'])){
                             $temp=  $_SESSION['street'];
                             $sql=$sql."AND street='$temp'";
                         
                         }if (isset($_SESSION['city'])){
                             $temp=  $_SESSION['city'];
                             $sql=$sql."AND city='$temp'";
                         
                         }
                            
                               $rs = $conn->query($sql);
                               while($row = $rs->fetch_assoc()){
                             
                     
           
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