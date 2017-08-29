<?php 
include './Connection/connection.php';

if (isset($_FILES["myimage"][ "tmp_name" ]) && isset($_POST["product_name"]) && isset($_POST["search-box"]) && isset($_POST["product_quantity"]) && isset($_POST["product_weight"]) && isset($_POST["product_price"]) && isset($_POST["product_short"]) && isset($_POST["product_long"])) {

	
	$sql775 = "SELECT * FROM product Where product_name='".$_POST["product_name"]."' "; // check if the product exists

        $user1 = mysqli_query($conn, $sql775);
        
        if (mysqli_num_rows($user1) > 0 ) {
		    echo "<script>alert('The data was unable to be registerd in the system because the name of the product already exists in the system.');</script>";
		} else {


	//image procesing
	$image = addslashes(file_get_contents($_FILES["myimage"][ "tmp_name" ]));
	$imageName = addslashes($_FILES["myimage"][ "tmp_name" ]);
	$imageSize = getimagesize($_FILES["myimage"][ "tmp_name" ]);

	// if is false thats not a image
	if ($imageSize == false) {
		echo "<script>alert('The image is not supported in the system try a diferent one.');</script>";
	} else{
		$sql = "INSERT INTO product (picture, product_name, price, quantity, short_description, long_description, weight, category_name ) VALUES ( '$image', '".$_POST["product_name"]."', '".$_POST["product_price"]."','".$_POST["product_quantity"]."','".$_POST["product_short"]."','".$_POST["product_long"]."','".$_POST["product_weight"]."','".$_POST["search-box"]."')";

		if (mysqli_query($conn, $sql)) {
		    echo "<script>alert('New product created successfully.');</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
	}

 }

}	

echo "<script> window.location = '../admin-inventory.php';</script>";

 ?>