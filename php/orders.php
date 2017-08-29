    <?php  
                            ////Select from orders ///

                            $sql = "SELECT * FROM orders where user_id = '".$_SESSION['user_id']."' ORDER BY `orders`.`status` ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    
                                   
                                   //find the qty of items of that order
                                   $sql2 = "SELECT COUNT(*) AS qty FROM order_products where order_id = '".$row["order_id"]."'";
                                    $result2 = mysqli_query($conn, $sql2);

                                    if (mysqli_num_rows($result2) > 0) {
                                        // output data of each row
                                        while($row1 = mysqli_fetch_assoc($result2)) {
                                             $qty2= $row1["qty"] ;
                                        }
                                    } else {
                                        echo "Error! Please try again later.";
                                    }


                                   
                                    //Select data and display in the row
                                   @$table.="
                                            <tr  >
                                            
                                            <td><a>". $row["order_id"] ."</a></td>
                                            <td>".$row["order_date"]."</td>  
                                              <td>". $qty2."</td>
                                              <td> $". $row["total_paid"] ."</td>
                                              <td>". $row["status"] ."</td>
                                              <td><a  class='btn btn-success btn-sm pull-right' href='client-orders-lookup.php?orderid=".$row["order_id"]."'>Check</a></td>
                                            </tr>
                                            ";
                                }
                            } else {
                                echo "<h3 class='text-center'>NO ORDERS HAVE BEEN MADE.</h3>";
                                $order_si_no=false;
                                //exit();
                            }


                            if (!isset($order_si_no)) {
                                # code...
                            
                            ?>

                            
   <div class="col-md-12">
       
        <div class="table-responsive" style="margin-top: 50px; width: 90%; margin:auto;">
        <table class="table table-striped " id="example32" >
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Order Date</th>
                            <th>Items Qty</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        

                           <?php echo @$table; ?>
                                                        
                        
                        
                    </tbody>
                </table>
            </div>
    </div>
    <?php } ?>