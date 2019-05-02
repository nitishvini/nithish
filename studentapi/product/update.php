<?php

include_once 'C:\xampp\htdocs\studentapi\config\database.php';
include_once 'C:\xampp\htdocs\studentapi\product\product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 

if(//here the data is checked weather it is empty or not 
    !empty($data->fname) &&
    !empty($data->lname) &&
    !empty($data->section) &&
    !empty($data->classes)&&
    !empty($data->roll)
){
 
  
    $product->fname = $data->fname;
    $product->lname = $data->lname;
    $product->section = $data->section;
    $product->classes= $data->classes;
     $product->roll = $data->roll;

    if($product->update()){
 
        echo json_encode(array("message" => "updation is performed"));
    }
 
    else{
        echo json_encode(array("message" => "Unable to update product."));
    }
}
 

?>
