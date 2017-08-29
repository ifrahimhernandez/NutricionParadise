<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zipcode']) && isset($_POST['country'])){

		$username = $_POST['username'];
		
        $email = $_POST['email'];
        
        
        $phone = $_POST['phone'];
		$address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];

        if ($_SESSION['originalusername']!=$username || $_SESSION['originalemail']!=$email) {
        	# code...

        	$sqlcheck = "SELECT * FROM user Where username='".$username."' OR email='".$email."'  "; // check if the account exist

        	$usercheck1 = mysqli_query($conn, $sqlcheck);

        
        
	        if ( mysqli_num_rows($usercheck1) > 1) {

	        	echo "Data was not able to be saved because the username or email  is in use. Please a diferent one.";
	        	
			}else{
				
				$sql = "UPDATE user SET username='".$username."' , email='".$email."', address='".$address."', city='".$city."', state='".$state."', zip_code='".$zipcode."', country='".$country."', phone='".$phone."' WHERE user_id='".$_SESSION['user_id']."'";
			
			
				if (mysqli_query($conn, $sql)) {

				    //echo "Your account has been update it!!";
				    echo true;
				    $_SESSION['zip_code']=$zipcode;
				    $_SESSION['country']=$country;

				} else {

				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

				}
			}
        }else{

         
			$sql = "UPDATE user SET username='".$username."' , email='".$email."', address='".$address."', city='".$city."', state='".$state."', zip_code='".$zipcode."', country='".$country."', phone='".$phone."' WHERE user_id='".$_SESSION['user_id']."'";
			
			
			if (mysqli_query($conn, $sql)) {

			    //echo "Your account has been update it!!";
			    echo true;
			    $_SESSION['zip_code']=$zipcode;
			    $_SESSION['country']=$country;

			} else {

			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

			}

		}

		mysqli_close($conn);

	}else{
		echo "Ajax couldnt execute.";
	}
?>