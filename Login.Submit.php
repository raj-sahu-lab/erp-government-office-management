<?php
include("dbconnect.php");

        $LoginID 		= $_REQUEST["LoginID"];
	    $Password	 	= $_REQUEST["Password"];

		$safe_login = mysql_real_escape_string($LoginID);
		$sql =	"select Password,FirstName,LastName, ID, LoginType, install from login where LoginID='". $safe_login ."'";

		$rs = mysql_query($sql);

		if(mysql_num_rows($rs)>0)
		{
			$row = mysql_fetch_row($rs);
			$stored = $row[0];

			// Support both bcrypt hashes and legacy MD5 hashes
			$info = password_get_info($stored);
			$password_ok = false;
			if ($info['algo'] !== 0 && $info['algo'] !== null) {
				$password_ok = password_verify($Password, $stored);
			} else {
				$password_ok = (md5($Password) === $stored);
				if ($password_ok) {
					// Upgrade MD5 to bcrypt on successful login
					$new_hash = mysql_real_escape_string(password_hash($Password, PASSWORD_BCRYPT));
					$safe_id  = intval($row[3]);
					mysql_query("UPDATE login SET Password='" . $new_hash . "' WHERE ID=" . $safe_id);
				}
			}

			if($password_ok)
			{
				$_SESSION['LoginID'] 	= $_REQUEST["LoginID"];
				$_SESSION['UserName'] 	= $row[1] . "  "  .$row[2];
				$_SESSION['UID'] 		= $row[3] ;
				$_SESSION['LoginType'] 	= $row[4] ;
				$_SESSION['install'] 	= $row[5] ;
				header("Location:home.php");
				exit;
			}
			else
			{
				header("Location:index.php?mode=fail");
				exit;
			}
		}
		else
		{
			header("Location:index.php?mode=fail");
			exit;
		}
?>
