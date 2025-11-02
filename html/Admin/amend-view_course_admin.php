<!DOCTYPE html>
<html>
<head>

<title>Riverbridge Univeristy</title>
</head>

<body>

 <script>
 function populate() //function to fill in input boxes with selected person's data
 {
     var sel = document.getElementById("listbox"); //box that contains entry options of what person to view
     var result;
     result = sel.options[sel.selectedIndex].value; //adds options in selected person box allowing you to pick which entry to view
     var courseDetails = result.split('#'); //seperates each column with a comma
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
         confirmAll(response); 
     }
     else
     {
         populate();
         toggleLock();
         return false;
     }

}
 </script>
 <!--Bottom Options-->
 <div class="bottom"> <!--Bottom background (input stuff here)-->
 <u><h2 style="text-align: center;">Amend/View Course</h2></u>
 <?php include 'listbox.php'; ?> <!--links to php file that grabs the data from database-->
  <br>
  <input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()"> <!--button to enable input boxes-->
  <form action="amend-Sview_course_adminDB.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->

    <p><label for="course_id">Course ID</label>
    <input type="text" name="amend_id" id="amend_id" disabled/>
    </p>

    <p><label for="course_code">Course Code</label>
    <input type="text" name="amend_code" id="amend_code" placeholder = "Course Code" autofocus disabled required/>
    </p> <!--Pattern should only allow letters and spaces yet it still allows hashtags which end up breaking the split('#') to fill in the input boxes-->
    
    <p><label for="course_name">Course Name</label>
    <input type="text" name="amend_name" id="amend_name" placeholder = "Course Name" disabled required/>
    </p>
    
    <p><label for="description">Description</label>
    <input type="text" name="amend_description" id="amend_description" disabled/>
    </p>

    <p><label for="credits">Credits</label>
    <input type="text" name="amend_credits" id="amend_credits" required disabled/>
    </p>

    <p><label for="lecturer">Lecturer</label>
    <input type="text" name="amend_lecturer" id="amend_lecturer" required disabled/>
    </p>
    
    <br>
        
        <input type="submit" onclick="confirmCheck()"/>
        <input type="reset" value = "Clear" />
    
    <p>
    </form>

</div>
<?php include '../../Templates/Template.html.php' ?> <!--Links template to page-->
<style> /* Overwrites certain elements from external template css */
body {
    background-image: linear-gradient(to bottom, #65fc6c 0%, #65fc6c 19%, black 19%, black 19.9%, white 19.9%, white 100%);
    min-height: 145vh;
    }
div.bottom { /*background around form*/
    flex-direction: column;
    align-items: center;
    top: 31.5%;
    }
div.logout {
    top: -14px;
}
</style>
</body>

</html>

