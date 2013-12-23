<?php 
include("configure/configure.php");
include("configure/sessioncheck.php");
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
<body>
<?php include("header.php");?>
<?php include("menu.php");?>
<div id="maincontent">
<?php
$file = $_REQUEST['xmlfile'];
$table = $_REQUEST['ttype'];

mysql_query("TRUNCATE TABLE $table") or die(mysql_error());
$res = mysql_query("select * from $table");

$doc = new DOMDocument();
 
$doc->load( "backup/xml/".$file ); 

$fields = $doc->getElementsByTagName( "$table" ); 
$j=0;
$rec="";
$fil="";
foreach( $fields as $field ) 
{ 
	$rec[$j]="";
	$fil="";
	$i=0;
	while ($i < mysql_num_fields($res)) 
	{
    	 $names=$field->getElementsByTagName(mysql_field_name($res, $i));
		  
		
		  
		  $fil.= mysql_field_name($res,$i).",";
		  
		 
		 if($rec[$j]=="")
		 {
		 	$rec[$j]= "'";
		 	$rec[$j].= $names->item(0)->nodeValue; 
		 }
		 else
		 {
		 	$rec[$j].="'"; 
		 	$rec[$j].= $names->item(0)->nodeValue; 
		 }
		 
		 $rec[$j].="',";
   
       $i++;
	}
	
	$j++;
} 
	
   $fil=substr($fil,strpos($fil,",")+1);
   $fil=substr($fil,0,strlen($fil)-1);
  
	for($i=0;$i<$j;$i++)
	{
	  
		$rec[$i]=substr($rec[$i],strpos($rec[$i],",")+1);
		$rec[$i]=substr($rec[$i],0,strlen($rec[$i])-1);
		
		mysql_query("insert into $table(".$fil.") values(".$rec[$i].")" ) or die(mysql_error()) ;
		//echo $rec[$i]."<br>";
	}
?>
</br>
</br>
<font face="Verdana, Arial, Helvetica, sans-serif">
<center><strong><font color="#273449"><h2>Database Imported Successfully!....</h2></font></strong></center>
</font>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br /><br /><br /><br /><br /><br /><br />
</div>
<?php include("footer.php");?>
</body>
