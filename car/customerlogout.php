<?php
// Initialize the session
session_start();
?>
<?php include 'config.php';
if (!isset($_SESSION["customer_ssn"])){

  echo '<script >';
  echo 'window.location="index.php"';
  echo '</script>';
  exit;}



 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>