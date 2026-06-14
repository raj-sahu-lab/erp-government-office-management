<?php
include("dbconnect.php");
if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
{

	$sql=" select * from issue_master where id=" . $_GET["id"];
	$rs1 = mysql_query($sql);
	$row1 = mysql_fetch_row($rs1);

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

<!--Start For DTPicker-->
<script type="text/javascript" src="./js/calendarDateInput.js"></script>
<script language="javascript">
function setDOB()
{
document.frmWard.visit_date.value = document.frmWard.dob.value;
}

function validate()
{
	if(document.frmWard.ward_id.value=="0")
	{
	alert("Please select ward.");
	return false;
	}
	
	if(document.frmWard.problem_summary.value=="")
	{
	alert("Please enter issue summary.");
	return false;
	}
	
	if(document.frmWard.description.value=="")
	{
	alert("Please enter issue description.");
	return false;
	}
	
	if(document.frmWard.issue_status.value=="0")
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
		<td bgcolor="#260357" >
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
					</td>
				  </tr>
				</table>		
		</td>
		<td style="width:25px">
		<img border="0" src="images/image_02.gif" width="25" height="25"></td>
	</tr>
	<tr>
		<td style="width:25px" bgcolor="#260357"></td>
		<td>
	
		<table border="0" width="100%" cellpadding="0" cellspacing="0"  height="272">
			<tr>
				
				<td height="54" bgcolor="#260357">
				<p align="center"><font size="6" color="#FFFFFF">राजनांदगांव विधानसभा - MIS</font></td>
				
			</tr>
			<tr>
				
				<td height="19" bgcolor="#260357" style="text-align:left; color=#FFFFFF; font-family:Verdana; font-size:12px">
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
				
		<form name="frmWard"  id="frmWard" method="post" action="ward_edit.submit.php" onSubmit="return validate()">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					
					<tr>
						<td colspan="4" height="34">
						<p align="center"><font face="Verdana"><b>
						<span lang="en-us">Ward Issue Edit Form</span></b></font></td>
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
					  ?>
					  </td>
				  	</tr>
					
					<tr>
						<td width="292" align="right"><span lang="en-us">
						Vidhaansabha : </span></td>
						<td colspan="3"><select size="1" name="vs_id"  disabled="disabled" style="width: 190">
                          <option value="0">-----Select Vidhansabha-----</option>
                          <option selected value="1">[District Name]</option>
                        </select>&nbsp;&nbsp;<a href="converter.php" target="_blank">Kruti To Unicode</a>  </td>
					</tr>
					<tr>
						<td width="292" align="right"><span lang="en-us">Ward 
						Name :</span></td>
						<td>
						<select size="1" name="ward_id" style="width: 190; height: 21">
						
						<option value="0" selected>-----Select Ward-----</option>
						<?php
						$sql_ward =	" select ward_no, ward_name from ward where vs_id=1";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
								if(isset($_REQUEST["wid"]) and $_REQUEST["wid"] == $row['ward_no'])
								{
								$wSelected =  " selected " ; 
								}
								else
								{
								$wSelected =  " " ;
								}
								
					  	echo "<option value='". $row['ward_no'] ."' ". $wSelected ." >". $row['ward_no'] ." " . $row['ward_name'] ."</option>";
					    }
						?>
						</select></td>
					    <td><span lang="en-us">&nbsp; Visit Date : </span></td>
					    <td>
						<?php
						if(isset($row1[5]))
						{
						$dt = $row1[5];
						?>
						<script>DateInput('dob', true, 'YYYY-MM-DD', '<?php echo $dt ; ?>' )</script>
						<?php
						}
						else
						{
						$dt = "";
						?>
						<script>DateInput('dob', true, 'YYYY-MM-DD' )</script>
						<?php
						}
						?>
                        <input type="hidden" id="visit_date" name="visit_date" value=""  /></td>
					</tr>
					<tr>
						<td width="292" align="right"><span lang="en-us">Problem 
						Summary : </span></td>
						<td colspan="3">
						<input type="text" value="<?php echo $row1[6]; ?>" name="problem_summary" size="87" style="width: 555; height: 21"  onchange="setDOB()"></td>
					</tr>
					<tr>
						<td width="292" align="right" valign="top"><span lang="en-us">
						Description : </span></td>
						<td colspan="3">
						<textarea rows="8" name="description" cols="69" style="width: 555; height: 97"><?php echo $row1[7];?></textarea></td>
					</tr>
					<!--tr>
						<td width="292" align="right" height="50"><span lang="en-us">Issue 
						Status : </span></td>
						<td height="50" colspan="3">
						<select size="1" name="issue_status" style="width: 190; height: 21">
						<option value="0" selected>-----Select Issue Status-----</option>
						<?php
						$sql_ward =	" select id, Issue_Status from issue_status where Active_YN='Y'";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
					  	echo "<option value='". $row['id'] ."' >"  . $row['Issue_Status'] ."</option>";
					    }
						?>
						</select></td>
					</tr-->
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
                        <input type="hidden" value="<?php echo $_REQUEST["id"]; ?>" name="id">
						<input type="submit" value="Submit" name="B1" class="command"><span lang="en-us">&nbsp;
						</span><input type="reset" value="Reset" name="B2" class="command"></td>
					</tr>
				</table>
		</form>		
				</td>
				
			</tr>
		
		</table>
		
		<td style="width:25px" bgcolor="#260357"></td>
	</tr>
	<tr>
		<td style="width:25px">
		<img border="0" src="images/image_03.gif" width="25" height="25"></td>
		<td bgcolor="#260357">&nbsp;</td>
		<td style="width:25px">
		<img border="0" src="images/image_04.gif" width="25" height="25"></td>
	</tr>
</table>

</body>

</html>