<?php
include("configure/configure.php");
if(isset($_GET['f_name']))
{

$name = $_GET['f_name'];
$lname = $_GET['l_name'];
$gender = $_GET['gender'];
$dob = $_GET['dob'];
$ads=$_GET['ads'];
$p_add1 = $_GET['addr1'];
$pd_add2 = $_GET['addr2'];

$p_city = $_GET['city'];
$p_state = $_GET['state'];
$p_country = $_GET['country'];
$p_pincode = $_GET['pincode'];
$org_name = $_GET['orgname'];
$o_add1 = $_GET['oaddr1'];
$o_add2 = $_GET['oaddr2'];
$o_city = $_GET['ocity'];
$o_state = $_GET['ostate'];
$o_country = $_GET['ocountry'];
$o_pincode = $_GET['opincode'];
$sources = $_GET['source'];
$phone1 = $_GET['phone1'];
$phone2 = $_GET['phone2'];
$mobile1 = $_GET['mobile1'];
$mobile2 = $_GET['mobile2'];
$fax = $_GET['fax'];
$email1 = $_GET['email1'];
$email2 = $_GET['email2'];
$email3 = $_GET['email3'];
$website = $_GET['website'];
$category = $_GET['category'];
$remarks = $_GET['remark'];
$subscribe=$_GET['subscribe'];
$grp=$_GET['grp'];
$category=explode(",",$category);
$sources=explode(",",$sources);
}
else
{
$sql="select * from contact_mst where contact_id=".$_REQUEST['id'];

$rs=mysql_query($sql);
$row=mysql_fetch_object($rs);

$name = stripslashes($row->f_name);
$lname = stripslashes($row->l_name);
$gender = $row->gender;
$dob = $row->dob;
$ads=$row->anniversary;
$p_add1 = stripslashes($row->p_add1);
$pd_add2 = stripslashes($row->p_add2);

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
}
?>

