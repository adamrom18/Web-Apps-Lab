<!--
Author: Adam Romanowicz
Description: Creates a record of account details
-->
<?php 
include 'dblink.php'; //Link the php which connects to the database

$sql = "Insert into Students (username,password,full_name,email) 
VALUES ('$_POST[username]','$_POST[password]','$_POST[full_name]','$_POST[email]')"; //inserts inputs into database

if (!mysqli_query($con,$sql)) //if query is invalid
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
}

mysqli_close($con); //closes database
?>
<script> location.replace("login.php"); </script> <!--Redirect-->


