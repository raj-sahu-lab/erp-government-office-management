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
<!-- AJAX Code start -->

<script type="text/javascript">
function showVillage(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		//alert(xmlhttp.responseText); 
		document.getElementById("spanVillage").innerHTML = xmlhttp.responseText ;
    	//eval(xmlhttp.responseText);
		//addSelectOption(ary1)
    }
	else
	{
		//alert("Loading...");
	}
  }
xmlhttp.open("GET","getVillage.php?id="+str,true);
xmlhttp.send();
}
</script>
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>

<!-- AJAX Code end  -->
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
						<td colspan="4" height="34">
						<p align="center"><font face="Verdana"><b>
						<span lang="en-us">Ward Issue List </span></b></font></td>
					</tr>
					<tr>
						<td width="254">Panchayat 
						 : <span lang="en-us">
                        <select size="1" name="panchayat" style="width: 150; height: 21" id="panchayat" onChange="showVillage(this.value)">
                          <option value="0" selected>-----ALL-----</option>
                          <?php
						 $sql_ward =   " SELECT 
										   `panchayat`.panchayat_name,
										   `panchayat`.id
										 FROM
										   `panchayat`
										 Where vs_id=1  
										 order by id ASC";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
							//if(isset($_REQUEST['panchayat']) && $_REQUEST['panchayat'] == $row['id'])
//							{
//							echo "<option value='". $row['id'] ."' selected >" . $row['panchayat_name'] ."</option>";
//							}
//							else
//							{
							echo "<option value='". $row['id'] ."' >" . $row['panchayat_name'] ."</option>";
//							}
					    }
						?>
                        </select>
						</span>                        </td>
						<td width="70">Village 
					    :
			          <td width="209"> 
                        <div id="spanVillage">
						    <select size="1" name="village" style="width: 150; height: 21" id="village">
                              <option value="0" selected>-----ALL-----</option>
                            </select>
						</div>                       
			          <td width="386"><input type="submit" name="submit" value="Show">                         </td>
				    </tr>
					<tr>
						
						<td colspan="4">
						
<table border="1" width="100%" bordercolor="#C0C0C0" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="59">
	<tr>
		<td width="40" bgcolor="#003366" height="31"><b>
		<font size="2" face="Verdana" color="#FFFFFF">&nbsp;SNo</font></b></td>
		<td bgcolor="#003366" height="31"><b>
		<font size="2" face="Verdana" color="#FFFFFF">&nbsp;Panchayat / Village</font></b></td>
		<td width="135" bgcolor="#003366" height="31"><b>
		<font size="2" face="Verdana" color="#FFFFFF">&nbsp;Contact Name</font></b></td>
		<td width="135" bgcolor="#003366"><b><font size="2" face="Verdana" color="#FFFFFF">&nbsp;Number</font></b></td>
		<td width="164" bgcolor="#003366" height="31"><b><font size="2" face="Verdana" color="#FFFFFF">Post</font></b></td>
		<td width="322" bgcolor="#003366" height="31"><b><font color="#FFFFFF" size="2" face="Verdana">Remarks</font></b></td>
	</tr>
	 <?php
		$sql_ward =	"  SELECT 
						  contact_master.id,
						  contact_master.contact_name,
						  contact_master.contact_number,
						  contact_master.post,
						  contact_master.remarks,
						  contact_master.panchayat_id,
						  contact_master.village_id,
						  `panchayat`.panchayat_name,
						  `village`.village_name,
						  `panchayat`.id as pid,
						  `village`.id as vid
						FROM
						  contact_master
						  INNER JOIN `panchayat` ON (contact_master.panchayat_id = `panchayat`.id)
						  INNER JOIN `village` ON (contact_master.village_id = `village`.id)
						WHERE
						  (contact_master.vs_id = 1) "; 
					  
						if(isset($_REQUEST['panchayat']) && $_REQUEST['panchayat']!='0')
						{
						$sql_ward  = $sql_ward . " and contact_master.panchayat_id =". $_REQUEST['panchayat'] ;
						}
						
						if(isset($_REQUEST['village']) && $_REQUEST['village']!='0')
						{
						$sql_ward  = $sql_ward . " and contact_master.village_id =". $_REQUEST['village'] ;
						}
						
						$sql_ward  = $sql_ward . " order by `contact_master`.id desc ";
		
		//echo $sql_ward ; 
		mysql_query("SET NAMES utf8");
		$rs_ward = mysql_query($sql_ward);
		$i=1;

		while($row = mysql_fetch_array($rs_ward))
		{
	?>
        <tr style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; height:25px">
            <td width="40" align="center"><?php echo $i; ?></td>
            <td width="144" align="left"><?php echo $row['panchayat_name'] . " / " . $row['village_name']; ?></td>
            <td><?php echo $row['contact_name']; ?></td>
            <td width="135"><?php echo $row['contact_number']; ?></td>
            <td width="164"><?php echo $row['post']; ?></td>
            <td width="322"><?php echo $row['remarks']; ?></td>
        </tr>
	<?php
	$i++;
		}
	?>
</table>						</td>
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