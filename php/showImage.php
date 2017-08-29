<?php
		//include '/Connection/connection.php';

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "nutricion_paradice";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		
		
		if(isset($_GET['id'])){

		 $id=$_GET['id'];
		 
		 
		 $sql = "SELECT * FROM `product` WHERE `product_id`='$id'";
		 $result = mysqli_query($conn, $sql);

		 

		 while($row=mysqli_fetch_assoc($result)){
		  $imageData = $row['picture'];
		 }
		 header( 'Content-Type: image/jpeg', true );

		 echo $imageData;
		//  $b64Src = "data: image/jpeg ;base64," . base64_encode($imageData);
		// echo '<img src="'.$b64Src.'" alt="" />';

		}
?>﻿


