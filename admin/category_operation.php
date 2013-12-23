<?php
include("configure/configure.php");

$sql ="select * from category_mst";
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
	$flag=0;
	$result1=mysql_query($sql);
	while($r3=mysql_fetch_object($result1))
	{
		if($_GET['name']==$r3->category_name)
		{	
			$flag=1;
		}
	}
	if($flag==0)
	{
		$sqlinsert="insert into category_mst set category_name='".addslashes($_GET['name'])."',parent_id='".$_GET['parent']."'  ";

		mysql_query($sqlinsert);
	}
	else
	{
		$err="1";
		$_GET['op']="add";
	}
}

if($_REQUEST['op']=='edit')
{
	$flag=0;
	$sql1="select * from category_mst where category_id!='".$_GET['id']."'";
	$result1=mysql_query($sql1);
	while($r3=mysql_fetch_object($result1))
	{
		if($_GET['name']==$r3->category_name)
		{	
			$flag=1;
		}
	}
	if($flag==0)
	{
		$sqlupdate="update category_mst set category_name='".addslashes($_GET['name'])."',parent_id='".$_GET['parent']."' where category_id=".$_GET['id'];

		mysql_query($sqlupdate);
	}
	else
	{
		$err1="1";
		$_GET['op']="update";
	}
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_GET['id_delete'];

$id_del=substr($id_delete,1);
//echo $id_del;
$id_delete=explode(",",$id_delete);

  
  if($id_delete!="")
	{	
	  
	    $sql_delete="delete from category_mst where category_id in(".$id_del.")";
		//echo $sql_delete;
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
$sql=  "select * from category_mst where category_name like '%".$search."%'  " ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from category_mst";
					
		}
?>

<?php include_once("pagingcategory.php"); ?>