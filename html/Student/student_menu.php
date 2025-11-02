<!--
Author: Adam Romanowicz
Description: Student Navigation Menu
-->
<div id="navbar">
    <a href="register_course_student.php">Register Course</a>
    <a href="view_course_student.php">Edit Profile/View Course</a>
    <a href="drop_course_student.php">Drop Course</a>
    <a class="exit" href="../logout.php">Logout</a>
  </div>

 <style> #navbar {
    position: fixed;
    top: 0;
    width: 100%;
    overflow: hidden;
    background-color: #333;
    z-index: 1;
  }
  
  #navbar a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  #navbar a:hover {
    background-color: #ddd;
    color: black;
  }
  
  #navbar a.active {
    background-color: #04AA6D;
    color: white;
}

.dropdown { /*Drop down menu (not utilized)*/
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown:hover .dropbtn {
  background-color: #ddd;
  color: black;
}

.dropdown-content {
  display: none;
  position: fixed;
  width: 180px;
  background-color:#333;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: #333;
  padding: 12px 16px;
  width: 82.5%;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

a.exit {
background-color: coral;
color: black;
position: absolute;
right: 0;
}
/*End of navigation bar */
</style>