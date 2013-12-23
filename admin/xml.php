<?php
 $name =  $_REQUEST['name'];
 if($_REQUEST['name']!="")
 {
  $table= $_REQUEST['name'];

  $host = "localhost";
  $user = "root";
  $pass = "";
  $name = "dbpathway";
  
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);

    $tab = "\t";
	$br = "\n";
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
	$xml.= '<'.$name.'database>'.$br;
	
//	$xml.= $tab.'<'.$table.'>'.$br;
    
	$query3 = 'SELECT * FROM  '.$table;
	$records = mysql_query($query3,$link) or die('cannot select from table: '.$table);
		
	 while($record = mysql_fetch_assoc($records))
		{
		 $xml.= $tab.$tab.$tab.'<'.$table.'>'.$br;
			
			foreach($record as $key=>$value)
			{
				$xml.= $tab.$tab.$tab.$tab.'<'.$key.'>'.htmlspecialchars(stripslashes($value)).'</'.$key.'>'.$br;
			}
			
			$xml.= $tab.$tab.$tab.'</'.$table.'>'.$br;
		 }
		
//	$xml.= $tab.'</'.$table.'>'.$br;
	
	$xml.= '</'.$name.'database>';
	
	//save file
	$filename = "$table".time().".xml";
    $handle = fopen("backup/xml/$filename",'w+');
	fwrite($handle,$xml);
	fclose($handle);
	
	
	$path="backup/xml/$filename";
	$rfile=$path;
	$filesize=filesize($rfile);
	header("Cache-control: private"); 		
	header('Content-type: application/xml');
	header("Content-Length: ".$filesize);
	header("Content-Disposition: attachment;filename=$filename");
	header("Content-Transfer-Encod­ing: binary");
	$pdf_buffer="";
	$fp = fopen($rfile, 'rb');
	$pdf_buffer = fread($fp, $filesize);
	fclose($fp);
	print $pdf_buffer;

 }

else
{
 //connect
 $host = "localhost";
 $user = "root";
 $pass = "";
 $name = "dbpathway";
 
 $link = mysql_connect($host,$user,$pass);
 mysql_select_db($name,$link);

 //get all the tables
 $query = 'SHOW TABLES FROM '.$name;
 $result = mysql_query($query,$link) or die('cannot show tables');
 if(mysql_num_rows($result))
 {
	//prep output
	$tab = "\t";
	$br = "\n";
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
	$xml.= '<'.$name.'>'.$br;
	
	//for every table...
	while($table = mysql_fetch_row($result))
	{
		//prep table out
		$xml.= $tab.'<'.$table[0].'>'.$br;
		
		//get the rows
		$query3 = 'SELECT * FROM '.$table[0];
		$records = mysql_query($query3,$link) or die('cannot select from table: '.$table[0]);
		
		
		//stick the records
		//$xml.= $tab.$tab.'<records>'.$br;
		while($record = mysql_fetch_assoc($records))
		{
			$xml.= $tab.$tab.$tab.'<'.$table[0].'>'.$br;
			
			foreach($record as $key=>$value)
			{
				$xml.= $tab.$tab.$tab.$tab.'<'.$key.'>'.htmlspecialchars(stripslashes($value)).'</'.$key.'>'.$br;
			}
			$xml.= $tab.$tab.$tab.'</'.$table[0].'>'.$br;
		}
		//$xml.= $tab.$tab.'</records>'.$br;
		$xml.= $tab.'</'.$table[0].'>'.$br;
	}
	$xml.= '</'.$name.'>';
	
	//save file
	$handle = fopen('backup\xml\pathway-backup-'.time().'.xml','w+');
	fwrite($handle,$xml);
	fclose($handle);
	$filename = "pathway-backup-".time().".xml";
	
	
	$path="backup/xml/$filename";
	$rfile=$path;
	$filesize=filesize($rfile);
	header("Cache-control: private"); 		
	header('Content-type: application/xml');
	header("Content-Length: ".$filesize);
	header("Content-Disposition: attachment;filename=$filename");
	header("Content-Transfer-Encod­ing: binary");
	$pdf_buffer="";
	$fp = fopen($rfile, 'rb');
	$pdf_buffer = fread($fp, $filesize);
	fclose($fp);
	print $pdf_buffer;
 }
}
?>
