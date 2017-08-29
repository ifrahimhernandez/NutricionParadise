<?php 
include './Connection/connection.php';

if (isset($_POST['attendNumber']) && isset($_POST['name']) && isset($_POST['y'])) {

	if ($_POST['y']=='0') { // if is attended then des the process
		# code...
		$sql="UPDATE `appointment` SET `atended` = '1' WHERE `appointment`.`appoint_id` = '".$_POST['attendNumber']."'";

		if (mysqli_query($conn, $sql)) {
		    echo $_POST['name']." has been successfully attended.";
		} else {
		    //echo "Error updating record: " . mysqli_error($conn);
		    echo false;
		}
	}

	if ($_POST['y']=='1') { // the client is deleted from the system

		$sql2="DELETE FROM `appointment` WHERE `appointment`.`appoint_id` = '".$_POST['attendNumber']."'";

		if (mysqli_query($conn, $sql2)) {
		    echo $_POST['name']." has been successfully deleted from the system.";
		} else {
		    //echo "Error updating record: " . mysqli_error($conn);
		    echo false;
		}
	}

	

	
}else{
	//echo "There was a problem attending this client.";
	echo false;
}

 ?>