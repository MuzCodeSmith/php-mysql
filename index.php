<?php
include('./config.php');
include('./database.php');

$dbname = "school";
$db = new Database($conn, $dbname);

// $db->createDatabase();
// $db->dropDatabase();
?>