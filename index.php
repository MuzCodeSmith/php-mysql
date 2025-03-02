<?php
include("./config.php");

$dbname = "school";
$createDatabaseQuery = "CREATE DATABASE $dbname";

$stmt = $conn->prepare($createDatabaseQuery);
if($stmt){
    if($stmt->execute()){
        echo "database $dbname created successfully";
    }else{
        die("error while creating database".$conn->error);
    }
}else{
    die("Query preparation failed".$conn->error);
}

?>