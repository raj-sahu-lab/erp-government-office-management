<?php
include("dbconnect.php");
if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
{
$pid = $_GET["pid"];;
$vid = $_GET["vid"];;

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
	if(document.frmWard.panchayat.value=="0")
	{
	alert("Please select Panchayat.");
	return false;
	}
	
	if(document.frmWard.village.value=="0")
	{
	alert("Please select Village.");
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

<!-- AJAX Code start -->

<script type="text/javascript">
function showUser(str)
{
//alert(str);
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
xmlhttp.open("GET","getVillage.php?"+str,true);
xmlhttp.send();
}
</script>


<!-- AJAX Code end  -->
<script language="JavaScript" type="text/javascript">
<!--
var count1 = 0;

function addSelectOption(ary1)
{
  var elOptNew = document.createElement('option');
  elOptNew.text = 'Append' + num;
  elOptNew.value = 'append' + num;
  var elSel = document.getElementById('selectX');

  try {
    elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
  }
  catch(ex) {
    elSel.add(elOptNew); // IE only
  }
}


function check()
{
alert(document.frmWard.visit_date.value);
}
//-->
</script>

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
				
		<form name="frmWard"  id="frmWard" method="post" action="village_edit.submit.php" onSubmit="return validate()">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					
					<tr>
						<td colspan="4" height="34">
						<p align="center"><font face="Verdana"><b>
					  <span lang="en-us">Village Issue Edit Form</span></b></font></td>
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
						<td width="227" align="right"><span lang="en-us">
						Vidhaansabha : </span></td>
						<td>
                        <select size="1" name="vs_id"  disabled="disabled" style="width: 190">
                          <option value="0">-----Select Vidhansabha-----</option>
                          <option selected value="1">[District Name]</option>
                        </select></td>
					    <td align="right">Panchayat  :</td>
					    <td width="309">
                        <select size="1" name="panchayat"  onChange="showUser('id='+this.value)" style="width: 190; height: 21">
                          <option value="0" selected>-----Select Panchayat-----</option>
                          	<?php
							$sql_panch =	" select id, panchayat_name from panchayat where vs_id=1 ";
			   
							mysql_query("SET NAMES utf8");
							$rs_panch = mysql_query($sql_panch);
							while($row = mysql_fetch_array($rs_panch))
							{
								if(isset($row1[3]) and $row1[3] == $row['id'])
								{
								$pSelected =  " selected " ; 
								}
								else
								{
								$pSelected =  " " ;
								}
							echo "<option value='". $row['id'] ."' " . $pSelected . " >". $row['id'] ." " . $row['panchayat_name'] ."</option>";
							}
							?>
                        </select>
                        </td>
					</tr>
					<tr>
						<td width="227" align="right">Village : </td>
					  <td width="239">
                      <div id="spanVillage">
                      <select name="village" style="width: 190; height: 21">
                      	<option value="0">---- Select Village ----</option>
                      </select>
                      </div>                      </td>
					    <td width="94" align="right">&nbsp; Visit Date :<br></td>
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
                      <input type="hidden" id="visit_date" name="visit_date" value="" /></td>
					</tr>
					<tr>
						<td width="227" align="right"><span lang="en-us">Problem Summary : </span></td>
						<td colspan="3"><input type="text" value="<?php echo $row1[6]; ?>" name="problem_summary" size="87" style="width: 555; height: 21"  onChange="setDOB()"> 
						<br><a href="converter.php" target="_blank">Kruti To Unicode</a> </td>
				  </tr>
					<tr>
						<td width="227" align="right" valign="top"><span lang="en-us">
						Description : </span></td>
						<td colspan="3">
						<textarea rows="8" name="description" cols="85" style="width: 555; height: 97"><?php echo $row1[7];?></textarea></td>
					</tr>
					<!--tr>
						<td width="227" align="right" height="50"><span lang="en-us">Issue 
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
							if(isset($row1[8]) and $row1[8] == $row['id'])
							{
								$Selected =  " selected " ; 
							}
							else
							{
								$Selected =  " " ;
							}
					  	echo "<option value='". $row['id'] ."' " . $Selected . " >"  . $row['Issue_Status'] ."</option>";
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
						<td width="227" align="right"></td>
						<td colspan="3"></td>
					</tr>
					<tr>
						<td width="227" align="right" height="42">&nbsp;</td>
						<td height="42" colspan="3">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">
						<input type="submit" value="Update" name="B1" class="command" ><span lang="en-us">&nbsp;
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
<?php

if(isset($_GET["pid"]))
{
?>
<script language="javascript">
 showUser("id=<?php echo $_GET["pid"]; ?>&vid=<?php echo $_GET["vid"]; ?>");
</script>
<?php
}


?>
</body>

</html>

