<!--Question Answer Set Setup-->
<?php
session_start();
if (isset($_POST['go'])) {
    $db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
    $email = $_SESSION['email'];
    $query = "SELECT user_id FROM appuser WHERE email='$email'";
    $user = mysqli_query($db, $query);
    $p = 0;
    $result = "SELECT * FROM questionset";
    echo "<form action='answer.php' method='POST' name='selection'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $cid = $row['questionset_id'];
        $qst = $row['title'];
        echo "<p>Display " . $qst . "</p>
        <input type='checkbox' name='qs" . $cid . "' value='" . $cid . "'></input>
        <br><br>";
    }
    echo "<button id='submit' type='submit' name='show'>Submit</button>
    </form>";
    mysqli_close($db);
}
?>