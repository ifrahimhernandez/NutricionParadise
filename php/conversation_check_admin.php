<?php 
//get the value from the url
if (isset($_GET["consulting_id"]) && @$_GET["consulting_id"]!="" && isset($_GET["active"]) && @$_GET["active"]!="") {
	$active = (int)$_GET["active"];

    // check if in the database exist this consulting_id from that user
    $sql="SELECT consulting_log.* FROM `consulting_log`  where consulting_log.consulting_log_id ='".$_GET["consulting_id"]."' AND consulting_log.active ='".$active."' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) >0) {
      
    }else{
    //redirect if dosent exist
        header('Location: admin-consulting-inbox.php');
       
    }

} else {
    //redirect if not set or empty
    header('Location: admin-consulting-inbox.php');
}


 ?>