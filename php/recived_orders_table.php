<?php 

$sql = "SELECT * FROM orders WHERE status='In Progress'";
$result = mysqli_query($conn, $sql);
$i=1;

if (mysqli_num_rows($result) > 0) {
    // output data of each row

	echo "<div class='table-responsive' style='margin-top: 30px;'>
			    <table class='table table-striped ' id='example'>
			                <thead>
			                    <tr>
			                        
			                        <th>#</th>
			                        <th>Order #</th>
			                        <th>Client Name</th>
			                        <th>Date & Time</th>
			                        <th>Total Payed</th>
			                        <th>Action</th>
			                        
			                    </tr>
			                </thead>
			                <tbody>";

    while($row = mysqli_fetch_assoc($result)) {
        
        echo "<tr>";
        echo "<td><strong>".$i."</strong></td>"; //counter
        echo " <td>".$row["order_id"]."</td>";//Order id
        echo " <td>".$row["shipping_name"]."</td>";//Shipping name
        echo " <td>".$row["order_date"]."</td>";//Order date
        echo " <td> $".$row["total_paid"]."</td>";//Total Payed
        echo " <td><a type='button' class='btn btn-success btn-md ' data-toggle='modal' data-target='#myModal".$row["order_id"]."'>Send Order</a></td>";//Total Payed
        echo "</tr>";


        $i++;
    }

		echo " </tbody>
		    </table>
		</div>";

} else {
    echo "<p class='text-center'> <strong>THERE ARE NO ORDERS IN THE SYSTEM!</strong></p>";
}


 ?>

                                            
                                       
       
              
                


                  
                                        
                                   
                                        
                  
                  

                            

                                   