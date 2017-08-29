<?php 


//First select all the conversation  messages from the database

$sql2 = "SELECT messages.*,user.first_name,user.last_name FROM `messages` INNER JOIN consulting_log ON messages.consulting_log_id = consulting_log.consulting_log_id INNER JOIN user ON consulting_log.user_id = user.user_id where messages.consulting_log_id ='".$_GET["consulting_id"]."' ORDER BY message_id DESC";

$result1 = mysqli_query($conn, $sql2);

echo "<ul class='chat-box'>";

if (mysqli_num_rows($result1) > 0) {
    // display the messages 
    
    while($row = mysqli_fetch_assoc($result1)) {
        $client_name=$row["first_name"]." ".$row["last_name"];
        $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $client_name, $matches);

    $result = implode('', $matches[0]);

    $result = strtoupper($result);
        $consulting_log_id= $row["consulting_log_id"];
        $message_date= $row["message_date"];
        $message_text= $row["message_text"];
        $admin_or_not= $row["admin_or_not"];

        //if admin or not 
        if ($admin_or_not=="0") {
            //client output

            echo "<li class='right clearfix'>
                    <span class='chat-img pull-right'>
                            <img src='http://placehold.it/50/FA6F57/fff&amp;text=".$result."' alt='User Avatar' class='img-circle'>
                    </span>
                <div class='chat-body clearfix'>
                    
                        <small class='text-muted'>
                            <i class='glyphicon glyphicon-time'></i> ".$message_date."</small>
                        <strong class='pull-right'>". $client_name."</strong>
                  
                    <p>".$message_text."</p>
                </div>
            </li>";
           
        } else {
            //admin output

            echo "<li class='left clearfix'>

                    <span class='chat-img pull-left'>
                            <img src='http://placehold.it/50/55C1E7/fff&text=AA' alt='User Avatar' class='img-circle'>
                    </span>
                                           
                    <div class='chat-body clearfix'> 
                        <div class='header'>                                       
                            <strong class='primary-font'>Alcibiades Acosta</strong>
                            <small class='pull-right text-muted'>
                                <i class='glyphicon glyphicon-time'></i> ".$message_date."</small>  
                        </div>                                    
                        
                        <p>
                            ".$message_text."
                        </p>
                    </div>
                </li>";
        }
   
        
    }
} else {
    //if there are no messages in the consulting display messages in the chat
    echo "<h3 align='center'>No Messages Recived!</h3>";
}
 echo "</ul>";


 ?> 
    
    