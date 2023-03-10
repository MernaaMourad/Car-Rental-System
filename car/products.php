<?php
// Initialize the session
session_start();
include 'config.php';
?>
<?php 

if (!isset($_SESSION["customer_ssn"])){
 echo '<script >';
  echo 'window.location="index.php"';
  echo '</script>';
exit;}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    

    <title>CARS TO RENT</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
     
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>HOPE YOU ENJOY HERE!!</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/logo.png" weidth="70" height="70" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
              <a class="nav-link" href="products.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="amountRemain.php">Remaining Balance</a>
              <li class="nav-item">
              <a class="nav-link" href="customerlogout.php">Logout</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-5 col-sm-10">
            <div class="section-heading">
              <div class="line-dec"></div>
              
                  
						
         <form class="form-horizontal" action="" method="post" >


         <label class="col-md-3 control-label" for="searchinput">Color </label>
         <select name='car_color' onchange='' required>
   <option disabled selected>color</option>
<?php   
   

  
   $color_qu = "SELECT DISTINCT `car_color` FROM cars  WHERE status = 'Available'";     
  $car_colorr = mysqli_query($conn, $color_qu);
  $arraycol= array();  
          //$rw=mysqli_fetch_assoc($rs);
        
          
        while ($car_color = $car_colorr->fetch_array()) {
          $arraycol[]=$car_color['car_color'];
        }


foreach($arraycol as $value)
{
  
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
   



   $capacity_qu = "SELECT DISTINCT `capacity` FROM cars  WHERE status = 'Available'";     
  $car_capacity = mysqli_query($conn, $capacity_qu);
  $arraycap= array();  
          //$rw=mysqli_fetch_assoc($rs);
        
          
        while ($capacity = $car_capacity->fetch_array()) {
          $arraycap[]=$capacity['capacity'];
        }


foreach($arraycap as $value)
{
  
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
   



   $model_qu = "SELECT DISTINCT `car_model` FROM cars  WHERE status = 'Available'";     
  $car_modell = mysqli_query($conn, $model_qu);
  $arraymod= array();  
          //$rw=mysqli_fetch_assoc($rs);
        
          
        while ($car_model = $car_modell->fetch_array()) {
          $arraymod[]=$car_model['car_model'];
        }


foreach($arraymod as $value)
{
  
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
   



   $loc_qu = "SELECT DISTINCT `location` FROM cars  WHERE status = 'Available'";     
  $car_locationn = mysqli_query($conn, $loc_qu);
  $arrayloc= array();  
          //$rw=mysqli_fetch_assoc($rs);
        
          
        while ($location = $car_locationn->fetch_array()) {
          $arrayloc[]=$location['location'];
        }


foreach($arrayloc as $value)
{
  
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
   
   $cost_qu = "SELECT DISTINCT `hire_cost` FROM cars  WHERE status = 'Available'";     
  $hire_costt = mysqli_query($conn, $cost_qu);
  $arraycost= array();  
          //$rw=mysqli_fetch_assoc($rs);
        
          
        while ($hire_cost = $hire_costt->fetch_array()) {
          $arraycost[]=$hire_cost['hire_cost'];
        }


foreach($arraycost as $value)
{
  
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




$car_mileagequ = "SELECT DISTINCT `car_mileage` FROM cars  WHERE status = 'Available'";     
$car_mileagee = mysqli_query($conn, $car_mileagequ);
$arraymile= array();  
      //$rw=mysqli_fetch_assoc($rs);
    
      
    while ($car_mileage = $car_mileagee->fetch_array()) {
      $arraymile[]=$car_mileage['car_mileage'];
    }


foreach($arraymile as $valuee)
{

echo "<option value\"$valuee\">$valuee</option>";
}  

?>
</select>


<td colspan="2" style="text-align:center">
                        <p></p>
                        <input class="btn btn-primary" type="submit" name="create" value="Search">
                   </td >

</form>
<?php

if(isset($_POST['create']))
{


$car_color = $_POST['car_color'];
 $_SESSION['car_color']=$car_color;

 $location = $_POST['location'];
  $_SESSION['location']=$location;

  
 $car_mileage = $_POST['car_mileage'];
 $_SESSION['car_mileage']=$car_mileage;

 $car_model= $_POST['car_model'];
 $_SESSION['car_model']=$car_model;

 $hire_cost= $_POST['hire_cost'];
 $_SESSION['hire_cost']=$hire_cost;
 
 $capacity= $_POST['capacity'];
 $_SESSION['capacity']=$capacity;

 echo '<script >';
 echo 'window.location="search.php"';
 echo '</script>';
 exit;


}
   ?>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
     
        
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="products.php">ALL products</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="capacity.php">capacity</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="low.php">low price</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="high.php">high price</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    
	
			
      	<!--  end listing section  -->

        
 
    
    <section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'config.php';
						$sel = "SELECT * FROM cars WHERE status = 'Available'";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
			?>
				<li>
					<a href="Reservation.php?id=<?php echo $rws['car_plateid'] ?>">
						<img class="thumb"  src="assets/images/<?php echo $rws['image'];?>" width="300" height="200">
            
					</a>
          <a href="Reservation.php?id=<?php  echo  $rws['car_plateid']; ?> ">
            <div href="Reservation.php?id=<?php echo $car_plateid;?><?php echo 'Car Make>'.$rws['car_model'];?></div>
					<span class="price"><?php echo 'pound.'.$rws['hire_cost'];?></span>
					<div class="property_details">
						<h1>
							<a href="pay.php?id=<?php echo $rws['car_plateid'] ?>"><?php echo 'Car Make>'.$rws['car_model'];?></a>
						</h1>
						<h2>Car Model: <span class="property_size"><?php echo $rws['car_model'];?></span></h2>
            
					</div>
				</li>
			<?php
				}
			?>
			</ul>
		</div>

	</section>
   

 <!-- Subscribe Form Starts Here -->
 <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe on YOURCAR now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>YOU WILL HAVE THE BEST SERVICE with us.</p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-12">
                        <a href="Registration.php" style="color:red">CLick register</a><br><br>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/logo.png" weidth="70" height="70" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>
                
                 <a rel="nofollow" href="https://www.facebook.com/tooplate"></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
