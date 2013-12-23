<?php
include("configure/configure.php");

$sql="select * from sysadmin";
if(isset($_GET['search']))
{
$search = $_GET['search'];
}
else
{
$search="";
}
$flag=0;
if($_REQUEST['op']=='insert')
{
	$result1=mysql_query($sql);
	while($r3=mysql_fetch_object($result1))
	{
		if($_GET['name']==$r3->username)
		{	
			$flag=1;
		}
		if($_GET['email']==$r3->emailid)
		{	
			$flag=2;
		}
	}
	if($flag==0)
	{
		$sqlinsert="insert into sysadmin set username='".$_GET['name']."',password='".$_GET['password']."', rights='0',emailid='".$_GET['email']."'";
	
		mysql_query($sqlinsert);
	}
	else
	{
		if($flag==1)
		{
			$err="Duplicate Username...";
		}
		else if($flag==2)
		{
			$err="Duplicate Email...";
		}
		
		$_GET['op']="add";
	}
}

if($_REQUEST['op']=='edit')
{
$flag=0;
	$sql1="select * from sysadmin where user_id!='".$_GET['id']."'";
$result1=mysql_query($sql1);
	while($r3=mysql_fetch_object($result1))
	{
		if($_GET['name']==$r3->username)
		{	
			$flag=1;
		}
		if($_GET['email']==$r3->emailid)
		{	
			$flag=2;
		}
	}
	if($flag==0)
	{
$sqlupdate="update sysadmin set username='".$_GET['name']."',emailid='".$_GET['email']."' where user_id=".$_GET['id'];

mysql_query($sqlupdate);
	mysql_query($sqlupdate);
	}
	else
	{
		if($flag==1)
		{
			$err="Duplicate Username...";
		}
		else if($flag==2)
		{
			$err="Duplicate Email...";
		}
		
		$_GET['op']="update";
	}
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_GET['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{	 
	    $sql_delete="delete from sysadmin where user_id in(".$id_del.") ";
		mysql_query($sql_delete) ;
	}
	if($_GET['lastpage']==$_GET['page'])
	{		
		//echo count($id_delete);
		//echo $_GET['lpr'];
		if(count($id_delete)-1==$_GET['lpr'])
		{
			$del_last="true";
			//echo $_GET['page'];
		}
	}
}

if($_REQUEST['op']=='search')
{
$sql=  "select * from sysadmin where username!='".$_SESSION['user']."' and username like '%".$search."%'  " ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from sysadmin where username!='".$_SESSION['user']."'";
					
		}
?>


   
<?php include_once("pagingsecurity.php"); ?>