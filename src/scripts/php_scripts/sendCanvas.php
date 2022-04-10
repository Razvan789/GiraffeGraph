<?php
include("session.php");
if(isset($_POST['send-canvas'])) {
    $img = $_POST['img'];
    $title = $_POST['title'];
    $currentDateTime = date("Y-m-d h:i:s");
    $sql = "INSERT INTO gallery values (null, '$img', :title, '$login_session_UID',:dateTime)";
    $statement = $db->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':dateTime', $currentDateTime);
    $statement->execute();
    $statement->closeCursor();
    header("location: ../../gallery.php?filter=user&user=$login_session_UID");
}
?>