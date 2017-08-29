<?php 

session_start();
include './Connection/connection.php';

// check variable
if (isset($_POST["consulting_id"]) && @$_POST["consulting_id"]!="") {
	//update consulting to 1 which means that the consulting will finish

	$sql="UPDATE `consulting_log` SET `active` = '1' WHERE `consulting_log`.`consulting_log_id` = '".$_POST["consulting_id"]."'";

	if (!mysqli_query($conn, $sql)) {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}else{
		//echo "The consulting #".$_POST["consulting_id"]." is over!";
		echo true;
	}
	
} else {
	echo "Error!";
}



 ?>