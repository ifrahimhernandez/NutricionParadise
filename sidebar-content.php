<?php
if(@$_GET["var"]==3) {
   
// remove all session variables
    session_unset(); 

    // destroy the session 
session_destroy(); 



}


if (@$_SESSION["role"]=="0") {

?>  

 <ul class="nav" id="main-menu">
            <li>
                 <a  href="index.php"><i class="fa fa-home fa-3x"></i> Main Menu</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-search fa-3x"></i>Category<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                         <?php include './php/category_product_side.php'; ?>
                                            
                    </ul>
            </li>
            <li>
                 <a  href="index.php"><i class="fa fa-comments fa-3x"></i>Consulting<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                        
                        <li>
                            <a href="client-consulting-inbox.php"><i class="fa fa-envelope fa-1x"></i>Inbox</a>
                        </li>

                        <li>
                            <a href="client-consulting-new-consulting.php"><i class="fa fa-plus fa-1x"></i>New Consulting</a>
                        </li>
                                            
                    </ul>
            </li>
            <li>
                 <a  href="client-appointment.php"><i class="fa fa-user-md fa-3x"></i>Appointment</a>
            </li>
            <li>
                 <a  href="client-orders.php"><i class="fa fa-book fa-3x"></i>Orders History</a>
            </li>

             <li>
                 <a  href="client-settings.php"><i class="fa fa-cog fa-3x"></i>Settings</a>
            </li>
            <li>
                 <a  href="contact.php"><i class="fa fa-envelope fa-3x"></i>Contact Us</a>
            </li>
                            
              
                         
         </ul>

<?php     
    } 

     if(@$_SESSION["role"]=="1") {
?>

<ul class="nav" id="main-menu">
            
            <li>
                 <a  href="index.php"><i class="fa fa-comments fa-3x"></i>Consulting<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                        
                        <li>
                            <a href="admin-consulting-inbox.php"><i class="fa fa-envelope fa-1x"></i>Inbox</a>
                        </li>

                                                                    
                    </ul>
            </li>
            <li>
                 <a  href="admin-appointment.php"><i class="fa fa-user-md fa-3x"></i>Appointment</a>
            </li>
            <li>
                 <a  href="admin-orders.php"><i class="fa fa-book fa-3x"></i>Orders</a>
            </li>
            <li>
                 <a  href="admin-inventory.php"><i class="fa fa-archive fa-3x"></i>Inventory</a>
            </li>

             <li>
                 <a  href="admin-report.php"><i class="fa fa-folder-open fa-3x"></i>Reports</a>
            </li>
            <li>
                 <a  href="admin-settings.php"><i class="fa fa-cog fa-3x"></i>Settings</a>
            </li>
                            
              
                         
         </ul>

<?php

    }

    if (@$_SESSION["role"]=="") {
        ?>
        <ul class="nav" id="main-menu">
            <li>
                 <a  href="index.php"><i class="fa fa-home fa-3x"></i> Main Menu</a>
            </li>
                            
            <li>
                <a href="#"><i class="fa fa-search fa-3x"></i> Category<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <?php include './php/category_product_side.php'; ?>
                                            
                    </ul>
            </li> 
            <li>
                 <a  href="contact.php"><i class="fa fa-envelope fa-3x"></i>Contact Us</a>
            </li>
                         
         </ul>
        <?php
    }

 ?>