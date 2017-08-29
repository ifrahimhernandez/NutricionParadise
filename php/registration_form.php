<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['username']) && isset($_POST['password'])){ //if the value exists  then register

		$username = $_POST['username'];
		$password = $_POST['password'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
		$address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];

        $sql775 = "SELECT * FROM user Where username='".$username."' OR email='".$email."'  LIMIT 1"; // check if the user exists

        
        $user1 = mysqli_query($conn, $sql775);
        
        
        
        if (mysqli_num_rows($user1) > 0 ) {
		    echo "Username or Email is in use. Please a diferent one."; // if user exist display error and not allow to register user
		} else {

			//registers the user with shipping and persona information

			$sql = "INSERT INTO `user`( `username`, `password`, `email`, `first_name`, `last_name`, `address`, `city`, `state`, `zip_code`, `country`, `phone`, `role`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_mail`,`shipping_city`,`shipping_zip_code`,`shipping_country`,`shipping_state`) VALUES ('".$username."','".$password."','".$email."','".$firstname."','".$lastname."','".$address."','".$city."','".$state."','".$zipcode."','".$country."','".$phone."','0', '".$firstname." ".$lastname."', '".$address."','".$phone."','".$email."','".$city."','".$zipcode."', '".$country."','".$state."')";
																																											
			
			if (mysqli_query($conn, $sql)) {
				echo true;
			    //echo "Your account has been created!!";

			} else {
				//displays error
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

			}
		}

        
		
		mysqli_close($conn);

	}
?>