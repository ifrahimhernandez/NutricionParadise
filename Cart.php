<?php 
     session_start();
?>

      <?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');


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
        <script src="assets/js/jquery-1.10.2.js"></script>

    
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>

     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php 
   
    include 'login-registration.php';
     ?>
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="
                    padding-bottom: 0px;
                    padding-top: 0px;
                    padding-right: 31px;
                    padding-left: 0px;
                    "><img src="assets/img/Drawing.png"></a>
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
            <div id="page-inner2">

                <div class="row">
                      <div class="col-md-12">
                        <h2><!-- <i class="fa fa-book fa-1x"></i>&nbsp; --> Shopping Cart</h2>
                                           
                      </div>
                </div>
                <hr>
                 
                <?php include './php/get_items.php'; 
                include './php/shipping_info.php';
                ?> 
             <div class=" smaller " style="    width: 90%;">
                
                <?php if (isset($_SESSION["cart_array"]) || count(@$_SESSION["cart_array"]) >= 1) {
                       
                   ?>
                    <a style="float: right;margin-right: 15px;margin-top: 10px;background-color: #999;color: white;" href="Cart.php?cmd=emptycart"  class="btn btn-default">Empty Cart!</a>
                <br>
                <br><br>
                    <?php
                    }
                    ?>
                
                
                <div class="panel-body">             

              
            <div class="table-responsive">
            <table class="table table-hover ">
                <thead>
                    <?php if (isset($_SESSION["cart_array"]) || count(@$_SESSION["cart_array"]) >= 1) {
                       
                   ?>
                    <tr>
                        <th class='text-left' style="width: 15%;">Product</th>
                        
                        <th class='text-center' style="width: 10%;">Price</th>
                        <th class='text-center' style="width: 10%;">Quantity</th>
                        <th class='text-center' style="width: 20%;">Total</th>
                        <th class='text-center' style="width: 15%;">Remove</th>
                    </tr>
                    <?php
                    }
                    ?>

                </thead>
                
                <tbody>
                    <?php echo $cartOutput; ?>
                


        



