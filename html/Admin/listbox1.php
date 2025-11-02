<!--
Author: Adam Romanowicz
Description: Listbox for Amend/View Course Screen
-->
<?php
include "../dblink.php"; //database connection

$sql = "SELECT course_id, course_code, course_name, description, credits, lecturer FROM Courses WHERE deletedflag = false"; //selects non-archieved courses

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //creates select button that allows you to choose which course to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $id = $row['course_id'];
    $code = $row['course_code'];
    $name = $row['course_name'];
    $desc = $row['description'];
    $credit = $row['credits'];
    $lecturer = $row['lecturer'];
    $allText = "$id,$code,$name,$desc,$credit,$lecturer";
    echo "<option value = '$allText'>$name</option>"; //prints records
}
echo "</select>";
mysqli_close($con);

?>