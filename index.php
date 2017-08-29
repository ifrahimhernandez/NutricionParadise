<?php 
     session_start();

?>



      <?php 
    include './php/Connection/connection.php';
     
     // if($_SESSION['role']==1)
     //    {
     //        header("Location: index.php");
     //    }
   
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
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>


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

font-size: 16px;"> 



<?php include 'login-content.php';?>  </div>
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
              <div class="row separate">
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
                                    <img class="slide-image" src="http://bumplusnutrition.com/wp-content/uploads/2015/05/healthy-food-800x300.jpg" alt="">
                                </div>
                                <div class="item active">
                                    <img class="slide-image" src="http://www.gfimedicine.com/wp-content/uploads/2015/07/Foto1-800x300.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://www.irspen.ie/wp-content/uploads/2014/09/screening_tools_800x500-800x300.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
              </div>
               



               

                <div class="row" style="
                    width: 87%;
                    margin: auto;
                ">
                <strong ><h3 style="color: black;margin-left: 16px;">Featured Products:</h3></strong>
                        <br>
                        <br>
                        
                            <?php include './php/featured_products.php'; ?>
                            
                     

                    

                </div>

            </div>
         <!-- /. PAGE WRAPPER  -->

        
        </div>
         <p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>
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
    <script src="./js/login.js"></script>
    <script src="./js/registration.js"></script>

    <script src="./js/lobibox.min.js"></script>
    <?php 
     
    include 'login-registration.php';
    
   
     ?>

</body>
</html>
