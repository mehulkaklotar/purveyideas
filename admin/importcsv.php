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
$file = $_REQUEST['csvfile'];
$table = $_REQUEST['ttype'];
$successful=0;
$failed=0;


if (($handle = fopen("backup/csv/".$file, "r")) !== FALSE) 
{
$cnt=0;
$cnt1=0;
		if($table=="category_mst")
		{
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
			
				$category_name = trim($data[0]); 				
				if($cnt!=0)
				{
					$dup_query=mysql_query("select * from category_mst where category_name='".$category_name."'");
					if(mysql_num_rows($dup_query)>0)
					{	
						
						$failed++;
						
					}
					else
					{						
						mysql_query("INSERT INTO category_mst (category_name) VALUES ('$category_name')");	
						$successful++;
					}																															
				}				
				$cnt++;
			}
		}		
		
				
		else if($table=="contact_mst")
		{
			$name1=100;
			$name2=100;
			$name3=100;
			$name4=100;
			$name5=100;
			$name6=100;
			$name7=100;
			$name8=100;
			$name9=100;
			$name10=100;
			$name11=100;
			$name12=100;
			$name13=100;
			$name14=100;
			$name15=100;
			$name16=100;
			$name17=100;
			$name18=100;
			$name19=100;
			$name20=100;
			$name21=100;
			$name22=100;
			$name23=100;
			$name24=100;
			$name25=100;
			$name26=100;
			$name27=100;
			$name28=100;
			$name29=100;
			$name30=100;
			$name31=100;
			
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$data[100]="";
				if($cnt==0)
				{
					for($i=0;$i<count($data)-1;$i++)
						{
							switch($data[$i])
							{
								case "First Name":
									$name1=$i;
									break;
								case "Last Name":
									$name2=$i;
									break;
								case "Gender":
									$name3=$i;
									break;
								case "Birthdate":
									$name4=$i;
									break;
								case "Postal Address1":
									$name5=$i;
									break;
								case "Postal Address2":
									$name6=$i;
									break;
								case "Postal Pincode":
									$name7=$i;
									break;
								case "Organisation Name":
									$name8=$i;
									break;
								case "Organisation Address1":
									$name9=$i;
									break;
								case "Organisation Address2":
									$name10=$i;
									break;
								case "Organisation Pincode":
									$name11=$i;
									break;
								case "Source":
									$name12=$i;
									$s=$cnt1;
									break;
								case "Phone No1":
									$name13=$i;
									break;
								case "Phone No2":
									$name14=$i;
									break;
								case "Mobile No1":
									$name15=$i;
									break;
								case "Mobile No2":
									$name16=$i;
									break;
								case "Fax":
									$name17=$i;
									break;
								case "Email ID1":
									$name18=$i;
									break;
								case "Email ID2":
									$name19=$i;
									break;
								case "Email ID3":
									$name20=$i;
									break;
								case "Website":
									$name21=$i;
									break;
								case "Category":
									$name22=$i;
									$a=$cnt1;
									break;
								case "Remarks":
									$name23=$i;
									break;
								case "Postal Country":
									$name24=$i;
									$co=$cnt1;
									break;
								case "Postal state":
									$name25=$i;
									$st=$cnt1;
									break;
								case "Postal City":
									$name26=$i;
									$ci=$cnt1;
									break;
								case "organizational Country":
									$name27=$i;
									$oco=$cnt1;
									break;
								case "organizational State":
									$name28=$i;
									$ost=$cnt1;
									break;
								case "organizational City":
									$name29=$i;
									$oci=$cnt1;
									break;
								case "Subscribe Newsletter":
									$name30=$i;
									break;
								case "Group Name":
									$name31=$i;
									break;
							}
						}
					}
					else               
					{														
							if($cnt1==$a)
							{	
								if($data[$name22]!="")
								{				
									$b=$data[$name22];
									 $cat=explode(",",$b);
									 $cat=array_slice($cat,0,count($cat));
									 //print_r($cat);					 
									 $cat_name="";
									 for($i=0;$i<count($cat);$i++)
									 {
										$sql=mysql_query("select category_id from category_mst where category_name='".$cat[$i]."'");
										$row=mysql_fetch_array($sql);
										$cat_name.=$row['category_id'].",";	
									 }
									//$value=substr($cat_name,0,strlen($cat_name));
									$cat_name.="0";
									$category= trim($cat_name);
								}
								else
								{
									$category="";
								}
							}
							
							
							if($cnt1==$s)
							{	
								if($data[$name12]!="")
								{				
									$b=$data[$name12];
									 $cat=explode(",",$b);
									 $cat=array_slice($cat,0,count($cat));
									 //print_r($cat);					 
									 $cat_name="";
									 for($i=0;$i<count($cat);$i++)
									 {
										$sql=mysql_query("select source_id from source_mst where source_name='".$cat[$i]."'");
										$row=mysql_fetch_array($sql);
										$cat_name.=$row['source_id'].",";	
									 }
									//$value=substr($cat_name,0,strlen($cat_name));
									$cat_name.="0";
									$source= trim($cat_name);
								}
								else
								{
									$source="";
								}
							}
							
							if($cnt1==$co)
							{
								if($data[$name24]!="")
								{
									$b=$data[$name24];
									$sql=mysql_query("select country_id from country_mst where country_name='".$b."'");
									$row=mysql_fetch_array($sql);
									$cat_name=$row['country_id'];
									$country=trim($cat_name);
								}
								else
								{
									$country="";
								}
							}
							
							if($cnt1==$st)
							{
								if($data[$name25]!="")
								{
									$b=$data[$name25];
									$sql=mysql_query("select state_id from state_mst where state_name='".$b."'");
									$row=mysql_fetch_array($sql);
									$cat_name=$row['state_id'];
									$state=trim($cat_name);
								}
								else
								{
									$state="";
								}
							}
							
							if($cnt1==$ci)
							{
								if($data[$name26]!="")
								{
									$b=$data[$name26];
									$sql=mysql_query("select city_id from city_mst where city_name='".$b."'");
									$row=mysql_fetch_array($sql);
									$cat_name=$row['city_id'];
									$city=trim($cat_name);
								}
								else
								{
									$city="";
								}
							}
							
							if($cnt1==$oco)
							{
								if($data[$name27]!="")
								{
									$b=$data[$name27];
									$sql=mysql_query("select country_id from country_mst where country_name='".$b."'");
									$row=mysql_fetch_array($sql);
									$cat_name=$row['country_id'];
									$ocountry=trim($cat_name);
								}
								else
								{
									$ocountry="";
								}
							}
							
							if($cnt1==$ost)
							{
								if($data[$name28]!="")
								{
									$b=$data[$name28];
									$sql=mysql_query("select state_id from state_mst where state_name='".$b."'");
									$row=mysql_fetch_array($sql);
									$cat_name=$row['state_id'];
									$ostate=trim($cat_name);
								}
								else
								{
									$ostate="";
								}
							}
							if($cnt1==$oci)
							{
								if($data[$name29]!="")
								{
									$b=$data[$name29];
									$sql=mysql_query("select city_id from city_mst where city_name='".$b."'");
									$row=mysql_fetch_array($sql);
									$cat_name=$row['city_id'];
									$ocity=trim($cat_name);
								}
								else
								{
									$ocity="";
								}
							}
							$fname = trim($data[$name1]);
							$lname = trim($data[$name2]);
							$gender = trim($data[$name3]);
							$dob = trim($data[$name4]);
							$pos_fs=strpos($dob,"/");
							if($pos_fs!== FALSE)
							{
								$dob1=explode("/",$dob);
								$dob="";
								$dob.=$dob1[2]."-".$dob1[0]."-".$dob1[1];
							}
							$addr1 = trim($data[$name5]);
							$addr2 = trim($data[$name6]);
							//$city = trim($data[$name26]);	
							//$state = trim($data[$name25]);	
							//$country = trim($data[$name24]);	
							$pincode = trim($data[$name7]);	
							$orgname= trim($data[$name8]);
							$oaddr1= trim($data[$name9]);
							$oaddr2= trim($data[$name10]);
							/*$ocity= trim($data[$name29]);
							$ostate= trim($data[$name28]);
							$ocountry= trim($data[$name27]);*/
							$opincode= trim($data[$name11]);
							
							$phone1 = trim($data[$name13]);	
							$phone2 = trim($data[$name14]);	
							$mobile1 = trim($data[$name15]);	
							$mobile2= trim($data[$name16]);	
							$fax= trim($data[$name17]);
							$email1= trim($data[$name18]);
							$email2= trim($data[$name19]);
							$email3= trim($data[$name20]);
							$website= trim($data[$name21]);
							
							$remark= trim($data[$name23]);
							$subscribe= trim($data[$name30]);
							$grp= trim($data[$name31]);				
								if($cnt!=0)
								{
									
									if($email1!="" && $mobile1!="")
									{
										$dup_query=mysql_query("select * from contact_mst where email1='".$email1."' or mobile1='".$mobile1."'");						
										$row_count= mysql_num_rows($dup_query);
									}
									else if($mobile1=="" && $email1!="")
									{
										$dup_query=mysql_query("select * from contact_mst where email1='".$email1."'");
										$row_count= mysql_num_rows($dup_query);
									}
									else if($email1=="" && $mobile1!="")
									{
										$dup_query=mysql_query("select * from contact_mst where mobile1='".$mobile1."'");
										$row_count= mysql_num_rows($dup_query);
									}
									else
									{
										$row_count="";
									}
									
									
									if($mobile1!="" && $email1!="" || $row_count>0 )
									{
										$failed++;
										$where=" 1=1 ";
										if($fname!="")
										{
											$where.=" ,f_name='$fname'";
										}
										if($lname!="")
										{
											$where.=" ,l_name='$lname'";
										}
										if($gender!="")
										{
											$where.=" ,gender='$gender'";
										}
										
										if($dob!="")
										{
											$where.=" ,dob='$dob'";
										}
										if($addr1!="")
										{
											$where.=" ,p_add1='$addr1'";
										}
										if($addr2!="")
										{
											$where.=" ,p_add2='$addr2'";
										}
										if($city!="")
										{
											$where.=" ,p_city='$city'";
										}
										if($state!="")
										{
											$where.=" ,p_state='$state'";
										}
										if($country!="")
										{
											$where.=" ,p_country='$country'";
										}
										if($pincode!="")
										{
											$where.=" ,p_pincode='$pincode'";
										}
										if($phone1!="")
										{
											$where.=" ,phone1='$phone1'";
										}
										if($phone2!="")
										{
											$where.=" ,phone2='$phone2'";
										}
										if($mobile1!="")
										{
											$where.=" ,mobile1='$mobile1'";
										}
										if($mobile2!="")
										{
											$where.=" ,mobile2='$mobile2'";
										}
										if($fax!="")
										{
											$where.=" ,fax='$fax'";
										}
										if($email1!="")
										{
											$where.=" ,email1='$email1'";
										}
										if($email2!="")
										{
											$where.=" ,email2='$email2'";
										}
										if($email3!="")
										{
											$where.=" ,email3='$email3'";
										}
										if($website!="")
										{
											$where.=" ,website='$website'";
										}
										if($orgname!="")
										{
											$where.=" ,org_name='$orgname'";
										}
										if($oaddr1!="")
										{
											$where.=" ,o_add1='$oaddr1'";
										}
										if($oaddr2!="")
										{
											$where.=" ,o_add2='$oaddr2'";
										}
										if($ocity!="")
										{
											$where.=" ,o_city='$ocity'";
										}
										if($ostate!="")
										{
											$where.=" ,o_state='$ostate'";
										}
										if($ocountry!="")
										{
											$where.=" ,o_country='$ocountry'";
										}
										if($opincode!="")
										{
											$where.=" ,o_pincode='$opincode'";
										}
										if($category!="")
										{
											$where.=" ,category='$category'";
										}
										if($source!="")
										{
											$where.=" ,source='$source'";
										}
										if($remark!="")
										{
											$where.=" ,remarks='$remark'";
										}
										if($subscribe!="")
										{
											$where.=" ,subscribe='$subscribe'";
										}
										if($grp!="")
										{
											$where.=" ,group_id='$grp'";
										}
										mysql_query("update contact_mst set $where");
										//echo "update contact_mst set $where";
									}
									else
									{		
										mysql_query("insert into contact_mst set f_name='$fname',l_name='$lname',gender='$gender',dob='$dob',p_add1='$addr1',p_add2='$addr2',p_city='$city',p_state='$state',p_country='$country',p_pincode='$pincode',phone1='$phone1',phone2='$phone2',mobile1='$mobile1',mobile2='$mobile2',fax='$fax',email1='$email1',email2='$email2',email3='$email3',website='$website',org_name='$orgname',o_add1='$oaddr1',o_add2='$oaddr2',o_city='$ocity',o_state='$ostate',o_country='$ocountry',o_pincode='$opincode',category='$category',source='$source',remarks='$remark',subscribe='$subscribe',group_id='$grp'");	
										$successful++;
									}																															
								}
								
				}
			$cnt++;			
			}
		}	
		
		else if($table=="country_mst")
		{
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$country_name = trim($data[0]);
						
				if($cnt!=0)
				{
					$dup_query=mysql_query("select * from country_mst where country_name='".$country_name."'");
					if(mysql_num_rows($dup_query)>0)
					{
						$failed++;
						
					}
					else
					{		
				
					mysql_query("INSERT INTO country_mst (country_name) VALUES ('$country_name')");
					$successful++;
					}																																
				}
				$cnt++;
			}
		}
		
		else if($table=="state_mst")
		{
			$cnorder=100;
			$snorder=100;
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$data[100]="";
				if($cnt==0)
				{
					for($i=0;$i<count($data)-1;$i++)
					{
						switch($data[$i])
						{
							case "State Name":
								$snorder=$i;
								break;							
							case "Country Name":
								$cnorder=$i;
								break;
						}
					}
				}
				else
				{
					$state_name = trim($data[$snorder]);
					$country_name = trim($data[$cnorder]);
					
						$dup_query=mysql_query("select * from country_mst where country_name='".$country_name."'");
						if(mysql_num_rows($dup_query)>0)
						{
							$cselect=mysql_query("select country_id from country_mst where country_name='".$country_name."'");
							$cresult=mysql_fetch_array($cselect);
							$country_id=$cresult['country_id'];
							$dup_query=mysql_query("select * from state_mst where state_name='".$state_name."'");
							if(mysql_num_rows($dup_query)>0)
							{
								$failed++;
								
							}
							else
							{							
								if($cnt!=0)
								{
									mysql_query("INSERT INTO state_mst (state_name, country_id)"." VALUES ('$state_name', '$country_id')");
									$successful++;
								}																														
							}
						}
						else
						{												
							$dup_query=mysql_query("select * from state_mst where state_name='".$state_name."'");
							if(mysql_num_rows($dup_query)>0)
							{
								$failed++;
							}
							else
							{	
								if($country_name!="")
								{
									$cinsert=mysql_query("insert into country_mst set country_name='".$country_name."'");
									$country_id=mysql_insert_id();						
								}
								else
								{
									$country_id="";
								}
								if($cnt!=0)
								{
									mysql_query("INSERT INTO state_mst (state_name, country_id)"." VALUES ('$state_name', '$country_id')");
									$successful++;
								}																														
							}
						}		
				}
				$cnt++;
			}
		}
		
		else if($table=="city_mst")
		{
			$snorder=100;
			$cnorder=100;
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$data[100]="";
				if($cnt==0)
				{
					for($i=0;$i<count($data)-1;$i++)
					{
						switch($data[$i])
						{
							case "City Name":
								$snorder=$i;
								break;							
							case "State Name":
								$cnorder=$i;
								break;
						}
					}
				}
				else
				{
					$city_name = trim($data[$snorder]);
					$state_name = trim($data[$cnorder]);
					
						$dup_query=mysql_query("select * from state_mst where state_name='".$state_name."'");
						if(mysql_num_rows($dup_query)>0)
						{
							$cselect=mysql_query("select state_id from state_mst where state_name='".$state_name."'");
							$cresult=mysql_fetch_array($cselect);
							$state_id=$cresult['state_id'];
							$dup_query=mysql_query("select * from city_mst where city_name='".$city_name."'");
							if(mysql_num_rows($dup_query)>0)
							{
								$failed++;
							}
							else
							{							
								if($cnt!=0)
								{
									mysql_query("INSERT INTO city_mst(city_name,state_id) VALUES ('$city_name','$state_id')");
									$successful++;
								}	
							}
						}
						else
						{												
							$dup_query=mysql_query("select * from city_mst where city_name='".$city_name."'");
							if(mysql_num_rows($dup_query)>0)
							{
								$failed++;
							}
							else
							{	
								if($state_name!="")
								{
									$cinsert=mysql_query("insert into state_mst set state_name='".$state_name."'");
									$state_id=mysql_insert_id();						
								}
								else
								{
									$state_id="";
								}
								if($cnt!=0)
								{
									mysql_query("INSERT INTO city_mst (city_name, state_id)"." VALUES ('$city_name', '$state_id')");
									$successful++;
								}																																						
							}
						}		
				}
				$cnt++;
			}
		}

		
		
		else if($table=="source_mst")
		{
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$source_name = trim($data[0]);
				
				$dup_query=mysql_query("select * from source_mst where source_name='".$source_name."'");
					if(mysql_num_rows($dup_query)>0)
					{
						$failed++;
					}
					else
					{				
						if($cnt!=0)
						{
							mysql_query("INSERT INTO source_mst (source_name)"." VALUES ('$source_name')");	
							$successful++;																															
						}
						$cnt++;
					}
			}
		}
				
		else if($table=="testimonial")
		{
			$tnorder=100;
			$tdorder=100;
			$tsdorder=100;
			$tiorder=100;
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$data[100]="";
				if($cnt==0)
				{
					for($i=0;$i<count($data)-1;$i++)
					{
						switch($data[$i])
						{
							case "Testimonial Name":
								$tnorder=$i;
								break;							
							case "Testimonial Description":
								$tdorder=$i;
								break;
							case "Testimonial Short Description":
								$tsdorder=$i;
								break;
							case "Testimonial Image":
								$tiorder=$i;
								break;
						}
					 }
					}
					else
					{

						$testi_name = trim($data[$tnorder]);
						$testi_sdesc = trim($data[$tsdorder]);
						$testi_desc = trim($data[$tdorder]);
						$testi_image = trim($data[$tiorder]);	
						
						$dup_query=mysql_query("select * from testimonial where testi_name='".$testi_name."'");
							if(mysql_num_rows($dup_query)>0)
							{
								$failed++;
							}
							else
							{		
										
								if($cnt!=0)
								{
									mysql_query("INSERT INTO testimonial (testi_name, testi_sdesc,testi_desc,testi_image)"." VALUES ('$testi_name', '$testi_sdesc','$testi_desc','$testi_image')");	
									$successful++;																															
								}
								
							}
					}
					$cnt++;
			}
		}		
		
		else if($table=="groups")
		{
			while ( ($data = fgetcsv($handle, '', ',') ) !== FALSE ) 
			{
				$group_name = trim($data[0]);
				
				$dup_query=mysql_query("select * from groups where group_name='".$group_name."'");
					if(mysql_num_rows($dup_query)>0)
					{
						$failed++;
					}
					else
					{		
								
						if($cnt!=0)
						{
							mysql_query("INSERT INTO groups (group_name) VALUES ('$group_name')");		
							$successful++;																														
						}
						$cnt++;
					}
			}
		}							
}
?>

</br>
</br>
<font face="Verdana, Arial, Helvetica, sans-serif">
<center><strong><h2><?php if($successful!=0){ echo "Database Imported Successfully!....";}?></h2></strong></center><br />
<center><strong><h3><?php if($successful!=0){echo "$successful Records Imported Successfully..";}?></h3></strong></center>
<center><strong><h3><?php if($failed!=0){echo "$failed Duplicate Records Updated Successfully..";}?></h3></strong></center>


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




