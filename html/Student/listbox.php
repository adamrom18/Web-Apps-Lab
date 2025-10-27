
<?php
include "../dblink.php"; //database connection
date_default_timezone_set('UTC');

$sql = "SELECT course_name FROM Courses";

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox'>"; //creates select button that allows you to choose which person to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $course = $row['course_name'];
    echo "<option value = '$course'>$course</option>"; //prints records
}
echo "</select>";
mysqli_close($con);

?>