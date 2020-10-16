<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object

if(isset($_GET['id']))
$id = $_GET['id'];

$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
// query products
$result = $product->read($id);
$num = $result->num_rows;
// check if more than 0 record found

// read product
// function read($id)
// {
//    if($id == '')
//    {
//        //read_all
//        $where = '';
//    }else{
//        //read_one
//        $where = " WHERE id = $id ";
//    }
//    // select query
//    $query = " SELECT * FROM $this->table_name $where ";
//    $result = $this->conn->query($query);
//    return $result;
// }
if($num>0){
    // products array
    $products_arr=array();
    // product data ophalen
    while ($row = $result->fetch_assoc()){
        extract($row);
        $product_item=array(
            "id" => $id,
            "naam" => $naam,
            "beschrijving" => $beschrijving,
            "prijs" => $prijs
        );
        array_push($products_arr, $product_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    //var_dump($products_arr);
    //echo($products_arr[0]['id']);
    echo json_encode($products_arr);
 }
 else{
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Geen producten gevonden")
    );
 }