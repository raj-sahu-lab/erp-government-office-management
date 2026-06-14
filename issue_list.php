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
<title>Document Management System : MIS</title>
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


function markImp(id)
{
		  if (id=="")
		  {
		 // document.getElementById("txtHint").innerHTML="";
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
		  
		  //alert(xmlhttp.readyState + " : " + xmlhttp.status);
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				// SECURITY: eval() removed — XSS vector. Response inserted as HTML only.
				var mode = (xmlhttp.responseText.indexOf("mode='Y'") !== -1) ? "Y" : "N";
					if(mode=="Y")
					{
					document.getElementById(id).src = "images/star_red.gif";
					document.getElementById('loader').style.display="none";
					}
					else
					{
					document.getElementById(id).src = "images/star_grey.gif";
					document.getElementById('loader').style.display="none";
					}
				}
				else
				{
				//ocument.getElementById("spanVillage").innerHTML = xmlhttp.responseText ;
    			document.getElementById('loader').style.display="block";
				}
		  }
		xmlhttp.open("GET","markImp.php?id="+id,true);
		xmlhttp.send();
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
<table align=center border="0" width="95%" cellpadding="0" cellspacing="0">
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
		<td>
	
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
				<td height="331" bgcolor="#FFFFFF" valign="top">
				
		<form name="frmIssue"  id="frmIssue" method="get" action="" onSubmit="">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; font-weight:bold">
					<tr>
						<td colspan="3" height="34">
						<p align="center"><font face="Verdana"><b>
						<span lang="en-us">Problem List </span></b></font>
                        <div id="loader" style="background-color:#FFFF99; color:#993300; display:none; position:fixed; top:40%;left:40%; width:200px">
                          <div align="center"><img src="images/loader-green.gif" width="32" height="33"> Processing.... Please wait...</div>
                        </div>                        </td>
					</tr>
					<tr>
					  <td colspan="3" align="">
                      <table style="width:100%; font-family:verdana; font-size:11px">
                      	<tr>
                        	<td>Category</td><td>
                            <select size="1" name="cat"   style="width: 140; height: 21; ">
                          <option value="0" selected>----All----</option>
                          	<?php
							$sql_cat =	" select id, sub_cat from sub_cat ";
			   
							mysql_query("SET NAMES utf8");
							$rs_cat = mysql_query($sql_cat);
							while($row = mysql_fetch_array($rs_cat))
							{
							echo "<option value='". $row['id'] ."' >". $row['id'] ." " . $row['sub_cat'] ."</option>";
							}
							?>
                        </select></td>
                            <td>Minister / Officer</td><td>
                            <select size="1" name="officer"  onChange="showUser(this.value)" style="width: 180; height: 21">
                          <option value="0" selected>-----All-----</option>
                          	<?php
							$sql_panch =	" select ID,PersonName from `person_master` ";
			   
							mysql_query("SET NAMES utf8");
							$rs_panch = mysql_query($sql_panch);
							while($row = mysql_fetch_array($rs_panch))
							{
								if(isset($_REQUEST["officer"]) and $_REQUEST["officer"] == $row['id'])
								{
								$pSelected =  " selected " ; 
								}
								else
								{
								$pSelected =  " " ;
								}
						echo "<option value='". $row['ID'] ."' " . $pSelected . " >". $row['ID'] ." " . $row['PersonName'] ."</option>";
							}
							?>
                        </select></td>
                            <td>Department</td><td>
                      <span id="spanVillage">
                      <select name="department" style="width: 170; height: 21">
                      	<option value="0">----- All-----</option>
                      </select>
                      </span>
                      </td>
                            <td> Status</td>
                          <td>
                          <select size="1" name="issue_status" style="width: 90; height: 21">
                          <option value="0" selected>-----All-----</option>
                          <?php
						$sql_ward =	" select id, Issue_Status from issue_status where Active_YN='Y'";
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
							if(isset($_REQUEST['issue_status']) && $_REQUEST['issue_status'] == $row['id'] )
							{
							echo "<option value='". $row['id'] ."' selected>"  . $row['Issue_Status'] ."</option>";
							}
							else
							{
					  		echo "<option value='". $row['id'] ."' >"  . $row['Issue_Status'] ."</option>";
							}
					    }
						?>
                        </select></td>
                            <td><input type="submit" name="submit" value="Show"></td>
                        </tr>
                      	<tr>
                      	  <td>Anumodan</td>
                      	  <td>
                          <select name="Anumodan">
                          <option value="0">ALL</option> 
							  <?php
                                $sql_cat1 =	"select id, sname from anumodan where parentid=0 order by id";
                   
                                mysql_query("SET NAMES utf8");
                                $rs_cat1 = mysql_query($sql_cat1);
								
                                while($row_cat1 = mysql_fetch_array($rs_cat1))
                                {
								echo '<optgroup label="' . $row_cat1['sname'] .'" style="padding-left: 10px;"></optgroup> ' ;

									$sql_cat2 =	"select id, sname from anumodan where parentid='". $row_cat1['id'] ."' order by id";
									mysql_query("SET NAMES utf8");
									$rs_cat2 = mysql_query($sql_cat2);
									while($row_cat2 = mysql_fetch_array($rs_cat2))
									{
									echo '<option value="' . $row_cat2['id'] .'">&nbsp;&nbsp;&nbsp;' . $row_cat2['sname']. '</option> ' ;
									}
                                }
                                
                                ?>
                          </select>
                          </td>
                      	  <td>Starred 
                      	    <input type="checkbox" name="chkImp"> </td>
                      	  <td>&nbsp;</td>
                      	  <td>&nbsp;</td>
                      	  <td>&nbsp;</td>
                      	  <td>&nbsp;</td>
                      	  <td>&nbsp;</td>
                      	  <td>&nbsp;</td>
                   	    </tr>
                      </table>
                      
                      </td>
				  </tr>
			<tr>						
			<td colspan="3">
						
