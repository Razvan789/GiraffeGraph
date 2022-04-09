<?php
include("session.php");
if(isset($_POST['delete'])) {
    //THERE NEEDS TO BE ANOTHER CHECK HERE THAT THE GID BELONGS TO THE CORRECT USER
    $GID = $_POST['GID'];
    $sql = "DELETE FROM gallery WHERE GID=:gid";
    $statement=$db->prepare($sql);
    $statement->bindValue(":gid", $GID);
    $statement->execute();
    $statement->closeCursor();
    echo "Deleted";
    header("location: /
    $site/src/gallery.php");
}
?>