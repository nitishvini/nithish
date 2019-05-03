<?php
include_once 'C:\xampp\htdocs\employeeapi\config\database.php';
include_once 'C:\xampp\htdocs\employeeapi\product\product.php';
 
$database = new Database();

$db = $database->getConnection();

  $product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

if(//here the data is checked weather it is empty or not 
    
    !empty($data->id)
){
 

     $product->id = $data->id;

$stmt = $product->one();
$num = $stmt->rowCount();
if($num>0){
   
    $products_arr=array();
    $products_arr["data present"]=array();
    
    //fectching done in the pdo form
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "empname" => $empname,
            "empage" => $empage,
            "experience" => $experience,
            "id" => $id,
        );
 
        array_push($products_arr["data present"], $product_item);
    }
    echo json_encode($products_arr);
}
}
?>