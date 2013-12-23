<?php
include("configure/configure.php");

$sql="select * from schedule";
if(isset($_REQUEST['search']))
{
$search = $_REQUEST['search'];
}
else
{
$search="";
}
if($_REQUEST['op']=='insert')
{
$sqlinsert="insert into schedule set sms_msg='".addslashes($_REQUEST['msg'])."',sms_mask = '".$_REQUEST['mask']."',sms_group='".$_REQUEST['ids']."',sms_schedule='".$_REQUEST['schedule']."'";

mysql_query($sqlinsert);
}

if($_REQUEST['op']=='edit')
{
$sqlupdate="update schedule set sms_msg='".addslashes($_REQUEST['msg'])."',sms_mask = '".$_REQUEST['mask']."',sms_group='".$_REQUEST['ids']."',sms_schedule='".$_REQUEST['schedule']."' where sms_id=".$_REQUEST['id'];

mysql_query($sqlupdate);
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_REQUEST['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{	
	  
	    $sql_delete="delete from schedule where sms_id in(".$id_del.") ";
		mysql_query($sql_delete) ;
	  
	}
	if($_REQUEST['lastpage']==$_REQUEST['page'])
	{		
		//echo count($id_delete);
		//echo $_REQUEST['lpr'];
		if(count($id_delete)-1==$_REQUEST['lpr'])
		{
			$del_last="true";
			//echo $_REQUEST['page'];
		}
	}
}

if($_REQUEST['op']=='search')
{
$sql=  "select * from schedule where sms_msg like '%".$search."%' or sms_mask like '%".$search."%' or sms_group like '%".$search."%' or sms_schedule like '%".$search."%'" ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from schedule";
					
		}
?>
    
<?php 
if(isset($_REQUEST['aa']))
{
	include("schedule1.php");
}
else
{
include("pagingschedule.php"); 
}?>