<?php 
session_start();
include './Connection/connection.php';

	date_default_timezone_set("America/New_York");
    $date =date("Y-m-d h:i:sa");

	if(isset($_POST['orderid']) && !isset($_POST['track_number'])){

		$orderid = $_POST['orderid'];
		
        $sql775 = "UPDATE `orders` SET `sent_date` = '$date', `status` = 'Shipped!' WHERE `orders`.`order_id` = '$orderid'"; //update shipped date without a traking number

        if (mysqli_query($conn, $sql775)) {
		    echo "Order ".$orderid." was successfully submited.";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

        
		
		mysqli_close($conn);

	}

	if(isset($_POST['orderid']) && isset($_POST['track_number'])){

		$orderid = $_POST['orderid'];
		$track_number = $_POST['track_number'];
		
        $sql775 = "UPDATE `orders` SET `sent_date` = '$date', `status` = 'Shipped!', `tracking_number` = '$track_number' WHERE `orders`.`order_id` = '$orderid'"; //update shipped date without a traking number

        if (mysqli_query($conn, $sql775)) {
		    echo "Order ".$orderid." was successfully submited.";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

        
		
		mysqli_close($conn);

	}
?>