<?php 



$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
$i=1;
 $datatable ="";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $datatable .="<tr>";
        $datatable .="<td>".$i."</td>";
        $datatable .="<td>". $row["product_name"]."</td>";
        $datatable .="<td>". $row["category_name"]."</td>";
        $datatable .="<td>". $row["quantity"]."</td>";
        $datatable .="<td>$". $row["price"]."</td>";
        $datatable .="<td><a type='button' class='btn btn-warning btn-md ' data-toggle='modal' data-target='#myModal".$row["product_id"]."'><i class='fa fa-pencil fa-1x'></i>&nbsp;Edit</a>&nbsp;";

        if ($row["disable_product"]=='0') {
        	 $datatable .="<a type='button' class='btn btn-danger btn-md' id='disable".$row["product_id"]."' onclick='disable(".$row["product_id"].")'>Disable</a></td>";
        } else {
        	$datatable .="<a type='button' class='btn btn-success btn-md' id='enable".$row["product_id"]."' onclick='enable(".$row["product_id"].")'>Enable</a></td>";
        }
        
        $datatable .="</tr>";
        
		$i++;
    }
    echo $datatable;
}
?>