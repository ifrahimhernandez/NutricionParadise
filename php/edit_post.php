<?php 
 include './Connection/connection.php';



if (isset($_POST["id"])) {
	@$i= $_POST["id"];
}


// save data from the form to the database and all the campos have to set
if (isset($_POST["product_name".@$i]) && isset($_POST["search-box".@$i]) && isset($_POST["quantity".@$i]) && isset($_POST["price".@$i]) && isset( $_POST["weight".@$i]) && isset($_POST["short_description".@$i]) && isset($_POST["long_description".@$i]) ) {
	# code...
	$product_name = mysqli_real_escape_string($conn, $_POST["product_name".$i]);
	$category = mysqli_real_escape_string($conn, $_POST["search-box".$i]);
	$quantity = mysqli_real_escape_string($conn, $_POST["quantity".$i]);
	$price = mysqli_real_escape_string($conn, $_POST["price".$i]);
	$weight = mysqli_real_escape_string($conn, $_POST["weight".$i]);
	$short_description = mysqli_real_escape_string($conn, $_POST["short_description".$i]);
	$long_description = mysqli_real_escape_string($conn, $_POST["long_description".$i]);
	$imagesql="";

	//para guardar la image si la persona upload una nueva
	if (isset($_FILES["upload".$i][ "tmp_name" ]) ) {
		
		//image procesing
		@$image = addslashes(file_get_contents($_FILES["upload".$i][ "tmp_name" ]));
		@$imageName = addslashes($_FILES["upload".$i][ "tmp_name" ]);
		@$imageSize = getimagesize($_FILES["upload".$i][ "tmp_name" ]);

		// if is false thats not a image
		if ($imageSize == true) {
			$imagesql = "`picture` = '$image',";
		} 

	}	



	$sql1 = "UPDATE `product` SET ".$imagesql." `product_name` = '$product_name', `category_name` = '$category', `quantity` = '$quantity', `price` = '$price', `weight` = '$weight', `short_description` = '$short_description', `long_description` = '$long_description'
	 WHERE `product`.`product_id` = '$i'";


		if (mysqli_query($conn, $sql1)) {
		    echo "<script>alert('Product updated successfully.');</script>";
		} else {
		    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}
}


echo "<script> window.location = '../admin-inventory.php';</script>";


 ?>