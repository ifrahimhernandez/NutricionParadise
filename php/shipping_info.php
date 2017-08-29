<?php 
		

        $sqlcheckclient = "SELECT * FROM user Where user_id='".@$_SESSION['user_id']."' LIMIT 1"; // check if the account exist

        $usercheck10 = mysqli_query($conn, $sqlcheckclient);

        
        
        if (mysqli_num_rows($usercheck10) > 0) { //get shipping info
		    // output data of each row
		    while($row = mysqli_fetch_assoc($usercheck10)) {
		         $email=$row["shipping_mail"];
		         $client_name=$row["shipping_name"];  //shipping information display
		         $address=$row["shipping_address"].", ".$row["shipping_city"].", ".$row["shipping_state"].", ".$row["shipping_zip_code"].", ".$row["shipping_country"];
		         $phone=$row["shipping_phone"];
		         

		         		    }

		} 


		

	
?>