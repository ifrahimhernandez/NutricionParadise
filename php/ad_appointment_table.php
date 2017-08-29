<?php 
$time=date('Y-m-d');
$sql = "SELECT appointment.appoint_id, appointment.apoint_time, appointment.client_message, user.first_name, user.last_name, user.phone FROM `appointment` INNER JOIN `user` ON appointment.user_id = user.user_id WHERE appointment.atended= '0' AND appointment.appoint_date= '$time' ORDER BY appointment.apoint_time ASC";
$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);;
$i=1;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo " <table class='table table-striped ' id='example'>
            <thead>
                <tr>
                    
                    <th>Order</th>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>Time</th>
                    <th>Appointment #</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

            ";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $i. "</td>"; //order number
        echo "<td>" . $row["first_name"]." ".$row["last_name"]. "</td>"; // client name
        echo "<td>" . $row["phone"]. "</td>"; //cient phone
        echo "<td>" . $row["apoint_time"]. "</td>"; //time schedule for appointment
        echo "<td>" . $row["appoint_id"]. "</td>"; //appointent Id

        ////Buttons//// 
        echo "<td><a type='button' class='btn btn-info btn-md ' data-toggle='modal' data-target='#myModal".$row["appoint_id"]."'><i class='glyphicon glyphicon-envelope'></i>&nbsp;View Message</a>&nbsp;";
        ?>
        		<a type="button"  onclick="attend_delete('<?php echo $row["appoint_id"]; ?>','<?php echo $row["first_name"]." ".$row["last_name"]; ?>','0');" class="btn btn-success btn-md" ><i class="glyphicon glyphicon-ok"></i>&nbsp;Attended</a>&nbsp;
        		<a type="button"  onclick="attend_delete('<?php echo $row["appoint_id"]; ?>','<?php echo $row["first_name"]." ".$row["last_name"]; ?>','1');" class="btn btn-danger btn-md "><i class="glyphicon glyphicon-remove"></i>&nbsp;Delete</a></td>
        <?php
		////Modal Message// 
        echo "</tr>

        		   <!-- Modal -->
        <div id='myModal".$row["appoint_id"]."' class='modal fade' role='dialog'>  
          <div class='modal-dialog'>

            <!-- Modal content-->
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='moda'>&times;</button>
                <h4 class='modal-title'>Client Message</h4>
              </div>
              <div class='modal-body'>
                <p>" . $row["client_message"]. "</p>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
              </div>
            </div>

          </div>
        </div>


        ";
        $i++;
    }

    echo "</tbody>
        </table>
</div>";
} else {
    
     echo "<table class='table table-striped ' id='example'>
            <thead>
                <tr>
                    
                    <th>Order</th>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>Time</th>
                    <th>Appointment #</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

</div>";
    
}
 ?>

 
       
                    
                    
                    
                    
             
                