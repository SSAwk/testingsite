<?php
echo "<script type='text/javascript'>
        function qtype() {
            if (document.getElementById('mcr').checked)
            {
                document.getElementById('fans').style.visibility = 'visible';
            }
            else if (document.getElementById('war').checked)
            {
                document.getElementById('fans').style.visibility = 'hidden';
            }
        }
        </script>";
?>

<!--Question Submission.-->
<form action="createquestion.php" method="POST" name="upload">
    <p>Choose a question type:</p>
    <label>
        <input type="radio" id="mcr" name="questiontype" value="MC" onclick="qtype();" required>
        Multiple choice
    </label>
    <label>
        <input type="radio" id="war" name="questiontype" value="WA" onclick="qtype();" required>
        Word answer
    </label>
    <br><br>
    <input type="text" name="title" placeholder="Enter the question title" required></input>
    <br><br>
    <textarea name="question" placeholder="Enter the question" required></textarea>
    <br><br>
    <input type="text" name="answer" placeholder="Enter the correct answer" required></input>
    <br><br>
    <div id="fans" style="visibility:hidden">
        <input type="text" name="wrong1" placeholder="Enter an incorrect answer choice"></input>
        <br><br>
        <input type="text" name="wrong2" placeholder="Enter an incorrect answer choice"></input>
        <br><br>
        <input type="text" name="wrong3" placeholder="Enter an incorrect answer choice"></input>
        <br><br>
    </div>
    <br><br>
    <button id="submit" type="submit" name="submitquestion" value="submitquestion">Submit</button>
</form>