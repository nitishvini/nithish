<?php

include_once 'C:\xampp\htdocs\cricketapi\config\database.php';
include_once 'C:\xampp\htdocs\cricketapi\product\product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 

if(//here the data is checked weather it is empty or not 
    !empty($data->name) &&
    !empty($data->age) &&
    !empty($data->state) &&
    !empty($data->id)
){
    $product->name = $data->name;
    $product->age = $data->age;
    $product->state = $data->state;
     $product->id = $data->id;

    if($product->update()){
 
        echo json_encode(array("message" => "updation of cricketer is performed"));
    }
 
    else{
        echo json_encode(array("message" => "Unable to update cricketer."));
    }
}
 

?>