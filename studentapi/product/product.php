<?php
class Product{
 
    // here the two variables for database connection and tablename
    private $conn;
    private $table_name = "student";
 
  
    public $fname;
    public $lname;
    public $classes;
    public $section;
    public $roll;
    
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
                fname=:fname, lname=:lname,classes=:classes,section=:section,roll=:roll";
 
    $stmt = $this->conn->prepare($query);
 
    $this->fname=htmlspecialchars(($this->fname));
    $this->lname=htmlspecialchars(($this->lname));
    $this->classes=htmlspecialchars(($this->classes));
    $this->section=htmlspecialchars(($this->section));
    $this->roll=htmlspecialchars(($this->roll));
    
  //exact value will be taken by the columns
    $stmt->bindParam(":fname", $this->fname);
    $stmt->bindParam(":lname", $this->lname);
    $stmt->bindParam(":classes", $this->classes);
    $stmt->bindParam(":section", $this->section);
    $stmt->bindParam(":roll", $this->roll);
 
   
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
                fname=:fname, lname=:lname,classes=:classes,section=:section where roll=:roll";
 
    $stmt = $this->conn->prepare($query);
 
    $this->fname=htmlspecialchars(($this->fname));
    $this->lname=htmlspecialchars(($this->lname));
    $this->classes=htmlspecialchars(($this->classes));
    $this->section=htmlspecialchars(($this->section));
    $this->roll=htmlspecialchars(($this->roll));
        
    $stmt->bindParam(":fname", $this->fname);
    $stmt->bindParam(":lname", $this->lname);
    $stmt->bindParam(":classes", $this->classes);
    $stmt->bindParam(":section", $this->section);
    $stmt->bindParam(":roll", $this->roll);
 
   
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
    function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE roll = :roll";
 
    
    $stmt = $this->conn->prepare($query);
 
   
    $this->roll=htmlspecialchars(($this->roll));
 
    // bind roll of record to delete
    $stmt->bindParam(":roll", $this->roll);
 
   
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
}