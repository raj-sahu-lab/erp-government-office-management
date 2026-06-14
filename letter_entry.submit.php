<?php
		include("dbconnect.php");
		include("./include/base_library.php");
		
		/// file upload script
			  	if ($_FILES["file1"]["error"] > 0)
				{
				$file1_name ="";
				//header("Location:letter_entry.php?mode=file1error");
				}
			 	else
				{
				$file1_name = date("hms") . $_FILES["file1"]["name"] ;
				move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $file1_name );
				}
			 
			 	if ($_FILES["file2"]["error"] > 0)
				{
				$file2_name = "";
				//header("Location:letter_entry.php?mode=file2error");
				}
			  	else
				{
				$file2_name = date("hms") . $_FILES["file2"]["name"] ;
				move_uploaded_file($_FILES["file2"]["tmp_name"], "upload/" . $file2_name );
				}
		//// end file upload script
		
		
		$objBaseLib = new BaseLibrary($con);
		
		$data = array();
	    $data["person_id"]	 	= $_REQUEST["officer"];
		$data["dept_id"] 		= $_REQUEST["department"];
		$data["applicant_name"]	= $_REQUEST["app_name"];
		$data["address"]		= $_REQUEST["app_address"];
		$data["subject"]   		= $_REQUEST["subject"];
		$data["description"]	= $_REQUEST["description"];
		$data["teep"] 			= $_REQUEST["comment"];
		//$data["anumodan"]		= $_REQUEST["reference"];
		$data["status"]			= $_REQUEST["issue_status"];
		$data["letter_date"]   	= $_REQUEST["letter_date"];
		$data["dispatch_date"]	= $_REQUEST["dispatch"];
		$data["created_id"]		= $_SESSION['UID'];
		$data["dispatch"]		= $_REQUEST["dispatch_no"];
		$data["letter_to"]		= $_REQUEST["letter_to"];
		$data["category"]		= $_REQUEST["cmb_category"];
		$data["file1"]			= $file1_name;
		$data["file2"]			= $file2_name;
		$data["install"]		= $_SESSION['install'] ;
		$data["anumodan_id"]	= $_REQUEST["anumodan_name"];
		$data["district"]		= $_REQUEST['district'] ;
		$data["vidhansabha"]	= $_REQUEST["vidhansabha"];
			
		$submitId = $objBaseLib->insert_query('letter_master', $data, 'id') ;  		
		
		$data = array();
		$data["issue_id"]			= mysql_insert_id();
		$data["FollowupDate"] 		= $_REQUEST["letter_date"];
		$data["remarks"]			= "Letter Created.";
		$data["NextFollowupDate"]	= $_REQUEST["nextfollowup_date"];
		$data["issue_status"]		= $_REQUEST["issue_status"];
		$data["updated_by_id"]		= $_SESSION['UID'];
		$data["updated_date"]		= date("Y-m-d");
		$data["updated_date"]		= date("Y-m-d");
		
		$submitId1 = $objBaseLib->insert_query('letter_followup', $data, 'id') ;  

		header("Location:letter_entry.php?mode=".$submitId."");
		exit;
?>