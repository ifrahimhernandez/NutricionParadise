<?php 

$sql = "SELECT DISTINCT category_name FROM `product` where disable_product='0'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {

		      echo "

				<li>
		            <a href='ProductCategory.php?category_name=".$row["category_name"]."'>".$row["category_name"]."</a>
		        </li>

		       
				";

                               
                
		    }
		} 




 ?>