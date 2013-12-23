<?php
include("configure/configure.php");

$sql="select * from schedule";
if(isset($_GET['search']))
{
$search = $_GET['search'];
}
else
{
$search="";
}

if($_REQUEST['op']=='delete')
{

$id_delete=$_GET['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{	
	  
	    $sql_delete="delete from gallery where id in(".$id_del.") ";
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
$sql=  "select * from gallery where caption like '%".$search."%'" ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from gallery";
					
		}
?>
    
<?php 
if(isset($_GET['aa']))
{
	include("gallery1.php");
}
else
{
include("paginggallery.php"); 
}?>