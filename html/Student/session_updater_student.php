<!--
Author: Adam Romanowicz
Description: Updates Session variables
-->
<?php
if ( !isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) //no login achieved
{
    echo "<script> location.replace('../login.php'); </script>"; //redirect
    exit; // Stop script execution
}
include '../dblink.php';
$sql = "SELECT * FROM Students WHERE student_id = '{$_SESSION['student_id']}'";
            $result = mysqli_query($con,$sql);  //creates query
            if (!mysqli_query($con,$sql)) //if query is invalid
            {
                die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
            }
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password']; 
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['program'] = $row['program'];    
mysqli_close($con);                                
?>