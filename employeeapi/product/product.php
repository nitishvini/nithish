<?php
class Product{
 
    // here the two variables for database connection and tablename
    private $conn;
    private $table_name = "employee";
 
  
    public $empname;
    public $empage;
    public $experience;
    public $id;
    
    public function __construct($db){
        $this->conn = $db;
    }
function read(){
 
    // query statement in the PDO form
    $query = "SELECT * from  " . $this->table_name . "";
               
           
   
    $stmt = $this->conn->prepare($query);
 
    // for query execution
    $stmt->execute();
 
    return $stmt;
}
    
    function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
 
    
    $stmt = $this->conn->prepare($query);
 
   
    $this->id=htmlspecialchars(($this->id));
 
    // bind id  of record to delete
    $stmt->bindParam(":id", $this->id);
 
   
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
     function one(){
 
   
    $query = "SELECT * from  " . $this->table_name . " where id=:id";
               
           
    // query statement in the PDO form
    $stmt = $this->conn->prepare($query);
           $this->id=htmlspecialchars(($this->id));
 
    // bind id  of record to delete
    $stmt->bindParam(":id", $this->id);
 
    // for query execution
    $stmt->execute();
 
    return $stmt;
}
    
}