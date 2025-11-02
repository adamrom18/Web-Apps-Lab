<?php
$hostname = "localhost"; //hostname
$username = "your_username"; //username
$password = "your_password"; //password

$dbname = "lamp_db"; //database name

$con = mysqli_connect($hostname,$username,$password,$dbname); //conect to database using the 4 detail variables

if (!$con) //if cannot connect
    {
        die ("Failed to connect to MySQL: " . mysqli_connect_error()); //prints error
    }
?>