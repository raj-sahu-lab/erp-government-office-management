<?php
include("dbconnect.php");
if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
{

	if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete")
	{
	$sql=" delete from letter_master where id=" . intval($_GET["id"]);
	$rs = mysql_query($sql);

	$sql1=" delete from letter_followup where issue_id=" . intval($_GET["id"]);
	$rs1 = mysql_query($sql1);
	 header("Location:home.php?mode=del");
	 exit;
	}

	$pid = $_GET["id"];
	$sql=" select * from letter_master where id=" . $_GET["id"];
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
	
	if(document.frmApplication.anumodan_cat.value=="0")
	{
	alert("Please select anumodan.");
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
				<td height="331" bgcolor="#FFFFFF" valign="top">
		<form name="frmApplication"  id="frmApplication" method="post" action="issue_edit.submit.php" onSubmit="return validate()"  enctype="multipart/form-data" >			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					
					<tr>
						<td colspan="4" height="34">
						<p align="center"><font face="Verdana"><b>
					  <span lang="en-us">Letter Edit Form</span></b></font></td>
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
                      <div id="loader" style="background-color:#FFFF99; color:#993300; display:none">Loading.... Please wait...</div>                      </td>
				  	</tr>
					
					<tr>
					  <td align="right">Letter Category : </td>
					  <td>
                      <select size="1" name="cmb_category" style="width: 190; height: 21">
                        <option value="0" selected>-----Select Category-----</option>
                        <?php
							$sql_cat =	" select id, sub_cat from sub_cat ";
			   
							mysql_query("SET NAMES utf8");
							$rs_cat = mysql_query($sql_cat);
							while($row = mysql_fetch_array($rs_cat))
							{
								if(isset($row1[19]) and $row1[19] == $row['id'])
								{
								$pSelected =  " selected " ; 
								}
								else
								{
								$pSelected =  " " ;
								}
							echo "<option value='". $row['id'] ."' " . $pSelected . " >". $row['id'] ." " . $row['sub_cat'] ."</option>";
							}
							?>
                      </select>
                      </td>
					  <td style="text-align:right">&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
					<tr>
						
				      <td align="right">Minister/Officer  :</td>
					    <td width="215">
                        <select size="1" name="officer"  onChange="showUser(this.value)" style="width: 190; height: 21">
                          <option value="0" selected>-----Select Minister/Officer-----</option>
                          	<?php
							$sql_panch = " select ID,PersonName from `person_master` ";
			   
							mysql_query("SET NAMES utf8");
							$rs_panch = mysql_query($sql_panch);
							while($row = mysql_fetch_array($rs_panch))
							{
								if(isset($row1[1]) and $row1[1]  == $row['ID'])
								{
									$pSelected =  " selected " ; 
									$pSelected_id =  $row['ID'] ; 
								}
								else
								{
									$pSelected =  " " ;
								}
							echo "<option value='". $row['ID'] ."' " . $pSelected . " >". $row['ID'] ." " . $row['PersonName'] ."</option>";
							}
							?>
                        </select>                      
                        </td>
                      <td style="text-align:right">विभाग : </td>
				      <td><div id="spanVillage">
                      <select name="department" style="width: 150; height: 21">
                      	<option value="0">---- Select Department ----</option>
                      </select>
                      </div></td>
				  </tr>
					<tr>
						<td width="219" align="right">पत्र प्रेषित : </td>
					  <td width="215">
                      <input type="text" name="letter_to" size="30" style="height: 21" value="<?php echo $row1[10]; ?>"  onChange="">                      
                      </td>
				      <td width="114" align="right">Letter Date:</td>
                      <td width="321">  
                          <script>DateInput('letter_date', true, 'YYYY-MM-DD', '<?php echo $row1[3]; ?>')</script>
                          <input type="hidden" id="visit_date" name="visit_date" value="" />                      
                      </td>
				  </tr>
					<tr>
					  <td align="right">आवेदक का नाम : </td>
					  <td colspan="3"><input type="text" name="app_name" size="87" style="width: 555; height: 21"  value="<?php echo $row1[4]; ?>"   onChange="setDOB()"></td>
				  </tr>
					<tr>
					  <td align="right">आवेदक का पता : </td>
					  <td colspan="3"><input type="text" name="app_address" size="87" style="width: 555; height: 21"  value="<?php echo $row1[5]; ?>"   onChange="setDOB()"></td>
				  </tr>
					<tr>
						<td width="219" align="right"><span lang="en-us">विषय : </span></td>
					  <td colspan="3"><input type="text" name="subject" size="87" style="width: 555; height: 21"  value="<?php echo $row1[6]; ?>"   onChange=""></td>
				  </tr>
					<tr>
						<td width="219" align="right" valign="top"><span lang="en-us">संक्षिप्त
						विवरण : </span></td>
					  <td colspan="3">
						<textarea rows="8" name="description" cols="85" style="width: 555; height: 97"><?php echo $row1[7]; ?></textarea></td>
					</tr>
                  <tr>
					  <td align="right" height="25">HCM टीप : </td>
					  <td height="25" colspan="0"><input type="text" name="comment" size="30" style="height: 21"  value="<?php echo $row1[8]; ?>"  onChange=""></td>
                      <td align="right">अनुमोदन  :</td>
                      <td>
                      
                        <table>
                      	<tr>
                        	<td>
                                <select name="anumodan_cat"   onChange="showAnumodan(this.value)" style="width:80px" >
                                <option value="0">Category</option>
                                <?php
                                $sql_panch =	" select ID,sName from `anumodan` where ParentId=0 ";
                   				$pSelected="";
                                mysql_query("SET NAMES utf8");
                                $rs_panch = mysql_query($sql_panch);
                                while($row = mysql_fetch_array($rs_panch))
                                {
									
								
                                echo "<option value='". $row['ID'] ."' " . $pSelected . " >" . $row['sName'] ."</option>";
                                }
                                ?>
                                </select>
                          </td>
                          <td>
                                  <div id="spanAnumodan" style="">
                                  <select name="anumodan_name"  style="width:100px" >
                                        <option value="0">Select</option>
                                  </select>
                                  </div>
                          </td>
                           <td>
                              <a href="anumodan_cat.php" onClick=""> 
                                <img src="images/plus_icon.jpg" alt="plus" width="22" border="0">
                              </a>
                             	

                          </td>
                        </tr>
                      </table>
                                
                      <!--<input type="text" name="reference" size="30" style="height: 21"  value="<?php echo $row1[9]; ?>"   onChange="">-->
                      
                      </td>
				  </tr>
                  
					<tr>
					  <td align="right" height="25">जावक दिनांक : </td>
					  <td height="25" colspan="0">
					  <script>DateInput('dispatch', true, 'YYYY-MM-DD', '<?php echo $row1[11]; ?>' )</script>
                      <input type="hidden" id="dispatch_date" name="dispatch_date" value="" />                      </td>
                      <td align="right">जावक क्रमाकं : </td>
                      <td><input type="text" name="dispatch_no" size="30"  value="<?php echo $row1[18]; ?>"  style="height: 21">
                      <input type="hidden" name="letter_id" value="<?php echo $_REQUEST["id"] ;?>">
                      <input type="hidden" name="action" value="<?php echo $_REQUEST["action"] ;?>">
                       </td>
				  </tr>
				  </tr>
					<tr style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
					  <td align="right" height="25">Scaned Letter 1 : </td>
					  <td height="25" colspan="0">
                      <input type="file" name="file1" style="width:200px">
                      </td>
                      <td align="right">Scaned Letter 2 :</td>                      
                      <td><input type="file" name="file2" style="width:200px">                      
                      </td>
				  </tr>
					<!--tr>
						<td width="219" align="right" height="50"><span lang="en-us">आवेदन की स्थिति : </span></td>
					  <td height="50" colspan="3">
						<select size="1" name="issue_status" style="width: 190; height: 21">
						<option value="0" selected>-----Select Issue Status-----</option>
						<?php
						/*$sql_ward =	" select id, Issue_Status from issue_status where Active_YN='Y'";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
					  	echo "<option value='". $row['id'] ."' >"  . $row['Issue_Status'] ."</option>";
					    }*/
						?>
						</select></td>
					</tr-->
					<!--tr>
						<td width="292" align="right" valign="top"><span lang="en-us">Next Step / Remarks : </span></td>
						<td colspan="3">
						<textarea rows="8" name="S2" cols="69" style="width: 555; height: 97"></textarea></td>
					</tr-->
					<tr>
						<td width="219" align="right"></td>
					  <td colspan="3"></td>
					</tr>
					<tr>
						<td width="219" align="right" height="42">&nbsp;</td>
					  <td height="42" colspan="3">
						<input type="submit" value="Submit" name="B1" class="command" ><span lang="en-us">&nbsp;
						</span><input type="reset" value="Reset" name="B2" class="command">
                        <a href="converter.php" target="_blank">Kruti To Unicode</a></td>
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
<?php

if(isset($pSelected_id))
{

?>
<script language="javascript">
 showUser("<?php echo $pSelected_id; ?>");
</script>
<?php
}


if($row1[23]!="")
{
$sql_anu_parent = "select ParentId from anumodan where ID =". $row1[23];
$rs_anu_parent = mysql_query($sql_anu_parent);
$row_anu_parent= mysql_fetch_row($rs_anu_parent);
?>
<script language="javascript">
 showAnumodan("<?php echo $row_anu_parent[0]; ?>");
</script>
<?php
}


?>

</body>

</html>

