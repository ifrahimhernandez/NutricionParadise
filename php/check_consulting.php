<?php 
 
 $sql="SELECT * FROM `consulting_log` where user_id = '".$_SESSION["user_id"]."' AND active='0' LIMIT 1";

 $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $id=$row["consulting_log_id"];
    $active=$row["active"];
    echo "<a  class='btn btn-warning btn-lg pull-left' href='client-send-message.php?consulting_id=".$id."&active=".$active."'>CONTINUE CONSULTING NOW!</a>";
   }
} else {
    ?>

    			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="ifrahim.hernandez-facilitator-1@gmail.com">

                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Online Consultation">
                    <input type="hidden" name="amount" value="40.00">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="cbt" value="Return to The Store">
                    <input type="hidden" name="cancel_return" value="http://nutricionparadis.byethost6.com/client-consulting-new-consulting.php">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="custom" value="Consulting">
                      

                    <!-- Display the payment button. -->
                    <input type="image" class="img-responsive " name="submit" border="0" src="./php/img/checkout-logo-large.png" alt="Check out with PayPal">
                    <img alt="" border="0" width="1" height="1"
                    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                  </form>

    <?php
}


 ?>