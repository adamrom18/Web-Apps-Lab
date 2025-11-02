<!--
Author: Adam Romanowicz
Description: Amend/view course Function
-->
<?php
include '../dblink.php'; //links to php which connects to database

$sql = "UPDATE Courses SET course_name = '$_POST[amend_name]',
        course_code = '$_POST[amend_code]',
        description = '$_POST[amend_description]', 
        credits = '$_POST[amend_credits]',
        lecturer = '$_POST[amend_lecturer]'
        WHERE course_id = '{$_POST['amend_id']}'"; //sql statement which updates the database from inputs

if (!mysqli_query($con,$sql)) //error check
{
    echo "Error ".mysqli_error($con);
}

mysqli_close($con); //closes database
?>
<script> location.replace("amend-view_course_admin.php"); </script>