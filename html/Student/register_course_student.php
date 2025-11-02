<?php session_start();
//Author: Adam Romanowicz
//Description: Register Course Screen
include 'session_updater_student.php';
include 'student_menu.php';
echo "<head>
    <title>Riverbridge Univeristy</title>
    <link rel='stylesheet' type='text/css' href='../screens.css' /> <!--links to stylesheet-->
     </head>
<body>

<div class='box'>
<H1> Register for Course</H1>";

include 'listbox.php';
echo "<script>
function populate() //fills inputboxes with values from listbox options
{
    var sel = document.getElementById('listbox');
    var result;
    result = sel.options[sel.selectedIndex].value;
    document.getElementById('course_name').value = result;
}
function toggleLock() //function to lock and unlock input boxes
{
        document.getElementById('course_name').disabled = true;
}
function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to register to this course?'); //prompt that confirms if you want to save
    if (response)
    {
        document.getElementById('course_name').disabled = false;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
</script>";
echo "<div class='inputbox'>
<br>
<form action='register_course_studentDB.php' method='POST'>
<ul>
<li><label for='course_name'>Course Name</label>
<input type='text' name='course_name' id='course_name' disabled>
</li>
<li><label for='full_name'>Full Name</label>
<input type='text' name='full_name' id='full_name' value='{$_SESSION['full_name']}' disabled>
</li>
<li><label for='username'>Username</label>
<input type='text' name='username' id='username' value='{$_SESSION['username']}' disabled>
</li>
</li>
</ul>
<br><br>
<div class='myButton'>
<input type='submit' value='Register' onclick='return confirmCheck()'>
</div>
</form>
</div>
</div>
</body>
</html>";
 