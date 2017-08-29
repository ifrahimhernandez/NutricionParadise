<?php

if ($_GET['cm']=='Consulting') {

// if all the variables are not set then redirect to the main page 
if (!isset($_GET['tx']) || !isset($_GET['st']) || !isset($_GET['amt']) || !isset($_GET['cc']) || !isset($_GET['cm']) ) {
  # code...
  echo "<script> document.location.href='client-consulting-inbox.php';</script>";
  exit(); // exit script
}
// Check Number 1 ------------------------------------------------------------------------------------------------------------
//checks if the transaction is in the system if it is exits the script
$this_txn = @$_GET['tx'];
$sql2 = "SELECT * FROM consulting_log WHERE consulting_log_id='$this_txn' AND `active`='0' LIMIT 1";
$result23=mysqli_query($conn, $sql2);
$numRows = mysqli_num_rows($result23);

if ($numRows > 0) {

  while($row = mysqli_fetch_assoc($result23)) {
    $id=$row["consulting_log_id"];
    $active=$row["active"];
}
  // if there is a consulting id in the database that is active and not completed show the invoice
    echo "<p class='text-center'>
            <div class='col-md-6 '>
                    <img src='assets/img/Thank-You.png' class='img-responsive' alt='Responsive image'>
                  </div>
            <div class='col-md-6 '>
            <div class='row'>
            <h4><strong>YOUR CONSULTING HAS BEEN SET WITH THE DOCTOR. PLEASE CLICK THE BUTTON TO CONTINUE.</strong></h4>
     
      <h4><strong>ORDER ID # ".@$_GET['tx']."</strong></h4>
     
      <h4><strong>Amount: $".@$_GET['amt']."</strong></h4>

      </div>
      <br>
      
     <div class='row'>
      
       
       <a class='btn btn-success btn-block btn-lg' style='padding: 20px 27px; width: 70%;' href='client-send-message.php?consulting_id=".$id."&active=0'>Continue Consulting Now </a>
    </div>
      
      </p></div>";
    exit(); // exit script

}

//Insert Consulting to the database
//////aqui


if (isset($_SESSION["validcode"])) {

$sqldale="INSERT INTO `consulting_log` (`consulting_log_id`, `user_id`, `payment`, `active`) VALUES ('$this_txn', '".@$_SESSION['user_id']."', '".@$_GET['amt']."', '0');";

if (!mysqli_query($conn, $sqldale)) {
         echo "Error: " . $sqldale . "<br>" . mysqli_error($conn);
    } else{


          echo "<p class='text-center'>
            <div class='col-md-6 '>
                    <img src='assets/img/Thank-You.png' class='img-responsive' alt='Responsive image'>
                  </div>
            <div class='col-md-6 '>
            <div class='row'>
            <h4><strong>YOUR CONSULTING HAS BEEN SET WITH THE DOCTOR. PLEASE CLICK THE BUTTON TO CONTINUE.</strong></h4>
     
      <h4><strong>ORDER ID # ".@$_GET['tx']."</strong></h4>
     
      <h4><strong>Amount: $".@$_GET['amt']."</strong></h4>

      </div>
      <br>
      
     <div class='row'>
      <a class='btn btn-success btn-block btn-lg' style='padding: 20px 27px; width: 70%;' href='client-send-message.php?consulting_id=".$this_txn."&active=".$active."'>Continue Consulting Now </a> 
    </div>
      
      </p></div>";

      
    }
 unset( $_SESSION["validcode"]);//takes off the value of the session that comes from the consulting

}else{

  //if the session isnt set then redirect.
  echo "<script> document.location.href='client-consulting-inbox.php';</script>";
  exit(); // exit script
}


} else {
  
// if all the variables are not set then redirect to the main page 
if (!isset($_GET['tx']) || !isset($_GET['st']) || !isset($_GET['amt']) || !isset($_GET['cc']) || !isset($_GET['cm']) ) {
  # code...
  echo "<script> document.location.href='index.php';</script>";
  exit(); // exit script
}

// Check Number 1 ------------------------------------------------------------------------------------------------------------
//checks if the transaction is in the system if it is exits the script
$this_txn = @$_GET['tx'];
$sql2 = "SELECT order_id FROM orders WHERE order_id='$this_txn' LIMIT 1";
$result23=mysqli_query($conn, $sql2);
$numRows = mysqli_num_rows($result23);

if ($numRows > 0) {
  // echo "Transaction NOT VALID : Order Repeated!";
    echo "<p class='text-center'>
            <div class='col-md-6 '>
                    <img src='assets/img/Thank-You.png' class='img-responsive' alt='Responsive image'>
                  </div>
            <div class='col-md-6 '>
            <div class='row'>
            <h4><strong>YOUR ORDER HAS BEEN PLACED.</strong></h4>
     
      <h4><strong>ORDER ID # ".@$_GET['tx']."</strong></h4>
      </div>
      <br>
      
     <div class='row'>
      
       <a id='singlebutton' name='singlebutton' class='btn btn-success btn-block btn-lg' style='padding: 20px 27px; width: 70%;'' href='index.php'>Back to Shopping</a>
    </div>
      
      </p></div>";
    exit(); // exit script
} 

// Check Number 2 ------------------------------------------------------------------------------------------------------------
//checks that the same amount that was sent was recived too 

if (!isset($_SESSION['total']) || $_SESSION['total']!= $_GET['amt']) {
  // echo "Transaction NOT VALID : Order Repeated!";
    echo "<p class='text-center'>
            <div class='col-md-6 '>
                    <img src='assets/img/Thank-You.png' class='img-responsive' alt='Responsive image'>
                  </div>
            <div class='col-md-6 '>
            <div class='row'>
            <h4><strong>YOUR ORDER HAS BEEN PLACED.</strong></h4>
     
      <h4><strong>ORDER ID # ".@$_GET['tx']."</strong></h4>
      </div>
      <br>
      
     <div class='row'>
      
       <a id='singlebutton' name='singlebutton' class='btn btn-success btn-block btn-lg' style='padding: 20px 27px; width: 70%;'' href='index.php'>Back to Shopping</a>
    </div>
      
      </p></div>";
    exit(); // exit script
}else{
    unset( $_SESSION['total']);//takes off the value of the session that comes from the cart
} 



if (isset($_GET['tx'])) {
  
  //////////////////////////////////////////////////////////////////////////////////////////////////
  //INSERTAR LA ORDEN AL SISTEMA//////
  //////////////////////////////////////////////////////////////////////////////////////////////////
      $user_id=$_SESSION['user_id'];//user id
            
      $method =$_SESSION['select']; //method shipping
            $shipping =$_SESSION['shipping']; //shipping
           $tax = $_SESSION['tax']; //Tax
             $total_paid = $_GET['amt']; //Total
#
#            $shippingAddress .= $_POST["address_name"]; // name of adress
#            $shippingAddress .="-".$_POST["address_street"]; //adress
#            $shippingAddress .="-".$_POST["address_city"]; //city
#            $shippingAddress .="-".$_POST["address_zip"]; //zipcode
#            $shippingAddress .="-".$_POST["address_country"];//country
#
            $trans_id = $_GET['tx']; //transaction id
#            $payer_email = $_POST["payer_email"]; //payer email

            ///Get user shipping inforation //

            $sqlcheckclient2 = "SELECT * FROM user Where user_id='".@$_SESSION['user_id']."' LIMIT 1"; // check if the account exist

        $usercheck101 = mysqli_query($conn, $sqlcheckclient2);

        
        
        if (mysqli_num_rows($usercheck101) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($usercheck101)) {
             
             $email=$row["shipping_mail"];
             $client_name=$row["shipping_name"];  //shipping information display
             $address=$row["shipping_address"].", ".$row["shipping_city"].", ".$row["shipping_state"].", ".$row["shipping_zip_code"].", ".$row["shipping_country"];
             $phone=$row["shipping_phone"];

                    }

        } 

            //Create order in the system///

    $sqldale = "INSERT INTO `orders` ( `order_id`, `user_id`, `shipping_method`, `status`, `total_paid`,`product_tax`,`product_shipping`,`tracking_number`,`sent_date`,`shipping_mail`,`shipping_address`,`shipping_phone`,`shipping_name`) VALUES ('".$trans_id."','".$user_id."', '".$method."', 'In Progress', '".$total_paid."','".$tax."','".$shipping."','N/A','N/A','".$email."','".$address."','".$phone."','".$client_name."')";

    if (!mysqli_query($conn, $sqldale)) {
         echo "Error: " . $sqldale . "<br>" . mysqli_error($conn);
    } else{
          echo "<p class='text-center'>
            <div class='col-md-6 '>
                    <img src='assets/img/Thank-You.png' class='img-responsive' alt='Responsive image'>
                  </div>
            <div class='col-md-6 '>
            <div class='row'>
            <h4><strong>YOUR ORDER HAS BEEN PLACED.</strong></h4>
     
      <h4><strong>ORDER ID # ".$trans_id."</strong></h4>
      </div>
      <br>
      
     <div class='row'>
      
       <a id='singlebutton' name='singlebutton' class='btn btn-success btn-block btn-lg' style='padding: 20px 27px; width: 70%;'' href='index.php'>Back to Shopping</a>
    </div>
      
      </p></div>";
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////
  //INSERTAR LOS PRODUCTOS AL SISTEMA//////
  //////////////////////////////////////////////////////////////////////////////////////////////////


    
$product_id_string = $_GET['cm'];
$product_id_string = rtrim($product_id_string, ","); // remove last comma
// Explode the string, make it an array, then query all the prices out, add them up, and make sure they match the payment_gross amount
$id_str_array = explode(",", $product_id_string); // Uses Comma(,) as delimiter(break point)
$fullAmount = 0;
foreach ($id_str_array as $key => $value) {
    
  $id_quantity_pair = explode("-", $value); // Uses Hyphen(-) as delimiter to separate product ID from its quantity
  $product_id = $id_quantity_pair[0]; // Get the product ID
  $product_quantity = (int) $id_quantity_pair[1]; // Get the quantity
  
  $sql50 =  "SELECT * FROM `product` WHERE product_id='$product_id' LIMIT 1";
        $result3 = mysqli_query($conn, $sql50);

        if (mysqli_num_rows($result3) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result3)) {
                //Select data and display in the row
                
                $price=$row["price"];//order id
                                           
            }
        } else {
           //error message
           
            echo "Products didnt get in the system!";
      exit();
        }
  
  $sqlpro = "INSERT INTO `order_products` ( `order_id`, `product_id`, `quantity`,`product_price`) VALUES ('".$trans_id."','".$product_id."', '".$product_quantity."','".$price."')";
  if (!mysqli_query($conn, $sqlpro)) {
         echo "Error: " . $sqlpro . "<br>" . mysqli_error($conn);
    } 
    
    //////////////////////////////////////////////////////////////////////////////////////////////////
  //RESTAR LOS PRODUCTOS AL SISTEMA//////
  //////////////////////////////////////////////////////////////////////////////////////////////////
// #1 OBTENER EL PRODUCTO

$sqlbuspro="SELECT * FROM `product` WHERE `product_id`='$product_id' LIMIT 1";
$result5 = mysqli_query($conn, $sqlbuspro);

if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row17 = mysqli_fetch_assoc($result5)) {
        $proqty=(int) $row17["quantity"];
    }
} 
// #2 SUBSTARCT THE PRODUCT
$TOTAL= $proqty-$product_quantity;

// #3 CHECK THE RESULT IF IS ON NEGATIVE

if($TOTAL<=-1){
    $TOTAL=0;    
}

// #4 UPDATE THE PRODUCT

$sqlUPDATE = "UPDATE product SET quantity='$TOTAL' WHERE product_id='$product_id'";

mysqli_query($conn, $sqlUPDATE);

}


  //////////////////////////////////////////////////////////////////////////////////////////////////
  ////PONER EL CART EN EMPTY CUANDO SE COMPLETA LA TRNSACION////
  //////////////////////////////////////////////////////////////////////////////////////////////////
 unset($_SESSION["cart_array"]);


mysqli_close($conn);




} else {
  # code...
  echo "Error!";
}

}

// INSERT INTO `orders` ( `order_id`, `user_id`, `shipping_method`, `status`, `product_tax`, `product_shipping`, `total_paid`, `shipping_address`, `paypal_email`) VALUES ('".$trans_id."','".$user_id."', '".$method."', 'In Progress', '".$tax."', '".$shipping."', '".$total_paid."', '".$shippingAddress."','".$payer_email."')

?>    