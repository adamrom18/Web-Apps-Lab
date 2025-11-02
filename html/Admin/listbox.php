<!--
Author: Adam Romanowicz
Description: Listbox for Approve/Remove Screen
-->
<?php
include "../dblink.php"; //database connection
date_default_timezone_set('UTC'); //sets timezone
//Selects records from several tables which match the student_id and status is pending
$sql = "SELECT 
    s.student_id,
    r.registration_id,
    s.full_name,
    s.email,
    c.course_code,
    c.course_name,
    r.date_registered,
    r.status
FROM 
    Registrations r
JOIN 
    Students s ON r.student_id = s.student_id
JOIN 
    Courses c ON r.course_id = c.course_id
WHERE 
    r.status = 'pending'"; 
if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //creates select button that allows you to choose which student to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $id = $row['student_id'];
    $rid = $row['registration_id'];
    $name = $row['full_name'];
    $email = $row['email'];
    $code = $row['course_code'];
    $course = $row['course_name'];
    $dateReg = date_create($row['date_registered']);
    $dateReg = date_format($dateReg,"Y-m-d");
    $status = $row['status'];
    $allText = "$id,$rid,$name,$email,$code,$course,$dateReg,$status";
    echo "<option value = '$allText'>$name</option>"; //records saved in listbox
}
echo "</select>";
mysqli_close($con);

?>