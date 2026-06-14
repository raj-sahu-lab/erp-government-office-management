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
<title>Office of the Hon. CM, [City] ([State Name])
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

	function PrintFile(id)
	{
	document.getElementById(id).style.display="none";
	window.print();
	
	}
</script>

<!--End For DTPicker-->
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>
</head>

<body bgcolor="#C0C0C0" topmargin=5>
<table align=center border="0" width="950" cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:25px" bgcolor="#630E0E"></td>
		<td>
        <?php
		if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]==1)
		{
		echo "<center><font color=red>Letter has been created.</font><center>";
		}
		?>
		<table border="0" width="100%" cellpadding="0" cellspacing="0"  height="272">
			<tr>
				<td height="331" bgcolor="#FFFFFF" valign="top">
			<form name="frmFollow"  id="frmFollow" method="post" action="followup.submit.php" onSubmit="return validate()">			
				<table border="0" width="100%" cellpadding="2" cellspacing="3" style="font-family: serif; font-size: 11pt; ">
					
                    <tr>
						<td colspan="4" height="34">
					<?php
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
		   
						mysql_query("SET NAMES utf8");
						$rs_ward = mysql_query($sql_ward);
					    while($row = mysql_fetch_array($rs_ward))
					    {
					     //echo  " 
					    ?>
					<img id="prn" src="images/print_icon.jpg" alt="print" width="41" height="40" onClick="PrintFile(this.id)" align="right">
					<div align="center">
	<table border="0" width="914" style="font-size:20px">
		<tr>
			<td width="10">&nbsp;</td>
			<td width="894">
			<p align="center">
			<img border="0" src="images/cg_logo.jpg" width="93" height="97"><span lang="HI" style="font-size: 15.0pt; line-height: 115%; font-family: Mangal,serif"><br>
			</span><strong><font size="5">कैम्प कार्यालय, मुख्यमंत्री छ.ग. शासन</font><br>
			जी.ई. रोड, राजनांदगॉव </strong><br></td>
			</tr>
		<tr>
			<td width="10">&nbsp;</td>
			<td>
			<table border="0" width="100%">
				<tr>
					<td colspan="2">
					<p align="center"><strong>फोन:  07744-220022</strong></td>
				</tr>
				<tr>
				  <td colspan="2"><hr></td>
				  </tr>
				<tr>
					<td width="347">
					<span lang="HI" style="font-family: Mangal,serif">&#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;- <b>
					<?php
					if (trim($row['dispatch'])!="")
					{
					echo $row['dispatch'];
					}
					else
					{
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					?>
					/</b>कै.कार्या./2014</span></td>
					<td>
					<p align="right">
					<span lang="HI" style="font-family: Mangal,serif">राजनांदगॉव</span>,
					<span lang="HI" style="font-family: Mangal,serif">&#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</span>
                    <span style="font-family: Mangal,serif">&nbsp;
					<?php echo ($row['dispatch_date']!="")? (date("d-m-Y",strtotime($row['dispatch_date']))) : "&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;/2014" ; ?> <!--&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;/2014--></span></td>
				</tr>
			</table>
			<span lang="HI" style="font-family: Mangal,serif">&#2346;&#2381;&#2352;&#2340;&#2367;</span>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
			<span lang="HI" style="font-family: Mangal,serif">
            <p style="padding-left:60px">
			<?php echo "<b>". str_replace(",","<br>", $row['letter_to']) . "</b>" ;?></p></span>
            
           
			<p class="MsoNormal">
			<span lang="HI" style="font-family: Mangal,serif">&#2357;&#2367;&#2359;&#2351;&#2307;-</span><?php echo "<b>". $row['subject'] . "</b>" ;?></p>
			<p class="MsoNormal" align="center" style="text-align:center">
			**********</p>
			<p class="MsoNormal">
			
			<span style="font-family: Mangal,serif; padding:60px; text-align:justify"><?php echo "<b>". $row['applicant_name']. "</b>" ;?><?php echo "<b>". $row['address']. "</b>" ;?> 
			&#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2350;&#2366;. &#2350;&#2369;&#2326;&#2381;&#2351;&#2350;&#2306;&#2340;&#2381;&#2352;&#2368; &#2332;&#2368; &#2325;&#2375; &#2360;&#2350;&#2325;&#2381;&#2359; &#2313;&#2346;&#2352;&#2379;&#2325;&#2381;&#2340; &#2357;&#2367;&#2359;&#2351;&#2366;&#2306;&#2340;&#2352;&#2381;&#2327;&#2340; &#2346;&#2340;&#2381;&#2352; &#2346;&#2381;&#2352;&#2360;&#2381;&#2340;&#2369;&#2340; 
			&#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366; &#2361;&#2376; &#2404; 
			
			
            <?php
            if($row['teep']=="")
			{
			?>
            &#2350;&#2366;&#2344;&#2344;&#2368;&#2351; &#2350;&#2369;&#2326;&#2381;&#2351;&#2350;&#2306;&#2340;&#2381;&#2352;&#2368; 
			&#2332;&#2368; &#2325;&#2375; &#2344;&#2367;&#2352;&#2381;&#2342;&#2375;&#2358;&#2366;&#2344;&#2369;&#2360;&#2366;&#2352; &#2310;&#2357;&#2358;&#2381;&#2351;&#2325; &#2325;&#2366;&#2352;&#2381;&#2351;&#2357;&#2366;&#2361;&#2368; &#2325;&#2352;&#2344;&#2375; &#2325;&#2366; &#2325;&#2359;&#2381;&#2335; &#2325;&#2352;&#2375;&#2306; &#2404;
            <?php } else {?>
			&#2350;&#2366;&#2344;&#2344;&#2368;&#2351; &#2350;&#2369;&#2326;&#2381;&#2351;&#2350;&#2306;&#2340;&#2381;&#2352;&#2368; &#2332;&#2368; &#2325;&#2375; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; आवेदन पत्र मे <?php echo "<b>“". $row['teep'] . "”</b>" ;?> &#2335;&#2368;&#2346; &#2309;&#2306;&#2325;&#2367;&#2340; &#2325;&#2368; &#2327;&#2312; &#2361;&#2376; &#2404;
            <?php } ?>
            </font></span></p>
			<p class="MsoNormal" style="text-align:justify"> 
			<span lang="HI" style="font-family: Mangal,serif; padding:60px">&#2340;&#2340;&#2381;&#2360;&#2306;&#2348;&#2306;&#2343; &#2350;&#2375;&#2306; 
			&#2310;&#2357;&#2358;&#2381;&#2351;&#2325; &#2325;&#2366;&#2352;&#2381;&#2351;&#2357;&#2366;&#2361;&#2368; &#2361;&#2375;&#2340;&#2369; &#2346;&#2340;&#2381;&#2352; &#2350;&#2370;&#2354;&#2340;&#2307; &#2360;&#2306;&#2354;&#2327;&#2381;&#2344; &#2346;&#2381;&#2352;&#2375;&#2359;&#2367;&#2340; &#2361;&#2376; &#2404; </span></p>
			<p class="MsoNormal">
			<span lang="HI" style="font-family: Mangal,serif">&#2360;&#2306;&#2354;&#2327;&#2381;&#2344;:-
			&#2313;&#2346;&#2352;&#2379;&#2325;&#2381;&#2340;&#2366;&#2344;&#2369;&#2360;&#2366;&#2352; &#2404;</span></p>
			
			<p class="MsoNormal" align="right" style="text-align:right">
             ( आर. बी. तिवारी  )&nbsp;&nbsp;&nbsp; <br>
			 &#2357;&#2367;&#2358;&#2375;&#2359; &#2325;&#2352;&#2381;&#2340;&#2357;&#2381;&#2351;&#2360;&#2381;&#2341; &#2309;&#2343;&#2367;&#2325;&#2366;&#2352;&#2368; <br>
			  &#2350;&#2369;&#2326;&#2381;&#2351;&#2350;&#2306;&#2340;&#2381;&#2352;&#2368; ,&#2331;&#2340;&#2381;&#2340;&#2368;&#2360;&#2327;&#2338;&#2364; &#2358;&#2366;&#2360;&#2344;</p>
			<table border="0" width="100%">
				<tr>
					<td width="491">
					<span lang="HI" style="font-family: Mangal,serif">&#2346;&#2371;&#2359;&#2381;&#2336;&#2366;&#2306;&#2325;&#2344; </span><span lang="HI" style="font-family: Mangal,serif">&#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;- 
					<?php
					if (trim($row['dispatch'])!="")
					{
					echo $row['dispatch'];
					}
					else
					{
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					?>
                    /&#2350;&#2369;.&#2350;&#2306;.&#2344;&#2367;./2014</span></td>
					<td width="369">
					<p align="right">
					<span lang="HI" style="font-family: Mangal,serif">&#2352;&#2366;&#2351;&#2346;&#2369;&#2352;</span>,
					<span lang="HI" style="font-family: Mangal,serif">&#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</span><span style="font-family: Mangal,serif">
					</span><span lang="HI" style="font-family: Mangal,serif">-<?php //echo "". date("d/m/Y", strtotime( $row['dispatch_date'])) . "" ;?> &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;/2014</span></td>
				</tr>
			</table>
			
			<span lang="HI" style="font-family: Mangal,serif"><strong>&#2346;&#2381;&#2352;&#2340;&#2367;&#2354;&#2367;&#2346;&#2367;:-</strong></span><br>
            <span lang="HI" style="font-family: Mangal,serif; padding:60px">
			1.<?php echo "<b>". $row['applicant_name']. "</b>" ;?><?php echo "<b>". $row['address']. "</b>" ;?> &#2325;&#2368; &#2323;&#2352; &#2360;&#2370;&#2330;&#2344;&#2366;&#2352;&#2381;&#2341; &#2346;&#2381;&#2352;&#2375;&#2359;&#2367;&#2340;&#2404;
            </span></p>
			<br>
			<p class="MsoNormal" align="right" style="text-align:right">
			<br>
			 &#2357;&#2367;&#2358;&#2375;&#2359; &#2325;&#2352;&#2381;&#2340;&#2357;&#2381;&#2351;&#2360;&#2381;&#2341; &#2309;&#2343;&#2367;&#2325;&#2366;&#2352;&#2368; <br>
			  &#2350;&#2369;&#2326;&#2381;&#2351;&#2350;&#2306;&#2340;&#2381;&#2352;&#2368; ,&#2331;&#2340;&#2381;&#2340;&#2368;&#2360;&#2327;&#2338;&#2364; &#2358;&#2366;&#2360;&#2344;
			<p></td>
			</tr>
		<tr>
			<td width="10">&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
	</table>
</div>


</p>                   </td>
				  </tr>
				</table>
			</form>				</td>
			</tr>
		</table>
		<td style="width:25px" bgcolor="#630E0E"></td>
	</tr>
</table>
 <p>
                          <?php
			}
			?>
                        </p>
</body>

</html>