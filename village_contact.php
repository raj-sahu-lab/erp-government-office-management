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

<!-- AJAX Code start -->

<script type="text/javascript">
function showUser(str)
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
		<form name="frmWard"  id="frmWard" method="post" action="village_contact.submit.php" onSubmit="return validate()">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					
					<tr>
						<td colspan="4" height="34">
						<p align="center"><font face="Verdana"><b>
					  <span lang="en-us">Village Contact Entry Form</span></b></font></td>
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
                        </select>
                        </td>
					    <td align="right">Panchayat  :</td>
					    <td width="309">
                        <select size="1" name="panchayat"  onChange="showUser(this.value)" style="width: 190; height: 21">
                          <option value="0" selected>-----Select Panchayat-----</option>
                          	<?php
							$sql_panch =	" select id, panchayat_name from panchayat where vs_id=1 ";
			   
							mysql_query("SET NAMES utf8");
							$rs_panch = mysql_query($sql_panch);
							while($row = mysql_fetch_array($rs_panch))
							{
								if(isset($_SESSION["sPanchayat"]) and $_SESSION["sPanchayat"] == $row['id'])
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
					    <td width="94" align="right"></td>
					    <td>
					</td>
					</tr>
					<tr>
						<td width="292" align="right"><span lang="en-us">Contact Name : </span></td>
						<td colspan="3">
						<input type="text" name="contact_name"  style="width: 250px; height: 21"  onchange="setDOB()"></td>
					</tr>
					<tr>
						<td width="292" align="right" valign="top"><span lang="en-us">
						Mobile Number : </span></td>
						<td colspan="3"><input type="text" maxlength="10" name="mobile"  style="width: 150px; height: 21"></td>
					</tr>
					<tr>
					  <td align="right" height="26">Post : </td>
					  <td height="26" colspan="3"><input type="text"  name="post"  style="width: 150px; height: 21"></td>
				  </tr>
					<tr>
						<td width="292" align="right" height="26">Remarks : </td>
						<td height="26" colspan="3"><input type="text"  name="remarks"  style="width: 500px; height: 21"></td>
				  </tr>
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
						<input type="submit" value="Submit" name="B1" class="command" ><span lang="en-us">&nbsp;
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

if(isset($_SESSION["sPanchayat"]))
{
?>
<script language="javascript">
 showUser(<?php echo $_SESSION["sPanchayat"]; ?>);
</script>
<?php
}

?>
</body>

</html>

