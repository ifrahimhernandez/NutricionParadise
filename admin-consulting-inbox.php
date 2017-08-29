<?php 
session_start();
   
if(!isset($_SESSION['role']) || $_SESSION['role']==0)
{
header('Location: index.php');
exit();
}
include './php/Connection/connection.php';
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
    <!-- table scripts -->
   <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script><style type="text/css"></style>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
          "order": [[ 4, "asc" ]]
        });
        
    } );

    </script>
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
font-size: 16px;"> <?php include 'login-content.php';?></div>
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

                        <h2> Inbox</h2>
                        <h5> The admin will be able to check the messages with all the clients in the system.</h5>
                   
                      </div>

                      <?php include './php/new_messages_admin.php'; ?>
                      <div class="col-md-3 col-sm-6 col-xs-6 pull-right">           
                          <div class="panel panel-back noti-box" style=" margin-bottom: 0px;">
                                    <span class="icon-box bg-color-red set-icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <div class="text-box">
                                        <p class="main-text"><?php echo $messages; ?> New</p>
                                        <p class="text-muted">Messages</p>
                                    </div>
                                 </div>
                             </div>

                </div>


                 <hr>
               <div class="row" style="width: 90%;margin: auto;">
                    <div class="table-responsive">

                      <?php include './php/admin-inbox-table.php'; ?>
                       
                    </div>
                </div>
               

               

            </div>
            <p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    
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
    <script type="text/javascript">


      function delete1(id) {

        var r = confirm("Sure you want to delete #"+id);
        if (r == true) {

          var delete_consulting = 'delete_id=' + id; 
        
          $.ajax ({
                type: 'POST',
                url: './php/delete_consulting_admin.php',
                data: delete_consulting,
                cache: false,
                              
           }).done(function( data ) {
              alert(data);
              window.location = "admin-consulting-inbox.php";
          });

            
        } 
    };      
    </script>
    
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>
   
</body>
</html>
