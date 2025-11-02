<?php session_start();
//Author: Adam Romanowicz
//Description: Admin Login screen - Three Strikes System
include 'dblink.php';
echo '<title>Riverbridge Univeristy</title>
<link rel="stylesheet" href="login2.css" type="text/css">';
if (ISSET($_POST['username']) && ISSET($_POST['password'])) //stores inputted variables into session
{
    $attempts = $_SESSION['attempts']; //stores attempts in session

    $sql = "SELECT * FROM Administrators WHERE username = '$_POST[username]' AND password = '$_POST[password]'"; //grabs login and password from password table according to input

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
        else //successful login
        {                            
            $_SESSION['loggedIn'] = true; //used to check if logged in - used in other screens
                                                   
            echo "<script> location.replace('Admin/add_course_admin.php'); </script>";
                                                   
        }
    }
}
else
{
    // building page for initial display
    $attempts = 1; //Screen will be displayed for first attempt
    $_SESSION['attempts'] = $attempts; //set session variable so that the number of attempts can be counted
    buildPage($attempts); // parameter passed so that a heading can display the number of attempts
};

function buildPage($att)
{
    echo "<body>
          <form action='login_admin.php' method='post'>
          <button type='button' class='cancelbtn' id='ad'><a href='login.php'>Student</a></button>
          <div class='imgcontainer'>
          <img src='Cog.png' alt='Avatar' class='avatar'>
          <h3>Admin Login</h3>
          </div>
          <div class='container'>
          <label for='username'><b>Username</b></label>
          <input type='text' placeholder='Enter Username' name='username' pattern='[A-Za-z0-9]{1,32}' required>
          <label for='password'><b>Password</b></label>
          <input type='password' placeholder='Enter Password' name='password' pattern='[A-Za-z0-9]{1,32}' required>
          <button type='submit'>Login</button>
          </div>
          <div class='container' style='background-color:#f1f1f1'>
          <button type='button' class='cancelbtn' style='position: relative; right: 130px'><a href='mailto:help@gmail.com'>Help</a></button>
          </div>
          </form>
          </body>";
}

mysqli_close($con);
?>
