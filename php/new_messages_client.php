<?php 


$sql1="SELECT SUM(admin_unread) AS newmessages FROM `consulting_log` where client_delete='0' AND user_id = '".$_SESSION["user_id"]."'";

$result = mysqli_query($conn, $sql1);

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