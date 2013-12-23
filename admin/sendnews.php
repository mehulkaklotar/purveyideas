<?php
include_once("configure/configure.php");
$op=$_GET['op'];
if($op=="edit")
{
	$sqlupdate="update newsletter set news_sub='".$_GET['subject']."',news_content = '".$_GET['content']."' where news_id=".$_GET['nid'];
	mysql_query($sqlupdate);
}
else if($op=="insert")
{
	$sqlinsert="insert into newsletter set news_sub='".$_GET['subject']."',news_content = '".$_GET['content']."', date_added=now()";
	$res=mysql_query($sqlinsert) or die(mysql_error());
	$news_id=mysql_insert_id();
}
$subject=$_GET['subject'];
$msg=$_GET['content'];
$grp_ids=$_GET['ids'];
if(!isset($news_id))
{
	$news_id=$_GET['nid'];
}

$fres=mysql_query("select eid from setting");
$frow=mysql_fetch_array($fres);
$from=$frow['eid'];
/*echo "$from<br>";
echo "$msg<br>";
echo "$subject<br>";*/

$headers = 'From: ' . $from . "\r\n" .
					'Reply-To: ' . $from . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();

$tsql="select email1 from contact_mst where group_id in ($grp_ids)";

$tres=mysql_query($tsql);
while($trow=mysql_fetch_array($tres))
{
	//echo $trow['email1']."<br>";
	@mail($trow['email1'], $subject, $msg, $headers);
}


?>


<center><b><h2>Mailed Successfully...!!!</h2></b><input type="button" value="Back" onClick="javascript:history.go(0)" class="regbtn"></center>

