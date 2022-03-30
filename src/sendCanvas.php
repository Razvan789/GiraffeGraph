<?php
include("session.php");
if(isset($_POST['send-canvas'])) {
    $img = $_POST['img'];
    $title = "Temp Title for Now";
    $currentDateTime = date("Y-m-d h:i:s");
    $sql = "INSERT INTO gallery values (null, '$img', '$title', '$login_session_UID','$currentDateTime')";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->closeCursor();
    header("gallery.php?filter=user&user=$login_session_UID");
}
?>