<table border="1" width="100%" bordercolor="#C0C0C0" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="59">
	<tr>
		<td width="36" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;SNo</font></td>
		<td bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Minister/Officer<br>
		  &nbsp;Department</font></td>
          <td bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Anumodan </font></td>
		<td width="96" bgcolor="#003366"><font size="2" face="Verdana" color="#FFFFFF"> &nbsp;Name</font></td>
		<td width="338" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Subject</font></td>
		<td width="96" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Status</font></td>
		<td width="80" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Follow-up Date</font></td>
		<!--td width="38" bgcolor="#003366" align="center"><font size="2" face="Verdana" color="#FFFFFF">Edit</font></td-->
	</tr>
	 <?php
	 
		$sql_ward =	"  SELECT DISTINCT 
						  letter_master.id as letter_id,
						  letter_master.applicant_name,
						  letter_master.subject,
						  letter_master.person_id,
						  letter_master.dept_id,
						  person_master.PersonName,
						  person_department.Department,
						  issue_status.id,
						  issue_status.Issue_Status,
						  letter_master.anumodan,
						  letter_master.imp,
						  letter_master.file1,
						  letter_master.file2,
						  (SELECT NextFollowupDate from letter_followup where issue_id=letter_master.id ORDER by id desc LIMIT 1) as NextFollowup , 
						 ( SELECT  concat(b1.sName, ',' , a1.sName) as anumodan  FROM anumodan a1 INNER JOIN anumodan b1 ON (a1.ID = b1.ParentId)
						    where b1.ID=letter_master.anumodan_id ) as anumodan1
						FROM
						  letter_master
						  INNER JOIN person_master ON (letter_master.person_id = person_master.ID)
						  INNER JOIN person_department ON (letter_master.dept_id = person_department.ID)
						  INNER JOIN issue_status ON (letter_master.`status` = issue_status.id)"; 
					  
						if(isset($_REQUEST['officer']) && $_REQUEST['officer']!='0')
						{
						$sql_ward  = $sql_ward . " and letter_master.person_id =". $_REQUEST['officer'] ;
						}
						
						if(isset($_REQUEST['department']) && $_REQUEST['department']!='0')
						{
						$sql_ward  = $sql_ward . " and letter_master.dept_id=" . $_REQUEST['department'] ;
						}
						
						if(isset($_REQUEST['cat']) && $_REQUEST['cat']!='0')
						{
						$sql_ward  = $sql_ward . " and letter_master.category=" . $_REQUEST['cat'] ;
						}
						
						if(isset($_REQUEST['issue_status']) && $_REQUEST['issue_status']!='0')
						{
						$sql_ward  = $sql_ward . " and issue_status.id=" . $_REQUEST['issue_status'] ;
						}
						
						if(isset($_REQUEST['Anumodan']) && $_REQUEST['Anumodan']!='0')
						{
						$sql_ward  = $sql_ward . " and letter_master.anumodan_id=" . $_REQUEST['Anumodan'] ;
						}
						
						$sql_ward  = $sql_ward . " and letter_master.install=" . $_SESSION['install'] ;
						
						if(isset($_REQUEST['chkImp']) && $_REQUEST['chkImp']=="on")
						{
						$sql_ward  = $sql_ward . " order by imp desc ";
						}
						else
						{
						$sql_ward  = $sql_ward . " order by NextFollowup desc ";
						}

		if(isset($_REQUEST['qtype']) && $_REQUEST['qtype']=="sess")
		{
			$rs_ward = mysql_query($_SESSION["qry"]);
		}
		else
		{
			$rs_ward = mysql_query($sql_ward);
			$_SESSION["qry"] = $sql_ward;
		}
		
		$_SESSION["page"] = "issue_list.php";
		
		
		mysql_query("SET NAMES utf8");
		
		$i=1;

		while($row = mysql_fetch_array($rs_ward))
		{
	?>
	<tr style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; height:25px">
		<td width="36" align="center"><?php echo $i; ?>
        <?php 
		if($row['imp']=="Y")
		{
		?>
		<img id="star_<?php echo $row['letter_id']; ?>" height="18" src="images/star_red.gif" align="right" onClick="markImp(this.id)" style="cursor:pointer">		
		<?php
		}
		if($row['imp']=="N")
		{
		?>
		<img id="star_<?php echo $row['letter_id']; ?>" height="18" src="images/star_grey.gif" align="right" onClick="markImp(this.id)" style="cursor:pointer">		
		<?php
		}
		?>        </td>
		<td width="129" align="left"><?php echo $row['PersonName'] . "<br>[".  $row['Department']."]"; ?></td>
        <td width="122" align="left"><?php echo $row['anumodan1'] . $row["anumodan"]; ?></td>
		<td><a href="followup.php?id=<?php echo $row['letter_id']; ?>"><?php echo $row['applicant_name']; ?></a></td>
		<td><a href="followup.php?id=<?php echo $row['letter_id']; ?>"><?php echo $row['subject']; ?></a>
        <?php if ($row['file1']!="") { ?><br>
        <a href="./upload/<?php echo $row['file1']; ?>" target="_blank">File 1</a> <?php }  if ($row['file2']!="") { ?> | 
        <a href="./upload/<?php echo $row['file2']; ?>" target="_blank">File 2</a> <?php } ?>
        </td>
		<td width="96"><?php echo $row['Issue_Status']; ?><a href="letter_print.php?id=<?php echo $row['letter_id']; ?>"><img src="images/print_icon.jpg" height="30" border="0"></a></td>
		<td width="80">
		<?php echo $row['NextFollowup']!=""?date("d/m/Y", strtotime($row['NextFollowup'])):"N/A"; ?>
        <a href="issue_edit.php?id=<?php echo $row['letter_id']; ?>&action=edit">Edit</a> &nbsp; <a href="issue_edit.php?id=<?php echo $row['letter_id']; ?>&action=delete"
        onClick="return confirm('Do you want to delete this application?\nName:  <?php echo $row["applicant_name"] . "\\n Status: " . $row['Issue_Status'] ; ?>');">Delete</a>        </td>
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
</table>					  </td>
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
