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


$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
// query products
$result = $product->read_one();
$num = $result->num_rows;
// check if more than 0 record found

// read product
function read($id)
{
   if($id == '')
   {
       //read_all
       $where = '';
   }else{
       //read_one
       $where = "WHERE id = $id";
   }
   // select query
   $query = "SELECT * FROM $this->table_name $where";
   $result = $this->conn->query($query);
   return $result;
}
