
<?php include 'dblink.php';
session_start();
echo '<link rel="stylesheet" href="login.css" type="text/css">';
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

                echo "<div class='errorstyle'>No record found with this login name and password combination - Please try again.</div>";
             }
            else //attempts more than 3
            {
                echo "<div class='errorstyle'>Sorry - You have used all 3 attempts<br> 
                Shutting down ...</div>";   
            }
        }
        else 
        {
            //Successful login
            $_SESSION['user'] = $_POST['username']; //Session variable to keep track of the login name
                                                     // for use with Change Password screen
            $_SESSION['loggedIn'] = true;
                                                   
            header('Location: Student/register_course_student.php');
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
          <form action='login.php' method='post'>
          <button type='button' class='cancelbtn' id='ad'><a href='login_admin.php'>Admin</a></button>
          <div class='imgcontainer'>
          <img src='img_avatar2.png' alt='Avatar' class='avatar'>
          <h3>Student Login</h3>
          </div>
          <div class='container'>
          <label for='uname'><b>Username</b></label>
          <input type='text' placeholder='Enter Username' name='uname' required>
          <label for='psw'><b>Password</b></label>
          <input type='password' placeholder='Enter Password' name='psw' required>
          <button type='submit'>Login</button>
          <label>
          <input type='checkbox' checked='checked' name='remember'> Remember me
          </label>
          </div>
          <div class='container' style='background-color:#f1f1f1'>
          <button type='button' class='cancelbtn' id='ad'><a href='register.php'>Register</a></button>
          <span class='psw'>Forgot <a href='#'>password?</a></span>
          </div>
          </form>
          </body>";
}

mysqli_close($con);
?>
