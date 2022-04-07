<?php
include("scripts/php_scripts/session.php");
header("location: gallery.php?searchType=UID&searchTerm=$login_session_UID");
?>