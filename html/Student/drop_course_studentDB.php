<?php session_start();
//Author: Adam Romanowicz
//Description: Drop Course Function
include '../dblink.php';
$blank = "";

$sql = "SELECT registration_id FROM Registrations WHERE student_id = '{$_SESSION['student_id']}' AND status != 'dropped'"; //Grabs reg_id where status does not equal dropped
$result = mysqli_query($con,$sql);  //creates query
$row = mysqli_fetch_array($result); 
$reg = $row['registration_id'];

if (ISSET($reg)) //checks if sql statement returned a value
{ //updates records
    $sql = "UPDATE Students SET program = '{$blank}' WHERE student_id = '{$_SESSION['student_id']}'"; //updates program to blank
    if (!mysqli_query($con,$sql)) //error check
    {
    echo "Error ".mysqli_error($con);
    }
    $sql = "UPDATE Registrations SET status = 'dropped' WHERE student_id = '{$_SESSION['student_id']}'"; //updates status to dropped
    if (!mysqli_query($con,$sql)) //error check
    {
    echo "Error ".mysqli_error($con);
    }
}
else 
{
    echo "<script> alert('No course to drop'); </script>";
}
mysqli_close($con); //closes database
?>
<script> location.replace("drop_course_student.php"); </script> <!--Redirect-->
