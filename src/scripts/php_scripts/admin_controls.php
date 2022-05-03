<?php
include("config.php");
//Make admin
if (isset($_POST['makeAdmin']) && isset($_POST['UID'])) {
    $UID = $_POST['UID'];
    $sql = "UPDATE users SET IsAdmin=1 WHERE UID=$UID";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->closeCursor();
    header("location: ../../admin_page.php");
}

if (isset($_POST['ban']) && isset($_POST['UID'])) {
    $UID = $_POST['UID'];
    if ($UID == 1) {
        echo "CANNOT DELETE ROOT";
        exit;
    }
    $sql = "DELETE FROM users WHERE UID=$UID";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->closeCursor();
    header("location: ../../admin_page.php");
}

if (isset($_POST['resetPass']) && isset($_POST['UID'])) {
    $UID = $_POST['UID'];
    $sql = "SELECT Email FROM users WHERE UID='$UID'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $token = bin2hex(random_bytes(20));
    $email = $result['Email'];


    $sql = "INSERT INTO reset_password(Email, Token) VALUES ('$email', '$token')";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->closeCursor();

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Password Reset";
    $msg = "Hi there,  Please visit https://www.$host/$site/src/newPass.php?token=$token to reset your password on our site";
    $msg = wordwrap($msg, 70);
    $headers = "From: password-reset@$host";
    mail($to, $subject, $msg, $headers);
    header("location: ../../admin_page.php");
}


if (isset($_POST['genToken']) && isset($_POST['UID'])) {
    $token = bin2hex(random_bytes(10));
    $UID = $_POST['UID'];
    $sql = "UPDATE users SET APIToken='$token' WHERE UID=$UID";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->closeCursor();
    header("location: ../../admin_page.php");
}

if (isset($_POST['revokeToken']) && isset($_POST['UID'])) {
    $UID = $_POST['UID'];
    $sql = "UPDATE users SET APIToken=NULL WHERE UID=$UID";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->closeCursor();
    header("location: ../../admin_page.php");
}
