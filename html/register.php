<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="login.css">
</head>
<body>

<form action="registerDB.php" method="post">
  <button type="button" class="cancelbtn" id="ad"><a href="login_admin.php">Admin</a></button>
  <div class="imgcontainer">
    <img src="add.png" alt="Avatar" class="avatar">
    <h3>Student Register</h3>
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="fname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fname" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
        
    <button type="submit">Register</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" id="ad"><a href="login.php">Back</a></button>
  </div>
</form>

</body>
</html>