<!--
Author: Adam Romanowicz
Description: Listbox for View Students Screen
-->
<?php
include "../dblink.php"; //database connection 
//Selects student details and registration status
$sql = "SELECT 
    s.student_id,
    s.full_name,
    s.username,
    s.email,
    s.program,
    r.status
FROM 
    Students s
JOIN 
    Registrations r ON s.student_id = r.student_id";

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //creates select button that allows you to choose which student to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $id = $row['student_id'];
    $name = $row['full_name'];
    $user = $row['username'];
    $email = $row['email'];
    $program = $row['program'];
    $status = $row['status'];
    $allText = "$id,$name,$user,$email,$program,$status";
    echo "<option value = '$allText'>$name</option>"; //records saved in listbox
}
echo "</select>";
mysqli_close($con);

?>