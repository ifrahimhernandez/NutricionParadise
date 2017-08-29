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
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
   
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- table script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
    //$('#example2').DataTable();
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
              
              <div class="row">
                      <div class="col-md-12">

                        <h2><!-- <i class="fa fa-book fa-1x"></i>&nbsp; --> Appointment</h2>
                        <h5> The admin will able to see all appointments for today and will be able to see the appointments that he has complete it and upcoming appointments. </h5>
                   
                      </div>


                </div>
                 <hr>

                <div class="row" style="width: 90%; margin: auto;">

                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp;Today's Appointments</a></li>
                      <li><a data-toggle="tab" href="#menu1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> &nbsp;Search</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-12">

                             <h3> <strong>Appointments Scheduled for : <?php echo date('m/d/Y'); ?></strong></h3><br><br>
                          
                          <div class="table-responsive">

                                 <?php include './php/ad_appointment_table.php'; ?> 

                            </div> 
                      </div>
                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <div class="row" style="margin-top: 30px;">

                          <div class="col-md-4">


                              <div class="form-group well" style="padding-bottom: 43px;">
                                            <strong>Select Type:</strong>
                                            <input class="form-control" id="datepicker" placeholder="Click Here" style="cursor: auto;background-color: white;margin-bottom: 10px;" readonly>
                                            <button type="button" id="search" class="btn btn-info pull-right ">Submit</button>

                               </div> 

                               </div>

                          <div class="col-md-8">
                            <div class="table-responsive">

                                        <div id="dataTable"><p class="text-center lead"> <strong>PLEASE SELECT AN APPOINTMENT DATE</strong></p></div>     
                                        
                                   </div>
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
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/login-registration.js"></script>
    <script src="./js/ad_app_table.js"></script>
    <script src="./js/ad_app_search.js"></script>
    <!-- Datepicker js-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
      $(function() {
        $('#datepicker').datepicker();
      });
     </script>

    
   
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>
</body>
</html>
