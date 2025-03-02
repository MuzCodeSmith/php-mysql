<?php
include('./config.php');
include('./database.php');
include('./table.php');

$dbname = "school";
$db = new Database($conn, $dbname);
$studentTable = new Table($conn, 'students');


if(isset($_POST['st_fname'])){
    addStudent($_POST);
}

function addStudent($details){

    global $studentTable;

    $fname=$details['st_fname'];
    $lname=$details['st_lname'];
    $email=$details['st_email'];
    $contact=$details['st_contact'];
    $course=$details['st_course'];

    $studentTable->insertStudent($fname, $lname, $email, $contact, $course);
}


?>