<?php include 'config.php';
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="products.php">Products
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customerlogout.php">LOGOUT</a>
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
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
            <a class="nav-link" href="products.php">ALL products</a>
              <a class="nav-link" href="capacity.php">capacity</a>
              <a class="nav-link" href="low.php">low price</a>
              <a class="nav-link" href="high.php">high price</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    

   
    <section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
  <?php
              $capacity = "SELECT * FROM cars order by capacity ";   
                   $cap = $conn->query($capacity);
						while($rss = $cap->fetch_assoc()){
                     
          
            ?>
            <li>
					<a href="Reservation.php?id=<?php echo $rws['car_plateid'] ?>">
						<img class="thumb"  src="assets/images/<?php echo $rss['image'];?>" width="300" height="200"> 
					</a>
					<span class="price"><?php echo 'pound.'.$rss['hire_cost'];?></span>
					<div class="property_details">
						<h1>
							<a href="Reservation.php?id=<?php echo $rss['car_plateid'] ?>"><?php echo 'Car Make>'.$rss['car_model'];?></a>
						</h1>
						<h2>Car Name/Model: <span class="property_size"><?php echo $rss['car_color'];?></span></h2>
            <h2>Car Capacity: <span class="property_size"><?php echo $rss['capacity'];?></span></h2>
            
					</div>
				</li>
			<?php
				}
			?>
</ul>
		</div>
	</section>


  


    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li class="current-page"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Page Ends Here -->


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