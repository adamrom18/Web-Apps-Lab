<!DOCTYPE html>
<html>
<head>

   <title>Riverbridge Univeristy</title>
</head>
<body>

<!-- <script src="confirm.js"></script> -->

 <!--Bottom Options-->
 <div class="bottom"> <!--Bottom background (input stuff here)-->
  <form action="add_course_adminDB.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->
    <u><h2 style="text-align: center;">Add A Course</h2></u>

    <p><label for="course_code">Course Code</label>
    <input type="text" name="surname" id="surname" placeholder = "Surname" autofocus pattern="[A-z ]{1-20}" title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="course_name">Course Name</label>
    <input type="text" name="firstname" id="firstname" placeholder = "First Name" pattern="[A-z ]{1-20}" title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="description">Description</label>
    <input type="text" name="address" id="address" placeholder = "e.g The Square, Tullow"  title="Letters, numbers, commas and spaces only (Max 100 characters)" pattern="[A-z0-9 ,]{1-100}"/>
    </p>

    <p><label for="credits">Credits</label>
    <input type="text" name="eircode" id="eircode" placeholder="e.g A65F4E2" title="7 characters. Capital letters (excluding 'O') and numbers only. First character must be a capital letter followed by 2 numbers then the remaining 4 characters can either be capital letters or numbers" pattern="[A-NP-Z]{1}[0-9]{2}[A-NP-Z0-9]{4}" required/>
    </p>

    <p><label for="lectuer">Lecturer</label>
    <input type="text" name="number" id="number" placeholder = "e.g 083 4318183" title="Can include digits, (), -, and spaces (Max 16, Min 8)"  pattern="[0-9 -()]{8,16}" required/>
    </p>

    <br>
        
        <input type="submit" onclick="confirmCheck()"/>
        <input type="reset" value = "Clear" />
    
    <p>
    </form>
 </div>

</body>

</html>
