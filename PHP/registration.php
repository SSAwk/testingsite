<?php
session_start();
//Login appuser
$db = mysqli_connect('mars.cs.qc.cuny.edu', 'wast3800', '23703800', 'wast3800') or die("Could not connect to database");
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['login'])) {
    $errors = array();
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM appuser WHERE `email` = '$email' AND `pwd` = '$password'";
        $results = mysqli_query($db, $query);
        $deb = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results)) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "Logged in Successfully";
            $_SESSION['user'] = $deb['user_id'];
            $_SESSION['usertype'] = $deb['user_type'];
            echo "You are now logged in.";
            header("Refresh:3; url=home.php");
        } else {
            array_push($errors, "Wrong email/Password combination. Please try again.");
        }
    }
    mysqli_close($db);
} 
else 
{
    $errors = array();

    //register appuser

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    //form validation

    if (empty($firstname)) {
        array_push($errors, "First name is required");
    }

    if (empty($lastname)) {
        array_push($errors, "Last name is required");
    }

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if ($password != $confirmpassword) {
        array_push($errors, "Password do not match");
    }

    if (empty($usertype)) {
        array_push($errors, "User type is required");
    }

    //check database for existing user with same username
    $user_check_query = "SELECT * FROM appuser WHERE email = '$email' LIMIT 1";

    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user["email"] === $email) {
            array_push($errors, "This email is already registered");
        }
    }

    if ($user) {
        if ($user["login"] === $username) {
            array_push($errors, "This username is already registered");
        }
    }

    //Register user if no errors

    if (count($errors) == 0) {
        $password = md5($password); //This will encrypt password

        $query = "INSERT INTO appuser (`login`, `pwd`, `first_name`, `last_name`, `email`, `user_type`) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$usertype')";

        mysqli_query($db, $query);

        $_SESSION['UserName'] = $username;
        $_SESSION['success'] = "You are now signed up";

        header('location: index.php');
        mysqli_close($db);
    }
}
?>

<?php if (is_countable($errors) && count($errors) > 0) : ?>
    <div>
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
        <!--redirect to index.php after 3 seconds-->
        <?php header("Refresh:3; url= index.php"); ?>
    </div>

<?php endif ?>