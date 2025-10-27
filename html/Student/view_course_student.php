<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="" /> <!--links to stylesheet-->
</head>
<body>

<div class="box"> <!--Creates box around form-->
<H1> Amend/View Personal Details</H1>

<script>
function toggleLock() //function to lock and unlock input boxes
{
    if (document.getElementById("amendViewbutton").value == "Amend Details") //if button's text displays amend details
    {
        document.getElementById("amendusername").disabled = false; //input box is enabled
        document.getElementById("amendpassword").disabled = false;
        document.getElementById("amendfull_name").disabled = false;
        document.getElementById("amendemail").disabled = false;
        document.getElementById("amendViewbutton").value = "View Details"; //button's text displays view details
    }
    else
    {
        document.getElementById("amendusername").disabled = true; //input box is disabled
        document.getElementById("amendpassword").disabled = true;
        document.getElementById("amendfull_name").disabled = true;
        document.getElementById("amendemail").disabled = true;
        document.getElementById("amendViewbutton").value = "Amend Details"; //button's text displays amend details
    }
}
function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to save these changes?'); //prompt that confirms if you want to save
    if (response)
    {
        document.getElementById("amendusername").disabled = false; //input box is enabled
        document.getElementById("amendpassword").disabled = false;
        document.getElementById("amendfull_name").disabled = false;
        document.getElementById("amendemail").disabled = false;
        document.getElementById("program").disabled = false;
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
<p id = "display"> </p> <!--Details of person selected-->
<br>
<input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()"> <!--button to enable input boxes-->

<form name="myForm" action="view_course_student.php" onsubmit="return confirmCheck()" method="post"> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->
<ul>
<li><label for="amendusername">Username</label>
<input type="text" name="amendusername" id="amendusername" style="position: relative; left: 37px" disabled> <!--input box which is disabled by default-->
</li>
<li><label for="amendpassword">Password</label>
<input type="text" name="amendpassword" id="amendpassword" style="position: relative; left: 26px" disabled>
</li>
<li><label for="amendfull_name">Full Name</label>
<input type="text" name="amendfull_name" id="amendfull_name" style="position: relative; left: 41px" disabled>
</li>
<li><label for="amendemail">Email</label>
<input type="text" name="amendemail" id="amendemail" style="position: relative; left: 47px" disabled>
</li>
<li><label for="program">Current Course</label>
<input type="text" name="program" id="program" style="position: relative; left: 5px" disabled/>
</li>
</ul>
<br><br>
<div class="myButton">
<input type="submit" value="Save Changes">
</div>
</form>
</div>
</div>
</body>
</html>
 
