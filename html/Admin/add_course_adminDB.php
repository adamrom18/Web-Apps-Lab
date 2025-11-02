<!--
Author: Adam Romanowicz
Description: Add Course Function
-->
<?php 
include '../dblink.php'; //Link the php which connects to the database

$sql = "Insert into Courses (course_code,course_name,description,credits,lecturer) 
VALUES ('$_POST[course_code]','$_POST[course_name]','$_POST[description]','$_POST[credits]','$_POST[lecturer]')"; //inserts inputs into database

if (!mysqli_query($con,$sql)) //if query is invalid
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
}

mysqli_close($con); //closes database
?>
<script> location.replace("add_course_admin.php"); </script>


