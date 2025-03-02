<?php

class Table{
    private $conn;
    private $tableName;

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

    public function alterTable($columnName ,$columnDefination){
        $query = "ALTER TABLE {$this->tableName} ADD {$columnName} {$columnDefination} ";
        $response = $this->conn->query($query);

        if($response){
            echo "Column: {$columnName} added successfully";
        }else{
            throw new Exception("Error: ".$this->conn->error." while altering table");
        }
    }

    public function modifyTable($columnName,$columnDefination){
        $query = "ALTER TABLE {$this->tableName} MODIFY {$columnName} {$columnDefination}";
        $response = $this->conn->query($query);

        if($response){
            echo "Column: {$columnName} modified successfully";
        }else{
            throw new Exception("Error:{$this->conn->error} while modifying column");
        }
    }

    public function renameColumn($oldName, $newName, $columnDefination){
        $query = "ALTER TABLE {$this->tableName} CHANGE {$oldName} {$newName} {$columnDefination}";
        $response = $this->conn->query($query);

        if($response){
            echo "Column: {$oldName} renamed successfully";
        }else{
            throw new Exception("Error:{$this->conn->error} while renaming column");
        }
    }
} 

?>