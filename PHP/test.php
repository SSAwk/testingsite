<?php
$db = mysqli_connect('127.0.0.1:3308' , 'root' , '' , 'wast3800') or die("Could not connect to database" );
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$usertype = $_POST['usertype'];
echo $firstname."<br>";
echo $lastname."<br>";
echo $username."<br>";
echo $email."<br>";
echo $password."<br>";
echo $confirmpassword."<br>";
echo $usertype."<br>";
$print = "INSERT INTO appuser (`login`, `pwd`, `first_name`, `last_name`, `email`, `user_type`) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$usertype')";
$results = mysqli_query($db, $print);
?>