<?php  if (@$cartweighttotal<70) {  //if weight from the cart is over 70 lb cant do the order?>

               


                   <?php if (isset($_SESSION["cart_array"]) || count(@$_SESSION["cart_array"]) >= 1) {

                        //select input for shipping


                         if (isset($_SESSION["role"]) && @$_SESSION['role'] == "0" && isset($_SESSION["cart_array"]) && count(@$_SESSION["cart_array"]) >= 1) {
               

                    //shipping method 
                          ?>
                    <tr>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td class="text-right"> Shipping Method </td>
                  <td> 

                    <?php 
                    //shipping method select
                          $i=0; 
                          

                          print "
                          <form action='Cart.php' method='post' name='f1'>
                          <select class='form-control' name='shippingcost' id='A1'onchange='  selected(this.options[this.selectedIndex].text); this.form.submit();'>";



                          foreach($rates as $company => $codes) {
                                foreach($codes as $code => $rate){ 
                                  
                                  
                                  if(!empty($rate) && $config["to_country"]=='US'){

                                      // is the past chosen method fro the shipping $_SESSION['select']

                                    if(@$_SESSION['select']==$services[$company][$code] ){

                                      // this is the cost that I get from Usps depending the weight of eery product $services[$company][$code];

                                      print "
                                      <option name='shipping".$i."' selected='selected' value='".$rate."'>".$services[$company][$code]."</option>
                                     ";

                                      @$cost=$rate;


                                    }else{
                                  print "
                                      <option name='shipping".$i."' value='".$rate."'>".$services[$company][$code]."</option>
                                     ";


                                     
                                  }

                                  

                              }

                              if (!isset($_SESSION['select']) && $i==1) {
                               $_SESSION['select']=$services[$company][$code];
                              }

                              if (!isset($cost)  && $i==1 ) {
                                      
                                        
                                        $cost=$rate;
                                     }
                                     $i++;
                            }

                          }


                          if(  empty($rate) || $config["to_country"]!='US'){

                                print "
                                      <option name='shipping'>None</option>
                                     ";
                                     $_SESSION['select']="None";
                                     $cost=0.00;
                              }
                          print "
                          <input type='hidden' name='test_text'  id='A2' value='' />
                          </select></form><br>";

                          //grand total
                           $cartTotal=floatval(preg_replace("/[^-0-9\.]/","",$cartTotal));
                              
                              $superTotal= $cartTotal+$cost+$tax;
                              $superTotal= number_format($superTotal, 2);

                              

                          } 

                 ?></td>
                </tr>
                   
                   
                   
                <tr>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td class="text-right">Sub-Total:</td>
                  <td class="text-right"><strong> $<?php echo number_format($cartTotal, 2); ?></strong></td>
                </tr>


                   <?php

                   //Paypal Start button

              $last='   <input type="hidden" name="return" value="http://nutricionparadis.byethost6.com/client-transaction.php">
                        <input type="hidden" name="rm" value="2">
                        <input type="hidden" name="tax_cart" value="'.@$tax.'">
                        <input type="hidden" name="handling_cart" value="'.@$cost.'">
                        <input type="hidden" name="cbt" value="Return to The Store">
                        <input type="hidden" name="cancel_return" value="http://nutricionparadis.byethost6.com/cart.php">
                        <input type="hidden" name="lc" value="US">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="image" class="img-responsive pull-right" name="submit" border="0" src="./php/img/checkout-logo-large.png" alt="Check out with PayPal">
                        </form>';

                    }
                    ?>
                <?php 

                // if the client is login show the payment method

                if (isset($_SESSION["role"]) && @$_SESSION['role'] == "0" && isset($_SESSION["cart_array"]) && count(@$_SESSION["cart_array"]) >= 1) { ?>
                

                <tr>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td class="text-right">Shipping:</td>
                  <td class="text-right"><strong><?php @$_SESSION['shipping']=$cost; echo "$".$cost; ?></strong></td>
                </tr>
                <tr>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td class="text-right">Tax:</td>
                  <td class="text-right"><strong>$<?php @$_SESSION['tax']=$tax; echo $tax; ?></strong></td>
                </tr>
                <tr>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td class="text-right"><h3>Total:</h3></td>
                  <td class="text-right"><h3><strong>$<?php @$_SESSION['total']= $superTotal; echo $superTotal; ?></strong></h3></td>
                </tr>

                

                <tr>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td> &nbsp; </td>
                  <td ><?php echo $pp_checkout_btn;  echo @$last; ?></td>
                </tr>
                
                 
                </tbody>

                        </table>
                        </div>
                <?php 
                //shipping  info
                echo "

                        <div class='row'>

                        <div class='col-md-6 col-md-offset-6'>

                        <div class='panel panel-default'>
                                        <div class='panel-heading'>
                                          <h4 class='panel-title'>
                                            <i class='fa fa-plane fa-1x'></i>
                                            Shipping Information
                                          </h4>
                                        </div>
                                        
                                          <div class='panel-body'>

                                           
                                           <div class='table-responsive'>
                                                      <table class='tabla'>
                                                  <tbody>
                                                   <tr>
                                                  <td class='text-left'><strong>Name</strong></td>
                                                  <td class='text-left'> ".$client_name."</td>
                                                </tr>
                                                <tr>
                                                  <td class='text-left'><strong>Email</strong></td>
                                                  <td class='text-left'>".$email."</td>
                                                </tr>
                                                   <tr>
                                                  <td class='text-left'><strong>Address</strong></td>
                                                  <td class='text-left'>".$address."</td>
                                                </tr>
                                                 <tr>
                                                  <td class='text-left'><strong>Phone</strong></td>
                                                  <td class='text-left'>".$phone."<br></td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>

                                            <div class='text-right'><a href='client-settings.php' class='btn btn-info'>Change Shipping</a></div>
                                              </div>
                                          </div>
                                        
                                        </div>

                          
                        </div>";



              
                
                }else{
                  echo "</tbody>

                        </table>
                        </div>";
                }
             } ?>
            </div>
             <?php include './php/other_products.php'; ?>  
</div>



       
             <br>

             





            
              
            </div>

<p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>
          </div>
         <!-- /. PAGE WRAPPER  -->
          
         
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
    <script src="assets/js/login-registration.js"></script>
    <script src="./js/login.js"></script>
    <script src="./js/registration.js"></script>



  


   
</body>
</html>


