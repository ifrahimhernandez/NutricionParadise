<?php 
session_start();
include './Connection/connection.php';

//check if is admin or client for the admin_or_not field in the message table

if ($_SESSION["role"]=='0') {
	//client
	$admin_or_not ="0";
	$read_or_not= "`client_unread`";
} else {
	//admin
	$admin_or_not ="1";
	$read_or_not= "`admin_unread`";
}


//recive variable from post text message

if (isset($_POST["ChatText"]) && @$_POST["ChatText"]!="" && isset($_POST["consulting_id"]) && @$_POST["consulting_id"]!="") {
	
	//update the messgaes unread by adding +1 to the unread depending on client or admin
	$sql2="UPDATE `consulting_log` SET ".$read_or_not." = ".$read_or_not."+1 WHERE `consulting_log`.`consulting_log_id` = '".$_POST["consulting_id"]."'";
	//mysqli_query($conn, $sql2);
	if (!mysqli_query($conn, $sql2)) {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

    // insert the message into the database
	$sql = "INSERT INTO `messages` ( `consulting_log_id`,  `message_text`, `admin_or_not`) VALUES ( '".$_POST["consulting_id"]."', '".$_POST["ChatText"]."', '$admin_or_not');";

	if (!mysqli_query($conn, $sql)) {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	} 



}else{
	echo "Error!! Please try again.";
}


 ?>