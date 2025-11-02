<?php session_start();
//Author: Adam Romanowicz
//Description: Archieve Course screen
include 'session_updater_admin.php';
include 'admin_menu.php';?>
<html>

<head>
    <title>Riverbridge Univeristy</title>
<link rel="stylesheet" type="text/css" href="../screens.css" />
</head>

<body>
<div class="box">
<h1>Archieve Course</h1>

<script>

function populate() //function to fill in input boxes with selected course data
{
    var sel = document.getElementById("listbox"); //box that contains entry options of what course to view
    var result;
    result = sel.options[sel.selectedIndex].value; //adds options in selected course box allowing you to pick which entry to view
    var courseDetails = result.split(','); //seperates each column with a comma
    document.getElementById("amend_id").value = courseDetails[0]; //saves amend variable as value from database
    document.getElementById("amend_code").value = courseDetails[1];
    document.getElementById("amend_name").value = courseDetails[2];
    document.getElementById("amend_description").value = courseDetails[3];
    document.getElementById("amend_credits").value = courseDetails[4];
    document.getElementById("amend_lecturer").value = courseDetails[5];
}

function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to archieve this course?'); //prompt that confirms if you want to archieve
    if (response)
    {
         document.getElementById("amend_id").disabled = false; //input box is enabled
         document.getElementById("amend_code").disabled = false;
         document.getElementById("amend_name").disabled = false;
         document.getElementById("amend_description").disabled = false;
         document.getElementById("amend_credits").disabled = false;
         document.getElementById("amend_lecturer").disabled = false;
    }
    else
    {
        populate();
        return false;
    }
}
</script>
 
 <div class="inputbox">
 <?php include 'listbox1.php'; ?> <!--links to php file that grabs the data from database-->
  <br>
  <form action="archieve_course_adminDB.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->
    <ul>
    <li><label for="course_id">Course ID</label>
    <input type="text" name="amend_id" id="amend_id" disabled/>
    </li>

    <li><label for="course_code">Course Code</label>
    <input type="text" name="amend_code" id="amend_code" placeholder = "Course Code" autofocus disabled required/>
    </li> 
    
    <li><label for="course_name">Course Name</label>
    <input type="text" name="amend_name" id="amend_name" placeholder = "Course Name" disabled required/>
    </li>
    
    <li><label for="description">Description</label>
    <input type="text" name="amend_description" id="amend_description" disabled/>
    </li>

    <li><label for="credits">Credits</label>
    <input type="text" name="amend_credits" id="amend_credits" required disabled/>
    </li>

    <li><label for="lecturer">Lecturer</label>
    <input type="text" name="amend_lecturer" id="amend_lecturer" required disabled/>
    </li>
    </ul>
    <br>
    <div class="myButton">
        <input type="submit" value="Archieve" onclick="return confirmCheck()"/>
    </div>
  </form>

</div>
</div>

</body>
</html>