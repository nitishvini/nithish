<?php

include_once 'C:\xampp\htdocs\employeeapi\config\database.php';
include_once 'C:\xampp\htdocs\employeeapi\product\product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 

if(//here the data is checked weather it is empty or not 
    !empty($data->empname) &&
    !empty($data->empage) &&
    !empty($data->experience) &&
    !empty($data->id)
){
    $product->empname = $data->empname;
    $product->empage = $data->empage;
    $product->experience = $data->experience;
     $product->id = $data->id;

    if($product->update()){
 
        echo json_encode(array("message" => "updation ofemployee is performed"));
    }
 
    else{
        echo json_encode(array("message" => "Unable to update employee."));
    }
}
 

?>