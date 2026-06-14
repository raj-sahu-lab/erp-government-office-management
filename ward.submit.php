<?php
include("dbconnect.php");

        $vs_id 			= 1;
	    $ward_id	 	= $_REQUEST["ward_id"];
		$visit_date 	= $_REQUEST["visit_date"];
		$problem_summary= $_REQUEST["problem_summary"];
		$description   	= $_REQUEST["description"];
		$issue_status	= $_REQUEST["issue_status"];
		

		 $sql =	"INSERT INTO issue_master 
		 		(vs_id, ward_id, visit_date, problem_summary,  
				description, issue_status, created_by_id, created_date)
				VALUES ('". $vs_id ."', '". $ward_id ."', '". $visit_date ."', '". $problem_summary ."',
				 '". $description ."', '". $issue_status ."' , '". $_SESSION['UID'] ."', now() )";
		//echo $sql;  
		$rs = mysql_query($sql);
		$_SESSION["sWard"] 	= $_REQUEST["ward_id"];
		$_SESSION["sDT"] 	= $_REQUEST["visit_date"];
		if($rs)
		{
		$sql_progress  ="insert into issue_progress ( issue_id, issue_status, updated_date) values (". mysql_insert_id() .", '". $issue_status ."', '". $visit_date ."'  ) " ;
		mysql_query($sql_progress) ;
		header("Location:ward_visit.php?mode=success");
		exit;
		}
		else
		{
		header("Location:ward_visit.php?mode=fail");
		exit;
		}

?>