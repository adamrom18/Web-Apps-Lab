<?php session_start();
//Author: Adam Romanowicz
//Description: View Students screen
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
    <h1>View Students</h1>
 <script>
 function populate() //function to fill in input boxes with selected student's data
 {
     var sel = document.getElementById("listbox"); //box that contains entry options of what student to view
     var result;
     result = sel.options[sel.selectedIndex].value; //adds options in selected student box allowing you to pick which entry to view
     var studentDetails = result.split(','); //seperates each column with a comma
     document.getElementById("student_id").value = studentDetails[0]; //saves amend variable as value from database
     document.getElementById("full_name").value = studentDetails[1];
     document.getElementById("username").value = studentDetails[2];
     document.getElementById("email").value = studentDetails[3];
     document.getElementById("program").value = studentDetails[4];
     document.getElementById("status").value = studentDetails[5];
 }
 </script>
 <div class="inputbox">
 <?php include 'listbox2.php'; ?> <!--links to php file that grabs the data from database-->
  <br>
  <form action="" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->
    <ul>
    <li><label for="student_id">Student ID</label>
    <input type="text" name="student_id" id="student_id" disabled/>
    </li>

    <li><label for="full_name">Full Name</label>
    <input type="text" name="full_name" id="full_name" disabled required/>
    </li>
    
    <li><label for="username">Username</label>
    <input type="text" name="username" id="username" disabled required/>
    </li>
    
    <li><label for="email">Email</label>
    <input type="email" name="email" id="email" disabled/>
    </li>

    <li><label for="program">Program</label>
    <input type="text" name="program" id="program" required disabled/>
    </li>

    <li><label for="status">Status</label>
    <input type="text" name="status" id="status" required disabled/>
    </li>
    </ul>
    </form>
</div>
</div>
</body>

</html>