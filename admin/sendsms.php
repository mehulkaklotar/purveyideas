<?php
include("configure/configure.php");
$id=$_GET['id'];
if(isset($_GET['grp']))
{
	$grp_sql=mysql_query("select contact_id from contact_mst where group_id in (".$id.")");
	$id="";
	while($grp_row=mysql_fetch_array($grp_sql))
	{
		$id.=",".$grp_row['contact_id'];
	}
	$id=substr($id,1);
}
$sms_sql="select * from sms";
$sms_res=mysql_query($sms_sql);
$sms_row=mysql_fetch_array($sms_res);

$sql="select * from contact_mst where contact_id in(".$id.")";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	$username=$sms_row['sms_username'];
	$api_password=$sms_row['sms_password'];
	$sender=$_REQUEST['mask'];
	$domain=$sms_row['sms_domain'];
	$priority=1;// 1-Normal,2-Priority,3-Marketing
	$method="POST";
	//---------------------------------
		
		$mobile=$row['mobile1'];
	
		$message=$_REQUEST['message'];
	
		$username=urlencode($username);
		$api_password=urlencode($api_password);
		$sender=urlencode($sender);
		$message=urlencode($message);
	
		$parameters="username=$username&api_password=$api_password&sender=$sender&to=$mobile&message=$message&priority=$priority";
	
		$url="http://$domain/pushsms.php";
	
		$ch = curl_init($url);
	
		if($method=="POST")
		{
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
		}
		else
		{
			$get_url=$url."?".$parameters;
	
			curl_setopt($ch, CURLOPT_POST,0);
			curl_setopt($ch, CURLOPT_URL, $get_url);
		}
	
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
		curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
		$return_val = curl_exec($ch);
	
	
		if($return_val=="")
		echo "Process Failed, Please check domain, username and password.";
		else
		echo "$return_val";
}

//Code using curl
//Change your configurations here.
//---------------------------------

?>