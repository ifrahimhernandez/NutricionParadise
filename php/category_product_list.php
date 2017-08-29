
<?php 

		if (isset($_GET["category_name"], $_GET["sort"], $_GET["order"])  ) { //existen
			
			if ($_GET["sort"]=="product_id" && $_GET["order"]=="ASC") {

				$order=" ORDER BY `product`.`product_id` ASC";
				$path ="category_name=".$_GET["category_name"]."&sort=product_id&order=ASC";
				
			} else if($_GET["sort"]=="product_name" && $_GET["order"]=="ASC"){

				$order=" ORDER BY `product`.`product_name` ASC";
				$path ="category_name=".$_GET["category_name"]."&sort=product_name&order=ASC";

			} else if($_GET["sort"]=="product_name" && $_GET["order"]=="DESC"){
				
				$order=" ORDER BY `product`.`product_name` DESC";
				$path ="category_name=".$_GET["category_name"]."&sort=product_name&order=DESC";

			} else if($_GET["sort"]=="price" && $_GET["order"]=="ASC"){
				
				$order=" ORDER BY `product`.`price` ASC";
				$path ="category_name=".$_GET["category_name"]."&sort=price&order=ASC";

			} else if($_GET["sort"]=="price" && $_GET["order"]=="DESC"){
				
				$order=" ORDER BY `product`.`price` DESC";
				$path ="category_name=".$_GET["category_name"]."&sort=price&order=DESC";

			} else{

				$order="";
				$path ="category_name=".$_GET["category_name"]."";


			}
			
		} else {
			
			$order="";
			$path ="category_name=".@$_GET["category_name"]."";

		}


		if (isset($_GET["category_name"])){

		$category= $_GET["category_name"];
		$str = strtoupper($category);
		$sql = "SELECT * FROM `product` where  quantity > '0' and `disable_product`= '0' AND category_name ='$category'".$order;
		

		echo "<h2>".$str."</h2> ";

		?>

				<div class="product-filter">
				<div class="sort"><b>Sort By:</b>
				<select onchange="location = this.value;">
				<option value="ProductCategory.php?category_name=<?php echo "$category"; ?>&amp;sort=product_id&amp;order=ASC" selected="selected">Default</option>
				<option value="ProductCategory.php?category_name=<?php echo "$category"; ?>&amp;sort=product_name&amp;order=ASC" >Name (A - Z)</option>
				<option value="ProductCategory.php?category_name=<?php echo "$category"; ?>&amp;sort=product_name&amp;order=DESC">Name (Z - A)</option>
				<option value="ProductCategory.php?category_name=<?php echo "$category"; ?>&amp;sort=price&amp;order=ASC">Price (Low &gt; High)</option>
				<option value="ProductCategory.php?category_name=<?php echo "$category"; ?>&amp;sort=price&amp;order=DESC">Price (High &gt; Low)</option>
				
				</select>
				</div>
				


				</div>
		        
                        
				<div class='row'>
					

		<?php

			//////Pagination//////
		$result1 = mysqli_query($conn, $sql);
		$count=0;
		if (mysqli_num_rows($result1) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result1)) {

		    	if ($row["quantity"]>0) {
		    		$count++;
		    	}
		    }

		}

		$nr = $count; // Get total of Num rows from the database query
		if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
		    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
		    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
		} else { // If the pn URL variable is not present force it to be value of page number 1
		    $pn = 1;
		} 

		//This is where we set how many database items to show on each page 
		$itemsPerPage = 8; 
		// Get the value of the last page in the pagination result set
		$lastPage = ceil($nr / $itemsPerPage);
		// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
		if ($pn < 1) { // If it is less than 1
		    $pn = 1; // force if to be 1
		} else if ($pn > $lastPage) { // if it is greater than $lastpage
		    $pn = $lastPage; // force it to be $lastpage's value
		} 
		// This creates the numbers to click in between the next and back buttons
		$centerPages = ""; // Initialize this variable
		$sub1 = $pn - 1;
		$sub2 = $pn - 2;
		$add1 = $pn + 1;
		$add2 = $pn + 2;
		if ($pn == 1) {
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
		} else if ($pn == $lastPage) {
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
		} else if ($pn > 2 && $pn < ($lastPage - 1)) {
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
		} else if ($pn > 1 && $pn < $lastPage) {
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
		}
		// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
		$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 

		$sql2 = "SELECT * FROM `product` where quantity > '0' and `disable_product`= '0' AND category_name ='$category'".$order." ".$limit;
		$result = mysqli_query($conn, $sql2);

		//////Setup/////

		$paginationDisplay = ""; // Initialize the pagination output variable
		// This code runs only if the last page variable is not equal to 1, if it is only 1 page we require no paginated links to display
		if ($lastPage != "1"){
		    // This shows the user what page they are on, and the total number of pages
		    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '<img src="php/img/clearImage.gif" width="48" height="1" alt="Spacer" />';
			// If we are not on page 1 we can place the Back button
		    if ($pn != 1) {
			    $previous = $pn - 1;
				$paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $previous . '"> Back</a> ';
		    } 
		    // Lay in the clickable numbers display here between the Back and Next links
		    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
		    // If we are not on the very last page we can place the Next button
		    if ($pn != $lastPage) {
		        $nextPage = $pn + 1;
				$paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?'.$path.'&pn=' . $nextPage . '"> Next</a> ';
		    } 
		}
		$count=0;
		if (@mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {

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
		    	<img src='./php/showImage.php?id=" . $row["product_id"]. "' alt='' class='img-responsive' style='margin: auto;height: 180px;'>
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
		 
		 if ($lastPage>1) {
		    	 echo "</div>
		<br>
		<br>
		<br>
		 <div style='margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;'> ".$paginationDisplay." </div>
		";
		    } 
		    
		   
		} else {
		    echo "There is no products that matches the search criteria.";
		}

		
			
		} else{

			echo "Error!";
		}
	
?>

