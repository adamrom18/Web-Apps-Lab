<?php session_start();
//Author: Adam Romanowicz
//Description: Edit Profile/View Current Course Screen
include 'session_updater_student.php';
include 'student_menu.php';
echo "<head>
      <title>Riverbridge Univeristy</title>
      <link rel='stylesheet' type='text/css' href='../screens.css' /> <!--links to stylesheet-->
      </head>
<body>

<div class='box'> <!--Creates box around form-->
<H1> Amend/View Personal Details</H1>

<script>
function toggleLock() //function to lock and unlock input boxes
{
    if (document.getElementById('amendViewbutton').value == 'Amend Details') //if button's text displays amend details
    {
        document.getElementById('amendusername').disabled = false; //input box is enabled
        document.getElementById('amendpassword').disabled = false;
        document.getElementById('amendfull_name').disabled = false;
        document.getElementById('amendemail').disabled = false;
        document.getElementById('amendViewbutton').value = 'View Details'; //button's text displays view details
    }
    else
    {
        document.getElementById('amendusername').disabled = true; //input box is disabled
        document.getElementById('amendpassword').disabled = true;
        document.getElementById('amendfull_name').disabled = true;
        document.getElementById('amendemail').disabled = true;
        document.getElementById('amendViewbutton').value = 'Amend Details'; //button's text displays amend details
    }
}
function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to save these changes?'); //prompt that confirms if you want to save
    if (response)
    {
        document.getElementById('amendusername').disabled = false; //input box is enabled
        document.getElementById('amendpassword').disabled = false;
        document.getElementById('amendfull_name').disabled = false;
        document.getElementById('amendemail').disabled = false;
        document.getElementById('program').disabled = false;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
</script>
<div class='inputbox'>
<input type = 'button' value = 'Amend Details' id = 'amendViewbutton' onclick = 'toggleLock()'> <!--button to enable input boxes-->
<form action='view_course_studentDB.php' onsubmit='return confirmCheck()' method='post'> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->
<br>
<ul>
<li><label for='amendusername'>Username</label>
<input type='text' name='amendusername' id='amendusername' value='{$_SESSION['username']}' pattern='[A-Za-z0-9]{1,32}' required disabled> <!--input box which is disabled by default-->
</li>
<li><label for='amendpassword'>Password</label>
<input type='password' name='amendpassword' id='amendpassword' value='{$_SESSION['password']}' pattern='[A-Za-z0-9]{1,32}' required disabled>
</li>
<li><label for='amendfull_name'>Full Name</label>
<input type='text' name='amendfull_name' id='amendfull_name' value='{$_SESSION['full_name']}' pattern='[A-Za-z ]{1,128}' required disabled>
</li>
<li><label for='amendemail'>Email</label>
<input type='email' name='amendemail' id='amendemail' value='{$_SESSION['email']}' pattern='{1,128}' required disabled>
</li>
<li><label for='program'>Current Course</label>
<input type='text' name='program' id='program' value='{$_SESSION['program']}' disabled/>
</li>
</ul>
<br><br>
<div class='myButton'>
<input type='submit' value='Save Changes'>
</div>
</form>
</div>
</div>
</body>
</html>";
?>
