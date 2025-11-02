<?php session_start();
//Author: Adam Romanowicz
//Description: Approve-Remove Registration screen
include 'session_updater_admin.php';
include 'admin_menu.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Riverbridge Univeristy</title>
<link rel="stylesheet" type="text/css" href="../screens.css" /> <!--links to stylesheet-->
</head>
<body>

<div class="box"> <!--Creates box around form-->
<H1> Approve/Remove Course Registrations</H1>

<?php include 'listbox.php';?> <!--links to php file that grabs the data from database-->
<script>
function populate() //function to fill in input boxes with selected student's data
{
    var sel = document.getElementById("listbox"); //box that contains entry options of what student to view
    var result;
    result = sel.options[sel.selectedIndex].value; //adds options in selected student box allowing you to pick which entry to view
    var studentDetails = result.split(','); //seperates each column with a comma //saves amend variable as value from database
    document.getElementById("student_id").value = studentDetails[0];
    document.getElementById("registration_id").value = studentDetails[1];
    document.getElementById("full_name").value = studentDetails[2];
    document.getElementById("email").value = studentDetails[3];
    document.getElementById("course_code").value = studentDetails[4];
    document.getElementById("course_name").value = studentDetails[5];
    document.getElementById("date_registered").value = studentDetails[6];
    document.getElementById("status").value = studentDetails[7];
}
function toggleLock() //function to lock and unlock input boxes
{
        document.getElementById("student_id").disabled = true;
        document.getElementById("registration_id").disabled = true;
        document.getElementById("full_name").disabled = true; //input box is disabled
        document.getElementById("email").disabled = true;
        document.getElementById("course_code").disabled = true;
        document.getElementById("course_name").disabled = true;
        document.getElementById("date_registered").disabled = true;
        document.getElementById("status").disabled = true;
}
function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to save these changes?'); //prompt that confirms if you want to save
    if (response)
    {
        document.getElementById("student_id").disabled = false;
        document.getElementById("registration_id").disabled = false; //input box is enabled
        document.getElementById("full_name").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("course_code").disabled = false;
        document.getElementById("course_name").disabled = false;
        document.getElementById("date_registered").disabled = false;
        document.getElementById("status").disabled = false;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}

</script>
<div class="inputbox">
<br>
<form action="approve-remove_adminDB.php" method="post"> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->
<ul>
<li><label for="student_id">Student ID</label>
<input type="text" name="student_id" id="student_id" disabled> <!--input box which is disabled by default-->
</li>

<li><label for="registration_id">Registration ID</label>
<input type="text" name="registration_id" id="registration_id" disabled>
</li>

<li><label for="full_name">Full Name</label>
<input type="text" name="full_name" id="full_name" disabled>
</li>

<li><label for="email">Email</label>
<input type="text" name="email" id="email" disabled>
</li>

<li><label for="course_code">Course Code</label>
<input type="text" name="course_code" id="course_code" disabled/>
</li>

<li><label for="course_name">Course Name</label>
<input type="text" name="course_name" id="course_name" disabled/>
</li>

<li><label for="date_registered">Date Registered</label>
<input type="date" name="date_registered" id="date_registered" disabled/>
</li>

<li><label for="status">Status</label>
<input type="text" name="status" id="status" disabled/>
</li>

</ul>
<br><br>
<div class="myButton">
<label>
<input type="radio" name="app_rem" value="Approve"> Approve
</label>
<label>
<input type="radio" name="app_rem" value="Remove"> Remove
</label>
<input type="submit" value="Change Status" onclick="return confirmCheck()">
</div>
</form>
</div>
</div>
</body>
</html>
 