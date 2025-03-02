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

    public function renameTable($oldName,$newName){
        $query = "RENAME TABLE {$oldName} TO {$newName}";
        $response = $this->conn->query($query);
        if($response){
            echo "table: {$oldName} renamed to  {$newName} successfully";
        }else{
            throw new Exception("Error: " . $this->conn->error . " while renaming table");
        }
    }

    public function addTable($columnName ,$columnDefination){
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

  
    public function dropColumn($columnName){
        $query = "ALTER TABLE {$this->tableName} DROP COLUMN {$columnName}";
        $response = $this->conn->query($query);

        if($response){
            echo "Column: {$columnName} deleted successfully";
        }else{
            throw new Exception("Error:{$this->conn->error} while deleting column");
        }
    }
    
    // table crud
    public function insertStudent($fname, $lname, $email, $contact, $course){
        $query = "INSERT INTO {$this->tableName} (st_fname, st_lname, st_email, st_contact, st_course)
            VALUES (?, ?, ?, ?, ?)";

         $stmt = $this->conn->prepare($query);

        if($stmt){
            $stmt->bind_param("sssss",$fname, $lname, $email, $contact, $course);
            $response = $stmt->execute();

            if($response){
                echo "student added successfully!";
            }else{
                die("Error: {$this->conn->error} while adding student<br>");
            }
        }else{
            die("Query Prepare Failed: {$this->conn->error}<br>");
        }
    }

}
    
?>