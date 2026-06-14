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
<title>राजनांदगांव विधानसभा MIS</title>
<style>
.command {
font-family: Garamond; color: #FFFFFF; font-size: 14pt; 
border-style: solid; border-width: 1px; padding-left: 4px; 
padding-right: 4px; padding-top: 1px; padding-bottom: 1px; 
background-color: #000080
}
</style>
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>
</head>

<body bgcolor="#C0C0C0" topmargin=5>

<table align=center border="0" width="1000" cellpadding="0" cellspacing="0">
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
				
		<form name="frmIssue"  id="frmIssue" method="get" action="" onSubmit="">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					<tr>
						<td colspan="3" height="34">
						<p align="center"><font face="Verdana"><b>
					  <span lang="en-us">Ward Contact List </span></b></font></td>
					</tr>
					<tr>
						<td width="233" align="right"><span lang="en-us">Vidhaansabha: 
						    <select size="1" name="vs_id" style="width: 120">
                            <option value="0">-----Select Vidhansabha-----</option>
                            <option selected value="1">[District Name]</option>
                          </select>
						</span></td>
						<td width="292"><span lang="en-us">Ward 
						Name :
						    <span lang="en-us">
						    <select size="1" name="ward_id" style="width: 150; height: 21">
                              <option value="0" selected>-----ALL-----</option>
                              <?php
						$sql_ward =	" select ward_no, ward_name from ward where vs_id=1";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
							if(isset($_REQUEST['ward_id']) && $_REQUEST['ward_id'] == $row['ward_no'])
							{
							echo "<option value='". $row['ward_no'] ."' selected > ". $row['ward_no'] ." " . $row['ward_name'] ."</option>";
							}
							else
							{
							echo "<option value='". $row['ward_no'] ."' > ". $row['ward_no'] ." " . $row['ward_name'] ."</option>";
							}
					    }
						?>
                            </select>
					    </span></span></td>
				      <td width="351"><input type="submit" name="submit" value="Show">
						 </td>
			      </tr>
					<tr>
						
						<td colspan="3">
						
<table border="1" width="100%" bordercolor="#C0C0C0" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="59">
	<tr>
		<td width="37" bgcolor="#003366" height="31"><b>
		<font size="2" face="Verdana" color="#FFFFFF">&nbsp;SNo</font></b></td>
		<td bgcolor="#003366" height="31"><b>
		<font size="2" face="Verdana" color="#FFFFFF">&nbsp;Ward</font></b></td>
		<td width="135" bgcolor="#003366" height="31"><b>
		<font size="2" face="Verdana" color="#FFFFFF">&nbsp;Contact Name</font></b></td>
		<td width="135" bgcolor="#003366"><b><font size="2" face="Verdana" color="#FFFFFF">&nbsp;Number</font></b></td>
		<td width="164" bgcolor="#003366" height="31"><b><font size="2" face="Verdana" color="#FFFFFF">Post</font></b></td>
		<td width="322" bgcolor="#003366" height="31"><b><font color="#FFFFFF" size="2" face="Verdana">Remarks</font></b></td>
		<!--td width="38" bgcolor="#003366" align="center"><font size="2" face="Verdana" color="#FFFFFF">Edit</font></td-->
	</tr>
	 <?php
	 
		$sql_ward =	"  SELECT 
						  contact_master.id,
						  ward.ward_name,
						  contact_master.contact_name,
						  contact_master.contact_number,
						  contact_master.post,
						  contact_master.ward_id,
						  contact_master.remarks
						FROM
						  contact_master
						  INNER JOIN ward ON (contact_master.ward_id = ward.id)
					    WHERE
						  (contact_master.vs_id=1) "; 
					  
						if(isset($_REQUEST['ward_id']) && $_REQUEST['ward_id']!='0')
						{
						$sql_ward  = $sql_ward . " and contact_master.ward_id =". $_REQUEST['ward_id'] ;
						}
						
						$sql_ward  = $sql_ward . " order by  contact_master.ward_id, `contact_master`.contact_name asc ";
		
		//echo $sql_ward ; 
		mysql_query("SET NAMES utf8");
		$rs_ward = mysql_query($sql_ward);
		$i=1;

		while($row = mysql_fetch_array($rs_ward))
		{
	?>
	<tr style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; height:25px">
		<td width="37" align="center"><?php echo $i; ?></td>
		<td width="133" align="left"><?php echo $row['ward_name']; ?></td>
		<td><?php echo $row['contact_name']; ?></td>
		<td width="135"><?php echo $row['contact_number']; ?></td>
		<td width="164"><?php echo $row['post']; ?></td>
		<td width="322"><?php echo $row['remarks']; ?></td>
		<!--td width="38" align="center">
        <?php
		if($_SESSION['LoginType']==1)
		{
		?> 
        <a href="ward_visit_edit.php?id=<?php echo $row['id']; ?>&wid=<?php echo $row['ward_id']; ?>"><img src="images/icon_edit.gif" border="0"></a>
        <?php
        }
		?>        </td-->
	</tr>
	<?php
	$i++;
		}
	?>
</table>
					  </td>
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