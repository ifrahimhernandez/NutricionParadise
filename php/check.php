<?php 

session_start();
include './Connection/connection.php';

if (isset($_POST["consulting_id"])) {
	//select unred clients messages to show the admin
	$sql="SELECT * FROM `consulting_log` where admin_delete='0' && consulting_log_id = '".$_POST["consulting_id"]."' LIMIT 1";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		
		$client_unread="";
		//check the amount of unread messages in the database
		while($row = mysqli_fetch_assoc($result)) {
			$client_unread= $row["client_unread"];

		}

		//if the amount in the database is greater than 0 udate the database nad sent variable
		if ($client_unread>0) {
			
			//update the row and set the client_unread messages to zero

			$sql2="UPDATE `consulting_log` SET `client_unread` = '0' WHERE `consulting_log`.`consulting_log_id` = '".$_POST["consulting_id"]."'";
			mysqli_query($conn, $sql2);//execute the query
		   

			//sent variable to do the reload
			echo true;

		} else{
			//sent variable to do the reload
			echo false;
		} 
		
		
	}
}


 ?>