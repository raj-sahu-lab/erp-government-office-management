<?php
include("dbconnect.php");
if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
{
}
else
{
	header("Location:index.php?mode=logout");
 exit;
}

?>
<html>

<head>
<meta http-equiv="Content-Language" content="hi">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>राजनांदगांव विधानसभा </title>
<style>
.command {
font-family: Garamond; color: #FFFFFF; font-size: 14pt; 
border-style: solid; border-width: 1px; padding-left: 4px; 
padding-right: 4px; padding-top: 1px; padding-bottom: 1px; 
background-color: #000080
}
</style>

<script language="javascript">

function validate()
{
	
	var old = new String(document.frmChangePwd.old_pass.value);
	old=old.trim();
	
	var newpass = new String(document.frmChangePwd.new_pass.value);
	newpass=newpass.trim();
	
	var cpass = new String(document.frmChangePwd.confirm_pass.value);
	cpass=cpass.trim();

	
	if(old=="")
	{
		alert("Please old enter password.");
		document.frmChangePwd.old_pass.focus();
		return false;
	}
	else if(newpass=="")
	{
		alert("Please new enter password.");
		document.frmChangePwd.new_pass.focus();
		return false;
	}
	else if(newpass==cpass)
	{
		if(newpass.length<6)
		{
		alert("Password should be greater than or equal to 6 character.");
		return false;
		}
		else if(confirm('Do you want to save?'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		alert("New password and Confirm Password should be same!");
		document.frmChangePwd.new_pass.focus();
		return false;
	}

	
}

</script>
<!--End For DTPicker-->
<style>


#user_registration
{
	border:1px solid #cccccc;
	margin:auto auto;
	margin-top:100px;
	width:400px;
}


#user_registration label
{
        display: block;  /* block float the labels to left column, set a width */
	float: left; 
	width: 70px;
	margin: 0px 10px 0px 5px; 
	text-align: right; 
	line-height:1em;
	font-weight:bold;
}

#user_registration input
{
	width:250px;
}

#user_registration p
{
	clear:both;
}

#submit
{
	border:1px solid #cccccc;
	width:100px !important;
	margin:10px;
}

h1
{
	text-align:center;
}

#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:200px;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:75px;	
	background:#ff5f5f;
}

.strength3
{
	width:120px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:160px;
}

.strength5
{
	background:#399800;
	width:200px;
}

#submit
{
	visibility:hidden;
}
h3
{
	padding:10px;
}

</style>
</style>

<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>

</head>

<body bgcolor="#C0C0C0" topmargin=5>

<table align=center border="0" width="950" cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:25px">
		<img border="0" src="images/image_01.gif" width="25" height="25"></td>
		<td bgcolor="#630E0E" >
				<table width="100%" border="0">
				  <tr>
					<td style="text-align:left; color=#FFFFFF; font-family:Verdana; font-size:12px">
					<?php
					if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
					{
						echo " <font color=white>Welcome <b>" .  $_SESSION['UserName'] . "</b>  |</font> <a href='logout.php'><font color=white>Logout</font></a> ";
					
					}
					?>
					</td>
					<td style="text-align:right; color=#FFFFFF; font-family:Verdana; font-size:12px">
					<font color="#FFFFFF">
					<script language="JavaScript">
					<!--
					var now = new Date();
					var days = new Array(
					'Sunday','Monday','Tuesday',
					'Wednesday','Thursday','Friday','Saturday');
					var months = new Array(
					'January','February','March','April','May',
					'June','July','August','September','October',
					'November','December');
					var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
					function fourdigits(number)	{
					return (number < 1000) ? number + 1900 : number;}
					today =  days[now.getDay()] + ", " +
					date + " " +
					months[now.getMonth()] + " " +		
					(fourdigits(now.getYear()));
					document.write(today);
					//-->
					</script>
                    </font>
					</td>
				  </tr>
				</table>		
		</td>
		<td style="width:25px">
		<img border="0" src="images/image_02.gif" width="25" height="25"></td>
	</tr>
	<tr>
		<td style="width:25px" bgcolor="#630E0E"></td>
		<td>
		<table border="0" width="100%" cellpadding="0" cellspacing="0"  height="272">
			<tr>
				
				<td height="54" bgcolor="#630E0E">
<img src="images/rjn.jpg" width="100%">
</td>
				
			</tr>
			<tr>
				
				<td height="19" bgcolor="#630E0E" style="text-align:left; color=#FFFFFF; font-family:Verdana; font-size:12px">
					<?php
					if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
					{
						include("menu.php");					
					}
					?>
				</td>
				
			</tr>
			<tr>
				
				<td height="331" bgcolor="#FFFFFF" valign="top">
				
<form name="frmChangePwd"  id="frmChangePwd" method="post" action="change_password.submit.php" onSubmit="return validate()">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					
					<tr>
						<td colspan="2" height="34">
						<p align="center"><font face="Verdana">Change Password</font></td>
					</tr>
                    
                    
					<tr>
					  <td colspan="2" align="center" style="color:#FF0000">                     </td>
				  	</tr>
					<tr>
					  <td height="52" align="right">&nbsp;</td>
					  <td width="480" align="left">&nbsp;</td>
				  </tr>
					<tr>
						<td width="403" align="right">Old Password : </td>
						<td align="left"><input type="password" name="old_pass" style="width:200px"> </td>
					</tr>
					<tr>
						<td width="403" align="right">New Password : </td>
						<td  height="23"><input type="password" name="new_pass"  onKeyUp="passwordStrength(this.value)" style="width:200px">
                        <br>
                        <div id="passwordDescription" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px">Password not entered</div>
                        <div id="passwordStrength" class="strength0"  style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px"></div>
                        </td>
				   </tr>
				   <tr>
						<td width="403" align="right" height="23">Confirm Password : </td>
						<td height="23"><input type="password" name="confirm_pass" style="width:200px"></td>
				   </tr>
					<!--tr>
						<td width="292" align="right" valign="top"><span lang="en-us">Next Step / Remarks : </span></td>
						<td colspan="3">
						<textarea rows="8" name="S2" cols="69" style="width: 555; height: 97"></textarea></td>
					</tr-->
					<tr>
						<td width="403" align="right"></td>
						<td></td>
					</tr>
					<tr>
						<td width="403" align="right" height="42">&nbsp;</td>
						<td height="42">
						<input type="submit" value="Update" name="B1" class="command"><span lang="en-us">&nbsp;
						</span><input type="reset" value="Reset" name="B2" class="command"></td>
					</tr>
					<tr>
					  <td align="right" height="126">&nbsp;</td>
					  <td height="126">&nbsp;</td>
				  </tr>
				</table>
			</form>		
				</td>
				
			</tr>
		
		</table>
		
		<td style="width:25px" bgcolor="#630E0E"></td>
	</tr>
	<tr>
		<td style="width:25px">
		<img border="0" src="images/image_03.gif" width="25" height="25"></td>
		<td bgcolor="#630E0E">&nbsp;</td>
		<td style="width:25px">
		<img border="0" src="images/image_04.gif" width="25" height="25"></td>
	</tr>
</table>

</body>

</html>