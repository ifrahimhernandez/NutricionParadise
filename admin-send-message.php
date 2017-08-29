<?php 
session_start();
   
if(!isset($_SESSION['role']) || $_SESSION['role']==0)
{
header('Location: index.php');
exit();
}
include './php/Connection/connection.php';
include './php/conversation_check_admin.php';

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
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
    <link href="assets/css/login-registration.css" rel="stylesheet">
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
padding: 15px 50px 5px 50px;
float: right;
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
                            <h5>This chat allows you to talk to the client in the specific topic consulting.</h5>

                       
                          </div>

                          <div class="col-md-3 "  style="padding-top: 30px;">
                            <?php 
                                //if consulting active 
                                if ($_GET["active"]=="0") {
                                    
                                    ?>
                                    <a type="button" id="end-consulting"class="btn btn-danger btn-lg pull-right" href="client-consulting-inbox.php">End Consulting</a>
                                <?php
                                } 
                                 ?>
                                
                            <br><br>
                           
                                     

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
                                    
                                        <?php include './php/conversation_admin.php'; ?>
                                    
                                </div>

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

                                 
                                

                            </div>
                        </div>
                    </div>

            </div>
            <p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/login-registration.js"></script>
    <link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>


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
                                    $('#mydiv').load('./php/admin_conversation_reload.php?consulting_id='+"<?php echo $_GET['consulting_id']; ?>");
                                
                             }, 2000);
                                
                        });
                
                    };
                    
                });
         });

    </script>

    <script type="text/javascript">
         
        $(document).ready(function(e){
         $.ajaxSetup({cache:false});
         setInterval(function(){
            var i="consulting_id=<?php echo $_GET['consulting_id']; ?>";
            $.ajax({
                    type:'POST',
                    url:'./php/check.php',
                    data:i,
                    
                }).done(function( data ) {
                    
                    if (data==true) {

                        $('#mydiv').load('./php/admin_conversation_reload.php?consulting_id='+"<?php echo $_GET['consulting_id']; ?>");
                        // var objDiv = document.getElementById("mydiv"); //scroll to the buttom
                        // objDiv.scrollTop = objDiv.scrollHeight;
                    };
                    
                });

            

     }, 2000);
        });

    </script>

    <script type="text/javascript"> 

         $(document).ready(function(){
             
             $("#end-consulting").click(function(){


                var form = 'consulting_id='+"<?php echo $_GET['consulting_id']; ?>";

                if (confirm("You really want to stop the consulting? After you hit click the session will be over.") == true) {
                    
                     $.ajax({
                            type:'POST',
                            url:'./php/end_consulting.php',
                            data:form,
                            
                        }).done(function( data ) {
                            if(data==true){
                                alert("The consulting # <?php echo $_GET['consulting_id']; ?> is over!");
                                
                                window.location.href = "admin-consulting-inbox.php";

                          

                            }else{
                                alert(data);
                            }
                            
                            
                        });
                }else{
                    return false;
                }

             });

         });

    </script>                    
        
    

   
</body>
</html>
