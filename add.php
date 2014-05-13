<?

include 'mysql_connect.php';

$query = "select `art` from `buffer`"; 
$result = $con->query($query); 
$row = $result->fetch_assoc(); 

$art=$row['art'];


$query = "select `entity_id` from `catalog_product_entity` where `sku`='$art'"; 

$result = $con->query($query);
$row = $result->fetch_assoc(); 
if (mysqli_num_rows($result) != 0) 
{ 

$a=$row['entity_id'];



mysqli_query($con,"INSERT INTO catalog_product_entity_tier_price (entity_id,qty,value) 
VALUES ($a,1000000,1000000)");
}
mysqli_close($con);
header("Location: /skin/price/index.php")
?>
