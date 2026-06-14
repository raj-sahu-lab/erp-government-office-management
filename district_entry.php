<?php
ini_set( "display_errors", 0);
include("dbconnect.php");
include("./include/base_library.php");
$objBaseLib = new BaseLibrary($con);
if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
{
}
else
{
header("Location:index.php?mode=logout");
exit;
}

if(isset($_REQUEST["Save"]) && $_REQUEST["Save"]!="")
{
	$data = array();
	
	$data["District_Name"]	 	= $_REQUEST["District_Name"];
	$data["State_Id"]	 		= $_REQUEST["State_Name"];
	//$data["FileCode"]	 	= $_REQUEST["ContactPerson_Mobile"];
	$submitId = $objBaseLib->insert_query('district', $data, 'ID') ;  		
	header("Location:district_entry.php?mode=". mysql_insert_id() ."&type=".$_REQUEST["submit"]);
 exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="hi">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document Management System </title>
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
//document.getElementById('loader').style.display="block";
function setDOB()
{
//document.frmApplication.visit_date.value = document.frmApplication.dob.value;
}

function validate()
{

	if(document.frmApplication.Person_Name.value=="0")
	{
	alert("Please select Minister/Officer.");
	return false;
	}
	
	if(document.frmApplication.Post_Name.value=="0")
	{
	alert("Please select Post Name.");
	return false;
	}
	
	if(document.frmApplication.Person_Mobile.value=="")
	{
	alert("Please enter Person Mobile.");
	return false;
	}
	
	if(document.frmApplication.Contact_Person.value=="")
	{
	alert("Please enter Contact Person.");
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
    	document.getElementById('loader').style.display="none";
		//eval(xmlhttp.responseText);
		//addSelectOption(ary1)
    }
	else
	{
		document.getElementById('loader').style.display="block";
	}
  }
xmlhttp.open("GET","getDepartment.php?id="+str,true);
xmlhttp.send();
}



function showAnumodan(str)
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
		document.getElementById("spanAnumodan").innerHTML = xmlhttp.responseText ;
    	document.getElementById('loader').style.display="none";
		//eval(xmlhttp.responseText);
		//addSelectOption(ary1)
    }
	else
	{
		document.getElementById('loader').style.display="block";
	}
  }
xmlhttp.open("GET","getAnumodanName.php?id="+str,true);
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
alert(document.frmApplication.visit_date.value);
}
//-->
</script>
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>

</head>

<body bgcolor="#C0C0C0" topmargin=5>

<table align=center border="0" width="950" cellpadding="0" cellspacing="0" >
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
		<td align="center">
	
		<table border="0" width="100%" cellpadding="0" cellspacing="0"  height="272">
			<tr>
				
				<td height="54" bgcolor="#630E0E">
<img src="images/rjn.jpg" width="100%">				</td>
				
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
				
				<td height="331" bgcolor="#FFFFFF" valign="top" align="center">
			
				
<table border="1" width="100%">
	<tr>
		<td width="320" align="center">
		
	<form name="frmApplication" method="post" onSubmit="return validate()">
		<table border="1" width="319">
			<tr>
				<td colspan="2" align="center" bgcolor="#808080">
				<font color="#FFFFFF" face="Verdana" size="2"><b>District Master</b></font></td>
			</tr>
			<tr>
				<td width="139" align="right"><font face="Verdana" size="2">District Name : </font></td>
				<td width="164">
				<select name="State_Name">
					<option value="0">Select State</option>					
				<?php
					$sql_person =	" select ID, State_Name  from  state ";
					mysql_query("SET NAMES utf8");
					$rs_person = mysql_query($sql_person);					
					while($row = mysql_fetch_array($rs_person))
					{
					echo "<option value='". $row['ID'] ."'>". $row['State_Name'] ."</option>";
					}
				?>
				</select>				
				</td>
			</tr>
			<tr>
				<td align="right"><font face="Verdana" size="2">District Name : </font></td>
				<td><font face="Verdana">
				<input type="text" name="District_Name" size="25"></font></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><font face="Verdana">
				<input type="submit" value="Submit" name="Save"><font size="2">&nbsp;
				</font><input type="reset" value="Reset" name="B2"></font></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>	
		
		<p></td>
		<td width="564" valign="top">
		<table border="1" width="100%">
			<tr>
				<td width="29" bgcolor="#808080" align="center"><b>
				<font color="#FFFFFF" size="2" face="Verdana">SNo</font></b></td>
				<td bgcolor="#808080" align="center" width="180"><b>
				<font face="Verdana" size="2" color="#FFFFFF">Name</font></b></td>
				<td bgcolor="#808080" align="center" width="28"><b>
				<font face="Verdana" size="2" color="#FFFFFF">Edit</font></b></td>
				<td bgcolor="#808080" align="center" width="23"><b>
				<font face="Verdana" size="2" color="#FFFFFF">Del</font></b></td>
			</tr>
			<?php
			$sql_person =	"SELECT
								  `district`.ID,
								  `district`.District_Name,
								  `state`.State_Name
								FROM
								  `district`
								  INNER JOIN `state` ON (`district`.State_Id = `state`.ID)
								 Order by State_Name,District_Name ";
			mysql_query("SET NAMES utf8");
			$rs_person = mysql_query($sql_person);
			$i=1;
			while($row = mysql_fetch_array($rs_person))
			{
			?>
			<tr style="font-family:verdana; font-size:12px">
				<td width="29">
				<p align="center"><?php echo $i;  ?></td>
				<td width="180"><?php echo $row['State_Name'] . " / " . $row['District_Name'];  ?></td>
				<td width="28">&nbsp;</td>
				<td width="23">&nbsp;</td>
			</tr>
			<?php
			$i++;
			}
			?>
		</table>
		
		
		</td>
	</tr>
	<tr>
		<td width="320" align="center">&nbsp;</td>
		<td valign="top">&nbsp;</td>
	</tr>
</table>






                                
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
