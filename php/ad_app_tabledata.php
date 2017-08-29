<?php 
include './Connection/connection.php';

if(isset($_POST['datepicker'])){
$date =$_POST['datepicker'];
$date = new DateTime($date);
$date= $date->format('Y-m-d');    

$sql = "SELECT appointment.appoint_id, appointment.apoint_time, appointment.atended , user.first_name, user.last_name,user.phone FROM `appointment` INNER JOIN `user` ON appointment.user_id = user.user_id WHERE  appointment.appoint_date= '$date'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    echo "  <script type='text/javascript'>
            $(document).ready(function() {
                $('#example2').DataTable();
            } );

            </script>

    <table class='table table-striped ' style='padding-top: 0px; width: 100%; margin: auto;' id='example2'>
            <thead>
                <tr>
                    
                    <th>Appointment #</th>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>Time</th>
                    <th>Status</th>
                    
                    
                </tr>
            </thead>
              <tbody >";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo " <td>". $row["appoint_id"]."</td>";
        echo " <td>". $row["first_name"]." ".$row["last_name"]."</td>";
        echo " <td>". $row["phone"]."</td>";
        echo " <td>". $row["apoint_time"]."</td>";
        if($row["atended"]=='0'){
        	echo " <td>Upcoming</td>";
        }else{
        	echo " <td>Completed</td>";
        }
        
        echo "</tr>";

    }

    echo "</tbody>
       </table>";
} else {
    echo "<p class='text-center'> <strong>NO APPOINTMENT WHERE MADE ON ".$_POST['datepicker']."</strong></p>";
}

}else{

	echo "Ajax Error.";
}
 ?>