<br />
<br />
<table align="center" width="100%">
<tr>
<th align="center" class="bgtitle">Edit Contact</th>
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
			if($ssrights[$i]=="4.1.1")
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
			if($ssrights[$i]=="4.1.2")
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
			if($ssrights[$i]=="4.1.3")
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
			if($ssrights[$i]=="4.1.4")
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
<table width="35%" align="center">
<tr>
        <td width="19%" height="23"  valign="middle" >First Name</td>
          <td width="3%" align="center" valign="middle">:</td>
        <td width="36%" valign="middle"><label>
                                    <input name="firstname" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="firstname" value="<?php echo $name;?>"/>
                                  </label></td>
                                  <td width="42%"><div id="d_f_name" class="rederror"></div></td>
      </tr>

                                <tr>
                                  <td height="23"  valign="middle" class="text"> Last Name <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><input name="lastname" type="text" class="txtbox"   onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);"id="lastname" value="<?php echo $lname;?>"/></td>
                                  <td><div id="d_l_name" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Gender <br></td>

                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                <td valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" valign="top"><label>
                                        <input type="radio" name="gender" id="male" value="male" <?php if($gender == "male") {?> checked="checked" <?php  } ?> />
                                        </label></td>
                                        
                                        <td width="9%" valign="top" class="text">Male</td>
                                        <td width="5%" valign="top" class="text">

					<input type="radio" id="female" name="gender" value="female" <?php if($gender== "female") {?> checked="checked" <?php  }?> ></td>
                                        <td width="80%" valign="top" class="text">Female</td>
                                      </tr>
                                  </table></td>
                                  <td><div id="d_gender"></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Date of Birth <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><input name="dob" type="text" class="txtbox" id="dob" value="<?php echo $dob;?>" onfocus="displayCalendar(document.frmeditcontact.dob,'yyyy-mm-dd',this)"></td>
                                  <td><div id="d_dob" class="rederror"></div></td>
                              </tr>
                              <tr>
                                  <td height="23"  valign="middle" class="text">Anniversary Date <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><input name="ads" type="text" class="txtbox" id="ads" value="<?php echo $ads;?>" onfocus="displayCalendar(document.frmeditcontact.ads,'yyyy-mm-dd',this)"></td>
                                  <td><div id="d_ads" class="rederror"></div></td>
                              </tr>
      <tr >
                                  <td height="3" colspan="3" valign="top" class="text"></td>
      </tr>
                                <tr>
                                  <td  valign="top" class="text">Address1 <br></td>
                                  <td width="3%" align="center" valign="top" class="text">:</td>

                                <td valign="top"><label>
                                <textarea name="addr1" cols="25" rows="3" class="txtbox" id="addr1"><?php echo $p_add1;?></textarea>
                                  </label></td>
                                  <td><div id="d_add1" class="rederror"></div></td>
                              </tr>
      <tr >
        <td height="3" colspan="3" valign="top" class="text"></td>
                                </tr>
                                <tr>

                                  <td height="21"  valign="top" class="text">Address2 <br></td>
                                  <td width="3%" align="center" valign="top" class="text">:</td>
                                  <td valign="top"><textarea name="addr2" cols="25" rows="3" class="txtbox" id="addr2"><?php echo $pd_add2;?></textarea></td>
                                  <td><div id="d_add2" class="rederror"></div></td>
                              </tr>
      <tr >
        <td height="3" colspan="3" valign="top" class="text"></td>
                                </tr>

                                <tr>
                                  <td height="23"  valign="middle" class="text">City <br></td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><select name="selcity" class="txtrequiredsel txtbox_login" id="selcity">
                                    <option selected value="0">Select City</option>
                                    <?php 
									   $sqlcity="select * from city_mst";
									   $rscity=mysql_query($sqlcity);
									   while($rowcity = mysql_fetch_object($rscity))
									   {
									  
									 ?>
                                    <option value="<?php echo $rowcity->city_id;?>"
                                       <?php if( $rowcity->city_id == $p_city) { ?>
                                       selected="selected" <?php }?> ><?php echo stripslashes($rowcity->city_name);?></option>
                                    <?php
									}
									?>                                          
                                  </select>
                                  </td>
                                  <td><div id="d_city" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">State</td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><select name="selstate" class="txtrequiredsel txtbox_login" id="selstate">
                             <option selected value="0">Select State</option>       
                                  <?php 
									   $sqlstate="select * from state_mst";
									   $rsstate=mysql_query($sqlstate);
									   while($rowstate = mysql_fetch_object($rsstate))
									   {
									  
									 ?>
                                    <option value="<?php echo stripslashes($rowstate->state_id);?>"
                                      <?php if($rowstate->state_id == $p_state) { ?>
                                       selected="selected" <?php }?>
                                      ><?php echo $rowstate->state_name;?></option>
                                    <?php
									}
									?>                                            
                                  </select>
                                  </td>
                                  <td><div id="d_state" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Country</td>
                                  <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><select name="selcountry" class="txtrequiredsel txtbox_login" id="selcountry">
                                   <option selected value="0">Select Country</option>

                                       <?php 
									   $sqlcountry="select * from country_mst";
									   $rscountry=mysql_query($sqlcountry);
									   while($rowcountry = mysql_fetch_object($rscountry))
									   {
									  
									 ?>
                                    <option value="<?php echo $rowcountry->country_id;?>"
                                      <?php if($rowcountry->country_id == $p_country) { ?>
                                       selected="selected" <?php }?>
                                      ><?php echo stripslashes($rowcountry->country_name);?></option>
                                    <?php
									}
									?>                            
                                  </select>

                                  </td>
                                  <td><div id="d_country" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="text">Pincode</td>
                                  <td align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><input name="pincode" type="text" class="txtbox"   onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="pincode" value="<?php echo $p_pincode;?>"></td>
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
                                      <input name="orgname" type="text" class="txtbox" id="orgname"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" value="<?php echo $org_name;?>">
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
                                      <textarea name="oaddr1" cols="25" rows="3" class="txtbox" id="oaddr1"><?php echo $o_add1;?></textarea>

                                    </label></td>
                                    <td><div id="d_oadd1" class="rederror"></div></td>
                                </tr>
                                  <tr >
                                    <td height="3" colspan="3" valign="top" class="text"></td>
                                  </tr>
                                  <tr>
                                    <td height="21"  valign="top" class="text">Address2 <br></td>
                                    <td width="3%" align="center" valign="top" class="text">:</td>

                                    <td valign="top"><textarea name="oaddr2" cols="25" rows="3" class="txtbox" id="oaddr2"><?php echo $o_add2;?></textarea></td>
                                    <td><div id="d_oadd2" class="rederror"></div></td>
                                </tr>
                                  <tr >
                                    <td height="3" colspan="3" valign="top" class="text"></td>
                                  </tr>
                                  <tr>
                                    <td height="23"  valign="middle" class="text">City <br></td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><select name="selocity" class="txtrequiredsel txtbox_login" id="selocity">
                                        <option selected value="0">Select City</option>
                                        <?php 
										 $sqlc="select * from city_mst";
									   $rsc=mysql_query($sqlc);        
                                          while($city = mysql_fetch_object($rsc))
									   {
									  
									 ?>
                                      <option value="<?php echo $city->city_id;?>"
                                      <?php if( $city->city_id == $o_city) { ?>
                                       selected="selected" <?php }?>
                                      ><?php echo stripslashes($city->city_name);?></option>
                                    <?php
									}
									?>          
                                                                                    
                                    
                                      </select>
                                    </td>
									<td><div id="d_ocity" class="rederror"></div></td>
	
                                </tr>
                                  <tr>
                                    <td height="23"  valign="middle" class="text">State</td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><select name="selostate" class="txtrequiredsel txtbox_login" id="selostate">
                                        <option selected value="0">Select State</option>
                                                 
                                       <?php 
									   $sqls="select * from state_mst";
									   $rss=mysql_query($sqls);
									   while($state = mysql_fetch_object($rss))
									   {
									  
									 ?>
                                      <option value="<?php echo $state->state_id;?>"
                                      <?php if( $state->state_id == $o_state) { ?>
                                       selected="selected" <?php }?>
                                      ><?php echo stripslashes($state->state_name);?></option>
                                    <?php
									}
									?>     
                                                                                                
                                      </select>
                                    </td>
                                    <td><div id="d_ostate" class="rederror"></div></td>
                                </tr>

                                  <tr>
                                    <td height="23"  valign="middle" class="text">Country</td>
                                    <td width="3%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><select name="selocountry" class="txtrequiredsel txtbox_login" id="selocountry">
                                        <option selected value="0">Select Country</option>
                                        
                                         <?php 
									   $sqlco="select * from country_mst";
									   $rsco=mysql_query($sqlco);
									   while($country = mysql_fetch_object($rsco))
									   {
									  
									 ?>
                                      <option value="<?php echo $country->country_id;?>"
                                      <?php if($country->country_id == $o_country) { ?>
                                       selected="selected" <?php }?>
                                      ><?php echo stripslashes($country->country_name);?></option>
                                    <?php
									}
									?>                                           
                                      </select>
                                    </td>
                                    <td><div id="d_ocountry" class="rederror"></div></td>
                                </tr>
                                  <tr>

                                    <td height="23"  valign="middle" class="text">Pincode</td>
                                    <td align="center" valign="middle" class="text">:</td>
                                    <td valign="middle"><input name="opincode" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="opincode" value="<?php echo $o_pincode;?>"></td>
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

                                    <input name="phone1" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="phone1" value="<?php echo $phone1;?>">
                                  </label></td>
                                  <td width="53%"><div id="d_phone1" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Phone2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><input name="phone2" type="text"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" class="txtbox" id="phone2" value="<?php echo $phone2;?>"></td>
                                  <td><div id="d_phone2" class="rederror"></div></td>
                              </tr>

                                <tr>
                                  <td height="25"  valign="middle" class="text">Mobile1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                <td width="31%" valign="middle"><label>
                                    <input name="mobile1" type="text" class="txtbox" id="mobile1"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" value="<?php echo $mobile1;?>">
                                  </label></td>
                                  <td><div id="d_mobile1" class="rederror"></div></td>
                              </tr>
                                <tr>

                                  <td height="25"  valign="middle" class="text">Mobile2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><input name="mobile2" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="mobile2" value="<?php echo $mobile2;?>"></td>
                                  <td><div id="d_mobile2" class="rederror"></div></td>
                              </tr>
                                
                                

                            <tr>
                                  <td height="25"  valign="middle" class="text">Fax <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>

                              <td valign="middle"><input name="fax" type="text" class="txtbox" id="fax"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" value="<?php echo $fax;?>"></td>
                                  <td><div id="d_fax" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Email1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><input name="email1" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="email1" value="<?php echo $email1;?>"></td>
                                  <td><div id="d_email1" class="rederror"><?php if(isset($_GET['email1'])){echo "Duplicate Email Id";}?></div></td>
                              </tr>
                                <tr>

                                  <td height="25"  valign="middle" class="text">Email2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                  <td valign="middle"><input name="email2" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="email2" value="<?php echo $email2;?>"></td>
                                  <td><div id="d_email2" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Email3 <br></td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>

                                  <td valign="middle"><input name="email3" type="text" class="txtbox"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" id="email3" value="<?php echo $email3;?>"></td>
                                  <td><div id="d_email3" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="text">Website</td>
                                  <td width="4%" align="center" valign="middle" class="text">:</td>
                                <td width="31%" valign="middle"><label>
                                    <input name="website" type="text" class="txtbox" id="website"  onkeypress="javascript:contact_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>,event);" value="<?php echo $website;?>">
                                  </label></td>
                                  <td><div id="d_website" class="rederror"></div></td>

                              </tr>
                            </table>
