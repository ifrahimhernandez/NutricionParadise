<?php 

//select all the consultings from the clients 
$sql = "SELECT * FROM `consulting_log` WHERE user_id = '".$_SESSION["user_id"]."' AND client_delete='0' ORDER BY `consulting_log`.`date` DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    //print table
         echo "<table class='table  table-hover' id='example'>
			    <thead>

			            <th>Consulting #</th>
			            <th>Payment</th>
			            <th>Date Started</th>
			            <th>Consulting Status</th>
			            <th>Action</th>
			            
			    </thead>
			    <tbody>";

    while($row = mysqli_fetch_assoc($result)) {
    	//set variables
         $consulting_log_id=$row["consulting_log_id"];
         $payment=$row["payment"];
         $date=$row["date"];
         $active=$row["active"];
         $admin_unread= $row["admin_unread"];

         $deletebutton="";
         //check is consulting is in progress or completed
         if ($active=="0") {
         	//In Progress
         	$active1="In Progress";
         } else {
         	//over
         	$active1="Over";
         	//button to delete the finished consultings
         	$deletebutton="<a class='btn btn-danger btn-md' type='button'  onclick=\"delete1('$consulting_log_id');\"><span class='glyphicon glyphicon glyphicon-trash' aria-hidden='true'></span> Delete</a></td>";
         }


         if ($admin_unread>0) {
         	//bold the text inside 
         	//print rows
			 echo " <tr>
		            <td><b>".$consulting_log_id." (Unread)</b></td>
		            <td><b>$".$payment."</b></td>
		            <td><b>".$date."</b></td>
		            <td><b>".$active1."</b></td>
		            <td><b><a class='btn btn-success btn-md ' href='client-send-message.php?consulting_id=".$consulting_log_id."&active=".$active."'><span class='glyphicon glyphicon glyphicon-envelope' aria-hidden='true'></span> View</a> ".$deletebutton."</b></td></tr>";

         } else {
         	//not bold
         	//print rows
			 echo " <tr>
		            <td>".$consulting_log_id."</td>
		            <td>$".$payment."</td>
		            <td>".$date."</td>
		            <td>".$active1."</td>
		            <td><a class='btn btn-success btn-md ' href='client-send-message.php?consulting_id=".$consulting_log_id."&active=".$active."'><span class='glyphicon glyphicon glyphicon-envelope' aria-hidden='true'></span> View</a> ".$deletebutton."</tr>";
         	
         }
         	
	}

     echo " </tbody>
			</table>";
} else {
	// if there are not produts print 
echo "<table class='table  table-hover' id='example'>
			    <thead>

			            <th>Consulting #</th>
			            <th>Payment</th>
			            <th>Date Started</th>
			            <th>Consulting Status</th>
			            <th>Action</th>
			            
			    </thead>
			    <tbody>";


 echo " </tbody>
			</table>";
	
    
}


 ?>
