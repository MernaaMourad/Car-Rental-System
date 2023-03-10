<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <script src="validation.js"></script>
    <title>YOURCAR-RENTAL</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

<!-- Pre Header -->
<form name="Form" action="" method="post">
    <div id="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span style="font-size:30px">Yourcar!!</span>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login_tab.php">USER LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Admin_tab.php">ADMIN LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="caption">
        <h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
        <h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
    </section>
    </section><!--  end hero section  -->


    <section class="search">
        <div class="wrapper">
            <div id="fom">
                <form method="post">
                    <h3 style="text-align:center; color: #000099; font-weight:bold; text-decoration:underline">User
                        Login Area</h3>
                    <table height="100" align="center">
                        <tr>
                            <td>Email Address:</td>
                            <td><input class="form-control" type="email" placeholder="Enter Email" name="email"
                                       id="email" required></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input class="form-control" type="password" placeholder="Enter Password" name="password"
                                       id="password" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center">
                                <p></p>
                                <input class="btn btn-primary" type="submit" name="create" value="Login">
                            </td>
                            </a>


                </form>
                </tr>
                </table>
</form>


<?php

if (isset($_POST['create'])) {
    include 'config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email != '' && $password != '') {

        $query = "SELECT * FROM CUSTOMER WHERE email='$email' ";


        $result = mysqli_query($conn, $query);
        $row = $result->fetch_array();
        $db_pass = $row['password'];


        if ($result->num_rows > 0) {
            if ($db_pass === md5($password) || $db_pass == ($password)) {
                $customer_id = $row['customer_id'];
                $_SESSION['customer_id'] = $customer_id;
                $customer_ssn = $row['customer_ssn'];
                $_SESSION['customer_ssn'] = $customer_ssn;

                
                echo '<script >';
                    echo 'window.location="products.php"';
                    echo '</script>';


                exit;
            } else {
                
                echo '<script language="javascript">';
            echo 'alert("email or password is incorrect !!")';
            echo '</script>';
            echo '<script >';
                echo 'window.location="login_tab.php"';
                echo '</script>';
                exit;
            }
        } else {
           
            echo '<script language="javascript">';
            echo 'alert("No users with such login found in the database! !!")';
            echo '</script>';
            echo '<script >';
                echo 'window.location="login_tab.php"';
                echo '</script>';
                exit;
            
        }
    }


}
?>
</div>
<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
</div>

</section><!--  end search section  -->

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


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>


</body>

</html>