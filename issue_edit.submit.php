<?php
include("dbconnect.php");

if(isset($_REQUEST["letter_id"]) && $_REQUEST["letter_id"] !="")
{
	$data = array();
	
		/// file upload script
			  	if ($_FILES["file1"]["error"] > 0)
				{
				header("Location:letter_entry.php?mode=file1error");
				exit;
				}
			 	else
				{
				$file1_name = date("hms") . $_FILES["file1"]["name"] ;
				$data["file1"]			= $file1_name;
				move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $file1_name );
				}
			 
			 	if ($_FILES["file2"]["error"] > 0)
				{
				header("Location:letter_entry.php?mode=file2error");
				exit;
				}
			  	else
				{
				$file2_name = date("hms") . $_FILES["file2"]["name"] ;
				$data["file2"]			= $file2_name;
				move_uploaded_file($_FILES["file2"]["tmp_name"], "upload/" . $file2_name );
				}
		//// end file upload script
		
	    $data["person_id"]	 	= $_REQUEST["officer"];
		$data["dept_id"] 		= $_REQUEST["department"];
		$data["applicant_name"]	= $_REQUEST["app_name"];
		$data["address"]		= $_REQUEST["app_address"];
		$data["subject"]   		= $_REQUEST["subject"];
		$data["description"]	= $_REQUEST["description"];
		$data["teep"] 			= $_REQUEST["comment"];
		$data["anumodan"]		= $_REQUEST["reference"];
		//$data["status"]			= $_REQUEST["status"];
		$data["letter_date"]   	= $_REQUEST["letter_date"];
		$data["dispatch_date"]	= $_REQUEST["dispatch"];
		$data["created_id"]		= $_SESSION['UID'];
		$data["dispatch"]		= $_REQUEST["dispatch_no"];
		$data["letter_to"]		= $_REQUEST["letter_to"];
		$data["category"]		= $_REQUEST["cmb_category"];
		$data["anumodan_id"]	= $_REQUEST["anumodan_name"];
		
		//$issue_status	= $_REQUEST["issue_status"];
		
		 $sql =	"update letter_master set 
		 			person_id='". $data["person_id"] ."', dept_id='". $data["dept_id"] ."', applicant_name='". $data["applicant_name"]	 ."', 
					address='". $data["address"] ."', subject='". $data["subject"] ."', description='". $data["description"]	 ."', 
					teep='". $data["teep"] ."', anumodan='". $data["anumodan"] ."' , 
					letter_date='". $data["letter_date"] ."', dispatch_date='". $data["dispatch_date"] ."'
					, dispatch='". $data["dispatch"]	 ."', 
					letter_to='". $data["letter_to"] ."', category='". $data["category"] ."' , anumodan_id='". $data["anumodan_id"] ."' ";
		
		if (isset($data["file1"]))
		{
		$sql = $sql . " , file1='". $data["file1"] ."' " ; 
		}
		
		if (isset($data["file2"]))
		{
		$sql = $sql ." , file2='". $data["file2"] ."' " ; 
		}	
					
		$sql = $sql . "	where id=". $_REQUEST["letter_id"] ."";
		
		//echo $sql;  
		$rs = mysql_query($sql);
		
		if($rs)
		{
		header("Location:issue_page.php?mode=success");
		exit;
		}
		else
		{
		header("Location:issue_page.php?mode=fail");
		exit;
		}
}
else
{
header("Location:issue_page.php?mode=invalid");
exit;
}
?>