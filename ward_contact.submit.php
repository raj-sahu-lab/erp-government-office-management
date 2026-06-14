<?php
include("dbconnect.php");

        $vs_id 			= 1;
	    $ward_id	 	= $_REQUEST["ward_id"];
		$contact_name 	= $_REQUEST["contact_name"];
		$contact_number	= $_REQUEST["mobile"];
		$post   		= $_REQUEST["post"];
		$remarks		= $_REQUEST["remarks"];
		

		 $sql =	"INSERT INTO contact_master 
		 		(vs_id, ward_id, contact_name, contact_number,  
				post, remarks, created_by_id, created_date)
				VALUES ('". $vs_id ."', '". $ward_id ."', '". $contact_name ."', '". $contact_number ."',
				 '". $post ."', '". $remarks ."' , '". $_SESSION['UID'] ."', now() )";
		//echo $sql;  
		$rs = mysql_query($sql);
		//exit();
		$_SESSION["sWard"] 	= $_REQUEST["ward_id"];
		if($rs)
		{
		header("Location:ward_contact.php?mode=success");
		exit;
		}
		else
		{
		header("Location:ward_contact.php?mode=fail");
		exit;
		}

?>