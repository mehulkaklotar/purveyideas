<?php
backup_tables();
function backup_tables($tables = '*')
{
 if($_REQUEST['name']=="")
 {
   //backup the db OR just a table 

    $return = "";
	include_once("configure/connfigure.php");
	
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

    
    $filename = "pathway-backup-".time().".csv";
	$handle = fopen("backup/csv/$filename",'w+');
	  
	  foreach($tables as $table)
	  { 
	   $result = mysql_query('SELECT * FROM '.$table);
	   $num_fields = mysql_num_fields($result);
	   $row = mysql_fetch_assoc($result);
 
       $line = "";
       $comma = "";
      
	    foreach($row as $name => $value)
        {
     	  $line .= $comma . '"' . str_replace('"', '""', $name) . '"';
     	  $comma = ",";
    	}
      $line .= "\r\n";
      fputs($handle, $line);

     // remove the result pointer back to the start
     
	 mysql_data_seek($result, 0);
       
	   while($row = mysql_fetch_assoc( $result ))
	    {
         $line = "";
         $comma = "";
        
		foreach($row as $value)
		 {
           $line .= $comma . '"' . str_replace('"', '""', $value) . '"';
           $comma = ",";
         }
        
		$line .= "\r\n";
	    fputs($handle, $line);
       }

      }
    fclose($handle); 
	
		
	$path="backup/csv/$filename";
	$rfile=$path;
	$filesize=filesize($rfile);
	header("Cache-control: private"); 		
	header('Content-type: application/csv');
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


if($_REQUEST['name']!="")
{

 include_once("configure/configure.php");
 $table=$_REQUEST['name'];
 
 if($table=="state_mst")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select s.state_name,c.country_name from country_mst c,state_mst s where s.country_id=c.country_id");
 
 }
 
 else if($table=="city_mst")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select s.city_name,c.state_name from state_mst c,city_mst s where s.state_id=c.state_id");
 
 }
 
 else if($table=="country_mst")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select country_name from country_mst");
 
 }
 
 
 else if($table=="source_mst")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select source_name from source_mst");
 
 }
 
 else if($table=="category_mst")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select category_name from category_mst");
 
 }
 
 else if($table=="testimonial")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select testti_name,testi_sdesc,testi_desc,testi_image from testimonial");
 
 }
 
 else if($table=="groups")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 $res=mysql_query("select group_name from groups");
 
 }
 
 else if($table=="contact_mst")
 {
 
  $filename = "$table".time().".csv";
 $handle = fopen("backup/csv/$filename",'w+'); 
 
 
 $res=mysql_query("select co.f_name,co.l_name,co.gender,co.dob,co.p_add1,co.p_add2,co.p_pincode,co.org_name,co.o_add1,co.o_add2,co.o_pincode,co.source,co.phone1,co.phone2,co.mobile1,co.mobile2,co.fax,co.email1,co.email2,co.email3,co.website,co.category,co.remarks,co.subscribe,g.group_name,c.country_name as p_country,s.state_name as p_state,ci.city_name as p_city,c1.country_name as o_country,s1.state_name as o_state,ci1.city_name as o_city from contact_mst co left outer join country_mst c on co.p_country=c.country_id left outer join state_mst s on co.p_state=s.state_id left outer join city_mst ci on co.p_city=ci.city_id left outer join country_mst c1 on co.o_country=c1.country_id left outer join state_mst s1 on co.o_state=s1.state_id left outer join city_mst ci1 on co.o_city=ci1.city_id left outer join groups g on co.group_id=g.group_id ");
 
 }
 
 
 
 if(mysql_num_rows($res)<=0)
 {
 	header("location:export.php?err=ndf");
	die();
	
 }

 // fetch a row and write the column names out to the file
 $row = mysql_fetch_assoc($res);
 $line = "";
 $comma = "";
 $cnt=0;
  foreach($row as $name => $value)
   {
		switch($name)
		{
			case "state_name":
				$name="State Name";
				break;
			case "state_id":
				$name="State ID";
				break;
			case "country_name":
				$name="Country Name";
				break;
			case "city_name":
				$name="City Name";
				break;
			case "city_id":
				$name="City ID";
				break;
		    case "country_id":
				$name="Country ID";
				break;
		    case "source_id":
				$name="Source ID";
				break;
			case "source_name":
				$name="Source Name";
				break;
			case "category_id":
				$name="Category ID";
				break;
			case "category_name":
				$name="Category Name";
				break;
			case "parent_id":
				$name="Parent ID";
				break;
			case "testimonial_id":
				$name="Testimonial ID";
				break;
			case "testi_name":
				$name="Testimonial Name";
				break;
			case "testi_sdesc":
				$name="Testimonial Short Description";
				break;
			case "testi_desc":
				$name="Testimonial Description";
				break;
			case "testi_image":
				$name="Testimonial Image";
				break;
			case "group_id":
				$name="Group ID";
				break;
			case "group_name":
				$name="Group Name";
				break;
			case "contact_id":
				$name="Contact ID";
				break;
			case "f_name":
				$name="First Name";
				break;
			case "l_name":
				$name="Last Name";
				break;
			case "gender":
				$name="Gender";
				break;
			case "dob":
				$name="Birthdate";
				break;
			case "p_add1":
				$name="Postal Address1";
				break;
			case "p_add2":
				$name="Postal Address2";
				break;
			case "p_pincode":
				$name="Postal Pincode";
				break;
			case "org_name":
				$name="Organisation Name";
				break;
			case "o_add1":
				$name="Organisation Address1";
				break;
			case "o_add2":
				$name="Organisation Address2";
				break;
			case "o_pincode":
				$name="Organisation Pincode";
				break;
			case "source":
				$name="Source";
				$d=$cnt;
				break;
			case "phone1":
				$name="Phone No1";
				break;
			case "phone2":
				$name="Phone No2";
				break;
			case "mobile1":
				$name="Mobile No1";
				break;
			case "mobile2":
				$name="Mobile No2";
				break;
			case "fax":
				$name="Fax";
				break;
			case "email1":
				$name="Email ID1";
				break;
			case "email2":
				$name="Email ID2";
				break;
			case "email3":
				$name="Email ID3";
				break;
			case "website":
				$name="Website";
				break;
			case "category":
				$name="Category";
				$a=$cnt;
				break;
			case "remarks":
				$name="Remarks";
				break;
			case "p_country":
				$name="Postal Country";
				break;
			case "p_state":
				$name="Postal state";
				break;
			case "p_city":
				$name="Postal City";
				break;
			case "o_country":
				$name="organizational Country";
				break;
			case "o_state":
				$name="organizational State";
				break;
			case "o_city":
				$name="organizational City";
				break;
			case "subscribe":
				$name="Subscribe Newsletter";
				$s=$cnt;
				break;
			
		}   
	     $line .= $comma . '"' . str_replace('"', '""', $name) . '"';
    	 $comma = ",";
		 $cnt++;
   }
 $line .= "\n";
 fputs($handle, $line);

 // remove the result pointer back to the start
 mysql_data_seek($res, 0);
	
	if($table=="contact_mst")
	{
		 while($row = mysql_fetch_assoc($res)) 
		 {
			$line = "";
			$comma = "";
		   	$cnt=0;
			foreach($row as $value)
			{			
				if($cnt==$a)
				{					
					 $b=$value;
					 $cat=explode(",",$b);
					 $cat=array_slice($cat,1,count($cat)-2);					 
					 $cat_name="";
					 for($i=0;$i<count($cat);$i++)
					 {
						$sql=mysql_query("select category_name from category_mst where category_id=".$cat[$i]);
						$row=mysql_fetch_array($sql);
						$cat_name.=$row['category_name'].",";	
					 }
					$value=substr($cat_name,0,strlen($cat_name)-1);
				}	
				
				if($cnt==$d)
				{					
					 $b=$value;
					 $cat=explode(",",$b);
					 $cat=array_slice($cat,1,count($cat)-2);					 
					 $cat_name="";
					 for($i=0;$i<count($cat);$i++)
					 {
						$sql=mysql_query("select source_name from source_mst where source_id=".$cat[$i]);
						$row=mysql_fetch_array($sql);
						$cat_name.=$row['source_name'].",";	
					 }
					$value=substr($cat_name,0,strlen($cat_name)-1);
				}
				
				if($cnt==$s)
				{					
					if($value=="1")
					{
						$value="Yes";
					}
					else
					{
						$value="No";
					}
				}
				$line .= $comma . '"' . str_replace('"', '""', $value) . '"';
				$comma = ",";
				$cnt++;
			}
			$line .= "\r\n";
			fputs($handle, $line);
		 }	
	}
	else
	{
		 // and loop through the actual data
		 while($row = mysql_fetch_assoc($res)) 
		 {
			$line = "";
			$comma = "";
		   
			foreach($row as $value)
			 {
				$line .= $comma . '"' . str_replace('"', '""', $value) . '"';
				$comma = ",";
			 }
			$line .= "\r\n";
			fputs($handle, $line);
		 }
	}
 fclose($handle);

    $path="backup/csv/$filename";
	$rfile=$path;
	$filesize=filesize($rfile);
	header("Cache-control: private"); 		
	header('Content-type: application/csv');
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
