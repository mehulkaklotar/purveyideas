<?php
include("configure/configure.php");
$sql="select * from contact_mst where contact_id=".$_REQUEST['id'];

$rs=mysql_query($sql);
$row=mysql_fetch_object($rs);

$name = stripslashes($row->f_name);
$lname = stripslashes($row->l_name);
$gender = $row->gender;
$dob = $row->dob;
$ads=$row->anniversary;
$p_add1 = stripslashes($row->p_add1);
$p_add2 = stripslashes($row->p_add2);

$p_city = $row->p_city;
$p_state = $row->p_state;
$p_country = $row->p_country;
$p_pincode = $row->p_pincode;
$org_name = stripslashes($row->org_name);
$o_add1 = stripslashes($row->o_add1);
$o_add2 = stripslashes($row->o_add2);
$o_city = $row->o_city;
$o_state = $row->o_state;
$o_country = $row->o_country;
$o_pincode = $row->o_pincode;
$sources = $row->source;
$phone1 = $row->phone1;
$phone2 = $row->phone2;
$mobile1 = $row->mobile1;
$mobile2 = $row->mobile2;
$fax = $row->fax;
$email1 = $row->email1;
$email2 = $row->email2;
$email3 = $row->email3;
$website = stripslashes($row->website);
$category = $row->category;
$remarks = stripslashes($row->remarks);
$subscribe=$row->subscribe;
$grp=$row->group_id;
$category=explode(",",$category);
$sources=explode(",",$sources);

?>
<link rel="stylesheet" type="text/css" href="tabcontent.css" />
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="tabcontent.js"></script>

<br />
<br />
<table width="100%">
<tr>
<th align="center" class="bgtitle">Contact Details</th>
</tr>
</table>
<br />

