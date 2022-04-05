<?php
include("session.php");
header("location: gallery.php?searchType=UID&searchTerm=$login_session_UID");
?>