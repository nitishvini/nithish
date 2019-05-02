<?php

include_once 'C:\xampp\htdocs\studentapi\config\database.php';
include_once 'C:\xampp\htdocs\studentapi\product\product.php';
 
$database = new Database();
//used to get db connection
$db = $database->getConnection();
 
$product = new Product($db);
 

$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->fname) &&
    !empty($data->lname) &&
    !empty($data->classes) &&
    !empty($data->section)&&
    !empty($data->roll)
){
    $product->fname = $data->fname;
    $product->lname = $data->lname;
    $product->section = $data->classes;
    $product->classes= $data->section;
     $product->roll = $data->roll;

  
    if($product->create()){
 
        echo json_encode(array("message" => "Product is created."));
        
    }
 
   
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}

 

?>