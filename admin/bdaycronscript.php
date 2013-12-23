<?php
include("configure/configure.php");

$sms_sql="select * from sms";
$sms_res=mysql_query($sms_sql);
$sms_row=mysql_fetch_array($sms_res);

$bsql="select * from contact_mst where dob like '%".date("-m-d")."'";
$bres=mysql_query($bsql);
if(mysql_num_rows($bres)>0)
{
	while($brow=mysql_fetch_array($bres))
	{				
		$username=$sms_row['sms_username'];
			$api_password=$sms_row['sms_password'];
			$sender=$row['sms_mask'];
			$domain=$sms_row['sms_domain'];
			$priority=1;// 1-Normal,2-Priority,3-Marketing
			$method="POST";
	//---------------------------------
		
		$mobile=$brow['mobile1'];
	
		$message=$row['sms_msg'];
	
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
}
?>