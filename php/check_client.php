<?php 

session_start();
include './Connection/connection.php';

if (isset($_POST["consulting_id"])) {
	//select unred admin messages to show the client
	$sql="SELECT * FROM `consulting_log` where client_delete='0' && consulting_log_id = '".$_POST["consulting_id"]."' LIMIT 1";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		
		$admin_unread="";
		//check the amount of unread messages in the database
		while($row = mysqli_fetch_assoc($result)) {
			$admin_unread= $row["admin_unread"];

		}

		//if the amount in the database is greater than 0 udate the database nad sent variable
		if ($admin_unread>0) {
			
			//update the row and set the admin_unread messages to zero

			$sql2="UPDATE `consulting_log` SET `admin_unread` = '0' WHERE `consulting_log`.`consulting_log_id` = '".$_POST["consulting_id"]."'";
			mysqli_query($conn, $sql2);//execute the query
		   

			//sent variable to do the reload
			echo true;

		}else{
			//sent variable to do the reload
			echo false;
		} 
		
		
	}
}


 ?>