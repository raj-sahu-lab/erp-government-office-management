<?php 
/**
 *	base_user.php -  BaseUser class defined here will be used for managing user registration and his/her profile
 * 
 * 	PHP 5.0
 *
 * 	@copyright    Copyright (c) 2006, eWay Technologies
 *  @author  	  Rishindra Namdeo
 * 	@link         http://www.eWayTech.net
 * 	@package      etnm
 * 	@version      1.0.0
 *	@revision	  N/A	
 * 	@modifiedby   Rishindra Namdeo
 * 	@lastmodified $Date: 2006-04-04  
 */
	class BaseLibrary{

		function BaseLibrary($mysqlLinkId) {
		mysql_query("SET CHARACTER SET 'utf8'", $mysqlLinkId);
       }

		/*
		verify_password() checks a plain-text input against a stored hash.
		Supports both new bcrypt hashes and legacy MD5 hashes (for backward compat).
		*/
		function verify_password($input, $stored) {
			$info = password_get_info($stored);
			if ($info['algo'] !== 0 && $info['algo'] !== null) {
				// Modern bcrypt/argon2 hash
				return password_verify($input, $stored);
			}
			// Legacy MD5 hash — verify and accept (upgrade happens on next save)
			return md5($input) === $stored;
		}
	   
	  	/* Start function insert_query */
		function insert_query($tbl_name, $array_fields, $auto_table_id) 
		{
			$sql_fields =$auto_table_id ;
			$sql_values = 'null'; 
			$sql = 'INSERT INTO '. $tbl_name . '(';
			foreach ($array_fields as $key => $value) {
				$sql_fields = $sql_fields . ',' . $key;
				$sql_values = $sql_values . ",'" . $value . "'";
			}
			$sql = $sql . $sql_fields .' )values( ' . $sql_values . ')';
			//mysql_query("SET CHARACTER SET 'utf8'", $mysqlLinkId);
			//echo $sql; 
			//exit;
			$ret=mysql_query($sql);
			return $ret;
		} 
		/* END function insert_query */


		
		function showUser($search=''){
				$sql_select_user = "SELECT 
									  user_master.ID,
									  user_master.User_ID,
									  user_master.News_Paper,
									  user_master.Chief_Editor,
									  role_master.ID,
									  role_master.Roll_Type,
									  user_master.Contact_No,
									  user_master.Fax,
									  user_master.Created,
									  user_master.Active_YN
									FROM
									  user_master
									  LEFT OUTER JOIN role_master ON (user_master.User_Type_ID = role_master.ID)
									WHERE user_master.ID <> '' ";
									
					$rs = mysql_query($sql_select_user);
					if(mysql_num_rows($rs) > 0 )
					{
						for($i=0;$i<mysql_num_rows($rs);$i++)
						{   
							$row = mysql_fetch_row($rs) ;
							$user[$i][0] =$row[0];		//	user id (Numeric)
							$user[$i][1] =$row[1];		//	User Login ID (Email Id)
							$user[$i][2] =$row[2];		//	Name of News Paper
							$user[$i][3] =$row[3];		//	Name of Chief Editor
							$user[$i][4] =$row[4];		//	Role ID
							$user[$i][5] =$row[5];		//	Role Type
							$user[$i][6] =$row[6];		//	Contact Number
							$user[$i][7] =$row[7];		//	Fax
							$user[$i][8] =$row[8];		//	Created Date
							$user[$i][9] =$row[9];		//	Active YN
							
						 }
					 return $user;
					} 
		 }


		// start function for insert new news
		function insertNews($data)
		{
		 $this->insert_query("news_master",$data,'ID');
		 $sql_max_id = "select max(id) from news_master"; 
		 	 
			$rs =   mysql_query($sql_max_id);
		 	  if(mysql_num_rows($rs) > 0)
			  {
			  $row = mysql_fetch_row($rs) ;
			  return $row[0]; 
			  }
			  else
			  {
			  return 0; 
			  }
		}
		// end function for insert new news
		
		// start function for insert new news
		function insertNewsAttachment($data)
		{
		 $this->insert_query("news_attachment_reln",$data,'ID');
		}
		// end function for insert new news


		// start function for insertPhotoGallary
		function insertPhotoGallary($data)
		{
		 $this->insert_query("photo_gallary",$data,'ID');
		 $sql_max_id = "select max(id) from photo_gallary"; 
		 	 
			$rs =   mysql_query($sql_max_id);
		 	  if(mysql_num_rows($rs) > 0)
			  {
			  $row = mysql_fetch_row($rs) ;
			  return $row[0]; 
			  }
			  else
			  {
			  return 0; 
			  }
		}
		// end function for insertPhotoGallary
		
		// start function for insertPhotoGallaryAttachment
		function insertPhotoGallaryAttachment($data)
		{
		 $this->insert_query("photo_gallary_attachment",$data,'ID');
		}
		// end function for insertPhotoGallaryAttachment
		


		/*
		insertUser() function is used to Register a new user.
		Parameter : It accept one parameter in the form of array.
		*/
		function insertUser($data)
		{
			$pass = $this->checkDuplicate($data["User_ID"]);
			
			if(!$pass)
			{	$passw = password_hash($data["Password"], PASSWORD_BCRYPT);
				$data["Password"] = $passw;
				
				$this->insert_query("user_master",$data,'ID');
				return true;
			}				
			else
			{
				return false;
			}	
		}	

		/*

		updateUser() is used to update user profile.

		Parameter : it accept one paramer array parameter which holds tha data of user.

		modified date : 08-jun-06

		modified by : Rishindra Namdeo	

		*/	

			

		function updateUser($data){
		 	$sql_update = "update `usr_user` set `First_Name`='".$data['First_Name']."',  `Last_Name`=NULL,  

						`Address_1`='".$data['Address_1']."',  `Address_2`='".$data['Address_2']."',

						`City`='".$data['City']."',  `State`='".$data['State']."',  `Zip`='".$data['Zip']."',  

						`Country`='".$data['Country']."', `Gender`='".$data['Gender']."',  `Grade`='".$data['Grade']."',  

						`School_Name`='".$data['School_Name']."',  `Teacher_Name`='".$data['Teacher_Name']."',`Role_Id`='". $data["user_type"] ."', 

						`Comment`='".$data['Comment']."', `Updated_By_Id`='".$_SESSION['usr_user_id']."' where `ID`='".$_SESSION['usr_user_id']."' ";

		 //echo $sql_update ;

		 $this->query($sql_update);	

		}
		/*

		checkLogin() is used to check wheather user logged in or not.

		Parameter : It accept two parameter 1. $name - for user name, 2. $pass - for user password.

		*/		

		function checkLogin($name, $pass, $type='')
		{
			// Fetch by username only; verify password in PHP to support bcrypt + legacy MD5
			$safe_name = mysql_real_escape_string($name);
			$sql = "select * from  user_master where User_ID='" . $safe_name . "' and Active_YN='Y'";
		    $rs = mysql_query($sql);
			if( mysql_num_rows($rs) > 0)
			{
				$row = mysql_fetch_row($rs);
				$stored_password = $row[3]; // Password column
				if ($this->verify_password($pass, $stored_password)) {
					// If legacy MD5, upgrade to bcrypt on the fly
					if (strlen($stored_password) === 32 && ctype_xdigit($stored_password)) {
						$new_hash = password_hash($pass, PASSWORD_BCRYPT);
						$safe_uid = mysql_real_escape_string($row[0]);
						mysql_query("UPDATE user_master SET Password='" . $new_hash . "' WHERE ID='" . $safe_uid . "'");
					}
					$_SESSION['user_name'] = $row[1];
					$_SESSION['user_id']   = $row[0];
					$_SESSION['role_id']   = $row[4];
					$_SESSION['sess_id']   = session_id();
					return true;
				}
			}
			return false;
		}

		/*
		changePassword() is used to change the Current Password with the new one.
		Parameter :		
		*/

		function changePassword($oldpass,$pass){
			// Fetch stored hash for current user then verify in PHP (bcrypt + legacy MD5 compat)
		   $sql = "select Password from  usr_user where ID=" . intval($_SESSION['usr_user_id']);
			$this->query($sql);
		   if($this->numRows() > 0)
			{
				  $stored_row = $this->fetchRow();
				  if (!$this->verify_password($oldpass, $stored_row[0])) { return 0; }

				  $passw = password_hash($pass, PASSWORD_BCRYPT);

				  $sql="update usr_user 
				  		set Password = '".$passw ."' , 
				  		Updated = '". date("Y-m-d G:i:s") ."' ,
						Version_no = ". $this->getUserVersion($_SESSION['usr_user_id']) ."
						where ID=" . $_SESSION['usr_user_id'];

				  $this->query($sql);
				  return 1;
                
			 }else

			 {
				  return 0;					 

			 }

			}

				

		/*

		resetPassword() is used to reset the Current Password with the auto generated password.

		Parameter :	*/	

			

		function resetPassword($name){
			
			       $sql = "select Password from  usr_user where Login_Id='" . $name  . "'";		
			       $this->query( $sql );
                   if( $this->numRows() > 0)
				   {
				   $new_Password=[DB_PASSWORD];
				   $encrpt_password = password_hash($new_password, PASSWORD_BCRYPT);
				   $data[0]="Password";
				   $data[1]=$encrpt_password;
				   $whval[0]="Login_Id";
				   $whval[1]=$name;
				   $this->updateLogin("usr_user", $data, $whval);
				   $this->forgetPasswordEmail($name,$new_password);
				   return 3;					
					}
				    else
					{
				    return 4;	          
					}	  
		  
		  }


		/*
		logOut() function is used to logged out the current login user.
		Parameter :
		*/

		function logOut()
		{
			// clean up the session
			session_unregister('user_id');
			session_unregister('user_name');
			session_unregister('user_role');
			session_destroy();
			header("Location: index.php");
		}


		/*
		checkDuplicate() function is used to check wheather user is register or not.
		Parameter : It accept two parameter 1. $value - for Login id, 2. $pass - for Password
		*/

		function checkDuplicate($value)
		{
			$sql='select * from user_master where User_ID="'.$value.'"';
			$result = mysql_query($sql);			 			
			if(mysql_num_rows($result) >0)
			{
						
				return true;
			}
			else				
			{
						
				return false;
			}	
		}

		/*

		updateLogin() function is used to update the user last login date and time .

		Status : Under Construcure.

		*/

				

		function updateLogin($tbl,$arr_val,$wh_val){
		$sql='update '.$tbl.' set '.$arr_val[0].'="'.$arr_val[1].'" where '.$wh_val[0].'="'.$wh_val[1].'"';

			$this->query($sql);
		}

		

		

	/* forgetPasswordEmail() function is used for sending mail to user   */

   

	  

	   function  forgetPasswordEmail($user_name,$password)

	   {
	 		$boundary = "nextPart"; 

		$headers = "MIME-Version: 1.0\r\n"; 

		$headers .= "From: ". OWNER_COMPANY ." <". INFO_EMAIL .">\r\n";  			

		$headers .= "Content-Type: multipart/alternative; boundary = $boundary\r\n"; 			

		$headers .= "\n--$boundary\n"; 			

		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		

		$message = "Dear <b>$user_name</b>,<br><br>
					We have received your request for a new password.<br><br>
				  	Your new password is : <b>$password</b> <br><br>
					You may use your account anytime by visiting ". WEB_SITE_URL ." and
					entering your user id (your email address) and password.  After signing on,
					you may change your password by visting the 'Settings' tab and selecting the
					'Change Password' link.<br><br>
					If you have any questions, please feel free to contact us at ". SUPPORT_EMAIL . ",
					or click on the �feedback� link located on the right top corner of the home page.<br><br>
					Best Regards,<br><br><b>". OWNER_COMPANY .".</b><br>". WEB_SITE_URL ."  ";
          
		    mail($user_name ,"Password Reset" ,$message ,$headers);
			
	   }	

	   

	   

	   //getUserType() function is used for retrive the user typr

	   

	   	function getUserType($all=false)
		{
			$sql_select_user_type = "SELECT ID,Roll_Type FROM role_master where ID<>'' ";
			
			$rs = mysql_query($sql_select_user_type);
			
			if(mysql_num_rows($rs) > 0 )
			{
			    for($i=0;$i<mysql_num_rows($rs);$i++)
				{   
				    $row = mysql_fetch_row($rs) ;
	
					$user_type[$i][0] =$row[0];
	
					$user_type[$i][1]= $row[1];
	
				}
			 return $user_type;
			} 
		}


/// function to varify user email

		// 09-Oct-2006

		function emailVarify($uid, $password){	

		$sql_email_varify = "SELECT Login_Id 

							 FROM usr_user u where 

							 Login_Id='$uid' and 

							 Password=[DB_PASSWORD]";

		$this->query($sql_email_varify);


			if($this->numRows()>0)

			{

			    $sql_update_user = "update usr_user set Email_Varify='Y' where Login_Id='$uid'";

				$this->query($sql_update_user);
				return true;

			}

			else

			{

				return false;

			}

		}

		/// end function varify user email	
		
		////////////// //////// /////// ////////////////
		/// function to Save User Environment Variable login/logout date time///
		function SaveUserHistory($user_info)
		{	
			$result='';
	///query to change status if user not logged out
			$sp_sql = "update user_login_history set Logout_Status = 'expired', Logout_Date_Time = now() where Login_Id =" . $user_info[0] ." and Logout_Status='" . $user_info[1]."'";
		$this->query($sp_sql);
			$sp_sql=$this->callStoredProcedure('SP_User_Login_History',$user_info);	
		    $result = $this->db_query($sp_sql);
			return $result;
		 }
		////////////// //////// /////// ////////////////
		
		////////////// Start Function to create combo box //////// /////// ////////////////
		
		function fillDropDown($ctrl_name, $table_name, $id_field, $selected_id=0, $width, $where='')
		{
			$ddList='';
			$sql = "select * from  ". $table_name ." where Active_YN='Y'";	
			
			if($where!=''){
				$sql .= ' and '. $where ;  
			}
			
			$rs = mysql_query($sql);

			$ddList .= "<option value='0'> Select $ctrl_name </option>";
			
			if(mysql_num_rows($rs) > 0 )
			{
			    for($i=0;$i<mysql_num_rows($rs);$i++)
				{   
				    $row = mysql_fetch_row($rs) ;
						if($row[0]==$selected_id)
						$ddList .= "<option value='$row[0]' selected>$row[1]</option>";
						else
						$ddList .= "<option value='$row[0]' >$row[1]</option>";
					}
				$list_start = "<select name='".$ctrl_name."'  style='width:".$width."px'>";
				$list_end = "</select>";
				
				$list_start = $list_start . $ddList . $list_end;
				return $list_start;
				} 
			}

		////////////// End Function to create combo box //////// /////// ////////////////			  
		
			  /*Function to change the date format*/ 
	  
		function date_format($date_input, $output_format) 
		{
		/* date format
			1 = mm/dd/yyyy
			2 = mm/dd/yyyy H:M:S
			3 = mm/dd/yy
			4 = yyyy/mm/dd
			5 = yyyy-mm-dd
			6 = yyyy-mm-dd H:M:S
			7 = dd/mm/yyyy
		*/
		$date =  'false' ;
		
		if($date_input!='')
		{
			switch ($output_format) 
			{
			case '1':
				$date = date('m/d/Y', strtotime($date_input));
				break;
			case '2':
				$date = date('m/d/Y G:i:s', strtotime($date_input));
				break;	
			case '3':
				$date = date('m/d/y', strtotime($date_input));
				break;
			case '4':
				$date = date('Y/m/d', strtotime($date_input));
				break;
			case '5':
				$date = date('Y-m-d', strtotime($date_input));
				break;	
			case '6':
				$date = date('Y-m-d h:i:s', strtotime($date_input));
				break;	
			case '7':
				$date = date('d/m/Y', strtotime($date_input));
				break;			
			default : 
			    $date = 'false' ; 	
				break ; 
			}
		 }
		return $date ; 
		}
  	  /*Function to change the date format*/ 
	  
	}
?>
