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
                                        
                         $sql="SELECT * FROM office WHERE 1  ";
                         
                         if (isset($_SESSION['location'])){
                           $temp=  $_SESSION['location'];
                         $sql=$sql."AND location='$temp'";
                         
                         }
                         if (isset($_SESSION['city'])){
                             $temp=  $_SESSION['city'];
                             $sql=$sql."AND city='$temp'";
                         
                         }
                         
                            
                               $rs = $conn->query($sql);
							   $rs = $conn->query($sql) or die($conn->error);
                               while($row = $rs->fetch_assoc()){
                             
                     
           
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
			  

         </form>	
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