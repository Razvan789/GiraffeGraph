<?php
include("config.php");
session_start();
$error = "";
$acctCreated = "Your account was Created, please log in";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $hashedPass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $sql = "INSERT INTO `logintable` (`id`, `Email`, `Password`, `FirstName`, `LastName`) VALUES (NULL,'{$_POST["email"]}','$hashedPass','{$_POST["fname"]}','{$_POST["lname"]}')";
    $result = mysqli_query($db, $sql);

    if($result != NULL) {
        header("location: login.php");
        $_SESSION['created_account'] = "Your account was successfully created! Please log in!";
    }
}
?>