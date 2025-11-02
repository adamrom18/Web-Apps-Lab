<?php session_start();
//Author: Adam Romanowicz
//Description: Drop Course Screen
include 'student_menu.php';
include 'session_updater_student.php';

echo "<head>
    <title>Riverbridge Univeristy</title>
    <link rel='stylesheet' type='text/css' href='../screens.css' /> <!--links to stylesheet-->
      </head>
<body>

<div class='box'> <!--Creates box around form-->
<H1> Drop a Course</H1>

<div class='inputbox'>
<br>
<form action='drop_course_studentDB.php' method='POST'>
<ul>
<li><label for='full_name'>Full Name</label>
<input type='text' name='full_name' id='full_name' value='{$_SESSION['full_name']}' disabled> <!--input box which is disabled by default-->
</li>
<li><label for='username'>Username</label>
<input type='text' name='username' id='username' value='{$_SESSION['username']}' disabled>
</li>
<li><label for='currentcourse'>Current Course</label>
<input type='text' name='course_name' id='course_name'value='{$_SESSION['program']}' disabled>
</li>
</ul>
<br><br>
<div class='myButton'>
<input type='submit' value='Drop Course'>
</div>
</form>
</div>
</div>
</body>
</html>"
?>