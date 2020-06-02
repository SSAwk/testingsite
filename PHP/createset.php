<!--Question Set Creation-->
<?php
session_start();
if (isset($_POST['submitset'])) {
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
    $title = $_POST['refer'];
    $createqset = "INSERT INTO questionset (`title`) VALUES ('$title')";
    mysqli_query($db, $createqset);
    $c = 0;
    while ($c < $_SESSION['max']) {
        $c += 1;
        $query = "SELECT `questionset_id` FROM questionset WHERE `title`='$title'";
        $qsid = mysqli_query($db, $query);
        $qid = $_POST['q' . $c];
        $points = $_POST['points' . $c];
        $set = "INSERT INTO questionset_question (`questionset_id`, `question_id`, `points`) VALUES ('$qsid', '$qid', '$points')";
    }
    header("location: home.php");
    mysqli_close($db);
}
?>