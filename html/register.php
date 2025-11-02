<!--
Author: Adam Romanowicz
Description: Create account
-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Riverbridge Univeristy</title>
<link rel="stylesheet" href="login2.css">
</head>
<body>
<form action="registerDB.php" method="post">
  <button type="button" class="cancelbtn" id="ad"><a href="login_admin.php">Admin</a></button>
  <div class="imgcontainer">
    <img src="add.png" alt="Avatar" class="avatar">
    <h3>Student Register</h3>
  </div>
<div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" pattern='[A-Za-z0-9]{1,32}' required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" pattern='[A-Za-z0-9]{1,32}' required>

    <label for="full_name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="full_name" id="full_name" pattern='[A-Za-z ]{1,128}' required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" pattern='{1,128}' required>
        
    <button type="submit">Register</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" id="ad" style="position: relative; right: 130px;"><a href="login.php">Back</a></button>
  </div>
</form>

</body>
</html>