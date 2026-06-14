<?php
include("dbconnect.php");
include("./include/base_library.php");

$objBaseLib = new BaseLibrary($con);
		
$data = array();
$data["issue_id"]			= $_REQUEST["issue_id"];
$data["FollowupDate"] 		= $_REQUEST["followup_date"];
$data["remarks"]			= $_REQUEST["remarks"];
$data["NextFollowupDate"]	= $_REQUEST["next_date"];
$data["issue_status"]		= $_REQUEST["issue_status"];
$data["updated_by_id"]		= $_SESSION['UID'];
$data["updated_date"]		= date("Y-m-d");
$submitId = $objBaseLib->insert_query('letter_followup', $data, 'id') ;  
$sql_progress  ="update letter_master set status  = '". $_REQUEST["issue_status"] ."' where id = " . $_REQUEST["issue_id"] ; 
mysql_query($sql_progress) ; 
header("Location:". $_SESSION["page"] ."&mode=success&qtype=sess");
exit;
?>