<form name="frmeditcontact" method="post" action=""  enctype="multipart/form-data">
<table align="center">
<tr>
<td>
<ul id="countrytabs" class="shadetabs">
 <?php
		$flag=0; 
		include("rights.php");
		for($i=0;$i<count($ssrights);$i++)
		{
			if($ssrights[$i]=="4.4.1")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{			
	?>
<li><a href="#" rel="country1" class="selected">Personal</a></li>
<?php } ?>
 <?php
		$flag=0; 
		include("rights.php");
		for($i=0;$i<count($ssrights);$i++)
		{
			if($ssrights[$i]=="4.4.2")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{			
	?>
<li><a href="#" rel="country2">Organizational</a></li>
<?php }?>
 <?php
		$flag=0; 
		include("rights.php");
		for($i=0;$i<count($ssrights);$i++)
		{
			if($ssrights[$i]=="4.4.3")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{			
	?>
<li><a href="#" rel="country3">Communication</a></li>
<?php  } ?>
 <?php
		$flag=0; 
		include("rights.php");
		for($i=0;$i<count($ssrights);$i++)
		{
			if($ssrights[$i]=="4.4.4")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{			
	?>
<li><a href="#" rel="country4">Other</a></li>
<?php } ?>
</ul>
    
<div style="border:1px solid gray; width:450px; margin-bottom: 1em; padding: 10px;">

<div id="country1" class="tabcontent">
<table width="35%">
<tr>
        <td width="19%" height="23"  valign="middle" >First Name</td>
          <td width="3%" align="center" valign="middle">:</td>
        <td width="36%" valign="middle"><label><?php echo $name; ?></label></td>
                                  <td width="42%"><div id="d_f_name" class="rederror"></div></td>
      </tr>

                                <tr>
                                  <td height="23"  valign="middle" class="text"> Last Name <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><?php echo $lname; ?></td>
                                  <td><div id="d_l_name" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Gender <br></td>

                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                <td valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" valign="top"><label>
                                        <?php echo $gender; ?>
                                        </label></td>
                                        
                                        <td width="9%" valign="top" class="text"></td>
                                        <td width="5%" valign="top" class="text">
					</td>
                                        <td width="80%" valign="top" class="text"></td>
                                      </tr>
                                  </table></td>
                                  <td><div id="d_gender"></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Date of Birth <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><?php echo $dob; ?></td>
                                  <td><div id="d_dob" class="rederror"></div></td>
                              </tr>
                              <tr>
                                  <td height="23"  valign="middle" class="text">Anniversary Date <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><?php echo $ads; ?></td>
                                  <td><div id="d_ads" class="rederror"></div></td>
                              </tr>
      <tr >
                                  <td height="3" colspan="3" valign="top" class="text"></td>
      </tr>
                                <tr>
                                  <td  valign="top" class="text">Address1 <br></td>
                                  <td width="3%" align="center" valign="top" class="text">:</td>

                                <td valign="top"><label>
                                <?php echo $p_add1; ?>
                                  </label></td>
                                  <td><div id="d_add1" class="rederror"></div></td>
                              </tr>
      <tr >
        <td height="3" colspan="3" valign="top" class="text"></td>
                                </tr>
                                <tr>

                                  <td height="21"  valign="top" class="text">Address2 <br></td>
                                  <td width="3%" align="center" valign="top" class="text">:</td>
                                  <td valign="top"><?php echo $p_add2; ?></td>
                                  <td><div id="d_add2" class="rederror"></div></td>
                              </tr>
      <tr >
        <td height="3" colspan="3" valign="top" class="text"></td>
                                </tr>

                                <tr>
                                  <td height="23"  valign="middle" class="text">City <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle">
                                    <?php 
									   $sqlcity="select city_name from city_mst where city_id='".$p_city."'";
									   $rscity=mysql_query($sqlcity);
									   $rowcity = mysql_fetch_object($rscity);
									   echo $rowcity->city_name;									  
									 ?>                                    
                                  </select>
                                  </td>
                                  <td><div id="d_city" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">State</td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle">       
                                  <?php 
									   $sqlstate="select state_name from state_mst where state_id='".$p_state."'";
									   $rsstate=mysql_query($sqlstate);
									   $rowstate = mysql_fetch_object($rsstate);
									   echo $rowstate->state_name;
									 ?>                                    
                                  </td>
                                  <td><div id="d_state" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Country</td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle">

                                       <?php 
									   $sqlcountry="select country_name from country_mst where country_id='".$p_country."'";
									   $rscountry=mysql_query($sqlcountry);
									   $rowcountry = mysql_fetch_object($rscountry);
										echo $rowcountry->country_name;								  
									 ?>                                   
                                  </td>
                                  <td><div id="d_country" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Pincode</td>
                                  <td align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><?php echo $p_pincode; ?></td>
                                  <td><div id="d_pincode" class="rederror"></div></td>
                                </tr>
    </table>                      
</div>
<div id="country2" class="tabcontent">
<table width="477"  border="0" align="center" cellpadding="0" cellspacing="0"  >                                  
<tr>
                                    <td width="25%" height="23"  valign="middle" class="text">Organization Name</td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td width="37%" valign="middle"><label>
                                    <?php echo $org_name; ?>
                                    </label></td>
                                    <td width="35%"><div id="d_orgname" class="rederror"></div></td>
                                </tr>
                                  <tr >

                                    <td height="3" colspan="3" valign="top" class="text"></td>
                                  </tr>
                                  <tr>
                                    <td  valign="top" class="text">Address1 <br></td>
                                    <td width="3%" align="center" valign="top" class="text">:</td>
                                  <td valign="top"><label>                                     
										<?php echo $o_add1; ?>
                                    </label></td>
                                    <td><div id="d_oadd1" class="rederror"></div></td>
                                </tr>
                                  <tr >
                                    <td height="3" colspan="3" valign="top" class="text"></td>
                                  </tr>
                                  <tr>
                                    <td height="21"  valign="top" class="text">Address2 <br></td>
                                    <td width="3%" align="center" valign="top" class="text">:</td>

                                    <td valign="top"><?php echo $o_add2; ?></td>
                                    <td><div id="d_oadd2" class="rederror"></div></td>
                                </tr>
                                  <tr >
                                    <td height="3" colspan="3" valign="top" class="text"></td>
                                  </tr>
                                  <tr>
                                    <td height="23"  valign="middle" class="text">City <br></td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle">
                                        <?php 
										 	$sqlc="select city_name from city_mst where city_id='".$o_city."'";
									   		$rsc=mysql_query($sqlc);        
                                          	$city = mysql_fetch_object($rsc);
									  		$city->city_name;
									 ?>                                     
                                    </td>
									<td><div id="d_ocity" class="rederror"></div></td>
	
                                </tr>
                                  <tr>
                                    <td height="23"  valign="middle" class="text">State</td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle">
                                       <?php 
									   $sqls="select state_name from state_mst where state_id='".$o_state."'";
									   $rss=mysql_query($sqls);
									   $state = mysql_fetch_object($rss);
										$state->state_name;									  
									 ?>                                     
                                    </td>
                                    <td><div id="d_ostate" class="rederror"></div></td>
                                </tr>

                                  <tr>
                                    <td height="23"  valign="middle" class="text">Country</td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle">
                                         <?php 
									   $sqlco="select country_name from country_mst where country_id='".$o_country."'";
									   $rsco=mysql_query($sqlco);
									   $country = mysql_fetch_object($rsco);
									  	$country->country_name;
									 ?>                                      
                                    </td>
                                    <td><div id="d_ocountry" class="rederror"></div></td>
                                </tr>
                                  <tr>

                                    <td height="23"  valign="middle" class="text">Pincode</td>
                                    <td align="center" valign="middle" class="text">:</td>
                                    <td valign="middle"><?php echo $o_pincode; ?></td>
                                    <td><div id="d_opincode" class="rederror"></div></td>
                                  </tr>
</table>
</div>
   
        
<div id="country3" class="tabcontent">
<table width="483"  border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr>
                                  <td height="10" colspan="3" valign="top" class="text"></td>
                                </tr>
                                <tr>
                                  <td width="12%" height="25"  valign="middle" class="text">Phone1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                <td width="31%" valign="middle"><label>
                                    <?php echo $phone1;?>
                                  </label></td>
                                  <td width="53%"><div id="d_phone1" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Phone2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><?php echo $phone2;?></td>
                                  <td><div id="d_phone2" class="rederror"></div></td>
                              </tr>

                                <tr>
                                  <td height="25"  valign="middle" class="text">Mobile1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                <td width="31%" valign="middle"><label>
                                    <?php echo $mobile1;?>
                                  </label></td>
                                  <td><div id="d_mobile1" class="rederror"></div></td>
                              </tr>
                                <tr>

                                  <td height="25"  valign="middle" class="text">Mobile2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><?php echo $mobile2;?></td>
                                  <td><div id="d_mobile2" class="rederror"></div></td>
                              </tr>
                                
                                

                            <tr>
                                  <td height="25"  valign="middle" class="text">Fax <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>

                              <td valign="middle"><?php echo $fax;?></td>
                                  <td><div id="d_fax" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Email1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><?php echo $email1;?></td>
                                  <td></td>
                              </tr>
                                <tr>

                                  <td height="25"  valign="middle" class="text">Email2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><?php echo $email2;?></td>
                                  <td><div id="d_email2" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Email3 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><?php echo $email3;?></td>
                                  <td><div id="d_email3" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Website</td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                <td width="31%" valign="middle"><label>
                                    <?php echo $website;?>
                                  </label></td>
                                  <td><div id="d_website" class="rederror"></div></td>

                              </tr>
                            </table>
</div>
<div id="country4" class="tabcontent">
<table border="0" cellpadding="2" cellspacing="2">
<tr>
<td valign="top">Category<td valign="top">:</td></td>

<td height="25">

<?php 
   $totalcat="0";
   $sqlcat="select * from category_mst";
   $rscat=mysql_query($sqlcat);
   while($rowcat = mysql_fetch_object($rscat))
	  {
		    $totalcat .= ",".$rowcat->category_id; 
			for($i=0;$i<count($category);$i++)
			{
				if($category[$i]==$rowcat->category_id)
				{
					echo $rowcat->category_name."<br>";
				}
			}

   } ?>     

</td>                       
</tr>                                                                               	
<tr><td valign="top">Source</td>
<td valign="top">:</td>
<td height="25">
        <div align="center">
<?php 
   $totalcat="0";
   $sqlcat="select * from source_mst";
   $rscat=mysql_query($sqlcat);
   while($rowcat = mysql_fetch_object($rscat))
	  {
		    $totalcat .= ",".$rowcat->source_id; 
			for($i=0;$i<count($sources);$i++)
			{
				if($sources[$i]==$rowcat->source_id)
				{
					echo $rowcat->source_name;
				}
			}

   } ?>     
</div>           

</td>                       
	  </tr>
<tr>
           
                                <td>Subscribe </td><td>:</td>
                                <td> <?php  if($subscribe=="1"){echo "Yes"; } ?><?php  if($subscribe=="0"){ echo "No";} ?></td></tr>								 <tr>
                                 <td>Remarks</td>
                                 <td>:</td>
                                 <td>                                  
                                    <?php echo $remarks;?>
                                    </label></td>                                  
      </tr>		
                                  <tr>
                                
                                <td>Group</td><td>:</td><td>                               																																							                                <?php
									$sql="select group_name from groups where group_id='".$grp."'";
									$res1=mysql_query($sql);
									$r1=mysql_fetch_array($res1);
									echo $r1['group_name'];
								?>                                	
                                </td></tr></td>
                                </tr>							
	</table>
</div>
</div>
 
</form>                               
<script type="text/javascript">
var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()
</script>