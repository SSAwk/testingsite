<!--Question Set Submission-->
<?php
session_start();
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
$list = "SELECT * FROM question";
$result = mysqli_query($db, $list);
$i = 0;
echo "<form action='createset.php' method='POST' name='group'>
        <input type='text' name='refer' placeholder='Enter the title of the set' required></input>
        <br><br>";
while ($row = mysqli_fetch_assoc($result)) {
    $i += 1;
    echo "<input type='checkbox' name='q" . $i . "' value='" . $row['question_id'] . "'>" . $row['title'] . "</input>
        <br><br>
        <label>Enter the question point value.</label>
        <input type='number' name='points" . $i . "' required></input>
        <br><br>";
}
$_SESSION['max'] = $i;
echo "<button id='submit' type='submit' name='submitset' value='submitset'>Submit</button>
    </form>";
mysqli_close($db);
?>