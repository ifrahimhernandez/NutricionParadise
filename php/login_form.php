<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['username']) && isset($_POST['password'])){

		

		$result=mysqli_query($conn,"SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");

		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		
		
		if( $count == 1) {

			
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['role'] = $row['role'];
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['first_name'] = $row['first_name'];
			echo $row['role'];

			if ($_SESSION['role'] == 0) {

				$_SESSION['zip_code']= $row['zip_code']; //client info for cart
				$_SESSION['country']= $row['country'];
				$_SESSION['state']= $row['state'];


			}

		}
		else {

			echo 'false';

		}

		mysqli_close($conn);

	}
?>