<?php 
backup_tables('localhost','root','','dbpathway');
function backup_tables( $host,$user,$pass,$name,$tables = '*' )
{
$return = "";
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//$return .= 'CREATE DATABASE IF NOT EXISTS '.$name.';';
	//cycle through
	foreach($tables as $table)
	{ 
	
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return .= 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	$filename = "pathway-backup-".time().".sql";
	$handle = fopen("backup/sql/$filename",'w+');
	fwrite($handle,$return);
	fclose($handle);
	
	$path="backup/sql/$filename";
	$rfile=$path;
	$filesize=filesize($rfile);
	header("Cache-control: private"); 		
	header('Content-type: application/sql');
	header("Content-Length: ".$filesize);
	header("Content-Disposition: attachment;filename=$filename");
	header("Content-Transfer-Encod­ing: binary");
	$pdf_buffer="";
	$fp = fopen($rfile, 'rb');
	$pdf_buffer = fread($fp, $filesize);
	fclose($fp);
	print $pdf_buffer;
}

?> 