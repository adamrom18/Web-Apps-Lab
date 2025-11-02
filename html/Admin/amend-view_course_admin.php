<?php session_start();
//Author: Adam Romanowicz
//Description: Amend/View course screen
include 'session_updater_admin.php';
include 'admin_menu.php';?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../screens.css" />
<title>Riverbridge Univeristy</title>
</head>

<body>
<div class="box">
<h1>Amend/View Course</h1>
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
 function toggleLock() //function to lock and unlock input boxes
 {
     if (document.getElementById("amendViewbutton").value == "Amend Details") //if button's text displays amend details
     {
         document.getElementById("amend_code").disabled = false; //input box is enabled
         document.getElementById("amend_name").disabled = false;
         document.getElementById("amend_description").disabled = false;
         document.getElementById("amend_credits").disabled = false;
         document.getElementById("amend_lecturer").disabled = false;
         document.getElementById("amendViewbutton").value = "View Details"; //button's text displays view details
     }
     else
     {
         document.getElementById("amend_code").disabled = true; //input box is disabled
         document.getElementById("amend_name").disabled = true;
         document.getElementById("amend_description").disabled = true;
         document.getElementById("amend_credits").disabled = true;
         document.getElementById("amend_lecturer").disabled = true;
         document.getElementById("amendViewbutton").value = "Amend Details"; //button's text displays amend details
     }
 }
 function confirmCheck() //function that asks you if you want to save changes
 {
     var response;
     response = confirm('Are you sure you want to amend this course?'); //prompt that confirms if you want to save
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
         toggleLock();
         return false;
     }

}
 </script>
 <div class="inputbox"> 
 <?php include 'listbox1.php'; ?> <!--links to php file that grabs the data from database-->
  <input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()"> <!--button to enable input boxes-->
  <form action="amend-view_course_adminDB.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->
<br>
<ul>
    <li><label for="course_id">Course ID</label>
    <input type="text" name="amend_id" id="amend_id" disabled/>
    </li>

    <li><label for="course_code">Course Code</label>
    <input type="text" name="amend_code" id="amend_code" pattern="[A-Z]{2}[0-9]{3,4}" autofocus disabled required/>
    </li> 
    
    <li><label for="course_name">Course Name</label>
    <input type="text" name="amend_name" id="amend_name" pattern="[A-Za-z ()]{1,64}" disabled required/>
    </li>
    
    <li><label for="description">Description</label>
    <input type="text" name="amend_description" id="amend_description" pattern="[A-Za-z0-9 .,()]{1,128}" disabled/>
    </li>

    <li><label for="credits">Credits</label>
    <input type="text" name="amend_credits" id="amend_credits" pattern="[0-9]{1,4}" required disabled/>
    </li>

    <li><label for="lecturer">Lecturer</label>
    <input type="text" name="amend_lecturer" id="amend_lecturer" pattern="[A-Za-z ]{1,32}" required disabled/>
    </li>
</ul>
    
    <br>
    <div class="myButton">
        <input type="submit" onclick="return confirmCheck()"/>
        <input type="reset" value = "Clear" />
    
    </div>
    </form>

</div>
</div>
</body>

</html>

