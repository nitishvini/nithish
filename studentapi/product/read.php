<?php
include_once 'C:\xampp\htdocs\studentapi\config\database.php';
include_once 'C:\xampp\htdocs\studentapi\product\product.php';
 
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
            "fname" => $fname,
            "lname" => $lname,
            "section" => $section,
            "classes" => $classes,
            "roll" => $roll,
        );
 
        array_push($products_arr["data present"], $product_item);
    }
    echo json_encode($products_arr);
}