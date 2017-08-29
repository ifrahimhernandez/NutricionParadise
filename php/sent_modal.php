<?php 



$sql = "SELECT * FROM orders WHERE status='Shipped!'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row

  

    while($row = mysqli_fetch_assoc($result)) {
        
        // Modal

        echo "<div id='myModal".$row["order_id"]."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>

            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Update Orders</h4>
              </div>
              <div class='modal-body'>";

        //shipping info
        
        echo " <h5><strong>Shipping Information</strong></h5>

                  <h5><strong>Name:</strong> ".$row["shipping_name"]."</h5>
                  <h5><strong>Address:</strong> ".$row["shipping_address"]."</h5>
                  <h5><strong>Email:</strong> ".$row["shipping_mail"]."</h5>
                  <h5><strong>Phone:</strong> ".$row["shipping_phone"]."</h5>
                  <h5><strong>Shiping Method:</strong> ".$row["shipping_method"]."</h5><br>
                  <h5><strong>Order Details</strong></h5>"; 

        

        // Query for products depending their order number

        $sql3 = "SELECT product.product_name, order_products.quantity, order_products.product_id FROM `order_products` INNER JOIN product ON order_products.product_id=product.product_id WHERE order_products.order_id = '".$row["order_id"]."'";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3) > 0) {
       
        // Order Product Table

        echo "<div class='table-responsive'>
                        <table class='table table-striped table-bordered table-hover'>
                                    <thead>
                                      <tr>
                                            
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                                                                       
                                        </tr>
                                    </thead>
                                     <tbody>";

        while($row3 = mysqli_fetch_assoc($result3)) {
            //product data

            echo "<tr>
                      <td>".$row3["product_id"]."</td>
                      <td> ".$row3["product_name"]."</td>
                      <td>".$row3["quantity"]."</td>
                                                                 
                  </tr>";

        }

        echo "</tbody>
                        </table>
                  </div>";

    } else {
        echo "0 results";
    }  
   
   $ent=$row["order_id"];
      echo "
      <h5><strong>Shipping Amount:</strong> $".$row["product_shipping"]."</h5>
      <h5><strong>Tax:</strong> $".$row["product_tax"]."</h5>
      <h5><strong>Total Paid:</strong> $".$row["total_paid"]."</h5><br>
                  <h5><strong>Tracking Number</strong></h5>
                   <form >
                    <div class='form-group'>
                        <input type='text' id='track_number".$row["order_id"]."' tabindex='1' class='form-control' value='".$row["tracking_number"]."'>
                    </div>
                              
             
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";

            ?>
                <button type="button"  onclick="updatetracksent('<?php echo $ent; ?>')" class="btn btn-warning" >Update Order</button>
            <?php
                 echo "
                 </form>
              </div>
            </div>

          </div>
        </div>   
               ";        
        
    }

   
} 



                





 ?>




