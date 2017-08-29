<?php 
session_start();
 include './php/Connection/connection.php';  
if(!isset($_SESSION['role']) || $_SESSION['role']==0)
{
header('Location: index.php');
exit();
}

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


                <div class="row">
                      <div class="col-md-12">
                        <h2><!-- <i class="fa fa-book fa-1x"></i>&nbsp; --> Settings</h2>
                        <h5>Change your password for security porpuses</h5>
                   
                      </div>
                </div>
                 <hr>
              
                
                
                
                <div class="row" style="
    width: 90%;
    margin: auto;
">


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"> <strong>Password</strong></a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">

    
      <!-- Change Password -->
<div class="row" >
       <div class=" col-md-6" style="margin-top: 30px;">
                
                
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <i class="fa fa-wrench fa-1x"></i> <strong>Change Password</strong>
                  </h4>
                </div>
                
                  <div class="panel-body">
                    
                            <form class="form-horizontal" id="PassForm">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Current Password</label>
                                <div class="col-sm-7">
                                  <input type="password" class="form-control" id="inputPassword1" required >
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">New Password</label>
                                <div class="col-sm-7">
                                  <input type="password" class="form-control" id="inputPassword2" required title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd1" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = this.value;
" >
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-7">
                                  <input type="password" class="form-control" id="inputPassword3" required title="Please enter the same Password as above" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd2" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
" >
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-4 col-md-4 col-xs-4">
                                  <button type="button" id="newpassword" class="btn btn-success btn-md " > <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Update</button>
                                </div>
                              </div>
                            </form>
                     

                  </div>
                
                </div>
                </div>
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
   
    <script src="./js/change_password_admin.js"></script>
  
   
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>
</body>
</html>
