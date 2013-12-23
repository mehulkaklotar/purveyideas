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
// change these to actual values:
$dbHost = 'localhost';
$dbUser = 'root';
$dbPwd = '';
$database = 'dbpathway';
$sqlFile = $_REQUEST['sqlfile'];


// connect and select:

$connx = mysql_connect($dbHost, $dbUser, $dbPwd) or die("DB connection failed");
mysql_query("CREATE DATABASE IF NOT EXISTS dbpathway");
mysql_select_db($database) or die("DB selection failed");

// read/parse SQL file
$fileContents = file_get_contents("backup/sql/$sqlFile") or die ("Unable to read file '$sqlFile'");
$sqlStatements = explode(';', $fileContents);

// execute the queries:
foreach($sqlStatements as $sql)
{
  $sql = trim($sql);
  if($sql !== '')
  {
    $result = mysql_query($sql) or die ("Query failed: $sql - ".mysql_error());
  }
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