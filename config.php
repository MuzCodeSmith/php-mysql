<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname ="school";

// $conn =new mysqli($hostname, $username, $password);
$conn =new mysqli($hostname, $username, $password,$dbname);

if($conn->connect_error){
    die("error while connecting to database");
}
// else{
//     echo "connection to database successful!";
// }
?>