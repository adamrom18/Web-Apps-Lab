<?php
session_start();
//Author: Adam Romanowicz
//Description: Logout function - Unsets all session variables before destroying the session
unset($_SESSION['loggedIn']); //unset the logged in session variable
unset($_SESSION['username']);
unset($_SESSION['student_id']);
unset($_SESSION['password']); //Session variable to keep track of the login name
unset($_SESSION['full_name']);
unset($_SESSION['email']);
unset($_SESSION['program']);
unset($_SESSION['admin_id']);
unset($_SESSION['role']); //ybset tge yser session variable
session_destroy(); //destroy the sessionS
echo "<script> location.replace('login.php'); </script>"; //redirect
exit(); //exits code execution
?>
