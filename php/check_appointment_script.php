<?php 
//With the cron job this script is going to refres every 24 hr and it will delete the appointments that where not attended from past dates///

session_start();
include './Connection/connection.php';

@$today=date("Y-m-d"); //todays date

///Delete if the client  appointment is not attended

		$sql = "DELETE FROM appointment where  appoint_date < '".$today."' and atended='0'";
		

        mysqli_query($conn, $sql);
		

		mysqli_close($conn);



 ?>