<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['shipping_name']) && isset($_POST['shipping_mail']) && isset($_POST['shipping_phone']) && isset($_POST['shipping_address']) && isset($_POST['shipping_city']) && isset($_POST['shipping_zip_code']) && isset($_POST['shipping_country']) && isset($_POST['shipping_state'])){

		$shipping_name = $_POST['shipping_name'];
		
        $shipping_mail = $_POST['shipping_mail'];
        
        
        $shipping_phone = $_POST['shipping_phone'];
		$shipping_address = $_POST['shipping_address'];
        $shipping_city = $_POST['shipping_city'];
        $shipping_zip_code = $_POST['shipping_zip_code'];
        $shipping_country = $_POST['shipping_country'];
        $shipping_state = $_POST['shipping_state'];

		    



	        $sql = "UPDATE user SET shipping_name='".$shipping_name."' , shipping_mail='".$shipping_mail."', shipping_phone='".$shipping_phone."', shipping_address='".$shipping_address."', shipping_city='".$shipping_city."', shipping_zip_code='".$shipping_zip_code."', shipping_country='".$shipping_country."', shipping_state='".$shipping_state."' WHERE user_id='".$_SESSION['user_id']."'";
			
			
			if (mysqli_query($conn, $sql)) {

			    //echo "Your shipping information has been update it!!";
			   echo true;

			} else {

			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

			}

		
	
		mysqli_close($conn);

	}else{
		echo "false";
	}
?>