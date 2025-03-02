<?php

class Table{
    private $tableName;
    private $conn;

    public function __construct($conn,$tableName){
        $this->conn = $conn;
        $this->tableName = $tableName;
    }

    public function createTable($query){
        $response = $this->conn->query($query);
        if($response){
            echo "table: {$this->tableName} created successfully";
        }else{
            throw new Exception("Error: " . $this->conn->error . " while creating table");
        }
    }
    
    public function dropTable($tableName){
        $query = "DROP TABLE IF EXISTS `{$tableName}`";
        $response = $this->conn->query($query);
        if($response){
            echo "table: {$this->tableName} deleted successfully";
        }else{
            throw new Exception("Error: " . $this->conn->error . " while deleting table");
        }
    }
} 

?>