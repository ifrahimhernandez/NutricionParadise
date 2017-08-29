<?php 


$sql = "SELECT DISTINCT category_name, COUNT(*) as `cantidad` FROM `product` where disable_product='0' GROUP BY category_name ORDER BY category_name";
$result = mysqli_query($conn, $sql);
$jsonData = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($r = mysqli_fetch_assoc($result)) {
         $row[0] = $r["category_name"];
         $row[1] = $r["cantidad"];
         array_push($jsonData,$row);
    }
    
   // print json_encode($rows, JSON_NUMERIC_CHECK);
} 


 ?>