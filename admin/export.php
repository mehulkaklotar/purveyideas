<?php
include("configure/configure.php");
include("configure/sessioncheck.php");
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="9")
	{
		$flag=1;
	}					
}
if($flag!=1)
{
	echo '<script>history.go(-1);</script>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" media="screen" /><script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="mouseovertabs.css" />

<script src="mouseovertabs.js" type="text/javascript">

/***********************************************
* Mouseover Tabs Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script type="text/javascript" src="dhtmlgoodies_calendar.js"></script>
<link href="dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php");?>
<?php include("menu.php");?>

<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<?php	
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="9")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
<div >
<ul>
	<li class="submenuitem"><a href="export.php">Export </a> |</li>
    <li class="submenuitem"><a href="import.php">Import </a> </li>
    
    
</ul>
</div>
<?php	$flag=0;
				}
?>

</div>


<div id="maincontent">
<script language="javascript" >
function goto()
{
 if(document.frmexport.dbtype[0].checked==true)
   {
    document.frmexport.action="sql.php";
    document.frmexport.submit();
   }
 if(document.frmexport.dbtype[1].checked==true)
   {
    var t_name = document.getElementById("seltable").value;
    document.frmexport.action="csvselection.php?name="+t_name;
    document.frmexport.submit();
   }
   if(document.frmexport.dbtype[2].checked==true)
   {
     var t_name = document.getElementById("seltable").value;
	 document.frmexport.action="xml.php?name="+t_name;
     document.frmexport.submit();
	}
} 
</script>
</br>
</br>
<font face="Verdana, Arial, Helvetica, sans-serif">
<center><strong><font color="#273449"><h2>Export Database in given Format</h2></font></strong></center>
<form name = "frmexport" method="post" >
<table align="center">
 <tr>
  <td><input type="radio" name="dbtype" checked = "checked" value="SQL" id="rsql" onchange="javascript:table();"   /></td>
  <td><font color="#273449" size="+2">SQL</font></td>
 </tr>
 <tr>
  <td><input type="radio" name="dbtype" value="CSV"  id="rcsv" onchange="javascript:table();"/></td>
  <td><font color="#273449" size="+2">CSV</font></td>
 </tr>
 <tr>
  <td><input type="radio" name="dbtype" value="XML" id="rxml" onchange="javascript:table();"/></td>
  <td><font color="#273449" size="+2">XML</font></td>
  
 </tr>
 <tr><td colspan="2">
 <div id="export">
 
 
 
 </div>
 </td></tr>
  <table align="center">
 </br>
 
 <tr>
 
  <td><input type="submit" name="export" value="Export"  class="regbtn" onclick="javascript:goto();"/></td>
 </tr>
 </table>
 <div id="export1">
 
 
 </div>
</table>
</form><br /><br />
<div id="error">
<?php if(isset($_REQUEST['err'])){?><center><h3><?php echo "No Data Found"; ?></h3></center><?php } ?>
</div>
</font>
<script>

function table()
{
document.getElementById("error").innerHTML="";
 var xmlhttp;
 if(window.XMLHttpRequest)
   {
     xmlhttp = new XMLHttpRequest(); 
   }
   else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
     xmlhttp.onreadystatechange=function() 
     {
	  if(xmlhttp.readyState==4 && xmlhttp.status==200)
	  {
	    document.getElementById('export').innerHTML = xmlhttp.responseText;
	  }
	 }
	  if(document.frmexport.dbtype[0].checked==true)
	  {
	 
       var url="select_table.php?databases=" + 'sql';
	  }
	  else
	  {
	   var url="select_table.php?databases=" + 'other';
	  }
	
    xmlhttp.open("GET",url,true);
	xmlhttp.send(); 
}


</script>
<div id="blank"></div>

<?php include("footer.php");?>
</div>
</body>