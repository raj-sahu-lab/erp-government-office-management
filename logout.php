<?php
include("dbconnect.php");

session_destroy();

header("Location:index.php?mode=logout");
exit;
?>
