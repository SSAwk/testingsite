<!--Question Answer Sheet Page-->
<?php
session_start();
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
$user = $_SESSION['user'];
$query = "SELECT * FROM student_answers WHERE user_id='$user'";
$checker = mysqli_query($db, $query);
echo "<form action='' method='POST' name='answers'>";
while ($row = mysqli_fetch_assoc($checker)) {
    if ($row['answer'] == NULL) {
        $flag = $row['question_id'];
        $query1 = "SELECT * FROM question WHERE question_id='$flag'";
        $question = mysqli_query($db, $query1);
        $qtype = $question['question_type'];
        if ($qtype == 'MC')
        {
            $ans1 = $question['answer'];
            $ans2 = $question['wrong1'];
            $ans3 = $question['wrong2'];
            $ans4 = $question['wrong3'];
            $array = array($ans1, $ans2, $ans3, $ans4);
            echo $question['content'];
            echo "<br><br>";
            if (!empty($array))
            {
                shuffle($array);
                while($element = array_pop($array))
                {
                    echo "<label>
                    <input type='radio' name='answered' value='".$element."' required>".$element."</label>";
                }
            }
            echo "<br><br>";
        }
        if ($qtype == 'WA') 
        {
            echo $question['content'];
            echo "<br><br>";
            echo "<input type='text' name='answered' placeholder='Answer here' required></input>
            <br><br>";
        }
    }
}
echo "<button id='submit' type='submit' name='go' value='go'>Submit</button>
    </form>";
mysqli_close($db);
?>