<?php
		include("dbconnect.php");

        $vs_id 			= 1;
	    $panchayat	 	= $_REQUEST["panchayat"];
		$village 		= $_REQUEST["village"];
		$contact_name 	= $_REQUEST["contact_name"];
		$contact_number	= $_REQUEST["mobile"];
		$post   		= $_REQUEST["post"];
		$remarks		= $_REQUEST["remarks"];
		
		$sql =	"INSERT INTO contact_master 
		 		(vs_id, panchayat_id, village_id, contact_name, contact_number,  
				post, remarks, created_by_id, created_date)
				VALUES ('". $vs_id ."', '". $panchayat ."', '". $village ."', '". $contact_name ."', '". $contact_number ."',
				 '". $post ."', '". $remarks ."' , '". $_SESSION['UID'] ."', now() )";
		//echo $sql;  
		$rs = mysql_query($sql);
			
		$_SESSION["sPanchayat"] = $_REQUEST["panchayat"];
		$_SESSION["sVillage"] 	= $_REQUEST["village"];

		if($rs)
		{
		header("Location:village_contact.php?mode=success");
		exit;
		}
		else
		{
		header("Location:village_contact.php?mode=fail");
		exit;
		}
?>