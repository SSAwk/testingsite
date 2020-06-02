<?php
session_start();
if ($_SESSION['user'] != NULL){
echo 
"<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>CS 355 Home Page</title>
  <link rel='stylesheet' type='text/css' href='style.css'>
  <style>
     h1 {
        text-align: center;
     }
  </style>
</head>
<body>
   <!-- NAVBAR BEGINS HERE-->
   <nav id='navbar'>
     <ul>
       <li class='dropdown'>
         <a href='home.php' class='dropbtn'>Home</a>
         <div class ='dropdown-content'>
         </div>
       </li>
       <li class='dropdown' >
         <a href='#' class='dropbtn'>Course</a>
         <div class='dropdown-content'>
           <a href='https://learn.zybooks.com/zybook/CUNYCSCI355TeitelmanSpring2020' target='_blank'>ZyBooks</a>
           <a href='https://app.tophat.com/e/391366/' target='_blank'>TopHat</a>
           <a href='https://bbhosted.cuny.edu/webapps/blackboard/execute/modulepage/view?course_id=_1844255_1&cmp_tab_id=_2221312_1&mode=view' target='_blank'>Blackboard</a>
           <a href='https://drive.google.com/drive/folders/1co7vzY9_75cCiuNTHXCGf3pKbpf_TTwC' target='_blank'>Course Google Drive</a>
           <a href='https://www.w3schools.com/' target='_blank'>W3Schools</a>
         </div>
       </li>
       <li class='dropdown'>
         <a href='#' class='dropbtn'>About</a>
         <div class='dropdown-content'>
           <a href='developer.html'>About The Developer</a>
           <a href='contact.html'>Contact</a>
         </div>
       </li>";
if ($_SESSION['usertype'] == "S")
{
    echo "<li class='dropdown'>
            <a href='#' class='dropbtn'>Testing</a>
            <div class='dropdown-content'>
                <a href='answerset.php' class='dropbtn'>Assignments</a>
            </div>
        </li>";
}
if ($_SESSION['usertype'] == "P")
{
    echo "<li class='dropdown'>
            <a href='#' class='dropbtn'>Testing</a>
            <div class='dropdown-content'>
                <a href='question.php' class='dropbtn'>Make Questions</a>
                <a href='set.php' class='dropbtn'>Make Question Sets</a>
            </div>
        </li>";
}
if ($_SESSION['usertype'] == "D")
{
    echo "<li class='dropdown'>
            <a href='#' class='dropbtn'>Testing</a>
            <div class='dropdown-content'>
                <a href='answerset.php' class='dropbtn'>Assignments</a>
                <a href='question.php' class='dropbtn'>Make Questions</a>
                <a href='set.php' class='dropbtn'>Make Question Sets</a>
            </div>
        </li>";
}
echo "
        <li class='dropdown'>
                <a href='#' class='dropbtn'>Help</a>
                <div class='dropdown-content'>
                <a href='help.html'>Help</a>
            </div>
        </li>
    </ul>
   </nav>
   <!--NAVBAR ENDS HERE-->
   <h1>Welcome to my website</h1>
</body>
</html>";
}
