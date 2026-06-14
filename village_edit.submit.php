<?php
include("dbconnect.php");
if(isset($_REQUEST["id"]) && $_REQUEST["id"] !="")
{
        $vs_id 			= 1;
	    $panchayat	 	= $_REQUEST["panchayat"];
		$village 		= $_REQUEST["village"];
		$visit_date		= $_REQUEST["visit_date"];
		$problem_summary= $_REQUEST["problem_summary"];
		$description   	= $_REQUEST["description"];
		//$issue_status	= $_REQUEST["issue_status"];
		
		 $sql =	"update issue_master set 
		 			panchayat_id='". $panchayat ."', village_id='". $village ."', visit_date='". $visit_date	 ."', 
					problem_summary='". $problem_summary ."', description='". $description ."'
				where id=". $_REQUEST["id"] ."";
		//echo $sql;  
		$rs = mysql_query($sql);
		
		if($rs)
		{
		//$sql_progress  ="update issue_progress set issue_status='". $issue_status ."' where issue_id = " . $_REQUEST["id"] ;
		//mysql_query($sql_progress) ;
		header("Location:village_issue_list.php?mode=success");
		exit;
		}
		else
		{
		header("Location:village_issue_list.php?mode=fail");
		exit;
		}
}
else
{
header("Location:village_issue_list.php?mode=invalid");
exit;
}
?>