<?php
include("dbconnect.php");

		 $new_pass_hash = mysql_real_escape_string(password_hash($_POST['new_pass'], PASSWORD_BCRYPT));
		 $uid = (int)$_SESSION['UID'];
		 $sql = "Update login set Password='" . $new_pass_hash . "' where ID=" . $uid;
		//echo $sql;
		$rs = mysql_query($sql);
		if($rs)
		{
			header("Location:change_password.php?mode=success");
			exit;
		}
		else
		{
			header("Location:change_password.php?mode=fail");
			exit;
		}
?>