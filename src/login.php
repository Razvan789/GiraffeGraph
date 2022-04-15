<?php
include("scripts/php_scripts/config.php");
session_start();
$errors = [];
$messages = [];
$resetPassword = isset($_SESSION['reset_password']) ? $_SESSION['reset_password'] : "";

if(isset($_SESSION['login_user'])) {
    header("location: home.php");
}
if (isset($_POST["login"])) {
    // username and password sent from form 

    $myusername = $_POST['email'];
    if (strlen($myusername) < 1) {
        array_push($errors, "Email Field cannot be empty");
    }
    $mypassword = $_POST['password'];
    if (empty($mypassword)) {
        array_push($errors, "A password is required");
    }
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE Email = '$myusername'";
        $statement = $db->prepare($sql);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if ($row != NULL) {
            $hashedPass = $row['Pass'];
            if (password_verify($mypassword, $hashedPass)) {
                $_SESSION['login_user'] = $row['UID'];
                header("location: home.php");
            } else {
                array_push($errors, "Your Login Name or Password is invalid");
                $createdAccount = "";
                $resetPassword = "";
            }
        } else {
            array_push($errors, "Your Login Name or Password is invalid");
            $createdAccount = "";
            $resetPassword = "";
        }
    }
}


if (isset($_POST['register'])) {
    //This is done in reverse order so only the top most error is displayed
    //Confirm Pass
    $confirmPassword = $_POST["confirmPassword"];
    $errors = checkEmpty($confirmPassword, "Confirm Password");
    //Password
    $password = $_POST["password"];
    $errors = checkEmpty($password, "Password");
    //Email
    $email = $_POST["email"];
    $errors = checkEmpty($email, "Email");
    //Last Name
    $lastName = $_POST["lname"];
    $errors = checkEmpty($lastName, "Last Name");
    //First Name
    $firstName = $_POST["fname"];
    $errors = checkEmpty($firstName, "First Name");

    if (strcmp($password, $confirmPassword) != 0) {
        array_push($errors, "Passwords Must Match");
    }
    if (empty($errors)) {
        if (inUse($email, $db)) {
            array_push($errors, "Email is already in Use");
        }
    }
    // username and password sent from form 
    if (empty($errors)) {
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users VALUES (NULL,'$email','$hashedPass','$firstName','$lastName')";
        $statement = $db->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
        array_push($messages, "Account Created, Please Log in!");
        $_GET["page"] = 1;
    }
}

function checkPage($currPage)
{
    if (isset($_GET['page'])) {
        $page = intval($_GET['page']);
    } else {
        $page = 1;
    }
    if ($currPage != $page) {
        echo " d-none";
        return;
    }
    return;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giraffe Graph</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="scripts/JS_scripts/login.js" defer></script>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="login-grid">
        <!-- Login Form-------------------------------------------------------->
        <form action="" data-form='login' class="login-forms <?php checkPage(1) ?>" method="POST">
            <h2>Login</h2>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div style="color:#0a7300; margin-top:10px"><?php echo $resetPassword ?></div>
            <?php include("scripts/php_scripts/messages.php") ?>
            <p>Create a new account <a href="login.php?page=2" class="clickable">here</a></p>
            <p>Forgot your password? <a href="resetPass.php" style="color:#e7db2f">Reset Password</a></p>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <!-- Register form----------------------------------------------------->
        <form action="" data-form="register" class="login-forms <?php checkPage(2) ?>" method="POST">
            <h2>Register</h2>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingFName" name="fname" placeholder="John">
                <label for="floatingFName">First Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="lname" placeholder="Doe">
                <label for="floatingLName">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingRPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                <label for="floatingConfirmPassword">Confim Password</label>
            </div>
            <?php include("scripts/php_scripts/messages.php") ?>
            <p>Already have an account? <a href="login.php?page=1" class="clickable">Log in</a></p>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>

        <div data-text="login" class="login-text <?php checkPage(1) ?>">
            <h3>What is GiraffeGraph?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti reprehenderit libero, facilis quasi tempora, quidem veritatis dignissimos, voluptatum placeat neque odit harum impedit! Unde illum vero voluptatibus animi pariatur ea corporis autem ex. Officiis distinctio quae vitae hic tempora alias nam molestiae eligendi ducimus dolores est veritatis error, at, repellat accusamus similique atque quidem odio quos libero quia velit tenetur perferendis! Incidunt, assumenda natus sunt vero beatae culpa cum animi eligendi. Ex, obcaecati, autem eveniet adipisci nostrum optio odit necessitatibus odio beatae similique ratione nihil nulla, totam magni! Similique sint corrupti labore, dolore quo ratione provident incidunt tenetur molestiae maiores.</p>
            <!-- <p>This is a creative and enducational project created and managed by Razvan Beldeanu and Lindsey Andrews. The idea came from working on <a href="https://www.Grafstate.com">Grafstate.com</a> a software used to be able to take math notes easier on a computer.</p> -->
            <h3>What about GrafState?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae hic voluptate asperiores sint illo facilis consectetur, ullam nam magnam excepturi incidunt est quibusdam reprehenderit nihil molestias dolorem, blanditiis architecto at consequatur nulla. Praesentium facilis corrupti in nobis debitis aliquid consequuntur inventore repellendus, sunt iure officia ipsa molestiae similique veritatis magni? Et placeat, iure ducimus sint ab nobis rem esse porro sit doloremque eveniet. Iure incidunt voluptatem optio quaerat consectetur, accusamus, minima quae facilis eum facere animi, architecto odio eos? Voluptatem voluptatibus tempore tenetur! Rem, quidem dolor laboriosam magni quae repellat cupiditate architecto quam, doloribus, cum corrupti veritatis ipsam recusandae quis.</p>
        </div>
    </div>
    </div>
</body>

</html>