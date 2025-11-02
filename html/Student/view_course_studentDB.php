<?php session_start();
//Author: Adam Romanowicz
//Description: Edit Profile function
include '../dblink.php'; //links to php which connects to database

$sql = "UPDATE Students SET username = '{$_POST['amendusername']}',
        password = '{$_POST['amendpassword']}', full_name = '{$_POST['amendfull_name']}', email = '{$_POST['amendemail']}' WHERE student_id = '{$_SESSION['student_id']}'"; //sql statement which updates the database from inputs

if (!mysqli_query($con,$sql)) //error check
{
    echo "Error ".mysqli_error($con);
}
mysqli_close($con); //closes database
?>
<script> location.replace("view_course_student.php"); </script> <!--Redirect-->
