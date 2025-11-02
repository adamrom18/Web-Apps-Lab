<!--
Author: Adam Romanowicz
Description: Admin Navigation Menu
-->
<div id="navbar">
    <a href="add_course_admin.php">Add Course</a>
    <a href="amend-view_course_admin.php">Amend/View Course</a>
    <a href="archieve_course_admin.php">Archieve Course</a>
    <a href="approve-remove_admin.php">Approve/Remove Registrations</a>
    <a href="view_students_admin.php">View All Students</a>
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

.dropdown { /* Not utilized*/
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