<!--Question Creation-->
<?php
if (isset($_POST['submitquestion'])) {
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
    $title = $_POST['title'];
    $questiontype = $_POST['questiontype'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $wrong1 = $_POST['wrong1'];
    $wrong2 = $_POST['wrong2'];
    $wrong3 = $_POST['wrong3'];
    $query = "INSERT INTO question (`title`, `question_type`, `content`, `answer`, `wrong1`, `wrong2`, `wrong3`) VALUES ('$title', '$questiontype', '$question', '$answer', '$wrong1', '$wrong2', '$wrong3')";
    mysqli_query($db, $query);
    mysqli_close($db);
    header("location: home.php");
}
?>