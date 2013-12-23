<?php
include("configure/configure.php");

$sql="select * from city_mst";
if(isset($_GET['search']))
{
$search = $_GET['search'];
}
else
{
$search="";
}
if($_REQUEST['op']=='insert')
{

$sqlinsert="insert into city_mst set city_name='".addslashes($_GET['name'])."',state_id='".$_GET['state']."'  ";

mysql_query($sqlinsert);
}

if($_REQUEST['op']=='edit')
{
$sqlupdate="update city_mst set city_name='".addslashes($_GET['name'])."',state_id='".$_GET['state']."' where city_id=".$_GET['id'];

mysql_query($sqlupdate);
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_GET['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{		  
	    $sql_delete="delete from city_mst where city_id in(".$id_del.")";
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
$sql=  "select * from city_mst where city_name like '%".$search."%'  " ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from city_mst";
					
		}
?>
<?php include_once("pagingcity.php"); ?>