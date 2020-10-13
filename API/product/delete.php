<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
$sql="SELECT `*` FROM `product` WHERE `*`= '$Product' ";
// query products
$result = $product->delete();

if(mysqli_fetch_assoc($result)){
    $sql1="DELETE FROM product WHERE product='$product'";
    $result1=execute_sql($link,"product",$sqli);
    if($result1){
        echo '{
            "Code": 0,
            "Message": "Deleted",
            "Result": {"IsOK" : true}
          }';
    }
}else{
    echo '{
            "Code": 1,
            "Message": "ERROR",
            "Result": {"IsOK" : false}
          }';
}
mysqli_close($link)
?>
