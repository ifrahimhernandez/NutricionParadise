<?php 
session_start();
   
if(!isset($_SESSION['role']) || $_SESSION['role']==1)
{
header('Location: admin-consulting-inbox.php');
exit();
}

$_SESSION["validcode"]="0"; //for the payment

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
font-size: 16px;"> <?php include 'login-content.php';?> </div>
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

                        <h2>Online Consultation</h2>
                                          
                      </div>


                </div>
                 <hr>
              
               

              <div class="">
                <div class="row">

                  <div class="col-xs-12 col-md-6">
                    <figure class="text-center">
                      <img src="http://myomedicalmd.com/wp-content/uploads/2014/08/bigstock-American-doctor-talking-to-wom-31746053-Resized-728x485.jpg" alt="The Amazing Product" class="img-thumbnail" />
                    </figure>
                  </div>


                <div class="col-xs-12 col-md-4 ">

                   <p class="lead pull-left"> What do we do?</p><br>
                  <p class="pull-left">
                    Here the clients will have a interaction with the doctor and will be able to ask him question just like a normal physical consulting, and the doctor should give you advise on what you can take, or do fix that issue that you might have. Also the doct will be avaliable 24/7 everyday, the response might take 1-2 days depending if is on the weekends it might take longer.
                    <br><br><b>$40 PER SESSION</b>
                  </p>

                  <br><br>
                  
                  <?php include './php/check_consulting.php'; ?>
                   
                </div>

                  

              </div>

              <hr />


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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>
    
   
</body>
</html>
