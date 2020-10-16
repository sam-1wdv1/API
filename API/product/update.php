<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object

$id = $_POST['id'];
$naam = $_POST['naam'];
$beschrijving = $_POST['beschrijving'];
$prijs = $_POST['prijs'];
$categorie_id = $_POST['categorie_id'];

$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
$sql=" SELECT `*` FROM `product` WHERE `*`= '$Product' ";
// query products
$result = $product->update();

if(mysqli_fetch_assoc($result)){
    $sqli="UPDATE product SET id='$id', naam='$naam', beschrijving='$beschrijving', prijs='$prijs', categorie_id='$categorie_id' WHERE '*' ='$product'";
    $result1=execute_sql("product",$sqli);
    if($result){
        echo '{
            "Message": "SUCCES",
            "Result": {"IsOK" : true}
          }';
    }
}else{
    echo '{
            "Message": "ERROR",
            "Result": {"IsOK" : false}
          }';
}
mysqli_close();