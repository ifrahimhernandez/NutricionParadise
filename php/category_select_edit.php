<?php
 include './Connection/connection.php';


if(!empty($_POST["keyword"]) && !empty($_POST["str"])) {
$query ="SELECT DISTINCT category_name FROM product WHERE disable_product='0' AND category_name like '" . $_POST["keyword"] . "%' ORDER BY category_name LIMIT 0,4";

	$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $resultset[] = $row;
    }
}
if(!empty($resultset)) {
?>
<ul id="category-list">
<?php
foreach($resultset as $category) {
?>
<li onClick="selectCategory('<?php echo $category["category_name"]; ?>','<?php echo $_POST["str"]; ?>');"><?php echo $category["category_name"]; ?></li>
<?php } ?>
</ul><br>
<?php } } ?>