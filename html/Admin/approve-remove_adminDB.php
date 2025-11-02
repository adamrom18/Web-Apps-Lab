<!--
Author: Adam Romanowicz
Description: Approve-Remove Registration Function
-->
<?php include '../dblink.php';
if ($_POST['app_rem'] == "Approve") //if approved selected
{
    $sql = "UPDATE Registrations SET status = 'approved' WHERE registration_id = '{$_POST['registration_id']}'"; //update reg to approved
    if (!mysqli_query($con,$sql)) //error check
    {
        echo "Error ".mysqli_error($con);
    }
    $sql = "UPDATE Students SET program = '{$_POST['course_name']}' WHERE student_id = '{$_POST['student_id']}'"; //update program to course registered
    if (!mysqli_query($con,$sql)) //error check
    {
        echo "Error ".mysqli_error($con);
    }
}
elseif ($_POST['app_rem'] == "Remove") //if remove selected
{
    $sql = "DELETE FROM Registrations WHERE registration_id = '{$_POST['registration_id']}'"; //delete registration
    if (!mysqli_query($con,$sql)) //error check
    {
        echo "Error ".mysqli_error($con);
    }
}
mysqli_close($con); //closes database
?>
<script> location.replace("approve-remove_admin.php"); </script>
