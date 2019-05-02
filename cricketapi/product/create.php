<?php

include_once 'C:\xampp\htdocs\cricketapi\config\database.php';
include_once 'C:\xampp\htdocs\cricketapi\product\product.php';
 
$database = new Database();
//used to get db connection
$db = $database->getConnection();
 
$product = new Product($db);
 
//file to string conversion
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->age) &&
    !empty($data->state) &&
    !empty($data->id)
){
    $product->name = $data->name;
    $product->age = $data->age;
    $product->state = $data->state;
     $product->id = $data->id;

  
    if($product->create()){
 
        echo json_encode(array("message" => "cricketer is created."));
        
    }
 
   
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create cricketer."));
    }
}

 

?>