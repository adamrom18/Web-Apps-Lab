<!--
Author: Adam Romanowicz
Description: Listbox for Register Course screen
-->
<?php
include "../dblink.php"; //database connection

$sql = "SELECT course_name FROM Courses WHERE deletedflag = false"; //selects courses that are not archieved

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick='populate()'>"; //creates select button that allows you to choose which person to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $course = $row['course_name'];
    echo "<option value = '$course'>$course</option>"; //fills listbox with records
}
echo "</select>";
mysqli_close($con); //closes database

?>