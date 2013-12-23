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


<div id="maincontent">
<div id="content">
    <table width="100%">
<tr>
	<td>
		<h2>Select <?php echo $_GET['type']; ?></h2>
	</td>
</tr>      
<tr>
<td>
<input type="hidden" value="<?php echo $_GET['type'];?>" id="type"/>
<select id="select" onchange="report();" class="combostyle">
<option value="%">Select</option>
<?php
$result=mysql_query("select * from ".$_GET['type']."_mst");
while($r=mysql_fetch_array($result))
{
	echo "<option value='".$r[$_GET['type'].'_id']."'>".$r[$_GET['type'].'_name']."</option>";
}
?>
</select>
</td>
</tr>
</table>
    </div>
<div id="blank"></div>

<?php include("footer.php");?>
</div>
</body>
<script type="text/javascript">

function report()
{
	s=document.getElementById("select").value;
	type=document.getElementById("type").value;
	window.open("report.php?id="+s+"&type="+type);
}
  
</script>