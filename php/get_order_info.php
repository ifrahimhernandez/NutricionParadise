<?php 
                        	//If the order id exist then do the select
                        	if (isset($_GET["orderid"]) ) {
                        		# code...
                        		$user= $_SESSION['user_id'];
                        		$orderid= $_GET["orderid"];
                        				////////Get Orders from user////
		                        		$sql50 =  "SELECT * FROM `orders` WHERE user_id='$user' AND order_id ='$orderid'";
		                            $result3 = mysqli_query($conn, $sql50);

		                            if (mysqli_num_rows($result3) > 0) {
		                                // output data of each row
		                                while($row = mysqli_fetch_assoc($result3)) {
		                                    //Select data and display in the row
		                                    
		                                    $order_id=$row["order_id"];//order id
		                                    $trackingnumber=$row["tracking_number"];//tracking number
		                                    $shipMeth=$row["shipping_method"]; // shipping method
		                                    $status=$row["status"]; // Status of shippment
		                                    $sent= $row["sent_date"]; //Sent date of shippment
		                                    $tax= $row["product_tax"]; //tax charged
		                                    $shippingcost=$row["product_shipping"]; //shipping charged
		                                    $totalcost=$row["total_paid"]; //total paid

		                                   
		                                }
		                            } else {
		                            	 //error message
		                                echo "<script>
		                                	alert('Order not found!');
		                                location.href = 'client-orders.php';
		                                </script>";
		                                echo "Order not found!";
										exit();
		                            }


		                           	//////////////Get products from Orders///////
		                            $sql63 =  "SELECT order_products.order_id, order_products.quantity, order_products.product_price, product.product_name FROM order_products INNER JOIN product ON order_products.product_id=product.product_id WHERE order_products.order_id ='$orderid'";
		                            $result = mysqli_query($conn, $sql63);

		                            if (mysqli_num_rows($result) > 0) {
		                                // output data of each row
		                                while($row = mysqli_fetch_assoc($result)) {
		                                    //Select data and display in the row
		                                    
		                                    $order_idtable=$row["order_id"];//order id
		                                    $product_name=$row["product_name"]; // Name of the product
		                                    $quantity=$row["quantity"];//quantity of products order
		                                    $product_price=$row["product_price"]; // price of bought products
		                                    //calculate the subtotal
		                                    $subtotal= $quantity * $product_price; 
		                                    //calculate the grand total 
		                                    @$total=$total+$subtotal;

		                                    //insert into table
						                    @$table.="
						                    <tr>
		                                     <td>".$product_name."</td>
						                      <td class='text-right'>".$quantity."</td>
						                      <td class='text-right'>$".$product_price."</td>
						                      <td class='text-right'>$".$subtotal."</td>
						                    </tr>
						                    ";
		                                   
		                                }
		                            } else {
		                            	 //error message
		                                echo "<script>
		                                	alert('Error getting products from order not found!');
		                                location.href = 'client-orders.php';
		                                </script>";

		                                echo "Error getting products from order not found!";
		                                
										exit();
		                            }


		                           ////////////Shipping Address/////////
		                             $userinfo =  "SELECT * FROM `orders` WHERE order_id ='$orderid'";
		                            $result10 = mysqli_query($conn, $userinfo);

		                            if (mysqli_num_rows($result10) > 0) {
		                                // output data of each row
		                                while($row = mysqli_fetch_assoc($result10)) {
		                                    //Select data and display in the row
		                                    
		                                    $name=$row["shipping_name"];//Name of the client
		                                    $address=$row["shipping_address"]; // Address of the client order
		                                    $phone=$row["shipping_phone"];//Phone Number
		                                    $email=$row["shipping_mail"];//mail
		                                    
		                                   
		                                }
		                            } else {
		                            	 //error message
		                                echo "<script>
		                                	alert('Error getting products from order not found!');
		                                location.href = 'client-orders.php';
		                                </script>";

		                                echo "Error getting products from order not found!";
		                                
										exit();
		                            }



                        	} else {
                        		//error message
                        		echo "<script>
		                                	alert('Order not found!');
		                                location.href = 'client-orders.php';
		                                </script>";
		                                echo "Order not found!";
										exit();
                        	}
                        	

                        		

							?>


		
