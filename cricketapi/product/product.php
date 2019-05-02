<?php
class Product{
 
    // here the two variables for database connection and tablename
    private $conn;
    private $table_name = "cricket";
 
  
    public $name;
    public $age;
    public $state;
    public $id;
    
    public function __construct($db){
        $this->conn = $db;
    }
function read(){
 
   
    $query = "SELECT * from  " . $this->table_name . "";
               
           
    // query statement in the PDO form
    $stmt = $this->conn->prepare($query);
 
    // for query execution
    $stmt->execute();
 
    return $stmt;
}
    
function create(){
 
    // PDO format of the query
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, age=:age,state=:state,id=:id";
 
    $stmt = $this->conn->prepare($query);
 
    $this->name=htmlspecialchars(($this->name));
    $this->age=htmlspecialchars(($this->age));
    $this->state=htmlspecialchars(($this->state));
    $this->id=htmlspecialchars(($this->id));
    
  //exact value will be taken by the columns
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":age", $this->age);
    $stmt->bindParam(":state", $this->state);
    $stmt->bindParam(":id", $this->id);
 
   
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
    function update(){
 
    // PDO format of the query
    $query = "update 
                " . $this->table_name . "
            SET
                 name=:name, age=:age,state=:state where id=:id";
 
    $stmt = $this->conn->prepare($query);
 
     
    $this->name=htmlspecialchars(($this->name));
    $this->age=htmlspecialchars(($this->age));
    $this->state=htmlspecialchars(($this->state));
    $this->id=htmlspecialchars(($this->id));
    
  //exact value will be taken by the columns
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":age", $this->age);
    $stmt->bindParam(":state", $this->state);
    $stmt->bindParam(":id", $this->id);
   
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
    function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
 
    
    $stmt = $this->conn->prepare($query);
 
   
    $this->id=htmlspecialchars(($this->id));
 
    // bind roll of record to delete
    $stmt->bindParam(":id", $this->id);
 
   
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
}