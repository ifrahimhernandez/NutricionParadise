<?php 
     session_start();

?>



      <?php 
    include './php/Connection/connection.php';
     
  if(@ $_SESSION['role']==1)
{
header('Location: admin-consulting-inbox.php');
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
              
                  <div class="row">
                      <div class="col-md-12">
                        <h2><!-- <i class="fa fa-calendar fa-1x"></i>&nbsp; --> Contact Us</h2>
                                       
                      </div>
                </div>
                <hr>
              
                <div style="width: 90%;margin: auto;">
                
               


                <div class="row">

                     
                <div class="col-md-6 " >

                    <div class="panel-group">
                    
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3><strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> &nbsp;Office Information</strong></h3></div>
                      <div class="panel-body">

                           
                        <iframe frameborder="0" scrolling="yes" class="img-responsive" marginheight="0" marginwidth="0" width="635" height="443" src="https://maps.google.com/maps?hl=en&q=centro de nutricion y terapia&ie=UTF8&t=roadmap&z=12&iwloc=B&output=embed" style="border: 1px solid;"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://buyproxies.io/">private proxy</a></small></div></iframe><br>

                        <h3><strong>Contact Information</strong></h3>
                        <address>
                        <strong>Centro de Nutricion y Terapia</strong><br>
                            107 Essex St<br>
                            01840<br>
                            Lawrence,MA<br>
                            United States<br>
                            <abbr>Telephone:</abbr> (978)-685-3313
                       </address>


                      </div>
                    </div>

                   

                   
                    
                    
                    </div>

                    

                </div>

                <div class="col-md-6 " >

                    <div class="panel panel-default">
                      <div class="panel-heading"><h3><strong> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> &nbsp;Contact Us</strong></h3></div>
                      <div class="panel-body">

                                <br>
                                <form class="form-horizontal" id="contact"   role="form" >
                                <fieldset>
                                        
                                        <div class="col-md-10 col-md-offset-1">
                                        <strong>Name </strong>&nbsp; <input class="form-control " type="text" pattern="[a-zA-Z\s]+"  name="contact_name"  required >
                                        <br>
                                        
                                         <strong>Email </strong><br>
                                        <input class="form-control " type="email"  name="contact_email"  required >
                                        <br>

                                        <strong>Subject </strong><br>
                                        <input class="form-control " type="text" pattern="[a-zA-Z\s]+"  name="contact_subject"  required >
                                   
                                <br><label>Message:</label><br>
                                <textarea class="form-control" rows="4" name="message" id="message" required></textarea><br>
                                <button id="contact_button"  class="btn btn-success btn-sm pull-right"  type="submit">Submit</button><br><br><br>

                                </div>
                                </fieldset>
                                </form>


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
    <script src="assets/js/login-registration.js"></script>
    <script src="./js/login.js"></script>
    <script src="./js/registration.js"></script>
    <script type="text/javascript">

      $("#contact").submit(function(e){
          
          $.ajax({
              type : 'POST',
              data: $("#contact").serialize(),
              url : './php/contact_info.php',
              success : function(data){
                  alert(data);
              }
          });
          
      });
         </script>    
    <?php 
     
    include 'login-registration.php';
    
   
     ?>

</body>
</html>
