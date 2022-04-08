<?php
include("session.php");
if(isset($_POST['delete'])) {
    $GID = $_POST['GID'];
    $sql = "DELETE FROM gallery WHERE GID=:gid";
    $statement=$db->prepare($sql);
    $statement->bindValue(":gid", $GID);
    $statement->execute();
    $statement->closeCursor();
    echo "Deleted";
    header("location: ../../gallery.php");
}
?>