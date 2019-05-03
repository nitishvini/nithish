<?php

include_once 'C:\xampp\htdocs\employeeapi\config\database.php';
include_once 'C:\xampp\htdocs\employeeapi\product\product.php';
 
$database = new Database();
//used to get db connection
$db = $database->getConnection();
 
$product = new Product($db);
 
//file to string conversion
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->empname) &&
    !empty($data->empage) &&
    !empty($data->experience) &&
    !empty($data->id)
){
    $product->empname = $data->empname;
    $product->empage = $data->empage;
    $product->experience = $data->experience;
     $product->id = $data->id;

  
    if($product->create()){
 
        echo json_encode(array("message" => "employee is created."));
        
    }
 
   
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create employee."));
    }
}

 

?>