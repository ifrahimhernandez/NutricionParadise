 <div class=" row" style="margin-top: 50px; width: 90%; margin:auto;">

              <h3 class="" style="   margin-left: 16px;">Keep Shopping</h3><br>


              <?php 



$sql = "SELECT * FROM `product` where  quantity > '0' and disable_product='0' order by RAND() LIMIT 4";
    $result = mysqli_query($conn, $sql);
    $count=0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

          if ($row["quantity"]>0) {
            
            if ($count==0 ) {
            echo "<div class='clearfix'>";
              
              
          }


        if ($count==4) {
            echo "</div>";
            echo "<div class='clearfix'>";
              
              
          } 

          if ($count==8) {
            echo "</div>";
          }
            
           echo "
           
           <div class='col-md-3 col-sm-6 col-xs-12'>
                <div class='productbox'>
           ";
          echo "
        <a href='ProductDescription.php?productid=". $row["product_id"]."'>
          <img src='./php/showImage.php?id=" . $row["product_id"]. "' alt='' class='img-responsive'  style='margin: auto;height: 180px;'>
          
              <div class='producttitle'>" . $row["product_name"]. "</a></div>
              <p style='width: 100%;height: 150px;overflow: auto;'>" . $row["short_description"]. "</p>
               <div class='productprice'><div class='pull-right'>
               
               <form id='form1' name='form1' method='post' action='Cart.php'>
                  <input type='hidden' name='pid' id='pid' value='".$row["product_id"]."' />
                  <input type='submit' name='button' class='btn btn-success btn-sm' role='button' id='button' value='ADD TO CART' />
                </form>
               
               </div><div class='pricetext'>$" . $row["price"]. "</div></div>
               </div>
                    </div>
          ";

          
          
          $count++;
            
                 }              
                
        }
    } else {
        echo "0 results";
    }

                                      
                      ?>
                    


                    </div>


                  