<?php
include("config.php");
session_start();
$errors = [];
$user_id = "";
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if(isset($_GET['error'])) {
    switch($_GET['error']){
        case "invalidToken":
            array_push($errors, "The Token was invalid, please enter email again");
            break;
    }
}

if (isset($_POST['submit_email'])) {
    $errors = [];
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT Email FROM logintable WHERE Email='$email'";
    $results = mysqli_query($db, $query);

    if (empty($email)) {
        array_push($errors, "Your email is required");
    } else if (mysqli_num_rows($results) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with the email: <b>$email</b>");
    }
    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(20));

    if (count($errors) == 0) {
        // store token in the password-reset database table against the user's email
        $sql = "INSERT INTO reset_password(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($db, $sql);

        // Send email to user with the token in a link they can click on
        $to = $email;
        $subject = "Reset your password on examplesite.com";
        $msg = "Hi there, visit localhost/GiraffeState/src/newPass.php?token=$token to reset your password on our site";
        $msg = wordwrap($msg, 70);
        $headers = "From: password-reset@GiraffeState.com";
        mail($to, $subject, $msg, $headers);
        array_push($errors, "<span style='color:green;'>We sent a password Reset to your email</span>");
    }
}



// ENTER A NEW PASSWORD
if(isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM reset_password WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
    //Checks to see if the token even exists    
    if($count < 1) {
        header("location: resetPass.php?error=invalidToken");
    }
}

if (isset($_POST['new_pass'])) {
    $new_pass = mysqli_real_escape_string($db, $_POST['newPassword']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['confirmNewPassword']);

    // Grab to token that came from the email link
    $token = $_GET['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
        // select email address of user from the password_reset table 
        $sql = "SELECT email FROM reset_password WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if ($email) {
            $new_pass =  password_hash($new_pass, PASSWORD_DEFAULT);
            $sql = "UPDATE logintable SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            $sql = "DELETE FROM reset_password WHERE token='$token'";
            mysqli_query($db, $sql);
            $_SESSION['reset_password'] = "Your password has been reset";
            header('location: login.php');
        }
    }
}

