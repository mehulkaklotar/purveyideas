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

</br>
</br>
<font face="Verdana, Arial, Helvetica, sans-serif">
<center><strong><font color="#273449"><h2>Import Database in given Format</h2></font></strong></center>
<form name = "frmimport" method="post" action="import.php" enctype="multipart/form-data" >
<table align="center">
 <tr>
  <td><input type="radio" name="dbtype" value="SQL" id="rsql" checked = "checked" onchange="javascript:table();"/></td>
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
 <div id="import">
 </div>
 </td></tr>
 <table border="0" align="center">
  <tr>
   <td colspan="2" align="center">&nbsp;  </td>
  </tr>
   <tr>
       <td>Select File:</td>
        <td>
          <input type="file" name="importfile" id="importfile"/>
        </td>
   </tr>
</table>
  <table align="center">
 </br>
 
 <tr>
 
  <td><input type="submit" name="import" value="Import" id="import"  class="regbtn"/></td>
 </tr>
 </table>
 <div id="import1">
 
 
 
 </div>
</table>
</form><br /><br />


</font>

<?php 
 if(isset($_POST['import']))
   {
    $dbtypes = $_POST['dbtype'];
	
	if($dbtypes == "SQL")
	 {
      if(!empty($_FILES["importfile"]["name"]))
		{
				  $fi = $_FILES["importfile"]["name"];
				  $extension= strtolower(strrchr($fi,"."));
			      
				  if($extension == ".sql")
				   {
				    move_uploaded_file($_FILES["importfile"]["tmp_name"], "backup/sql/" . $fi);
				
				    echo "<script>location.href='importsql.php?sqlfile=$fi';</script>";
				   }
				  else
					{
					?>  
                        <font face="Verdana, Arial, Helvetica, sans-serif">
						<center><strong><font color="#273449"><h4>Please select SQL file</h4></font></strong></center>
					    </font>
					<?php 
					}
          }
		  else
		  {
		  ?>
             <font face="Verdana, Arial, Helvetica, sans-serif">
			 <center><strong><font color="#273449"><h4>Please select the required file</h4></font></strong></center>
			 </font>
          <?php
		  }
	 }            
  
     if($dbtypes == "CSV")
	 {
	 
	   if($_POST['seltable'] == "")
	   {
	   ?>
	     <font face="Verdana, Arial, Helvetica, sans-serif">
		 <center><strong><font color="#273449"><h4>Please select the table</h4></font></strong></center>
		 </font>
	   <?php
       }
	   else
	   {
	    $ttype = $_POST['seltable'];
	   }
	 if(!empty($_FILES["importfile"]["name"]))
		{
				  $fi = $_FILES["importfile"]["name"];
				  $extension= strtolower(strrchr($fi,"."));
			      
				  if($extension == ".csv")
				   {
				    move_uploaded_file($_FILES["importfile"]["tmp_name"], "backup/csv/" . $fi);
				
				    echo "<script>location.href='importcsv.php?csvfile='+'$fi' + '&ttype=' + '$ttype';</script>";
				   }
				  else
					{
					?>  
                        <font face="Verdana, Arial, Helvetica, sans-serif">
						<center><strong><font color="#273449"><h4>Please select CSV file</h4></font></strong></center>
					    </font>
					<?php 
					}
          }
		  else
		  {
		  ?>
             <font face="Verdana, Arial, Helvetica, sans-serif">
			 <center><strong><font color="#273449"><h4>Please select the required file</h4></font></strong></center>
			 </font>
          <?php
		  }
	 }
	 
	 	if($dbtypes == "XML")
	 {
	   if($_POST['seltable'] == "")
	   {
	   ?>
	     <font face="Verdana, Arial, Helvetica, sans-serif">
		 <center><strong><font color="#273449"><h4>Please select the table</h4></font></strong></center>
		 </font>
	   <?php
       }
	   else
	   {
	    $ttype = $_POST['seltable'];
	   }
	 if(!empty($_FILES["importfile"]["name"]))
		{
				  $fi = $_FILES["importfile"]["name"];
				  $extension= strtolower(strrchr($fi,"."));
			      
				  if($extension == ".xml")
				   {
				    move_uploaded_file($_FILES["importfile"]["tmp_name"], "backup/xml/" . $fi);
				
				    echo "<script>location.href='importxml.php?xmlfile='+'$fi' + '&ttype=' + '$ttype';</script>";
				   }
				  else
					{
					?>  
                        <font face="Verdana, Arial, Helvetica, sans-serif">
						<center><strong><font color="#273449"><h4>Please select XML file</h4></font></strong></center>
					    </font>
					<?php 
					}
          }
		  else
		  {
		  ?>
             <font face="Verdana, Arial, Helvetica, sans-serif">
			 <center><strong><font color="#273449"><h4>Please select the required file</h4></font></strong></center>
             <br /><br />
			 </font>
          <?php
		  }
	 }
   }

?>
<?php include("footer.php"); ?>
<script>

function table()
{

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
	    document.getElementById('import').innerHTML = xmlhttp.responseText;
	  }
	 }
	  if(document.frmimport.dbtype[0].checked==true)
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



function selecttable()
{

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
	    document.getElementById('import1').innerHTML = xmlhttp.responseText;
		
	  }
	 }
	 
	 
	
	 if(document.frmimport.dbtype[0].checked==true)
   {
   //alert("hi");
      var url="testsql.php";
   }
    if(document.frmexport.dbtype[1].checked==true)
   {
   var t_name = document.getElementById("seltable").value;
      var url="csvselection.php?name="+t_name;
   }
    if(document.frmexport.dbtype[2].checked==true)
   {
   var t_name = document.getElementById("seltable").value;
       var url="xml.php?name="+t_name;
	   
   }// alert(t_name);
   
	
    xmlhttp.open("GET",url,true);
	xmlhttp.send(); 
}  

</script>