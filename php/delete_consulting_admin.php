<?php 

session_start();
include './Connection/connection.php';


if (isset($_POST["delete_id"]) ) {
	
	
		$sql = "UPDATE `consulting_log` SET `admin_delete` = '1' WHERE `consulting_log`.`consulting_log_id` = '".$_POST["delete_id"]."'";

		if (mysqli_query($conn, $sql)) {
		    echo "Consulting ".$_POST["delete_id"]." Deleted!";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

	}




 ?>