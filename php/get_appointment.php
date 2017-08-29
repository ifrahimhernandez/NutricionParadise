<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['datepicker']) && isset($_POST['apTime']) && isset($_POST['reason']) ){

		$date =$_POST['datepicker'];
		$apptime=$_POST['apTime'];
		$text=$_POST['reason'];

		$date = new DateTime($date);
		$date= $date->format('Y-m-d');

		///Check if the client has appointment already made///

		$sql = "SELECT * FROM appointment where  user_id = '".$_SESSION['user_id']."' and atended='0'";

        $result = mysqli_query($conn, $sql);
        //////if finds the user then the script will end
        if (mysqli_num_rows($result) > 0 ) {
		    echo "YOU HAVE AN APPOINTMENT ALREADY SCHEDULE.";
		    
		}else{

		///Submit the appointment informtion to the system///

		$sql2="INSERT INTO `appointment` ( `user_id`, `appoint_date`, `apoint_time`, `atended`, `client_message`) VALUES ('".$_SESSION['user_id']."', '$date', '$apptime', '0', '$text')";

		if (mysqli_query($conn, $sql2)) {
		    //echo "Appointment has been booked for ".$date. " at ".$apptime;
		    echo true;
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

		mysqli_close($conn);

	}else{
		echo "Problem with ajax.";
	}
?>