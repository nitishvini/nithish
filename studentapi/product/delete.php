<?php

include_once 'C:\xampp\htdocs\studentapi\config\database.php';
include_once 'C:\xampp\htdocs\studentapi\product\product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 

if(//here the data is checked weather it is empty or not 
    
    !empty($data->roll)
){
 
  
   
     $product->roll = $data->roll;

    if($product->delete()){
 
        echo json_encode(array("message" => "the particular tuple is successfully deleted"));
    }
 
    else{
        echo json_encode(array("message" => "Unable to delete product."));
    }
}
 

?>