<!DOCTYPE html>
<html>
<head>
<!--<link rel="stylesheet" type="text/css" href="task3.css" /> links to stylesheet-->
</head>
<body>

<div class="box"> <!--Creates box around form-->
<H1> Register for Course</H1>

<?php include 'listbox.php'; ?> <!--links to php file that grabs the data from database-->
<script>
function populate() //function to fill in input boxes with selected person's data
{
    var sel = document.getElementById("listbox"); //box that contains entry options of what person to view
    var result;
    result = sel.options[sel.selectedIndex].value; //adds options in selected person box allowing you to pick which entry to view
}

</script>
<div class="inputbox">
<p id = "display"> </p> <!--Details of person selected-->
<br>

<form name="myForm" action="register_course_student.php" method="post"> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->
<ul>
<li><label for="full_name">Full Name</label>
<input type="text" name="full_name" id="full_name" style="position: relative; left: 63px" disabled> <!--input box which is disabled by default-->
</li>
<li><label for="username">Username</label>
<input type="text" name="username" id="username" style="position: relative; left: 91px" disabled>
</li>
<!-- add session to put in full name and username -->
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
 