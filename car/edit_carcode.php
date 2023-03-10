<?php
	include 'config.php';
	$id = $_REQUEST['id'];
		//$query = "update FROM cars WHERE car_id = '$id'";
	//$result = $conn->query($query);
	//if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Car Successfully Send\");
					window.location = (\"edit_carcode.php\")
				</script>";
//	}
?>
