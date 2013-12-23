<?php include_once("configure/configure.php"); 

if(isset($_GET['country']))
{
	$co1="select country_name from country_mst where country_id=".$_GET['country'];
	$cores1=mysql_query($co1);
	$corow=mysql_fetch_array($cores1);
	
	$s1="select state_name from state_mst where state_id=".$_GET['state'];
	$sres1=mysql_query($s1);
	$srow=mysql_fetch_array($sres1);

	$ci1="select city_name from city_mst where city_id=".$_GET['city'];
	$cires1=mysql_query($ci1);
	$cirow=mysql_fetch_array($cires1);

	if($_GET['country']!="0" && $_GET['state']!="0" && $_GET['city']!="0")
	{
		$sql="select * from contact_mst where o_country=".$_GET['country']." and o_state=".$_GET['state']." and o_city=".$_GET['city'];
		$rep="Contacts in Country ".$corow[0].", State ".$srow[0]." and City ".$cirow[0];
	}	
	else if($_GET['city']=="0" && $_GET['state']=="0")
	{
		$sql="select * from contact_mst where o_country=".$_GET['country'];
		$rep="Contacts in Country ".$corow[0];
	}
	else if($_GET['country']=="0" && $_GET['state']=="0")
	{
		$sql="select * from contact_mst where o_city=".$_GET['city'];
		$rep="Contacts in City ".$cirow[0];
	}		
	else if($_GET['city']=="0" && $_GET['country']=="0")
	{
		$sql="select * from contact_mst where o_state=".$_GET['state'];
		$rep="Contacts in State ".$srow[0];
	}
	else if($_GET['country']=="0")
	{
		$sql="select * from contact_mst where o_state=".$_GET['state']." and o_city=".$_GET['city'];
		$rep="Contacts in State ".$srow[0]." and City ".$cirow[0];
	}
	else if($_GET['state']=="0")
	{
		$sql="select * from contact_mst where o_country=".$_GET['country']." and o_city=".$_GET['city'];
		$rep="Contacts in Country ".$corow[0]." and City ".$cirow[0];
	}
	else if($_GET['city']=="0")
	{
		$sql="select * from contact_mst where o_country=".$_GET['country']." and o_state=".$_GET['state'];
		$rep="Contacts in Country ".$corow[0]." and State ".$srow[0];
	}
}
else if(isset($_GET['type']))
{
	if($_GET['type']=="country" || $_GET['type']=="state" || $_GET['type']=="city")
	{ 
		$sql="select * from contact_mst where o_".$_GET['type']."=".$_GET['id'];	
	}
	else
	{		
		$sql="select * from contact_mst where ".$_GET['type']." like '%,".$_GET['id'].",%'";
		if($_GET['type']=="category")
		{
			$q="Category";
			$cat=mysql_query("select category_name from category_mst where category_id=".$_GET['id']);
			$cat1=mysql_fetch_array($cat);
		}
		else
		{
			$q="Source";			
			$cat=mysql_query("select source_name from source_mst where source_id=".$_GET['id']);
			$cat1=mysql_fetch_array($cat);
		}
		$rep="Contacts from $q ".$cat1[0];
	}
}
else if(isset($_GET['fsearch']))
{
	$sql="select * from contact_mst where f_name like '%".$_GET['fsearch']."%'";
	$rep="Contacts having name like : ".$_GET['fsearch'];
}
$result=mysql_query($sql);
if(mysql_num_rows($result))
{
?>
<html>
<head>
<link rel="stylesheet" href="style1.css" type="text/css">

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgcolorreport">
<table align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center"><h2><u>Contacts</u></h2></td>
</tr>
<tr><td align="center"><h3><u><?php echo $rep; ?></u></h3></td></tr>
</table>
<table border="1" align="center">
<?php
$cnt=0;
while($r=mysql_fetch_array($result))
{
$cnt++;
?>

<tr <?php  if($cnt%3==0){echo 'style="page-break-after:always"';}?>>
	<td valign="top">
    	<table width="100%" border="0" class="tableheading" >
   	  <tr>
            	<th nowrap="nowrap" colspan="3" bgcolor="#273449" class="sub_title"  >
                	Personal Details
            	</th>
            </tr>
            <tr>
            	<td width="79" nowrap="nowrap" class="fontstyle1">
                	First Name </td>
                    <td>:</td>
          <td nowrap="nowrap">
                	<?php echo $r['f_name']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Last Name 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['l_name']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Gender 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['gender']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Birthdate
                </td>
                <td>:</td>
                <td  nowrap="nowrap">
                	<?php echo $r['dob']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1" valign="top">
                	Address 1                     
                </td>
                <td>:</td>
                <td width="98">
                	<?php echo $r['p_add1']; ?>                </td>
          </tr>
            <tr>
            	<td nowrap="nowrap" valign="top" class="fontstyle1">
                	Address 2 
                </td>
                <td>:</td>
                <td  width="98">
                	<?php echo $r['p_add2']; ?>                </td>
          </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	City 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                <?php $sql="select city_name from city_mst where city_id=".$r['p_city'];
						$res=mysql_query($sql);
						if(mysql_num_rows($res)>0)
						{                    
							$row=mysql_fetch_array($res);
                	 		echo $row['city_name']; 
						}	 ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Pincode 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['p_pincode']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	State 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php $sql="select state_name from state_mst where state_id=".$r['p_state'];
						$res=mysql_query($sql);
					if(mysql_num_rows($res)>0)
						{                    
							$row=mysql_fetch_array($res);
                	 		echo $row['state_name']; 
						} ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Country 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php $sql="select country_name from country_mst where country_id=".$r['p_country'];
						$res=mysql_query($sql);
						
							if(mysql_num_rows($res)>0)
						{                    
						$row=mysql_fetch_array($res);
                	 		echo $row['country_name']; 
						} ?>
                </td>
            </tr>            
        </table>
    </td>
    <td valign="top">
    <table width="100%" border="0" class="tableheading"  >
  <tr>
            	<th nowrap="nowrap" colspan="3" bgcolor="#273449" class="sub_title" >
                	Organizational Details
            	</th>
            </tr>
            <tr>
            	<td width="80" nowrap="nowrap" class="fontstyle1">
                	Org. Name                 </td>
                    <td>:</td>                    
          <td nowrap="nowrap">
                	<?php echo $r['org_name']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1" valign="top">
                	Address 1 
                </td>
                <td>:</td>
                <td   width="101">
                	<?php echo $r['o_add1']; ?>                </td>
        </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1" valign="top">
                	Address 2                     
                </td>
                <td>:</td>
                <td width="101">
                	<?php echo $r['o_add2']; ?>                </td>
        </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	City 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php $sql="select city_name from city_mst where city_id=".$r['o_city'];
						$res=mysql_query($sql);

				    	if(mysql_num_rows($res)>0)
						{                    
							$row=mysql_fetch_array($res);
                	 		echo $row['city_name']; 
						}
						?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Pincode 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['o_pincode']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	State 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php $sql="select state_name from state_mst where state_id=".$r['o_state'];
						$res=mysql_query($sql);

						if(mysql_num_rows($res)>0)
						{                    
							$row=mysql_fetch_array($res);
                	 		echo $row['state_name']; 
						}
						 ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Country 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
					<?php $sql="select country_name from country_mst where country_id=".$r['o_country'];
						$res=mysql_query($sql);

						if(mysql_num_rows($res)>0)
						{                    
							$row=mysql_fetch_array($res);
                	 		echo $row['country_name']; 
						}
 ?>                </td>
            </tr>            
        </table>
    </td>
    <td valign="top">
    	<table width="100%" border="0" class="tableheading"  >
        	<tr>
            	<th nowrap="nowrap" colspan="3" bgcolor="#273449" class="sub_title" >
                	Communication Details
            	</th>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Phone 1 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['phone1']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Phone 2 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['phone2']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Mobile 1 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['mobile1']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Mobile 2 
                </td>
                <td>:</td>
                <td  nowrap="nowrap">
                	<?php echo $r['mobile2']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Fax 
                </td>
                <td>:</td>
                <td  nowrap="nowrap">
                	<?php echo $r['fax']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Email 1 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['email1']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Email 2 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['email2']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Email 3 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['email3']; ?>
                </td>
            </tr>
            <tr>
            	<td nowrap="nowrap" class="fontstyle1">
                	Website 
                </td>
                <td>:</td>
                <td nowrap="nowrap">
                	<?php echo $r['website']; ?>
                </td>
            </tr>
               
        </table>
    </td>
    <td valign="top">
    <table >
    	<tr>
        	<td>
    			<table border="0" class="tableheading"  >
        			<tr>
            			<th width="151" nowrap="nowrap" bgcolor="#273449" class="sub_title" >
                			Source                		</th>
                
                  </tr>
            		<tr>            			
                	 	<td nowrap="nowrap" align="center">
                        <?php 
							$sources=explode(",",$r['source']);													
							$sqlsource="select * from source_mst";
							$rssource=mysql_query($sqlsource);
							while($rowsource = mysql_fetch_array($rssource))
							{
								for($i=1;$i<count($sources);$i++)
			   					{	
			      					if($sources[$i]==$rowsource['source_id'])	
				  					{							    								 
								 		echo $rowsource['source_name']."<br>";
									}
								}
							}
						?>
                		</td> 
            		</tr>
        		</table>
        	</td>
         </tr>
         <tr>
         	<td>
            	<table border="0" class="tableheading"  >
                	<tr>
                    	<th colspan="2" nowrap="nowrap" bgcolor="#273449" class="sub_title" >
                        	Remarks 
                        </th>
                    </tr>
                    <tr>
                    	<td width="150" align="center">
                        	<?php echo $r['remarks'];?>
                        </td>
                    </tr>
                </table>
            </td>
         </tr>
         <tr>
         	<td>
            	<table border="0"  class="tableheading" >
                	<tr>
                    	<th width="150" colspan="2" nowrap="nowrap" bgcolor="#273449" class="sub_title" >
                        	Category                        </th>
                  </tr>
                    <tr>
                    	<td nowrap="nowrap" align="center" >
                        	 <?php 
							$categories=explode(",",$r['category']);													
							$sqlcategory="select * from category_mst";
							$rscategory=mysql_query($sqlcategory);
							while($rowcategory = mysql_fetch_array($rscategory))
							{
								for($i=1;$i<count($categories);$i++)
			   					{	
			      					if($categories[$i]==$rowcategory['category_id'])	
				  					{							    								 
								 		echo $rowcategory['category_name']."<br>";
									}
								}
							}
						?>
                        </td>
                    </tr>
                </table>
            </td>
         </tr>

     </table>
    </td>
</tr>
<?php }}
else
{
	echo "<h2>No Records Found..!!</h2>";
} ?>

</table>
</body>
</html>