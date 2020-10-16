<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   function read($id)
   {
    if($id == '')
    {
        //read_all
        $where = '';
    }else{
        //read_one
        $where = " WHERE id = " . $id;
    }
    // select query
    $query = " SELECT * FROM " . $this->table_name . $where;
    $result = $this->conn->query($query);
    return $result;
}
}