<?php
include("config.php");
session_start();
$errors = [];
$messages = [];
$resetPassword = isset($_SESSION['reset_password']) ? $_SESSION['reset_password'] : "";


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
                $_SESSION['login_user'] = $myusername;
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