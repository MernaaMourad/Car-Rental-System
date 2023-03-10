
<?php session_start();
include 'config.php';
if (!isset($_SESSION["admin_ssn"])) {
    echo '<script >';
    echo 'window.location="index.php"';
    echo '</script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>YOUR CAR</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
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
            <span>ADD THE CAR YOU WANT TE BE RENTED</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/logo.png" weidth="70" height="70" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            
                <li class="nav-item">
                    <a class="nav-link" href="add_cars.php">CAR REPORTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminlogout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    


    <!-- Page Content -->
    <!-- About Page Starts Here -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>PLEASE FILL THE FORM WITH DETAILS</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div>
            		<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

                    <img src="assets/images/banner.jpg" weidth="220" height="300" alt="">
            <!--  <a class="navbar-brand" href="#"><img src="assets/images/logo.png" weidth="70" height="70" alt=""></a>-->
            
            
            </div>
          </div>
         
          <div class="col-md-6">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input name="car_model" type="text" class="form-control" id="car_model" placeholder="Car model..." required="">
                      </fieldset>
                    </div>
                      <div class="col-md-6">
                        <fieldset>
                          <input name="car_plateid" type="text" class="form-control" id="car_plateid" placeholder="Car id..." required="">
                        </fieldset>
                    </div>
                      </div>
                      <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input name="car_color" type="text" class="form-control" id="car_color" placeholder="Car color..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input name="car_year" type="text" class="form-control" id="car_year" placeholder="year..." required="">
                      </fieldset>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                          <input name="car_mileage" type="text" class="form-control" id="car_mileage" placeholder="mileage..." required="">
                        </fieldset>
                      </div>
                  <div class="col-md-6">
                    <fieldset>
                      <input name="hire_cost" type="number" step="0.01" class="form-control" id="hire_cost" placeholder="Cost/day..." required="">
                    </fieldset>
                  </div>
                  </div>
                  <div class="col-md-15">
                    <fieldset>
                      <input name="capacity" type="number" class="form-control" id="capacity" placeholder="capacity(seats)..." required="">
                    </fieldset>
                  </div>
                  <div class="col-md-80">
                    <fieldset>

<select name='location' onchange='' required>
   <option disabled selected>location</option>
<?php   
   
$sqlloc= "SELECT DISTINCT `location` FROM  OFFICE "; 
$rsloc = mysqli_query($conn, $sqlloc);
  $loc= array();  
          //$rw=mysqli_fetch_assoc($rs);
        
          
        while ($rwofficee = mysqli_fetch_assoc($rsloc)) {
          $loc[]=$rwofficee['location'];
        }
foreach($loc as $valuee)
{
echo "<option value\"$valuee\">$valuee</option>";
 }  
?>
</select>
            

                    </fieldset>
                  </div>
                  <div class="col-md-12">
                  <p>
									    <span class="req">Current Images</span>
									    <label>CAR Image <span>(Required Field)</span></label>
									    <input type="file" accept= "images/*" class="field size1" name="image"  id="image" required />
								      </p>
                      </div>
                    <div class="col-md-12">
                      <fieldset>
							         
							        <input type="submit" class="button" value="submit" name="send" />
						          </div>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <div class="share">
                        <h6>You can also keep in touch on for more info: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- About Page Ends Here -->
    <?php
    
							if(isset($_POST['send'])){  
							//	$target_path = "../YOURCAR/assets/images/";
							//	$target_path = $target_path . basename ($_FILES['image']['name']);
							//	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
  
							//	$image = basename($_FILES['image']['name']);
              
                $image = $_POST['image'];
								$car_color = $_POST['car_color'];
								$car_model = $_POST['car_model'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
                $location = $_POST['location'];
                $car_plateid = $_POST['car_plateid'];
                $car_year = $_POST['car_year'];
                $car_mileage = $_POST['car_mileage'];

								
								$qr = "INSERT INTO CARS (image, car_color,car_model,hire_cost,capacity,location,car_year,car_plateid,car_mileage) 
													VALUES ('$image','$car_color','$car_model','$hire_cost','$capacity','$location','$car_year','$car_plateid','$car_mileage')";
								$res = $conn->query($qr);
                
								if($res === TRUE){
             
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"menu.php\")
											</script>";
									}
								
								else { echo "<script type = \"text/javascript\">
                  alert(\"error adding Vehicle\");
                  window.location = (\"ADD.php\")
                  </script>";}
							}
          ?>

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
                        <a href="Registration.php">CLick register</a><br><br>
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
                
                - Design: <a rel="nofollow" href="https://www.facebook.com/tooplate"></a></p>
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