</div>
<div id="country4" class="tabcontent">
<table width="367"  border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="3" class="fontstyle1">Category:</td></tr>

<tr>
<td width="9%" height="25">
        <div align="center">
<select name="category" id="category" style="width:250px;" multiple="multiple" size="15">
<?php 
   $totalcat="0";
   $sqlcat="select * from category_mst";
   $rscat=mysql_query($sqlcat);
   while($rowcat = mysql_fetch_object($rscat))
	  {
		    $totalcat .= ",".$rowcat->category_id; 
	?>								
            <option value="<?php echo $rowcat->category_id ?>" <?php
			for($i=0;$i<count($category);$i++)
			{
				if($category[$i]==$rowcat->category_id)
				{
					echo "selected='selected'";
				}
			}
			?> ><?php echo $rowcat->category_name; ?></option>                                                    
    <?php } ?>     
</div>           
</select>
</td>                       
	  </tr>
      
 <input type="hidden" name="total_cats" value="<?php echo $totalcat;?>"  />					
                                         
                                         	
<tr><td colspan="3" class="fontstyle1">Source:</td></tr>															
<tr>
<td width="9%" height="25">
        <div align="center">
<select name="source" id="source" style="width:250px;" multiple="multiple" size="15">
<?php 
   $totalcat="0";
   $sqlcat="select * from source_mst";
   $rscat=mysql_query($sqlcat);
   while($rowcat = mysql_fetch_object($rscat))
	  {
		    $totalcat .= ",".$rowcat->source_id; 
	?>								
<option value="<?php echo $rowcat->source_id ?>" <?php
			for($i=0;$i<count($sources);$i++)
			{
				if($sources[$i]==$rowcat->source_id)
				{
					echo "selected='selected'";
				}
			}
			?>> <?php echo $rowcat->source_name; ?></option>                                                    
    <?php } ?>     
