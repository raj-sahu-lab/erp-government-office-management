<?php
		include("dbconnect.php");
		include("./include/base_library.php");
		
		
		$objBaseLib = new BaseLibrary($con);
		
		$data = array();
		if(isset($_REQUEST["submit"]))
		{
	    $data["sName"]	 	= $_REQUEST["category"];
		$data["ParentId"]	= "0" ;
		}
		
		if(isset($_REQUEST["submit1"]))
		{
	    $data["ParentId"]	= $_REQUEST["anumodan_cat"];
		$data["sName"]	 	= $_REQUEST["person_name"];
		}
		
		$submitId = $objBaseLib->insert_query('anumodan', $data, 'ID') ;  		
		
		header("Location:anumodan_cat.php?mode=".$submitId."&type=".$_REQUEST["submit"]);
		exit;
?>