<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        function validateForm() {
            var password1 = document.forms["Form"]["password"].value;
            var password2 = document.forms["Form"]["confirm_password"].value;
            if (password1 != password2)  //match password
            {
                alert("Passwords did not match");
                return false;
            }
            if (password1.length < 8 || password1.length > 15) { //check password length
                alert("Passwords must be at least 8 characters and must not exceed 15 characters");
                return false;
            }

        }
    </script>

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

<section class="pre-header">
    <h2 class="pre-header" style="text-align: center">Find You Dream Cars For Hire</h2>
    <h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
</section>
</section><!--  end hero section  -->


<div class="pre-header">
    <div id="fom">
        <form name="Form" action="" method="post" onsubmit="return validateForm()">
            <h3 style="text-align:left; color: #000099; font-weight:bold; text-decoration:underline">Registration
                Area</h3>
            <table height="200" align="center">
                <tr>
                    <td>First Name:</td>
                    <td><input class="form-control" type="text" placeholder="Enter Firstname" name="fname"
                               pattern="[a-zA-Z0-9]+" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input class="form-control" type="text" placeholder="Enter Lastname" name="lname"
                               pattern="[a-zA-Z0-9]+" required></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input class="form-control" type="email" placeholder="Enter Email" name="email" id="email"
                               required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="form-control" type="password" placeholder="Enter Password" name="password"
                               id="password" required></td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td><input class="form-control" type="password" placeholder="Confirm Password"
                               name="confirm_password" id="confirm_password" required></td>
                </tr>

                <tr>
                    <td>identification Number:</td>
                    <td><input class="form-control" type="number" placeholder="identification number" name="id_no"
                               id="id_no" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input class="form-control" type="number" placeholder="phone" name="phone" id="phone" required>
                    </td>
                </tr>
                <tr>
                    <td>Gender:
                        (M default)
                    </td>
                    <td>
                        <?php
                        if (!empty($_GET['gender'])) {
                            $selected = $_GET['gender'];
                        } else {
                            $selected = 'M';
                        }
                        ?>
                        <label>
                            <input type="radio" name="gender" value="M"/> M
                        </label></br>
                        <label>
                            <input type="radio" name="gender" value="F"/> F
                        </label></br>

                        <script>
                            $('input[type=radio]').click(function (e) {//jQuery works on clicking radio box
                                var gender = $(this).val(); //Get the clicked checkbox value
                                $('.r-text').html(gender);
                            });
                        </script>


                </tr>
                <tr>
                    <td>street:</td>
                    <td><input class="form-control" type="text" placeholder="street" name="street" id="street" required>
                    </td>
                </tr>
                <tr>
                    <td>city:</td>
                    <td><input class="form-control" type="text" placeholder="city" name="city" id="city" required></td>
                </tr>
                <tr>
                    <td>state_name:</td>
                    <td><input class="form-control" type="text" placeholder="state name" name="state_name"
                               id="state_name" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <p></p>
                        <input class="btn btn-primary" type="submit" name="create" value="Register now">
                    </td>
                    </a>


        </form>
        </tr>
        </table>

        </form>
    </div>
</div>
</section>

<?php

/* connect to MySQL database */


if (isset($_POST['create'])) {

    include 'config.php';
// Check db connection


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_no = $_POST['id_no'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state_name = $_POST['state_name'];
    $password = md5($password);


    $query = "SELECT * FROM CUSTOMER WHERE (email=$email)";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) { //if email is already present in database

        echo '<script language="javascript">';
        echo 'alert("The email address is already registered!")';
        echo '</script>';
        echo '<script >';
        echo 'window.location="Registration.php"';
        echo '</script>';
        exit;

    } else if (mysqli_num_rows($res) == 0) {

        $sql = "INSERT INTO CUSTOMER (`password` ,`fname`,`lname`  ,`email`, id_no, phone, gender, street, city, state_name) 
    VALUES('$password ','$fname','$lname ','$email', '$id_no', '$phone', '$gender', '$street', '$city', '$state_name')";


// insert in database
        $res = $conn->query($sql);
        $rw = $res->fetch_array();
        if ($res == TRUE) {
            $customer_ssn = $rw['customer_ssn'];
            $_SESSION['customer_ssn'] = $customer_ssn;
            echo '<script >';
            echo 'window.location="products.php"';
            echo '</script>';

            exit;
        } else {

            echo '<script language="javascript">';
            echo 'alert("error!")';
            echo '</script>';

            echo '<script >';
            echo 'window.location="Registration.php"';
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