</div>           
</select>
</td>                       
	  </tr>
<tr>
           
                                <td colspan="3"><table><tr><td class="fontstyle1">Subscribe :</td><td><input type="radio" name="subscribe" id="subscribe_yes" value="1"  <?php  if($subscribe=="1"){ ?> checked <?php } ?>></td><td>Yes</td><td><input type="radio" name="subscribe" id="subscribe_no" value="0"  <?php  if($subscribe=="0"){ ?> checked <?php } ?>></td><td>No</td></tr></table></td>                                                                                          
                                </tr>
								 
								 <tr>
                                    <td height="25" align="left" valign="middle" colspan="3"><label>
                                     <textarea name="remark" cols="50" rows="6" class="txtbox" id="remark"><?php echo $remarks;?></textarea>
                                    </label></td>
                                   <td width="3%"></td>
      </tr>		
                                  <tr>
                                
                                <td colspan="3"><table><tr><td class="fontstyle1">Select Group :</td><td>
                                <select name="grp" id="grp">
                                <option value="0">Select Group</option>																																									                                <?php
									$sql="select * from groups";
									$res1=mysql_query($sql);
								while($r1=mysql_fetch_array($res1))
								{ 
								?>
                                	<option value="<?php echo $r1['group_id'];?>" <?php if($grp==$r1['group_id']){echo 'selected="selected"';} ?>><?php echo $r1['group_name'] ?></option>
                                <?php } ?>
                                </select>
                                
                                </td></tr></table></td>
                                </tr>							
	</table>
</div>
</div>
 

<div align="center"><input type="button" name="save" value="Save" onClick="javascript:contact_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $_GET['page'];?>,<?php echo $_GET['page_no_start'];?>,<?php echo $_GET['flag'];?>,<?php echo $_GET['lastpage'];?>,<?php echo $_GET['lpr'];?>,<?php echo $_GET['reclimit'];?>);" class="regbtn"  />
			  <input name="button" type="button" onClick="javascript:history.go(0);" value="Back" class="regbtn" /></div>
</form>                               
