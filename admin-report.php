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

    <!-- Datepicker js-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
     

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

              <div class="row">
                      <div class="col-md-12">

                        <h2><!-- <i class="fa fa-book fa-1x"></i>&nbsp; --> Reports</h2>
                        <h5> The admin will able to see all the reports of any day that he wants and a prewview as well. </h5>
                   
                      </div>


                </div>
                 <hr>
              
            
               

    <div class="row" style="width: 90%; margin: auto;">

        



        <div class="col-md-5">
                <div class="row">
                    
                    <div class="col-sm-12">  
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title"><strong><i class="fa fa-folder-open fa-1x"></i>&nbsp;Report</strong></h3>
                            </div>
                            <div class="panel-body">
                                      <div class="col-md-10 col-md-offset-1 ">
                                         <form action="./php/report_preview.php" method="POST">
                                                <div class="form-group">
                                                  <label for="from"><strong>From:</strong></label>
                                                  <input type="text" id="from" name="from" class="form-control" readonly  placeholder="Click Here" style="cursor: auto;background-color: white;">
                                                  <label for="to"><strong>To:</strong></label>
                                                  <input type="text" id="to" name="to" class="form-control" readonly  placeholder="Click Here" style="cursor: auto;background-color: white;">
                                                   
                                                </div>
                                                <div class="form-group">
                                            <strong>Select Type:</strong>
                                                <select id="report" name="report" class="form-control">
                                                    <option>Orders</option>
                                                    <option>Appointments Attended</option>
                                                    <option>Online Consulting</option>
                                                </select><br> </div>
                                                <input type="hidden" name="repY" id="repY" value="1">
                                                <button type="submit" id="repA" class="btn btn-success pull-right" >Generate</button>
                                        </form>
                                    </div>
                            </div>
                          </div>    
                    </div>
                </div>  
        </div> 


        <div class="col-md-7">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><strong>Preview</strong></h3>
                    </div>
                    <div class="panel-body">
                      <div id="preview"><label style='display: block;text-align: center;'><h4><b>NO PREVIEW AVAILABLE</b><h4></label><input type='hidden' name='notAllow' id='notAllow' value='no'></div>
                    </div>
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
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="./js/reports.js"></script>
    
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>

   
</body>
</html>
