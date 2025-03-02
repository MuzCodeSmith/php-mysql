<?php
include('./config.php');
include('./database.php');
include('./table.php');

$dbname = "school";
$db = new Database($conn, $dbname);
$studentTable = new Table($conn, 'students');

$createTableQuery = " CREATE TABLE IF NOT EXISTS students (
    st_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    st_fname VARCHAR(50) NOT NULL,
    st_lname VARCHAR(50) NOT NULL,
    st_email VARCHAR(50) NOT NULL,
    st_contact VARCHAR(50) NOT NULL,
    st_regDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";


$studentTable->insertStudent('Muzaffar','Shaikh','muzzu@test.com','1258127679','B.Tech');

?>