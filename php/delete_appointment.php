<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['date']) && isset($_POST['time']) ){

		$date =$_POST['date'];
		$apptime=$_POST['time'];
		

		///Delete if the client  appointment 

		$sql = "DELETE FROM appointment where  appoint_date='".$date."' and apoint_time= '".$apptime."'and user_id = '".$_SESSION['user_id']."'";

        if (mysqli_query($conn, $sql)) {
		    //echo "Appointment has been delete it.";
		    echo true;
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		

		mysqli_close($conn);

	}else{
		echo "Problem with ajax.";
	}
?>