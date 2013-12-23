<?php
include("configure/configure.php");
$err="";
if(isset($_POST['submit']))
{
	$sql = "select * from sysadmin where username='".$_POST['txtlogin']."' and password='".$_POST['txtpassword']."'";
	$rs = mysql_query($sql);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs) > 0)
	{
		$_SESSION['user'] = $_POST['txtlogin'];
		$_SESSION['rights']=$row['rights'];
		$_SESSION['subrights']=$row['subrights'];
		header("location:welcome.php");
	}
	else
	{
		$err = "Invalid Login";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" media="screen" /><script type="text/javascript" src="validation.js"></script>
<title>Untitled Document</title>
</head>
<script language="javascript">
function checkfrm()
{
	if(document.getElementById("txtlogin").value == "")
	{
		document.getElementById("uname").innerHTML="*";
		document.frmlogin.txtlogin.focus();
		return false;
	}
	else if(document.getElementById("txtpassword").value == "")
	{
		document.getElementById("uname").innerHTML="";
		document.getElementById("passwd").innerHTML="*"
		document.frmlogin.txtpassword.focus();
		return false;
	}

return true;
}
</script>


<body class="bgcolorlogin">
<div id="mainlogin">

	
    
    <div id="login">
    	<div id="loginadmin">
 			<img src="images/admin.png" />
        </div>
        <form name="frmlogin" method="post" action="" onsubmit="return checkfrm(); ">
        <div id="logincontent">
        <div id="dontuser"><?php echo $err;?></div>
        	<div id="form" class="floatleft fontstyle">
        		
                Username :<br />
                <input type="text" name="txtlogin" id="txtlogin"  /><div id="uname" class="floatright" style="font-size:medium; color:#FF0000;"></div><br /><br />
                Password :<br />
                <input type="password" name="txtpassword" id="txtpassword"/><div id="passwd" class="floatright" style="font-size: medium;color:#FF0000;"></div>
            	
            </div>
           	<div id="button" class="floatleft">
                	<input type="submit"  name="submit" value="" class="loginbtn"/>
           	</div>
            <div class="clear"></div>
        <div id="remember"><input type="checkbox" />Remember me on this computer.</div> 
        <div id="forgot" class="floatright">
        	<a href="forgot.php">Forgot Password?</a>
        </div>
        </div>
        </form>
    </div>
    
</div>

</body>
</html>
