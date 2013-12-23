<?php
include("configure/configure.php");
include("configure/sessioncheck.php");
?>
<?php
$err="";
if(isset($_POST['save']))
{
		$sqlselect = "select * from sysadmin where password='".$_POST['opasswd']."' and username='".$_SESSION['user']."'";
		$resselect = mysql_query($sqlselect);
		if(mysql_num_rows($resselect) > 0)
		{
			$sqlupdate = "update sysadmin set password='".$_POST['npasswd']."' where password='".$_POST['opasswd']."' and username='".$_SESSION['user']."'";
			mysql_query($sqlupdate);
			echo "<script>location.href='welcome.php?res=change';</script>";
		}
		else
		{
			$err = "Please Enter Correct Password..";
		}
					
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" media="screen" /><script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="highslide.css"/>
<script type="text/javascript" src="highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="mouseovertabs.css" />

<script src="mouseovertabs.js" type="text/javascript">

/***********************************************
* Mouseover Tabs Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script type="text/javascript">
	hs.graphicsDir = './graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
<script language="javascript">
function checkfrm()
{
	if(document.frmchpassword.opasswd.value == "")
	{
		//alert("Please Enter Old Password..");
		document.frmchpassword.opasswd.focus();
		document.getElementById("d_opasswd").innerHTML="*";
		return false;
	}
	else if(document.frmchpassword.npasswd.value == "")
	{
		//alert("Please Enter New Password..");
		document.getElementById("d_opasswd").innerHTML="";
		document.getElementById("d_npasswd").innerHTML="*";
		document.frmchpassword.npasswd.focus();
		return false;
	}
	else if(document.frmchpassword.cpasswd.value == "")
	{
		//alert("Please Enter Confirm Password..");
		document.getElementById("d_npasswd").innerHTML="";
		document.getElementById("d_cpasswd").innerHTML="*";
		document.frmchpassword.cpasswd.focus();
		return false;
	}
	else if(document.frmchpassword.npasswd.value != document.frmchpassword.cpasswd.value)
	{
		//alert("New and Confirm Password must match..");
		document.getElementById("d_cpasswd").innerHTML="Password does not match";
		
		document.frmchpassword.cpasswd.focus();
		return false;
	}

	
return true;
}
</script>

<?php
include("header.php");
include("menu.php");
?>
<body>
<div id="footerseting" class="bgcolorreport">
<br />
<br />
<br />
<table align="center" width="100%">
<tr>
<th align="center" class="bgtitle">Change Password</th>
</tr>
</table>
<br />
<table align="center" width="50%" >
			<tr  align="center">
			  <td align="center" ><?php echo $err; ?></td>
			</tr>
</table>
<table width="94%" border="0" align="center" cellpadding="" cellspacing="">
  
  <tr>
    <td><form action="" method="post" name="frmchpassword" id="frmchpassword" onsubmit="return checkfrm();" >
      <table align="center" width="50%"  ellpadding="5" cellspacing="5">
        <tr  >
          <td width="29%" >Old Password :</td>
          <td width="32%" ><input type="password" name="opasswd" value="" class="txtpass"/></td>
          <td width="39%"><div id="d_opasswd"></div></td>
        </tr>
        <tr >
          <td width="29%" >New Password :</td>
          <td width="32%" ><input type="password" name="npasswd" value="" class="txtpass"/></td>
          <td><div id="d_npasswd"></div></td>
        </tr>
        <tr >
          <td width="29%" >Confirm Password :</td>
          <td width="32%" ><input type="password" name="cpasswd" value="" class="txtpass"/></td>
          <td><div id="d_cpasswd"></div></td>
        </tr>
        <tr >
        <td></td>
          <td><input type="submit" name="save" value="Save" class="regbtn" />
                </td>
        </tr>
        <tr  >
          <td align="right" colspan="2">&nbsp;</td>
        </tr>
      </table>
    </form>
        <br />
        <br /></td>
  </tr>
  
</table>
</div>
<?php
include("footer.php");
?>
</body>