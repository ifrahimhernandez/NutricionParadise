
 <?php

 if(@$_GET["var"]==3) {
   
// remove all session variables
    session_unset(); 
}


    if (@$_SESSION["role"]=="0") {

    ?>  
            <a class="navbar-brand" href="index.php" style="
                        padding-bottom: 0px;
                        padding-top: 0px;
                        padding-right: 31px;
                        padding-left: 0px;
                        "><img src="assets/img/Drawing.png"></a>
    <?php     
        } 

     if(@$_SESSION["role"]=="1") {
    	?>  
            <a class="navbar-brand" href="admin-consulting-inbox.php" style="
                    padding-bottom: 0px;
                    padding-top: 0px;
                    padding-right: 31px;
                    padding-left: 0px;
                    "><img src="assets/img/Drawing.png" class="img-responsive" alt="Responsive image"></a>
<?php
        
    }

    if (@$_SESSION["role"]=="") {
        ?>
                <a class="navbar-brand" href="index.php" style="
                    padding-bottom: 0px;
                    padding-top: 0px;
                    padding-right: 31px;
                    padding-left: 0px;
                    "><img src="assets/img/Drawing.png" class="img-responsive" alt="Responsive image"></a>

                    
        <?php
    }

 ?>