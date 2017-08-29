 <div class=" row" style="margin-top: 50px; margin:auto; width:100%;">

              <h3 class="" style="   margin-left: 16px;">Keep Shopping</h3><br>


              <?php 

      $sql = "SELECT * FROM `product` where disable_product='0' order by RAND() LIMIT 4";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

               echo "<div class='col-md-3 col-sm-6 col-xs-12'>
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
                  <input type='submit' name='button' class='btn btn-success btn-sm' role='buttson' id='button' value='ADD TO CART' />
                </form>
               </div><div class='pricetext'>$" . $row["price"]. "</div></div>
               </div>
                    </div>
          ";

             }

              } else {
                  echo "0 results";
              }

                      ?>
                    


                    </div>


                  