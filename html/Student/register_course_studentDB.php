<?php session_start();
//Author: Adam Romanowicz
//Description: Register Course Function
include '../dblink.php'; //Link the php which connects to the database

$student_id = $_SESSION['student_id'];

$sql = "SELECT registration_id FROM Registrations WHERE student_id = '$student_id' ORDER BY registration_id DESC LIMIT 1"; //Selects latest record associated with student
$result = mysqli_query($con,$sql);  //creates query
$row = mysqli_fetch_array($result); 
$reg = $row['registration_id'];

$sql = "SELECT registration_id FROM Registrations WHERE registration_id = '$reg' AND status = 'dropped'"; //Selects record if latest record has status dropped
$result = mysqli_query($con,$sql);  //creates query
$row = mysqli_fetch_array($result); 
$status = $row['registration_id'];

if (!ISSET($reg) || ISSET($status)) //If statement is valid if student never registered before or if latest record has status dropped 
{
date_default_timezone_set('UTC'); //sets default timezone as utc
$dbDate = date("Y-m-d", time()); //formats current time
$status = "pending";
$sql = "SELECT course_id from Courses where course_name = '{$_POST['course_name']}'"; //Selects course_id from requested course
$result = mysqli_query($con,$sql);  //creates query
    if (!mysqli_query($con,$sql)) //if query is invalid
    {
        die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
    }
$row = mysqli_fetch_array($result); 
$course_id = $row['course_id'];

$sql = "INSERT into Registrations (student_id,course_id,status,date_registered) 
VALUES ('$student_id','$course_id','$status','$dbDate')"; //inserts inputs into database

if (!mysqli_query($con,$sql)) //if query is invalid
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
}
}
else
{
    echo "<script> alert('Can only register to one course'); </script>";
}
mysqli_close($con); //closes database
?>
<script> location.replace("view_course_student.php"); </script> <!--Redirect-->

