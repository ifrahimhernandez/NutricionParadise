<?php 

$sql1 = "SELECT * FROM product";
$result = mysqli_query($conn, $sql1);

 $modalinfo ="";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $modalinfo .="<div id='myModal".$row["product_id"]."' class='modal fade' role='dialog' >
                        <div class='modal-dialog'>        
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                              <h4 class='modal-title'>Edit Product</h4>
                            </div>
                            <div class='modal-body'>
                              <form method='POST' action='./php/edit_post.php'  enctype='multipart/form-data'>";
        
        $modalinfo .= "<div class='form-group'>
                          <h5><strong>Product Image</strong></h5>
                          <img src='./php/showImage.php?id=" . $row["product_id"]. "' alt='' class='img-responsive'  >
                       </div>"; 

        $modalinfo .= "<div class='form-group'>
                          <h5><strong>Upload New Photo</strong></h5>
                          <input type='file' name='upload" . $row["product_id"]. "' tabindex='1' class='btn btn-default' onchange='return validateFileExtension(upload" . $row["product_id"]. ")''>
                       </div>"; 

        $modalinfo .="<div class='form-group'>
                          <h5><strong>Product Name</strong></h5>
                          <input type='text' name='product_name".$row["product_id"]."' tabindex='1' class='form-control' value='".$row["product_name"]."' required>
                      </div>";                                  

        $modalinfo .= "<div class='form-group'>
                          <h5><strong>Change Category</strong></h5>
                          <input type='text' name='search-box".$row["product_id"]."' id='search-box".$row["product_id"]."' required onkeypress='category(".$row["product_id"].")'  placeholder='Change Category' class='form-control' value='".$row["category_name"]."' required/>
                          <div id='suggesstion-box".$row["product_id"]."'></div>
                      </div>";   

        $modalinfo .="<div class='form-group'>
                          <h5><strong>Quantity</strong></h5>
                          <input type='number' name='quantity".$row["product_id"]."' step='1' min='0' tabindex='1' class='form-control' required value='".$row["quantity"]."'>
                      </div>";               
        
        $modalinfo .="<div class='form-group'>
                          <h5><strong>Price</strong></h5>
                          <input type='number' name='price".$row["product_id"]."' tabindex='1' min='0' class='form-control' required value='".$row["price"]."' step='0.01'>
                      </div>";   

        $modalinfo .="<div class='form-group'>
                          <h5><strong>Weight</strong></h5>
                          <input type='number' name='weight".$row["product_id"]."' tabindex='1' min='0' class='form-control' required value='".$row["weight"]."' step='0.01'>
                      </div>";                

        $modalinfo .="<div class='form-group'>
                          <h5><strong>Short Description</strong></h5>
                          <textarea class='form-control' rows='4' required name='short_description".$row["product_id"]."'>".$row["short_description"]."</textarea>
                      </div>"; 

        $modalinfo .="<div class='form-group'>
                          <h5><strong>Long Description</strong></h5>
                          <textarea class='form-control' rows='8' name='long_description".$row["product_id"]."' required>".$row["long_description"]."</textarea>
                      </div>";  

        $modalinfo .="</div>
                        <div class='modal-footer'>
                        <input type='hidden' name='id' value='".$row["product_id"]."'>
                          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                          <button type='submit' class='btn btn-info' >Save</button>
                           </form>
                        </div>
                      </div>

                    </div>
                  </div>";                           
    }
    echo $modalinfo;
}

?>


               
                

                              
             
              
