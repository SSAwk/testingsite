<?php
session_start();
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
$user = $_SESSION['user_id'];
$answer = $_POST['ans1'];
$query = "INSERT INTO student_answers (`user_id`, `questionset_id`, `question_id`, `answer`) VALUES()";

header("location: home.php");
mysqli_close($db);
?>