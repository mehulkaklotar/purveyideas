<?php
include("configure/configure.php");
$err="";
if(isset($_POST['submit']))
{
	$sql = "select * from sysadmin where emailid='".$_POST['txtemail']."'";
	$rs = mysql_query($sql);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs) > 0)
	{
		$subject="Forgotten Password";
		$msg="Hello,<br>Your Username is '".$row['username']."' and Password is '".$row['password']."'";
		$fres=mysql_query("select eid from setting");
		$frow=mysql_fetch_array($fres);
		$from=$frow['eid'];

$headers = 'From: ' . $from . "\r\n" .
					'Reply-To: ' . $from . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();
		@mail($row['emailid'], $subject, $msg, $headers);
		header("location:welcome.php");
	}
	else
	{
		$err1 = "Sorry this E-Mail is not registered in our database...";
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
	if(document.getElementById("txtemail").value == "")
	{
		document.getElementById("uname").innerHTML="*";
		document.frmlogin.txtlogin.focus();
		return false;
	}
return true;
}
</script>


<body>
<div id="mainlogin">

	
    
    <div id="login">
    	<div id="forgottitle">
 			  <img src="images/forgot.png" class="noborder"/>
        </div>
        <form name="frmlogin" method="post" action="" onsubmit="return checkfrm(); ">
        <div id="logincontent">
        <div id="dontuser1"><?php if(isset($err1)){echo $err1;}?></div>
        <div id="space"></div>
        	<div id="form" class="floatleft fontstyle">
        		
                Email-ID :<br />
                <input type="text" name="txtemail" id="txtemail" size="30" /><div id="uname" class="floatright" style="font-size:medium; color:#FF0000;"></div><br /><br />
                
            	
            </div>
           	<div id="button" >
                	<input type="submit"  name="submit" value="" class="submit"/>
           	</div>
            <div class="clear"></div>
        
        </div>
        </form>
    </div>
    
</div>

</body>
</html>
