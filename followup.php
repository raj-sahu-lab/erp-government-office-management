<?php 
ini_set( "display_errors", 0);
include("dbconnect.php");
$_SESSION["page"] = basename($_SERVER['REQUEST_URI']);
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
<meta http-equiv="Content-Type" content="text/html; charset=">
<title>Document Management System
</title>
<style>
.command {
font-family: Garamond; color: #FFFFFF; font-size: 14pt; 
border-style: solid; border-width: 1px; padding-left: 4px; 
padding-right: 4px; padding-top: 1px; padding-bottom: 1px; 
background-color: #000080
}
</style>

<!--Start For DTPicker-->
<script type="text/javascript" src="./js/calendarDateInput.js"></script>
<script language="javascript">
function setDOB()
{
document.frmFollow.visit_date.value = document.frmFollow.dob.value;
}

function validate()
{
	
	if(document.frmFollow.remarks.value=="")
	{
	alert("Please enter issue description.");
	return false;
	}
	
	if(document.frmFollow.issue_status.value=="0")
	{
	alert("Please select issue status.");
	return false;
	}

	if(confirm('Do you want to save?'))
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>

<!--End For DTPicker-->
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
				
			<form name="frmFollow"  id="frmFollow" method="post" action="followup.submit.php" onSubmit="return validate()">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; ">
					
					<tr>
						<td colspan="4" height="34"><p align="center"><font face="Verdana"><b> Follow Up</b> </font></td>
					</tr>
                    <tr>
						<td colspan="4" height="34">
						
					   
					<?php
mysql_query("SET CHARACTER SET 'utf8'", $con);
						$sql_ward =	"  SELECT DISTINCT 
											letter_master.id as letter_id,
											letter_master.applicant_name,
											letter_master.address,
											letter_master.subject,
											letter_master.teep,
											letter_master.anumodan,
											letter_master.description,
											person_master.PersonName,
											letter_master.letter_to,
											letter_master.dispatch,
											letter_master.dispatch_date,	
											letter_master.file1,
											letter_master.file2,									  
											person_department.Department,
											issue_status.Issue_Status
										FROM
											letter_master
											INNER JOIN person_master ON (letter_master.person_id = person_master.ID)
											INNER JOIN person_department ON (letter_master.dept_id = person_department.ID)
											INNER JOIN issue_status ON (letter_master.`status` = issue_status.id)
										where letter_master.id=".$_REQUEST['id'];
		   
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
					     //echo  " 
					    ?>
                        <table width=95% style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
                            <tr>
                            	<td width="15%">जावक क्र.</td> 
                           	  <td width="85%"><?php echo "<b>". $row['dispatch'] . "</b>" ;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; दिनाकं - <?php echo "". $row['dispatch_date'] . "" ;?></td>
                          </tr>
                             <tr>
                            	<td>&nbsp;</td> 
                           	   <td></td>
                            </tr>
                            <tr>
                            	<td><strong>आवेदक का नाम</strong></td> <td><?php echo "<b>". $row['applicant_name']. "</b>" ;?></font></td>
                            </tr>
                            <tr>
                            	<td><strong>पता</strong></td> <td><?php echo "<b>". $row['address']. "</b>" ;?></td>
                            </tr>
                            <tr>
                            	<td><strong>विषय</strong></td> <td><?php echo "<b>". $row['subject'] . "</b>" ;?></td>
                            </tr>
                            <tr>
                            	<td><strong>प्रति</strong></td> <td><?php echo "<b>". $row['PersonName'] . "</b> [". $row["Department"]."]" ;?></td>
                            </tr>
                            <tr>
                            	<td><strong>पत्र प्रेषित</strong></td> <td><?php echo "<b>". $row['letter_to'] . "</b>" ;?></td>
                          </tr>
                            <tr>
                            	<td><strong>HCM टीप</strong></td> <td><?php echo "<b>". $row['teep'] . "</b>" ;?></td>
                            </tr>
                            <tr>
                            	<td><strong>अनुमोदन</strong></td> <td><?php echo "<b>". $row['anumodan'] . "</b>" ;?></td>
                            </tr>
                            <tr>
                            	<td><strong>विवरण</strong></td> <td><?php echo "<b>". str_replace("\n", "<br>",$row['description']) . "</b>" ;?></td>
                            </tr>
                            <tr>
                              <td>Attachment</td>
                              <td>
							  <?php 
							  if($row['file1']!="")
							  {
							  echo "<a href='./upload/". $row['file1'] ."' target='_blank'> File 1</a>" ;
							  }
							  ?>
                              <?php 
							  if($row['file2']!="")
							  {
							  echo "<a href='./upload/". $row['file2'] ."' target='_blank'> File 2</a>" ;
							  }
							  ?>
							  
                              </td>
                            </tr>
                        </table>
                        
                        <?php
			}
			?>
						<hr style="color:#0066CC; width:80%">
						<font face="Verdana"><b>Progrss : </b></font> 
						<?php
						mysql_query("SET CHARACTER SET 'utf8'", $con);
						$sql_ward =	"select id, issue_id, remarks, issue_status, FollowupDate, NextFollowupDate, FollowupDate, NextFollowupDate  from letter_followup where issue_id =".$_REQUEST['id'];
						$rs_ward = mysql_query($sql_ward);
						
						if(mysql_num_rows($rs_ward)>0)
						{
							while($row = mysql_fetch_array($rs_ward))
							{	
								if($row['issue_status']=='1')
								{
								$status = "<font color=red>Process</font>";
								}
								
								if($row['issue_status']=='2')
								{
								$status = "<font color=blue>Follow up</font>";
								}
								
								if($row['issue_status']=='3')
								{
								$status = "<font color=green>Pending</font>";
								}
								
								if($row['issue_status']=='4')
								{
								$status = "<font color=green>Issue Solved</font>";
								}
								
									if($row['remarks']=="Date Forwarded")
									{							
									 echo "<font size=2  face=verdana><strong>Remarks:</strong> ". $row['remarks'] . " ▐ </font>
									 <font size=2 face=verdana color='#003300'> 
									 <b>Next follow up date: </b>" .  $row['NextFollowupDate'] . "  ▐ </font> 
									 <font size=2  face=verdana> <strong>Current Status:</strong> " .  $status  . "</font>
									 <hr style='color:#CCCCCC; width:80%'>";
									}
									else
									{
									echo  "<p>
									<font size=2 color='#990000' face=verdana><b>Follow up date: </b>" .  $row['FollowupDate'] . "</font> ▐  
									<font size=2 face=verdana color='#003300'><b>Next follow up date: </b>" .  $row['NextFollowupDate'] . "</font> ▐ 
									<font size=2  face=verdana><strong> Current Status:</strong> " .  $status  . "<br><strong>Remarks:</strong> " . $row['remarks'] . "</font> 
    								<hr style='color:#CCCCCC; width:80%'></p>";
									}
							
							}
						}
						else
						{
							echo "No any progress." ; 
						}
						?>
						</p>
                                           </td>
				  </tr>
                    
					<tr>
					  <td colspan="4" align="center" style="color:#FF0000">
					  <?php 
					  if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=="success" )
					  {
					  echo "Data has been saved.";
					  }
					  
					  if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=="fail" )
					  {
					  echo "Some technical error!";
					  }
					  ?>					  </td>
				  	</tr>
					<tr>
						<td width="" align="right"><span lang="en-us">Follow Up  Date :</span></td>
						<td align="left"><script>DateInput('followup_date', true, 'YYYY-MM-DD')</script>
                        </td>
					    <td><span lang="en-us">&nbsp;</span></td>
					    <td></td>
					</tr>
					<tr>
						<td width="" align="right" valign="top">
						 Remarks : </td>
						<td colspan="3">
						<textarea rows="8" name="remarks" cols="69" onBlur="setDOB()" style="width: 555; height: 97"></textarea></td>
					</tr>
					<tr>
					  <td align="right" height="23">Next Follow Up  Date :</td>
					  <td height="23" colspan="3">
					  <script>DateInput('next_date', true, 'YYYY-MM-DD')</script>
                      </td>
				  </tr>
				   <tr>
						<td width="" align="right" height="28">Issue 
						Status : </td>
					   <td height="28" colspan="3">
						<select size="1" name="issue_status" style="width: 190; height: 21">
						<option value="0" selected>-----Select Issue Status-----</option>
						<?php
						$sql_ward =	" select id, Issue_Status from issue_status where Active_YN='Y'";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
						$selected = "";
						if($row['id']=='2')
						{
						$selected = "selected";
						}
					  	echo "<option value='". $row['id'] ."' ". $selected ." >"  . $row['Issue_Status'] ."</option>";
					    }
						?>
						</select>
                        <input type="hidden" name="issue_id" value="<?php echo $_REQUEST['id']; ?>">                        </td>
					</tr>
					<!--tr>
						<td width="292" align="right" valign="top"><span lang="en-us">Next Step / Remarks : </span></td>
						<td colspan="3">
						<textarea rows="8" name="S2" cols="69" style="width: 555; height: 97"></textarea></td>
					</tr-->
					<tr>
						<td width="292" align="right"></td>
						<td colspan="3"></td>
					</tr>
					<tr>
						<td width="292" align="right" height="42">&nbsp;</td>
						<td height="42" colspan="3">
						<input type="submit" value="Update" name="B1" class="command"><span lang="en-us">&nbsp;
						</span><input type="reset" value="Reset" name="B2" class="command"></td>
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