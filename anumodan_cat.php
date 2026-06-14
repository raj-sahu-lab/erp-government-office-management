<?php
ini_set( "display_errors", 0);
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

	if(document.frmApplication.officer.value=="0")
	{
	alert("Please select Minister/Officer.");
	return false;
	}
	
	if(document.frmApplication.department.value=="0")
	{
	alert("Please select Department.");
	return false;
	}
	
	if(document.frmApplication.app_name.value=="")
	{
	alert("Please enter issue Applicant's Name.");
	return false;
	}
	
	if(document.frmApplication.subject.value=="")
	{
	alert("Please enter Subject.");
	return false;
	}
	
	if(document.frmApplication.issue_status.value=="0")
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
		<td style="width:25px" bgcolor="#260357"></td>
		<td align="center">
	
		<table border="0" width="100%" cellpadding="0" cellspacing="0"  height="272">
			<tr>
				
				<td height="54" bgcolor="#260357">
				<p align="center"><font size="6" color="#FFFFFF">Document Management System
                <font size="5">
                <?php
                if($_SESSION['install']==1)
				{
				echo " - मु.मं.नि. कार्यालय";
				}
				if($_SESSION['install']==2)
				{
				echo " - कैम्प कार्यालय";
				}
				?>
                </font>
                </font></td>
				
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
				
				<td height="331" bgcolor="#FFFFFF" valign="top" align="center">
			
				<br> 
                        <table border="1" width="90%">
	<tr>
		<td align=center colspan="2">

<b><span lang="hi"><font size="4" color="#800000">&#2309;&#2344;&#2369;&#2350;&#2379;&#2342;&#2344; &#2350;&#2366;&#2360;&#2381;&#2335;&#2352;</font></span></b></td>
	</tr>
	<tr>
		<td align=center>
<form name="frmCat" method="get" action="anumodan_cat_submit.php">
<table border="0" width="400">
	<tr>
		<td colspan="3">
		<p align="center"><b><font face="Verdana" size="2">Add New Category</font></b></td>
	</tr>
	<tr>
		<td width="136">
		<p align="right">Category Name </td>
		<td width="4">:</td>
		<td width="245"><input type="text" name="category" size="27"></td>
	</tr>
	<tr>
		<td width="378" colspan="3" align="center">
		<input type="submit" value="Submit" name="submit"></td>
	</tr>
	<tr>
		<td width="136">&nbsp;</td>
		<td width="4">&nbsp;</td>
		<td width="245">&nbsp;</td>
	</tr>
</table>
</form>
		</td>
		<td align=center>


<form name="frmCat" method="get" action="anumodan_cat_submit.php">
                <table border="0" width="400">
                    <tr>
                        <td colspan="3">
                        <p align="center"><b><font face="Verdana" size="2">Add New Person</font></b></td>
                    </tr>
                    <tr>
                        <td width="136">
                        <p align="right">Category Name</td>
                        <td width="4">&nbsp;</td>
                        <td width="245">
                          <select name="anumodan_cat"   onChange="showAnumodan(this.value)" style="width:80px" >
                                <option value="0">Category</option>
                                <?php
                                $sql_panch =	" select ID,sName from `anumodan` where ParentId=0 ";
                   
                                mysql_query("SET NAMES utf8");
                                $rs_panch = mysql_query($sql_panch);
                                while($row = mysql_fetch_array($rs_panch))
                                {
                                echo "<option value='". $row['ID'] ."' " . $pSelected . " >" . $row['sName'] ."</option>";
                                }
                                ?>
                           </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="136">
                        <p align="right">Person Name </td>
                        <td width="4">:</td>
                        <td width="245"><input type="text" name="person_name" size="27"></td>
                    </tr>
                    <tr>
                        <td width="378" colspan="3" align="center">
                        <input type="submit" value="Submit" name="submit1"></td>
                    </tr>
                    <tr>
                        <td width="136">&nbsp;</td>
                        <td width="4">&nbsp;</td>
                        <td width="245">&nbsp;</td>
                    </tr>
                </table>
</form>                
                        </td>
                    </tr>
                    <tr>
                        <td>
                
                <p align="center"><b><font face="Verdana" size="2">&nbsp;Category List</font></b></td>
                        <td align=center>
                
                <p align="center"><b><font face="Verdana" size="2">&nbsp;Person List</font></b></td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top">                        
                        <?php
						$sql_panch =	" select ID,sName from `anumodan` where ParentId=0 ";
						mysql_query("SET NAMES utf8");
						$rs_panch = mysql_query($sql_panch);
						$i=1;
						while($row = mysql_fetch_array($rs_panch))
						{
						echo "&nbsp;&nbsp;&nbsp;&nbsp;". $i .":  " . $row['sName'] ." <br>";
						$i++;
						}
						?>                        
                        </td>
                        <td style="vertical-align:top">
                       <?php
						$sql_panch =	" select ID, sName, ParentId from `anumodan` where ParentId!=0 order by ParentId";
						mysql_query("SET NAMES utf8");
						$rs_panch = mysql_query($sql_panch);
						$i=1;
						while($row = mysql_fetch_array($rs_panch))
						{
							$sql =	" select sName from `anumodan` where id=" . $row['ParentId'];
							//echo $sql . "<br>";
							mysql_query("SET NAMES utf8");
							$rs = mysql_query($sql);
							$row1 = mysql_fetch_row($rs);
							//print_r($row1);
						echo "&nbsp;&nbsp;&nbsp;&nbsp;". $i .":  "  . $row1[0] . " -  "  . $row['sName'] ." <br>";
						$i++;
						}
						?>     
                        </td>
                    </tr>
                    <tr>
                        <td>
                
                <p align="center"></td>
                        <td align=center>&nbsp;
                
                </td>
                    </tr>
                    <tr>
                        <td>&nbsp;
                
                </td>
                        <td align=center>
                
                <p align="left"></td>
                    </tr>
                </table>




                                
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
