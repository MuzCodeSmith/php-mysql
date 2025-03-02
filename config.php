<?php

class DBConnect {
    private $hostname ="localhost";
    private $username ="root";
    private $password = "";
    public $conn;
    
    public function __construct(){
        $this->conn = new mysqli($this->hostname,$this->username,$this->password);

        if($this->conn->connect_error){
           die("error while connecting to database!");
        }else{
            echo "connection to database successful!";
        }
    }
}

$db = new DBConnect();
$conn = $db->conn;

?>