<?php

class Student {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function insertStudent($fname, $lname, $email, $contact, $course){
        $query = "INSERT INTO students (st_fname, st_lname, st_email, st_contact, st_course)
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

    
    public function getAllStudents (){
        $query = "SELECT * FROM students";

        $stmt=$this->conn->prepare($query);

        if($stmt){
            $stmt->execute();
            $result=$stmt->get_result();

            if($result->num_rows>0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }else{
        throw new  Exception("Error: {$this->conn->error} while fetching records!");  
        }
    }
    

}

?>