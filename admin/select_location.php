<?php include_once("configure/configure.php");
include("configure/sessioncheck.php");
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="7")
	{
		$flag=1;
	}					
}
if($flag!=1)
{
	echo '<script>history.go(-1);</script>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" media="screen" /><script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="mouseovertabs.css" />

<script src="mouseovertabs.js" type="text/javascript">

/***********************************************
* Mouseover Tabs Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script type="text/javascript" src="dhtmlgoodies_calendar.js"></script>
<link href="dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php");?>
<?php include("menu.php");?>

<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<?php	
				
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="7")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
<div >
<ul>
	<li class="submenuitem"><a href="select.php?type=category">Category </a> |</li>
    <li class="submenuitem"><a href="select.php?type=source">Source </a> |</li>
    <li class="submenuitem"><a href="select_location.php">Location </a> </li>
    
</ul>
</div>
<?php	$flag=0;
				}
?>

</div>



<div id="blankcolor"></div>
<div id="maincontent">
<div id="content">
<table width="100%">
<tr>
	<td>
		<h4>Select Country :</h4>
	</td>
    <td>
		<h4>Select State :</h4>
	</td>
    <td>
		<h4>Select City :</h4>
	</td>
</tr>      
<tr>
<td>
<select id="country" class="combostyle">
<option value="0">Select</option>
<?php
$result=mysql_query("select * from country_mst");
while($r=mysql_fetch_array($result))
{
	echo "<option value='".$r['country_id']."'>".$r['country_name']."</option>";
}
?>
</select>
</td>
<td>
<select id="state" class="combostyle">
<option value="0">Select</option>
<?php
$result=mysql_query("select * from state_mst");
while($r=mysql_fetch_array($result))
{
	echo "<option value='".$r['state_id']."'>".$r['state_name']."</option>";
}
?>
</select>
</td>
<td>
<select id="city" class="combostyle">
<option value="0">Select</option>
<?php
$result=mysql_query("select * from city_mst");
while($r=mysql_fetch_array($result))
{
	echo "<option value='".$r['city_id']."'>".$r['city_name']."</option>";
}
?>
</select>
</td>
<td>
<input type="button" value="GO"  onClick="report();" class="regbtn">
</td>
</tr>
<tr>
<td colspan="3">
	<div id="error"></div>
</td>
</tr>
</table>
</div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">

function report()
{
	co=document.getElementById("country").value;
	st=document.getElementById("state").value;
	ci=document.getElementById("city").value;		
	if(co=="0" && st=="0" && ci=="0")
	{
		document.getElementById("error").innerHTML="<h2>Please select at least one option..</h2>";
		return;
	}
	window.open("report.php?country="+co+"&state="+st+"&city="+ci);
}
  
</script>