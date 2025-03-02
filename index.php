<?php
include('./config.php');
include('./database.php');
include('./table.php');
include('./CRUD/Student.php');

$dbname = "school";
$db = new Database($conn, $dbname);
$studentTable = new Table($conn, 'students');
$student = new Student($conn);


if(isset($_POST['st_fname'])){
    addStudent($_POST);
}

function addStudent($details){

    global $student;

    $fname=$details['st_fname'];
    $lname=$details['st_lname'];
    $email=$details['st_email'];
    $contact=$details['st_contact'];
    $course=$details['st_course'];

    $student->insertStudent($fname, $lname, $email, $contact, $course);
}

$allstudents= $student->getAllStudents();

print_r($allstudents);



?>