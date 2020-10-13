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
// query products

$sql="SELECT `*` FROM `product` WHERE `*`= '$product' ";
$result = $product->create();

if(mysqli_fetch_assoc($result)){
    echo '{
        "Code": 0,
        "Message": "ERROR",
        "Result":{"IsOK" : false}
        }';
}else{
    $sql1 = "INSERT INTO product(id,naam,beschrijving,prijs,categorie_id) VALUES('$id','$naam','$beschrijving','$prijs','$categorie_id')";
    $result = execute_sql("product", $sql1);
    if($result){
        echo '{
        "Message": "SUCCES",
        "Result":{"IsOK" : true}
        }';
    }else{
        echo '{
        "Message": "ERROR! (FAILED)",
        "Result":{"IsOK" : false}
        }';
    }
}
mysqli_close();