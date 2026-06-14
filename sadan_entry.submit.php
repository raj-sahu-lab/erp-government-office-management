<?php
		include("dbconnect.php");
		include("./include/base_library.php");

		$objBaseLib = new BaseLibrary($con);
		
		$data = array();
		$data["iMonth"]	 				= $_REQUEST["cmb_month"];
		$data["iYear"] 					= $_REQUEST["cmb_year"];
		$data["iTotalIndoorPatient"]	= $_REQUEST["total_patient"];
		$data["iTotalCareTaker"]		= $_REQUEST["total_caretaker"];
		$data["iTotalOutDoorPatient"] 	= $_REQUEST["total_outdoor"];
		$data["iFreeTreatmentLetter"]	= $_REQUEST["total_nishulk_letter"];
		$data["iTotalPersonFood"] 		= $_REQUEST["total_bhojan"];

		$submitId = $objBaseLib->insert_query('rjnsadan', $data, 'ID') ;  		
		header("Location:sadan_entry.php?mode=".$submitId);
		exit;
?>