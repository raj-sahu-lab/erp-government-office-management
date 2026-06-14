<?php
include("dbconnect.php");
$_SESSION["page"] = basename($_SERVER['REQUEST_URI']);

if(isset($_SESSION['LoginID']) && $_SESSION['LoginID']!="")
{

}
else
{
	header("Location:index.php?mode=logout");
 exit;
}

if(isset($_REQUEST["follow_date"]) && $_REQUEST["follow_date"]!="")
{
$dt = $_REQUEST["follow_date"] ;
$dt1 = $_REQUEST["follow_date_to"] ;
}
else
{
$dt = date("Y-m-d") ;
$dt1 = date("Y-m-d") ;
}

?>
<html>

<head>
<meta http-equiv="Content-Language" content="hi">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Office of HCM - [State Name]</title>
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

function validate()
{
		var elem = document.frmForward.elements;
		var str = '';
        for(var i = 0; i < elem.length; i++)
        {
		//alert(elem[i].checked);
			if( elem[i].type=="checkbox" &&  elem[i].checked==true)
			{
            str  =str + elem[i].value;
			}
        } 
		
		if(str == "")
		{
		alert("Please select application to forward.");
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
				<img src="images/rjn.jpg" width="100%">
                </td>				
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
		
		 <br>
        <table border="0" width="95%" align="center">
	
	<tr>
		
		<td width="845">
		

Date wise followup -  
<form name="frmHome" method="get" action="">
<table style="font:vardana; color:#990000">    <tr>
        <td> Date From </td>
        <td>
             <script>DateInput('follow_date', true, 'YYYY-MM-DD', '<?php echo $dt; ?>')</script> 
        </td>
        <td> To </td>
        <td>
             <script>DateInput('follow_date_to', true, 'YYYY-MM-DD', '<?php echo $dt1; ?>')</script> 
        </td>
        <td>
            <input type="submit" value="देखें" name="submit"> 
        </td>
    </tr>
</table>  
</form>  
<form name="frmForward" method="post" action="forward_app.submit.php" onSubmit="return validate()">
<table border="1" width="100%" bordercolor="#C0C0C0" cellspacing="0" cellpadding="0" style="border-collapse: collapse" >
	<tr>
    
		<td width="34" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;ID</font></td>
		<td width=116 bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Minister/Officer<br>
		  &nbsp;Department</font></td>
		<td width="190" bgcolor="#003366"><font size="2" face="Verdana" color="#FFFFFF"> &nbsp;Name</font></td>
		<td width="357" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Subject</font></td>
		<td width="62" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Status</font></td>
		<td width="72" bgcolor="#003366" height="31">
		  <font size="2" face="Verdana" color="#FFFFFF">&nbsp;Follow-up Date</font></td>
		
	</tr>
	 <?php
		 $sql_ward =  "SELECT 
						  v_next_follow.issue_id,
						  v_next_follow.FollowupDate,
						  letter_master.applicant_name,
						  letter_master.subject,
						  letter_master.person_id,
						  letter_master.dept_id,
						  letter_master.`status`,
						  person_master.PersonName,
						  person_department.Department,
						  issue_status.Issue_Status,
						  letter_master.file1,
						  letter_master.file2,
						  letter_master.id
						FROM
						  letter_master
						  INNER JOIN person_master ON (letter_master.person_id = person_master.ID)
						  INNER JOIN person_department ON (letter_master.dept_id = person_department.ID)
						  INNER JOIN issue_status ON (letter_master.`status` = issue_status.id)
						  INNER JOIN v_next_follow ON (letter_master.id = v_next_follow.issue_id)
						WHERE
						  ( v_next_follow.FollowupDate>=  '". $dt ."' and   v_next_follow.FollowupDate <= '". $dt1 ."') and letter_master.`status`=2 and letter_master.install=".$_SESSION['install']." 						
						GROUP BY
						  letter_master.applicant_name,
						  letter_master.subject,
						  letter_master.person_id,
						  letter_master.dept_id,
						  letter_master.status,
						  person_master.PersonName,
						  person_department.Department,
						  issue_status.Issue_Status,
						  v_next_follow.FollowupDate 						  
					    order by ";
		
						
						$sql_ward = $sql_ward . "v_next_follow.FollowupDate asc" ; 
									  
						  
						//mysql_query("SET NAMES utf8");
						  
						if(isset($_REQUEST['qtype']) && $_REQUEST['qtype']=="sess")
						{
							$rs_ward = mysql_query($_SESSION["qry"]);
						}
						else
						{
							$rs_ward = mysql_query($sql_ward);
							$_SESSION["qry"] = $sql_ward;
						}
						

		while($row = mysql_fetch_array($rs_ward))
		{
	?>
	<tr style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; height:25px">
		<td  align="center">
		<input type="checkbox" name="app_ids[]" value="<?php echo $row['issue_id']; ?>">
		<?php echo  $row['id']; ?></td>
		<td  align="left"><?php echo $row['PersonName'] . "<br>[".  $row['Department']."]"; ?></td>
		<td><a href="followup.php?id=<?php echo $row['issue_id']; ?>"><?php echo $row['applicant_name']; ?></a></td>
		<td><a href="followup.php?id=<?php echo $row['issue_id']; ?>"><?php echo $row['subject']; ?></a>
        <?php if ($row['file1']!="") { ?><br>
        <a href="./upload/<?php echo $row['file1']; ?>" target="_blank">File 1</a> <?php }  if ($row['file2']!="") { ?> | 
        <a href="./upload/<?php echo $row['file2']; ?>" target="_blank">File 2</a> <?php } ?>
        </td>
		<td ><?php echo $row['Issue_Status']; ?></td>
		<td ><?php echo $row['FollowupDate']!=""?date("d/m/Y", strtotime($row['FollowupDate'])):"N/A"; ?></td>		
	</tr>
	<?php
		}
	?>
</table>
<table style="font:vardana; color:#990000">
    <tr>
    	<td>Forward to Next Date</td>
        <td><script>DateInput('forward_date', true, 'YYYY-MM-DD', '<?php echo $dt; ?>')</script></td>
        <td><input type="submit" name="submit" value="Forward" ></td>
    </tr>
</table>



</form>


		</td>
	</tr>
	
	<tr style="background-color:#FF9933">
		
		<td  colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="845">&nbsp;</td>
		<td width="0">		</td>
	</tr>
</table>
     <br>   
        
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

<?php
if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=="forwarded" )
{
?>
<script language="javascript">
alert("Selected application(s) have been forwarded to selected date.");
</script>
<?php
}
?>

<?php
if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=="success" )
{
?>
<script language="javascript">
alert("Followup successfully submitted.");
</script>
<?php
}
?>


<?php
if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=="del" )
{
?>
<script language="javascript">
alert("Application deleted successfully.");
</script>
<?php
}
?>

