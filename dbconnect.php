<?php
session_start();
$con=mysql_connect("[DB_HOST]","[DB_USER]","[DB_PASSWORD]");
mysql_select_db("[DB_NAME]", $con);
mysql_query("SET CHARACTER SET 'utf8'", $con);
error_reporting(0);
?>
