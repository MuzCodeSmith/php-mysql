<?php

class Database {
    
    private $conn;
    private $dbname;

    public function __construct($conn,$dbname){
        $this->conn =$conn;
        $this->dbname =$dbname;
    }

    public function createDatabase(){
        $query = "CREATE DATABASE `{$this->dbname}`";
        $response = $this->conn->query($query);

        if($response){
            echo "database `{$this->dbname}` created successfully!<br>";
        }else{
            die("error: {$this->conn->error} while creating database<br>");
        }
    }

    public function dropDatabase(){
        $query = "DROP DATABASE `{$this->dbname}`";
        $response = $this->conn->query($query);

        if($response){
            echo "datbase `{$this->dbname}` is dropped successfully!<br>";
        }else{
            die(" error: `{$this->conn->error}`while deleting database<br>");
        }
    }
}

?>