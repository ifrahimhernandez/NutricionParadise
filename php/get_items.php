

<?php 
 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	//Look for the product with the id 
	$qtycheckquery="SELECT * FROM `product` where product_id = '$item_to_adjust' LIMIT 1";

	$result = mysqli_query($conn, $qtycheckquery);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	         $qtysql=$row["quantity"];
	         $productName=$row["product_name"];
	    }
	} 
	//check if the amount the user input is over stock
	if ($quantity<= $qtysql) {
		# code...
	
		$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
		if ($quantity >= 100) { $quantity = 99; }
		if ($quantity < 1) { $quantity = 1; }
		if ($quantity == "") { $quantity = 1; }
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) { 
			      $i++;
			      while (list($key, $value) = each($each_item)) {
					  if ($key == "item_id" && $value == $item_to_adjust) {

						  // That item is in cart already so let's adjust its quantity using array_splice()
						  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
					  } // close if condition
			      } // close while loop
		} // close foreach loop

	}else{
		//error message
		echo "<script type='text/javascript'>

		 	alert('The amount went over stock. ".$productName." has ".$qtysql." in stock. Please try an amount lower than that.');
            
			</script>";
	}
}

 ?>
 <?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart & select form the shipping cost)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count(@$_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}

//select the shipping cost of the selected one by the client 

if (isset($_POST['shippingcost']) && $_POST['shippingcost'] != "" && isset($_POST['test_text']) && $_POST['test_text'] != "") {
 
 	$cost = $_POST['shippingcost'];
 	$id=$_POST['test_text'];

 	$_SESSION['select']=$id; //Selected shipping 

	
}



?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';

//If cart has iterms then show the PayPal button

if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    //display this message if there are not any items in the cart_array 
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2></div>";
} else {

	// Start PayPal Checkout Button
	$pp_checkout_btn .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="contact_form"  onsubmit="return validate_form ('.@$_SESSION['role'].' );">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="ifrahim.hernandez-facilitator-1@gmail.com">';
	
    //Calculations for display on the cart.php page
	$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['item_id'];

		$sql = "SELECT * FROM product WHERE product_id='$item_id' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result)) {
			$product_name = $row["product_name"];
			$price = $row["price"]; 
			$weight= $row["weight"]; 
			
		}
		//subtotal amount
		$pricetotal = $price * $each_item['quantity'];
        $cartTotal = (float)$pricetotal + $cartTotal;

        //weight
        $tweight= $weight * $each_item['quantity'];
        $tweight=number_format((float)$tweight, 2, '.', '');
        @$cartweighttotal=$cartweighttotal+$tweight;



        //tax
        if (@$_SESSION['state']=="MA") {
			
			$tax=$pricetotal*0.051;
			$tax=asDollars($tax);

		}else{

			$tax=0.00;
		}




		// Continue Paypal button with the products to insert in a form
		$x = $i + 1;
		$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';


		// Create the product array variable for the costum hidden in put in paypal
		$product_id_array .= "$item_id-".$each_item['quantity'].","; 



		// Print cart products for each of the products that are in the cart
		$cartOutput .= "<tr>";
		$cartOutput .= '<td ><strong><a href="ProductDescription.php?productid=' . $item_id . '">' . $product_name . '</a></strong><br /></td>';
		$cartOutput .= '<td class="text-center">$' . $price . '</td>';
		$cartOutput .= '<td class="text-center"><form action="Cart.php" method="post">
		<div class="input-group">
		<input name="quantity" class="form-control" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<span class="input-group-btn">
		<input name="adjustBtn' . $item_id . '" class="btn btn-default btn-md" type="submit" value="Change" />
		</span>
		</div>
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$cartOutput .= '<td class="text-center"><b>$' . asDollars($pricetotal) . '</b></td>';
		$cartOutput .= '<td class="text-center"><form action="Cart.php" method="post"><button name="deleteBtn' . $item_id . '" type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span></button><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .= '</tr>';
		$i++; 
		//$cartTotal = asDollars($cartTotal);


    } 

   	//total weight in the cart that goes for the shipping method and shipping calculator class
	$cartweighttotal=round($cartweighttotal/16,2); //onzas to lb

	//cart weight cant be over 70 pounds because it wont display the price of the shipping by USPS
	if ($cartweighttotal>70){

	//error message
	echo "<script type='text/javascript'>
		alert('The cart is over 70 lb, please remove products so the order can go through.');
	 	</script>";
	}
    
      
	
	if (isset($_SESSION["role"]) && @$_SESSION['role'] == "0" && isset($_SESSION["cart_array"]) && count(@$_SESSION["cart_array"]) >= 1) {
               
	      // all the products cart weight total are sent to this php so the shipping could be known
	       include './php/shipping_output.php';

	 } 


    // Finish the Paypal Checkout Btn with the hidden costum products
	$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">';
}


function asDollars($value) {
	//$value=floatval(preg_replace("/[^-0-9\.]/","",$value));
  return  number_format($value, 2);
}

?>

