<?php

class Table{
    private $tableName;
    private $conn;

    public function __construct($conn,$tableName){
        $this->conn = $conn;
        $this->tableName = $tableName;
    }

    public function createTable($query){
        // $query = " CREATE TABLE IF NOT EXISTS `{$this->tableName}`(
        //     st_id INT NOT NULL AUTO_INCREMENT,
        //     st_fname VARCHAR(50) NOT NULL,
        //     st_lname VARCHAR(50) NOT NULL,
        //     st_email VARCHAR(50) NOT NULL,
        //     st_contact VARCHAR(50) NOT NULL,
        //     st_regdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        //     primary key(st_id)
        // )";

        $response = $this->conn->query($query);

        if($response){
            echo "table: {$this->tableName} created successfully";
        }else{
            // throw new Exception("Error: " . $this->conn->error . " while creating table");
        }
    } 
} 

?>