<?php 


$sql="SELECT SUM(client_unread) AS newmessages FROM `consulting_log` where admin_delete='0'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    
    while($row = mysqli_fetch_assoc($result)) {
          $messages=$row["newmessages"];
          if(!isset($messages)){
              $messages=0;
          }
          
    }
}else{
    $messages="0";
    
} 




 ?>