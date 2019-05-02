<?php
include_once 'C:\xampp\htdocs\cricketapi\config\database.php';
include_once 'C:\xampp\htdocs\cricketapi\product\product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$stmt = $product->read();
$num = $stmt->rowCount();
if($num>0){
    $products_arr=array();
    $products_arr["data present"]=array();
    //fectching done in the pdo form
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "name" => $name,
            "age" => $age,
            "state" => $state,
            "id" => $id,
           
        );
 
        array_push($products_arr["data present"], $product_item);
    }
    echo json_encode($products_arr);
}