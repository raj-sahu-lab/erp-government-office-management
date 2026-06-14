<?php
include("dbconnect.php");
include("./include/base_library.php");

$objBaseLib = new BaseLibrary($con);


if(isset($_REQUEST["app_ids"]) && $_REQUEST["app_ids"]!="")
{
		$arr = $_REQUEST["app_ids"];
		$str_ids = "";
		
		foreach ($arr as &$value) 
		{
		$sql_progress  =" insert into letter_followup (issue_id, NextFollowupDate,remarks) values('". $value ."', '". $_REQUEST["forward_date"] ."', 'Date Forwarded')";
		//echo $sql_progress . "<br>";
		mysql_query($sql_progress) ; 
		}		
}		
header("Location:home.php?mode=forwarded");
exit;
?>