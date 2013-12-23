<?php
include("configure/configure.php");

$sql="select * from sms_template";
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
$sqlinsert="insert into sms_template set sms_title='".addslashes($_REQUEST['txttitle'])."',sms_text= '".$_REQUEST['txttext']."'";

mysql_query($sqlinsert);
}

if($_REQUEST['op']=='edit')
{
$sqlupdate="update sms_template set sms_title='".addslashes($_REQUEST['txttitle'])."',sms_text= '".$_REQUEST['txttext']."' where sms_id=".$_REQUEST['id'];

mysql_query($sqlupdate);
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_REQUEST['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{	
	  
	    $sql_delete="delete from sms_template where sms_id in(".$id_del.") ";
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
$sql=  "select * from sms_template where sms_title like '%".$search."%'" ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from sms_template";
					
		}
?>
    
<?php 
if(isset($_REQUEST['aa']))
{
	include("smstemp1.php");
}
else
{
include("pagingsmstemp.php"); 
}?>