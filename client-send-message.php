<?php 
session_start();
   
if(!isset($_SESSION['role']) || $_SESSION['role']==1)
{
header('Location: admin-consulting-inbox.php');
exit();
}
include './php/Connection/connection.php';

include './php/conversation_check.php';

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    

      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nutricion Paradise</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
   
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                    <?php

                    include "logo-link.php";

                    ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
  <div style="color: white;
padding: 15px 0px 1px 0px;
font-size: 16px;"> <?php include 'login-content.php';?>  </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <?php 
                include 'sidebar-content.php';
                ?>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                        
                        <div class="row" style="width: 90%;margin: auto;">
                          <div class="col-md-9">


                            <h2>Message System</h2>
                            <h5>This chat allows you to talk to the doctor in the specific topic.</h5>
                       
                          </div>

                          
                    
                    </div>
                    <hr>
                      
                    <div class="row" style="width: 90%;margin: auto;">
                        <div class="col-md-12" >
                            
                            <br>
                            
                            <div class="chat-panel panel panel-default chat-boder chat-panel-head">
                                <div class="panel-heading">
                                    <i class="fa fa-comments fa-fw"></i>
                                    Chat Box
                                    
                                </div>

                                <div class="panel-body" id="mydiv">
                                    
                                        <?php include './php/conversation.php'; ?>
                                    
                                </div>


                                <?php 
                                //if consulting active 
                                if ($_GET["active"]=="0") {
                                    
                                    ?>

                                    <div class="panel-footer">
                                    
                                        <div class="input-group">
                                            <input id="btn-input" type="text" class="form-control input-sm" required placeholder="Type your message to send...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-warning btn-sm" id="btn-chat" type="button">
                                                    Send
                                                </button>
                                            </span>
                                        </div>
                                    
                                </div>

                                    <?php
                                } 
                                 ?>
                                

                            </div>
                        </div>
                    </div>
               

               

            </div>
         <!-- /. PAGE WRAPPER  -->
         <p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <script type="text/javascript"> 
        // var objDiv = document.getElementById("mydiv"); //scroll to the buttom
        // objDiv.scrollTop = objDiv.scrollHeight;
    </script>
<?php   if ($_GET["active"]=="0") { ?>

                 <script type="text/javascript">

        $(document).ready(function(){

                $("#btn-chat").click(function(){
                    
                    var ChatText = $("#btn-input").val();
                    var form = 'ChatText=' + ChatText+ '&consulting_id='+"<?php echo $_GET['consulting_id']; ?>";
                    if (!ChatText) {
                        alert("Please fill the chat input first.");
                        
                    } else{
                            $.ajax({
                            type:'POST',
                            url:'./php/insert_message.php',
                            data:form,
                            
                        }).done(function( data ) {

                           $("#btn-input").val("");
                           $.ajaxSetup({cache:false});
                                 setInterval(function(){
                                    $('#mydiv').load('./php/client-conversation.php?consulting_id='+"<?php echo $_GET['consulting_id']; ?>");

                             }, 2000);
                                
                        });
                
                    };
                    
                });
         });

    </script>
 <?php
        } 
         ?>
    <script type="text/javascript">
         
        $(document).ready(function(e){
         $.ajaxSetup({cache:false});
         setInterval(function(){
            var i="consulting_id=<?php echo $_GET['consulting_id']; ?>";
            $.ajax({
                    type:'POST',
                    url:'./php/check_client.php',
                    data:i,
                    
                }).done(function( data ) {
                    
                    if (data==true) {

                        $('#mydiv').load('./php/client-conversation.php?consulting_id='+"<?php echo $_GET['consulting_id']; ?>");
                    };
                    
                });

            

     }, 2000);
        });
    </script>

                        

       
   
   
</body>
</html>
