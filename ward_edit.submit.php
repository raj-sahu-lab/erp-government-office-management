<?php
include("dbconnect.php");

        $vs_id 			= 1;
	    $ward_id	 	= $_REQUEST["ward_id"];
		$visit_date 	= $_REQUEST["visit_date"];
		$problem_summary= $_REQUEST["problem_summary"];
		$description   	= $_REQUEST["description"];
		
		

		 $sql =	" update issue_master set
					ward_id='". $ward_id ."', visit_date='". $visit_date ."', problem_summary='". $problem_summary ."',  
					description='". $description ."' 
				  where id = ".$_REQUEST["id"];
		$rs = mysql_query($sql);
		
		if($rs)
		{
		header("Location:issue_list.php?mode=success");
		exit;
		}
		else
		{
		header("Location:issue_list.php?mode=fail");
		exit;
		}
?>