<?php 

	if (@$_GET['productid']) {
		# code...
		 $q=$_GET['productid'];

		$sql = "SELECT * FROM `product` where product_id='$q'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {

?> 

		<div class=" single_top productbox" style="margin-bottom: 50px; background-color: #F3F3F3;">    
	       
	        <div class="single_grid">
		        
		        <div class="col-md-5" style="    background-color: white; border: 1px solid;">
		          <div class="flexslider">
		           
		              	<div class="clearfix"></div>
		          		
		          		<div class="flex-viewport" style="overflow: hidden; position: relative;">
		               
		                <div class="thumb-image" style="margin-top: 90px; margin-bottom: 90px;"> <img src='./php/showImage.php?id=<?php echo $row["product_id"]; ?>' alt='' class='img-responsive' style='margin: auto;'> </div>

		              </div>
		          </div>  

		      </div> 
	          
	          <div class="col-md-7 ">
	         
		          <h3><strong><?php echo $row["product_name"]; ?></strong></h3>
			        <div class="cart-b">
			          <div class="left-n ">$<?php echo $row["price"]; ?></div>
			            
			          	<form id='form1' name='form1' method='post' action='Cart.php'>
				        	<input type='hidden' name='pid' id='pid' value=<?php echo $row["product_id"]; ?> />
				        	<input type='submit' name='button' class='now-get get-cart-in btn btn-success btm-sm' role='button' id='button' style="   margin-right: 10px;" value='ADD TO CART' />
				      	</form>
			            
			            <div class="clearfix"></div>
			         </div>
		          <h5><?php echo $row["quantity"]; ?> items in stock</h5>
		          <p style="width: 100%;height: 200px;overflow: auto;"><?php echo $row["short_description"]; ?></p>

	          </div>
	          
	          <div class="clearfix"> </div>

	        </div>
	               
	     

	        <div class="toogle">
	          <h3 class="m_3">Product Details</h3>
	          <p class="m_text" style="width: 100%;height: 200px;overflow: auto;"><?php echo $row["long_description"]; ?></p>
	        </div> 
               
         </div>

<?php
		 }
		 //while ends here
		} else {
		    echo "<div class='row'>

                

                <div class='col-md-12'>
                
                      <h3 class='text-center'>NO PRODUCTS FOUND.</h3>
                </div>

                </div>";
		}

	} else {
		# code...
		echo "Error!";
	}
	

 ?>