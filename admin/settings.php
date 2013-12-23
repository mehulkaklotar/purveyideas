<?php
include("configure/configure.php");
include("configure/sessioncheck.php");
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="8")
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
<script type="text/javascript" src="validation.js"></script>
<link href="dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php");?>
<?php include("menu.php");


?>
<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<div >
<ul>
<?php 
	for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="6")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
	<li class="submenuitem"><a href="security.php">Users </a> |</li>
    <?php $flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="8")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>     
    <li class="submenuitem"><a href="settings.php">Settings</a> |</li>
     <?php $flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="11")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>     
    <li class="submenuitem"><a href="cms.php">CMS </a> </li>
    <?php $flag=0;}?>
</ul>
</div>
</div>

<?php
if(isset($_POST['save']))
{
		$sql = "update setting set rpp='".$_POST['rpp']."',eid='".$_POST['eid']."',mask='".$_POST['mask']."'";
		$res = mysql_query($sql);
		$sql = "update sms set sms_username='".$_POST['sms_uname']."',sms_password='".$_POST['sms_pass']."',sms_domain='".$_POST['sms_domain']."'";
		$res = mysql_query($sql);
		echo "<script>location.href='settings.php?res=set';</script>";						
}
else
{
	$sql="select * from setting";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	$sql1="select * from sms";
	$res1=mysql_query($sql1);
	$row1=mysql_fetch_array($res1);
}

?>
<div id="footerseting" class="bgcolorreport">
<br>
<br>

<center><?php if(isset($_GET['res'])){echo "Settings saved Successfully...";} ?></center>
<form name="rppfrm" method="post" action="settings.php" onSubmit="return set();">
<table align="center" cellpadding="10">	
	
	<tr>
    	<td colspan="3" align="center"><h3>Settings..</h3></td>
    </tr>
    <tr>
    	<td><font size="2">Enter the records per page desired :</font></td>
        <td><input type="text" id="rpp" class="txtuname" name="rpp" value="<?php echo $row['rpp'] ?>"></td>
        <td><font size="2">(values should be seperated by comma(,))</font></td>
    </tr>  
    <tr>
    	<td></td>
        <td align="center"><div id="d_rpp"></div></td>
     </tr>
     <tr>
    	<td><font size="2">Enter the Email Id for E-Mails :</font></td>
        <td><input type="text" id="eid" class="txtuname" name="eid"  value="<?php echo $row['eid'] ?>"></td>
        <td></td>
    </tr>
     <tr>
    	<td></td>
        <td align="center"><div id="d_eid"></div></td>
     </tr>
     <tr>
    	<td><font size="2">Enter the SMS Masks :</font></td>
        <td><input type="text" id="mask" class="txtuname" name="mask"  value="<?php echo $row['mask'] ?>"></td>
        <td><font size="2">(values should be seperated by comma(,))</font></td>
    </tr>

     <tr>
    	<td><font size="2">Enter the SMS Username :</font></td>
        <td><input type="text" id="sms_uname" class="txtuname" name="sms_uname"  value="<?php echo $row1['sms_username']; ?>"></td>
        <td></td>
    </tr>
      <tr>
    	<td><font size="2">Enter the SMS Password :</font></td>
        <td><input type="text" id="sms_pass" class="txtuname" name="sms_pass"  value="<?php echo $row1['sms_password']; ?>"></td>
        <td></td>
    </tr>
     <tr>
    	<td><font size="2">Enter the SMS Domain :</font></td>
        <td><input type="text" id="sms_domain" class="txtuname" name="sms_domain"  value="<?php echo $row1['sms_domain']; ?>"></td>
        <td></td>
    </tr>
    <tr>
    	<td></td>
        <td align="center"><input type="submit" class="regbtn" value="Set" name="save"></td>
    </tr>
</table>

</form>
</div>
<?php include("footer.php"); ?>

<script type="text/javascript">

function set()
{
		var val=document.getElementById("rpp").value;
		if(val=="")
		{
			document.getElementById("d_rpp").innerHTML="(Required)";
			return false;
		}
		var pat1=/^\d+(,\d+)*$/;
		var pat2=/^(\d+,)*\d+$/;
				
		if(!(pat1.test(val) || pat2.test(val)))
		{
			document.getElementById("d_rpp").innerHTML="Not in correct format";
			return false;
		}
		else
		{
			document.getElementById("d_rpp").innerHTML="";
		}
		if(document.getElementById("eid").value=="")
		{
			document.getElementById("d_eid").innerHTML="Enter the Email Id";
			return false;
		}
		if(!checkEmail(document.getElementById("eid").value))
		{
			document.getElementById("d_eid").innerHTML="Enter a valid Email Id";
			return false;
		}
		if(document.getElementById("mask").value=="")
		{
			alert("SMS Masks must be defined...");
			return false;
		}
		if(document.getElementById("sms_uname").value=="")
		{
			alert("SMS Username must be defined...");
			return false;
		}
		if(document.getElementById("sms_pass").value=="")
		{
			alert("SMS Password must be defined...");
			return false;
		}
		if(document.getElementById("sms_domain").value=="")
		{
			alert("SMS Domain must be defined...");
			return false;
		}
		return true;
}

</script>