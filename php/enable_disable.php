<?php 

 include './Connection/connection.php';

if (isset($_POST["disable_id"])) {
	$decicion="1";
	$product_id = $_POST["disable_id"];
	$var="Disabled";
}

if (isset($_POST["enable_id"])) {
	$decicion="0";
	$product_id = $_POST["enable_id"];
	$var="Enabled";
}


if (isset($_POST["disable_id"]) || isset($_POST["enable_id"])) {
	
	
		$sql = "UPDATE `product` SET `disable_product` = '$decicion' WHERE `product`.`product_id` = '$product_id'";

		if (mysqli_query($conn, $sql)) {
		    echo "Product ".$var;
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

	}


 ?>