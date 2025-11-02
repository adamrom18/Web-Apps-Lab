<?php session_start();
//Author: Adam Romanowicz
//Description: Add Course Screen
include 'session_updater_admin.php';
include 'admin_menu.php';?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../screens.css" /> <!--links to stylesheet-->
   <title>Riverbridge Univeristy</title>
</head>
<body>
<div class="box">
   <h1>Add a Course</h1>

 <div class="inputbox"> 
  <form action="add_course_adminDB.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->
   <ul>
    <li><label for="course_code">Course Code</label>
    <input type="text" name="course_code" id="course_code" pattern="[A-Z]{2}[0-9]{3,4}" autofocus required/>
    </li>
    
    <li><label for="course_name">Course Name</label>
    <input type="text" name="course_name" id="course_name" pattern="[A-Za-z ()]{1,64}" required/>
    </li>
    
    <li><label for="description">Description</label>
    <input type="text" name="description" id="description" pattern="[A-Za-z0-9 .,()]{1,128}"/>
    </li>

    <li><label for="credits">Credits</label>
    <input type="text" name="credits" id="credits" pattern="[0-9]{1,4}" required/>
    </li>

    <li><label for="lecturer">Lecturer</label>
    <input type="text" name="lecturer" id="lecturer" pattern="[A-Za-z ]{1,32}" required/>
    </li>
   </ul>
    <br>
        <div class="myButton">
        <input type="submit" onclick="confirmCheck()"/>
        <input type="reset" value = "Clear" />
        </div>
    </form>
 </div>
</div>

</body>

</html>
