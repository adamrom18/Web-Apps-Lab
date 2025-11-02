<!--
Author: Adam Romanowicz
Description: Checks if logged in
-->
<?php
if ( !isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) //no login achieved
{
    echo "<script> location.replace('../login.php'); </script>";
    exit; // Stop script execution
}
?>