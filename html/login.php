<?php session_start(); 
//Author: Adam Romanowicz
//Description: Student Login Screen - Three Strikes system
include 'dblink.php';
echo '<title>Riverbridge Univeristy</title>
<link rel="stylesheet" href="login2.css" type="text/css">';
if (ISSET($_POST['username']) && ISSET($_POST['password'])) //stores inputted variables into session
{
    $attempts = $_SESSION['attempts']; //stores attempts in session

    $sql = "SELECT * FROM Students WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}'"; //grabs login and password from password table according to input

    if (!$result = mysqli_query($con, $sql)) //sql error
    {
        die ('Error in querying the database' . mysqli_error($con));
    }
    else
    {
        if (mysqli_affected_rows($con) == 0) //no matches found
        {
            $attempts++; //increases attempts by 1

            if ($attempts <=3) //attempts less or equal to 3
             {
                $_SESSION['attempts'] = $attempts;
                buildPage($attempts);

                echo "<script> alert('No record found with this login name and password combination - Please try again.'); </script>";
             }
            else //attempts more than 3
            {
                echo "<script> alert('Sorry - You have used all 3 attempts'); </script>";    
            }
        }
        else 
        {
            //Successful login
            $sql = "SELECT * FROM Students WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}'";
            $result = mysqli_query($con,$sql);  //creates query
            if (!mysqli_query($con,$sql)) //if query is invalid
            {
                die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
            }
            $row = mysqli_fetch_array($result); //session variables used to display information about the user in subsequent screens
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['username'] = $_POST['username']; //Session variable to keep track of the login name
            $_SESSION['password'] = $_POST['password']; 
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['program'] = $row['program'];                                      
            $_SESSION['loggedIn'] = true; //used to check if logged in - used in other screens
                                                   
            echo "<script> location.replace('Student/register_course_student.php'); </script>";
        }
    }
}
else
{
    // building page for initial display
    $attempts = 1; //Screen will be displayed for first attempt
    $_SESSION['attempts'] = $attempts; //set session variable so that the number of attempts can be counted
    buildPage($attempts);
}

function buildPage($att)
{
    echo "<body>
          <form action='login.php' method='post'>
          <button type='button' class='cancelbtn' id='ad'><a href='login_admin.php'>Admin</a></button>
          <div class='imgcontainer'>
          <img src='img_avatar2.png' alt='Avatar' class='avatar'>
          <h3>Student Login</h3>
          </div>
          <div class='container'>
          <label for='username'><b>Username</b></label>
          <input type='text' placeholder='Enter Username' name='username' id='username' pattern='[A-Za-z0-9]{1,32}' required>
          <label for='password'><b>Password</b></label>
          <input type='password' placeholder='Enter Password' name='password' id='password' pattern='[A-Za-z0-9]{1-32}' required>
          <button type='submit'>Login</button>
          </div>
          <div class='container' style='background-color:#f1f1f1'>
          <button type='button' class='cancelbtn' style='position: relative; right: 117px' id='ad' ><a href='register.php'>Register</a></button>
          </div>
          </form>
          </body>";
}

mysqli_close($con); //closes database connection
?>
