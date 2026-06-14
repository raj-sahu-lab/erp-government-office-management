<?php
include("dbconnect.php");

	if( isset( $_REQUEST["ACTION"]) && $_REQUEST["ACTION"]=='UPDATE' )
	{ 
	
	}
	
	if( isset( $_REQUEST["ACTION"]) && $_REQUEST["ACTION"]=='DEL' )
	{ 
	$sql = "delete from state where ID=".$_REQUEST["ID"];
	mysql_query($sql);
	mysql_close($con);
	header("Location:state_entry.php");
 exit;
	}
?>