<!--
Author: Adam Romanowicz
Description: Archieve course function
-->
<?php
include '../dblink.php'; //links to php which connects to database

$sql = "UPDATE Courses SET deletedflag = true WHERE course_id = '$_POST[amend_id]'"; //sql statement which updates the database from inputs

if (!mysqli_query($con,$sql)) //error check
{
    echo "Error ".mysqli_error($con);
}

mysqli_close($con); //closes database
?>
<script> location.replace("archieve_course_admin.php"); </script>