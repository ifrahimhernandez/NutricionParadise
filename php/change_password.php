<?php 
session_start();
include './Connection/connection.php';

  if(isset($_POST['oldpass']) && isset($_POST['newpassword'])){

  $result=mysqli_query($conn,"SELECT * FROM user WHERE user_id='".$_SESSION['user_id']."' LIMIT 1");

    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    
    if ($row['password']==$_POST['oldpass']) {


    if (mysqli_query($conn,"UPDATE user SET password='".$_POST['newpassword']."' WHERE user_id='".$_SESSION['user_id']."' ;")) {
          //echo "Password updated successfully";
          echo true;
      } else {
          echo "Error updating password. Please check the current password.";
      }


    mysqli_close($conn);
  }else{
    echo "The current password does not match our records. Please try again.";
  }

  }else {

      echo 'false';

    }
?>