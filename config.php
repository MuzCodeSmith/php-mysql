<?php
$hostname = "localhost";
$username = "root";
$password = "";

$conn =new mysqli($hostname, $username, $password);

if($conn->connect_error){
    die("error while connecting to database");
}
// else{
//     echo "connection to database successful!";
// }
?>