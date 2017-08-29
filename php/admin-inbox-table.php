<?php 

//select all the consultings from the clients 
$sql = "SELECT * FROM `consulting_log` INNER JOIN user ON consulting_log.user_id = user.user_id WHERE  admin_delete='0' ORDER BY `consulting_log`.`client_unread` DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    //print table
         echo "<table class='table  table-hover' id='example'>
			    <thead>

			            <th>Consulting #</th>
			            <th>Client Name</th>
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
         $first_name=$row["first_name"];
         $last_name=$row["last_name"];
         $client_unread= $row["client_unread"];
         
         $deletebutton="";
         //check is consulting is in progress or completed
         if ($active=="0") {
         	//In Progress
         	$active1="In Progress";
         } else {
         	//over
         	$active1="Over";
         	//button to delete the finished consultings
         	$deletebutton="<a class='btn btn-danger btn-md' type='button'  onclick=\"delete1('$consulting_log_id');\"><span class='glyphicon glyphicon glyphicon-trash' aria-hidden='true'></span> Delete</a>";
         }

         //if there is available messages in from the client then put it in bold

         if ($client_unread>0) {
         	//bold the text inside 
         	//print rows
			 echo " <tr>
		            <td><b>".$consulting_log_id." (Unread)</b></td>
		            <td><b>". $first_name." ".$last_name."</b></td>
		            <td><b>$".$payment."</b></td>
		            <td><b>".$date."</b></td>
		            <td><b>".$active1."</b></td>
		            <td><b><a class='btn btn-success btn-md ' href='admin-send-message.php?consulting_id=".$consulting_log_id."&active=".$active."'><span class='glyphicon glyphicon glyphicon-envelope' aria-hidden='true'></span> View</a> ".$deletebutton."</b></td></tr>";

         } else {
         	//not bold
         	//print rows
			 echo " <tr>
		            <td>".$consulting_log_id."</td>
		            <td>". $first_name." ".$last_name."</td>
		            <td>$".$payment."</td>
		            <td>".$date."</td>
		            <td>".$active1."</td>
		            <td><a class='btn btn-success btn-md ' href='admin-send-message.php?consulting_id=".$consulting_log_id."&active=".$active."'><span class='glyphicon glyphicon glyphicon-envelope' aria-hidden='true'></span> View</a> ".$deletebutton."</tr>";
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
