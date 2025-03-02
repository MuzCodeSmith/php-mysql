<?php
include('./config.php');
include('./database.php');
include('./table.php');

$dbname = "school";
$tableName = "students";
$db = new Database($conn, $dbname);
$table = new Table($conn,$tableName);


// $db->createDatabase();
// $db->dropDatabase();
$createTableQuery = " CREATE TABLE IF NOT EXISTS `{$dbname}` (
    st_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    st_fname VARCHAR(50) NOT NULL,
    st_lname VARCHAR(50) NOT NULL,
    st_email VARCHAR(50) NOT NULL,
    st_contact VARCHAR(50) NOT NULL,
    st_regDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ";
$table->createTable($createTableQuery);


?>