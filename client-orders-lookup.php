<?php 
session_start();
include './php/Connection/connection.php';   
if(!isset($_SESSION['role']) || $_SESSION['role']==1)
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
                        <h2><!-- <i class="fa fa-book fa-1x"></i>&nbsp; --> Order Details</h2>
                        <h5>The order detail will be deplayed above and it will show weather the order was shipped.</h5>
                   
                      </div>
                </div>
                <hr>
              
                

                
                <div class="row" style="width: 80%;margin: auto;">
                  
                  <?php include './php/get_order_info.php'; ?>

                <h3><strong>Order # : <?php echo $order_id;?></strong></h3><br><br>
                 
                

                            <div class="col-xs-12 col-md-6 text-right">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h5 class="text-left"><strong><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Delivery Status</strong></h5>
                        </div>
                        <div class="panel-body">

                   <div class="table-responsive">
                          <table class="tabla">
                      <tbody>
                       <tr>
                      <td class="text-left"><strong>Shipping Method :</strong></td>
                      <td class="text-left"><?php echo $shipMeth;?> <br></td>
                    </tr>
                    <tr>
                      <td class="text-left"><strong>Status :</strong></td>
                      <td class="text-left"><?php echo $status;?> <br></td>
                    </tr>
                       <tr>
                      <td class="text-left"><strong>Tracking # :</strong></td>
                      <td class="text-left"><?php echo $trackingnumber;?></td>
                    </tr>
                    <tr>
                      <td class="text-left"><strong>Send Through :</strong></td>
                      <td class="text-left"><?php if ($trackingnumber!='N/A') {
                        echo "USPS";
                      }else{echo "N/A";};?></td>
                    </tr>
                    <tr>
                      <td class="text-left"><strong>Sent Date :</strong></td>
                      <td class="text-left"><?php echo $sent;?> <br></td>
                    </tr>
                  </tbody>
                </table>
                  </div>         

                           
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          <h5 class="text-left"><strong><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Shipping Information</strong></h5>
                        </div>
                      <div class="panel-body">
                            <div class="table-responsive">
                              <table class="tabla">
                          <tbody>
                           <tr>
                          <td class="text-left"><strong>Name :</strong></td>
                          <td class="text-left"> <?php echo $name;?></td>
                        </tr>
                           <tr>
                          <td class="text-left"><strong>Address :</strong></td>
                          <td class="text-left"><?php echo $address;?></td>
                        </tr>
                         <tr>
                          <td class="text-left"><strong>Phone # :</strong></td>
                          <td class="text-left"><?php echo $phone;?> <br></td>
                        </tr>
                        <tr>
                          <td class="text-left"><strong>Email :</strong></td>
                          <td class="text-left"><?php echo $email;?> <br></td>
                        </tr>
                        
                      </tbody>
                    </table>
                      </div>
                      </div>
                    </div>
                  </div>


              



                  </div> 
                  <!-- endr row -->

                  

                   
    
    <div class="row" style="width: 80%;margin: auto;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Order summary</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed">
                <thead>
                                <tr>
                      <td><strong>Item</strong></td>
                      <td class="text-right"><strong>Quantity</strong></td>
                      <td class="text-right"><strong>Price</strong></td>
                      <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                </thead>
                <tbody>
                  <?php echo  $table; ?>

                  <style type="text/css">

                  .invoice-title h2, .invoice-title h3 {
                      display: inline-block;
                  }

                  .table > tbody > tr > .no-line {
                      border-top: none;
                  }

                  .table > thead > tr > .no-line {
                      border-bottom: none;
                  }

                  .table > tbody > tr > .thick-line {
                      border-top: 2px solid;
                  }
                  </style>
                  <tr>
                    <td class="thick-line"></td>
                    <td class="thick-line"></td>
                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                    <td class="thick-line text-right"><?php echo "$".$total;  ?></td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Shipping</strong></td>
                    <td class="no-line text-right"><?php echo "$".$shippingcost;  ?></td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Tax</strong></td>
                    <td class="no-line text-right"><?php echo "$".$tax;  ?></td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right"><?php echo "$".$totalcost;  ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

                
                  
                </div>

                <p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>
</div> 
                  <!-- endr row -->
               

               

            
         <!-- /. PAGE WRAPPER  -->

       
        
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
   
</body>
</html>
