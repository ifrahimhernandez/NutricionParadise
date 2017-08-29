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

     <?php 
     
    include 'login-registration.php';
    
   
     ?>

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
    <link href="assets/css/jquery.typeahead.css" rel="stylesheet"/>
    <!-- table script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
         ['Category', 'Amount'],
             <?php 
          $query = "SELECT DISTINCT category_name, COUNT(*) as `cantidad` FROM `product` where disable_product='0' GROUP BY category_name ORDER BY category_name";
 
          $exec = mysqli_query($conn,$query);
          while($row = mysqli_fetch_array($exec)){
 
          echo "['".$row['category_name']."',".$row['cantidad']."],";
          }
    ?>
        ]);
 
        var options = {
          title: 'AMOUNT OF PRODUCTS IN A CATEGORY'
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
        chart.draw(data, options);
      }
    </script>

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
                        <h2> Inventory</h2>
                        <h5>The admin will be able to add and edit products and categorys form the sales department.</h5>
                   
                      </div>
                </div>
                <hr>

               <div class="row">
              <div  style="width: 90%;margin: auto;">

                 <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home"><strong><i class="glyphicon glyphicon-plus"></i> Add Products</strong></a></li>
                  <li><a data-toggle="tab" href="#menu1"><strong><i class="fa fa-edit fa-1x"></i> Edit Products</strong></a></li>
                  
                </ul>

                <!-- Upload Product info -->
               

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      
                        <!-- Add Products -->
                        <div class="row" style="margin-top: 30px;">
               <div class="col-md-5" >
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add Product
                  </h4>
                </div>



                <div id="collapse5" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="col-md-12 " >
                        <form onsubmit="return validateForm(); return validateFileExtension(this.fileField)" method="POST" action="./php/upload_new_product.php"  enctype="multipart/form-data">
                            
                <div class="form-group">
                   <input type="text" id="product_name" name="product_name" placeholder="Product Name" tabindex="1" class="form-control" required>
                </div>
                <div class="form-group">
                     <input type="file" id="myimage" name="myimage" tabindex="1"  class="form-control btn btn-default" placeholder="Upload Photo" required onchange="return validateFileExtension(this)">
                </div>
                 <div class="form-group">
                    <input type="text" id="search-box" name="search-box"  placeholder="Select or Add Category" class="form-control" required/>
                    <div id="suggesstion-box"></div>
               </div>

                <div class="form-group">
                     <input type="number" min="0" id="product_quantity" name="product_quantity" step="1" placeholder="Quantity" tabindex="1" class="form-control" required>
                </div>

                <div class="form-group">
                     <input type="number" min="0" id="product_weight" name="product_weight" step="0.01" placeholder="Weight (Ounces)" tabindex="1" class="form-control" required>
                </div>

                <div class="form-group">
                     <input type="number" min="0" id="product_price" name="product_price" step="0.01" placeholder="Price" tabindex="1" class="form-control" required>
                </div>

                <div class="form-group">
                     <textarea class="form-control" placeholder="Short Description" id="product_short" name="product_short" rows="2" required></textarea>
                </div>

                <div class="form-group">
                     <textarea class="form-control" placeholder="Long Description" rows="4" id="product_long" name="product_long" required></textarea>
                </div> 

                <button type="submit" class="btn btn-primary pull-right btn-md" id="add_product">Submit</button>

                        </form>
                    </div>
                  </div>
                </div>
                </div>
</div>

 <div class="col-md-7" >
<div id="piechart" class="img-responsive" style="width: 950px; height: 550px;"></div>
</div>

</div>




                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <!-- Edit-->
                 <?php //include './php/edit_post.php'; ?>                
                  <div class="panel-body">
                     
                          <div class="row" >
                         <div class="col-md-12" >
                         <br> 
                        <div class="table-responsive">

                        <table class="table table-striped " id="example" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                             <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include './php/inventory_edit.php'; ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                 
                </div>
                </div>
                </div>
                </div>
                      

                    </div>
                  </div>
               <p class="text-center">&copy; 2016 Ifrahim Hernandez. All Rights Reserved. </p>

                

              
            </div>
         <!-- /. PAGE WRAPPER  -->

        </div>
     <!-- /. WRAPPER  -->

      

         <!-- Modal -->
      <?php include './php/edit_modal.php'; ?>
        
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
 

      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="./js/inventory_add.js"></script>
    <script src="./js/edit_product.js"></script>

   
 
<link rel="stylesheet" href="assets/css/lobibox.min.css"/>

    <script src="./js/lobibox.min.js"></script>
    
   
</body>
</html>
