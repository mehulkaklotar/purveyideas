<?php
include_once("configure/configure.php");
$err="";
if(isset($_GET['category']))
{
$category=explode(",",$_GET['category']);
$sources=explode(",",$_GET['source']);
}

?>

<link rel="stylesheet" type="text/css" href="tabcontent.css" />

<script type="text/javascript" src="tabcontent.js"></script>
<br />
<br />
<form name="frmaddcontact" method="post" action=""  enctype="multipart/form-data">
<table align="center" width="100%">
<tr>
<th align="center" class="bgtitle" height="30">Add Contact</th>
</tr>
</table>
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
        <td width="35%" height="23"  valign="middle" class="fontstyle1" >First Name</td>
        <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>
<td width="54%" valign="middle"><label>
                                    <input name="firstname" type="text" class="txtbox" id="firstname" value="<?php if(isset($_GET['f_name'])){echo $_GET['f_name'];} ?>" onkeypress="insert_oe(event); "/>
        </label></td>
        <td width="6%"><div id="d_f_name" class="rederror"></div></td>
      </tr>

                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1"> Last Name <br></td>
                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="lastname" type="text" class="txtbox" onkeypress="insert_oe(event); " id="lastname" value="<?php if(isset($_GET['l_name'])){echo $_GET['l_name'];} ?>"/></td>
                                  <td><div id="d_l_name" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">Gender <br></td>

                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>
                            <td valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" valign="top"><label>
                                          <input type="radio" name="gender" id="male" value="male" <?php if(isset($_GET['gender'])){if($_GET['gender']=="male"){echo 'checked="checked"';}} ?> >
                                        </label></td>
                                        <td width="9%" valign="top" class="fontstyle1">Male</td>
                                        <td width="5%" valign="top" class="fontstyle1">

					<input type="radio" name="gender" id="female" value="female" <?php if(isset($_GET['gender'])){if($_GET['gender']=="female"){echo 'checked="checked"';}} ?>></td>
                                        <td width="80%" valign="top" class="fontstyle1">Female</td>
                                      </tr>
                                  </table></td>
                                  <td><div id="d_gender" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">Date of Birth <br></td>
                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>

                                  <td valign="middle">
                                  
                                  <input name="dob" type="text"  id="dob"  onfocus="displayCalendar(document.frmaddcontact.dob,'yyyy-mm-dd',this)" value="<?php if(isset($_GET['dob'])){echo $_GET['dob'];} ?>"></td>
                                  <td><div id="d_dob" class="rederror"></div></td>
                                </tr>
                                 <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">Anniversary Date </td>
                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td><input type="text" name="ads" id="ads"  onfocus="displayCalendar(document.frmaddcontact.ads,'yyyy-mm-dd',this)"  value="<?php if(isset($_GET['ads'])){echo $_GET['ads'];} ?>" /></td>                                 
                                  <td><div id="d_ad" class="rederror"></div></td>
                                </tr>
                                <tr >
                                  <td height="3" colspan="3" valign="top" class="text"></td>
                                </tr>
                                <tr>
                                  <td  valign="top" class="fontstyle1">Address1 <br></td>
                                  <td width="5%" align="center" valign="top" class="fontstyle1">:</td>

                            <td valign="top"><label>
                                    <textarea name="addr1" cols="25" rows="3" class="txtbox"  id="addr1"><?php if(isset($_GET['addr1'])){echo $_GET['addr1'];} ?></textarea>
                                  </label></td>
                                  <td><div id="d_add1" class="rederror"></div></td>
                                </tr>
                                <tr >
                                  <td height="3" colspan="3" valign="top" class="fontstyle1"></td>
                                </tr>
                                <tr>

                                  <td height="21"  valign="top" class="fontstyle1">Address2 <br></td>
                                  <td width="5%" align="center" valign="top" class="fontstyle1">:</td>
                                  <td valign="top"><textarea name="addr2" cols="25" rows="3" class="txtbox"  id="addr2"><?php if(isset($_GET['addr2'])){echo $_GET['addr2'];} ?></textarea></td>
                                  <td><div id="d_add2" class="rederror"></div></td>
                                </tr>
                                <tr >
                                  <td height="3" colspan="3" valign="top" class="text"></td>
                                  
                                </tr>

                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">City <br></td>
                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><select name="selcity" class="txtrequiredsel txtbox_login" id="selcity">
                                    <option value="0" >Select City</option>
                                    <?php 
									   $sqlcity="select * from city_mst";
									   $rscity=mysql_query($sqlcity);
									   while($rowcity = mysql_fetch_object($rscity))
									   {
									  
									 ?>
                                      <option value="<?php echo $rowcity->city_id;?>" <?php if(isset($_GET['city']) && $rowcity->city_id == $_GET['city']) { ?> selected="selected" <?php }?>><?php echo $rowcity->city_name;?></option>
                                    <?php
									}
									?>                                          
                                  </select>
                                  </td>
                                  <td><div id="d_city" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">State</td>
                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>

                                  <td valign="middle"><select name="selstate" class="txtrequiredsel txtbox_login" id="selstate">
                             <option value="0" >Select State</option>       
                                  <?php 
									   $sqlstate="select * from state_mst";
									   $rsstate=mysql_query($sqlstate);
									   while($rowstate = mysql_fetch_object($rsstate))
									   {
									  
									 ?>
                                      <option value="<?php echo $rowstate->state_id;?>" <?php if(isset($_GET['state']) && $rowstate->state_id == $_GET['state']) { ?>selected="selected" <?php }?>> <?php echo $rowstate->state_name;?>  </option>
                                    <?php
									}
									?>                                            
                                  </select>
                                  </td>
                                  <td><div id="d_state" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">Country</td>
                                  <td width="5%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><select name="selcountry" class="txtrequiredsel txtbox_login" id="selcountry">
                                   <option  value="0" >Select Country</option>

                                       <?php 
									   $sqlcountry="select * from country_mst";
									   $rscountry=mysql_query($sqlcountry);
									   while($rowcountry = mysql_fetch_object($rscountry))
									   {
									  
									 ?>
                                      <option value="<?php echo $rowcountry->country_id;?>" <?php if(isset($_GET['country']) && $rowcountry->country_id == $_GET['country']) { ?>selected="selected" <?php }?>><?php echo $rowcountry->country_name;?></option>
                                    <?php
									}
									?>                            
                                  </select>

                                  </td>
                                  <td><div id="d_country" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="23"  valign="middle" class="fontstyle1">Pincode</td>
                                  <td align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="pincode" type="text" class="txtbox" onkeypress="insert_oe(event); " id="pincode" value="<?php if(isset($_GET['pincode'])){echo $_GET['pincode'];} ?>"></td>
                                  <td><div id="d_pincode" class="rederror"></div></td>
                                </tr>
                                <?php /*?><tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Email1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="email1" type="text" class="txtbox" id="email1" onKeyPress="insert_oe(event); " value=""></td>
                                  <td><div id="d_email1" class="rederror"><?php if(isset($_GET['email1'])){echo "Duplicate Email ID";} ?></div></td>
                                </tr><?php */?>
    </table>        
 </div>

<div id="country2" class="tabcontent">
<table width="35%" align="center">
<tr>
                                    <td width="35%" height="23"  valign="middle" class="fontstyle1">Organization Name</td>
        <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
<td width="57%" valign="middle"><label>
                                      <input name="orgname" type="text" class="txtbox" id="orgname" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['orgname'])){echo $_GET['orgname'];} ?>">
                                      
                                    </label></td>
        <td width="4%"><div id="d_orgname" class="rederror"></div></td>
      </tr>
                                  <tr >

                                    <td height="2" colspan="3" valign="top" class="text"></td>
      </tr>
                                  <tr>
                                    <td  valign="top" class="fontstyle1">Address1 <br></td>
                                    <td width="4%" align="center" valign="top" class="fontstyle1">:</td>
<td valign="top"><label>
                                      <textarea name="oaddr1" cols="25" rows="3" class="txtbox" id="oaddr1" ><?php if(isset($_GET['oaddr1'])){echo $_GET['oaddr1'];} ?></textarea>

                                    </label></td>
                                    <td><div id="d_oadd1" class="rederror"></div></td>
                                  </tr>
                                  <tr >
                                    <td height="3" colspan="3" valign="top" class="text"></td>
                                  </tr>
                                  <tr>
                                    <td height="21"  valign="top" class="fontstyle1">Address2 <br></td>
                                    <td width="4%" align="center" valign="top" class="fontstyle1">:</td>

                                    <td valign="top"><textarea name="oaddr2" cols="25" rows="3" class="txtbox" id="oaddr2" ><?php if(isset($_GET['oaddr2'])){echo $_GET['oaddr2'];} ?></textarea></td>
                                    <td><div id="d_oadd2" class="rederror"></div></td>
                                  </tr>
                                  <tr >
                                    <td height="3" colspan="3" valign="top" class="fontstyle1"></td>
                                  </tr>
                                  <tr>
                                    <td height="23"  valign="middle" class="fontstyle1">City <br></td>
                                    <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>

<td valign="middle"><select name="selocity" class="txtrequiredsel txtbox_login" id="selocity">
                                        <option value="0" >Select City</option>
                                        <?php 
										 $sqlc="select * from city_mst";
									   $rsc=mysql_query($sqlc);        
                                          while($city = mysql_fetch_object($rsc))
									   {
									  
									 ?>
                                      <option value="<?php echo $city->city_id;?>" <?php if(isset($_GET['ocity']) && $city->city_id == $_GET['ocity']) { ?>selected="selected" <?php }?>><?php echo $city->city_name;?></option>
                                    <?php
									}
									?>          
                                                                                    
                                    
                                      </select>
                                    </td>
									<td><div id="d_ocity" class="rederror"></div></td>
                                  </tr>
                                  <tr>
                                    <td height="23"  valign="middle" class="fontstyle1">State</td>
                                    <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
<td valign="middle"><select name="selostate" class="txtrequiredsel txtbox_login" id="selostate">
                                        <option value="0">Select State</option>
                                                 
                                       <?php 
									   $sqls="select * from state_mst";
									   $rss=mysql_query($sqls);
									   while($state = mysql_fetch_object($rss))
									   {
									  
									 ?>
                                      <option value="<?php echo $state->state_id;?>" <?php if(isset($_GET['ostate']) && $state->state_id == $_GET['ostate']) { ?>selected="selected" <?php }?>><?php echo $state->state_name;?></option>
                                    <?php
									}
									?>     
                                                                                                
                                      </select>
                                    </td>
                                    <td><div id="d_ostate" class="rederror"></div></td>
                                  </tr>

                                  <tr>
                                    <td height="23"  valign="middle" class="fontstyle1">Country</td>
                                    <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
<td valign="middle"><select name="selocountry" class="txtrequiredsel txtbox_login" id="selocountry">
                                        <option  value="0" >Select Country</option>
                                        
                                         <?php 
									   $sqlco="select * from country_mst";
									   $rsco=mysql_query($sqlco);
									   while($country = mysql_fetch_object($rsco))
									   {
									  
									 ?>
                                      <option value="<?php echo $country->country_id;?>" <?php if(isset($_GET['ocountry']) && $country->country_id == $_GET['ocountry']) { ?>selected="selected" <?php }?>><?php echo $country->country_name;?></option>
                                    <?php
									}
									?>                                           
                                      </select>
                                    </td>
                                    <td><div id="d_ocountry" class="rederror"></div></td>
                                  </tr>
                                  <tr>

                                    <td height="23"  valign="middle" class="fontstyle1">Pincode</td>
                                    <td align="center" valign="middle" class="fontstyle1">:</td>
                                    <td valign="middle"><input name="opincode" type="text" class="txtbox" onKeyPress="insert_oe(event); " id="opincode" value="<?php if(isset($_GET['opincode'])){echo $_GET['opincode'];} ?>"></td>
                                     <td><div id="d_opincode" class="rederror"></div></td>
                                  </tr>
    </table></div>

<div id="country3" class="tabcontent">
<table width="404" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
                                  <td height="10" colspan="3" valign="top" class="text"></td>
                                </tr>
                                <tr>
                                  <td width="36%" height="25"  valign="middle" class="fontstyle1">Phone1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
    <td width="55%" class="fontstyle1"><label>

                                    <input name="phone1" type="text" class="txtbox" id="phone1" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['phone1'])){echo $_GET['phone1'];} ?>">
                                  </label></td>
                                  <td width="5%"><div id="d_phone1" class="rederror"></div></td>
                              </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Phone2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="phone2" type="text" class="txtbox" id="phone2" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['phone2'])){echo $_GET['phone2'];} ?>"></td>
                                  <td><div id="d_phone2" class="rederror"></div></td>
                                </tr>

                                <tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Mobile1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
    <td width="55%" valign="middle"><label>
                                    <input name="mobile1" type="text" class="txtbox" id="mobile1" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['mobile1'])){echo $_GET['mobile1'];} ?>">
                                  </label></td>
                                  <td><div id="d_mobile1" class="rederror"></div></td>
                                </tr>
                                <tr>

                                  <td height="25"  valign="middle" class="fontstyle1">Mobile2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="mobile2" type="text" class="txtbox" id="mobile2" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['mobile2'])){echo $_GET['mobile2'];} ?>"></td>
                                  <td><div id="d_mobile2" class="rederror"></div></td>
                                </tr>
                                

                                <tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Fax <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>

                                  <td valign="middle"><input name="fax" type="text" class="txtbox" id="fax" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['fax'])){echo $_GET['fax'];} ?>"></td>
                                  <td><div id="d_fax" class="rederror"></div></td>
                                </tr>
                                
                                <tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Email1 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="email1" type="text" class="txtbox" id="email1" onKeyPress="insert_oe(event); " value=""></td>
                                  <td><div id="d_email1" class="rederror"><?php if(isset($_GET['email1'])){echo "Duplicate Email ID";} ?></div></td>
                                </tr>
                                
                                <tr>

                                  <td height="25"  valign="middle" class="fontstyle1">Email2 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
                                  <td valign="middle"><input name="email2" type="text" class="txtbox" id="email2" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['email2'])){echo $_GET['email2'];} ?>"></td>
                                  <td><div id="email2" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Email3 <br></td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>

                                  <td valign="middle"><input name="email3" type="text" class="txtbox" id="email3" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['email3'])){echo $_GET['email3'];} ?>"></td>
                                  <td><div id="d_email3" class="rederror"></div></td>
                                </tr>
                                <tr>
                                  <td height="25"  valign="middle" class="fontstyle1">Website</td>
                                  <td width="4%" align="center" valign="middle" class="fontstyle1">:</td>
    <td width="55%" valign="middle"><label>
                                    <input name="website" type="text" class="txtbox" id="website" onKeyPress="insert_oe(event); " value="<?php if(isset($_GET['website'])){echo $_GET['website'];} ?>">
                                  </label></td>
								  <td><div id="d_website" class="rederror"></div></td>
                                </tr>

                            </table>
 </div>

<div id="country4" class="tabcontent">
<table width="367"  border="0" align="center" cellpadding="0" cellspacing="0">
<?php /*?><tr><td colspan="3" class="fontstyle1">Category:</td></tr>
<?php 
     $totalcat="0";
   $sqlcat="select * from category_mst";
   $rscat=mysql_query($sqlcat);
   while($rowcat = mysql_fetch_object($rscat))
	  {
		    $totalcat .= ",".$rowcat->category_id; 
	?>								
                                                                
      <tr>      
		<td width="9%" height="25"><div align="center">
		  <input type="checkbox" name="cat_<?php echo $rowcat->category_id;?>" id="cat_<?php echo $rowcat->category_id;?>" value="<?php echo $rowcat->category_id;?>"    <?php	
				if(isset($category))
				{
					 for($i=1;$i<count($category);$i++)
			   		{
			      if($category[$i]==$rowcat->category_id)
			       {?> checked="true" <?php } }} ?>/>
									</div></td>
		<td width="52%" height="25" class="text"><?php echo $rowcat->category_name;?></td>
                                   
	  </tr>
									<?php }
                                    ?>							
										 <input type="hidden" name="total_cats" value="<?php echo $totalcat;?>"  /><?php */?>		
                                         
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
            <option value="<?php echo $rowcat->category_id ?>"><?php echo $rowcat->category_name; ?></option>                                                    
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
            <option value="<?php echo $rowcat->source_id ?>"><?php echo $rowcat->source_name; ?></option>                                                    
    <?php } ?>     
</div>           
</select>
</td>                       
	  </tr>
                                
                                
                                
                                
                                
                                
                                
                                															
								 <?php /*?><?php
								 $totalsor="0";
								   $sqlsource="select * from source_mst";
								   $rssource=mysql_query($sqlsource);
								   while($source = mysql_fetch_object($rssource))
								   {
								    $totalsor .=",".$source->source_id;
								 ?>
								<tr>
                                
									<td width="9%" height="25"><div align="center">
									  <input type="checkbox" name="sor_<?php echo $source->source_id; ?>"  id="sor_<?php echo $source->source_id; ?>" value="<?php echo $source->source_id; ?>"   <?php		if(isset($sources))
				{
			   for($i=1;$i<count($sources);$i++)
			   {
			      if($sources[$i]==$source->source_id)
			       {?> checked="checked" <?php } }} ?>>
									</div></td>
								  <td width="52%" height="25" class="text"><?php echo $source->source_name; ?></td>
                                    
	  </tr>
								<?php
								}
								?><?php */?>
                                
                                
                                
                                
                                                                
                                <tr>
                                
                                <td colspan="3"><table><tr><td class="fontstyle1">Subscribe :</td><td><input type="radio" name="subscribe" id="subscribe_yes" value="1"  <?php  if(isset($_GET['subscribe']) && $_GET['subscribe']=="1"){ ?> checked <?php } ?>></td><td>Yes</td><td><input type="radio" name="subscribe" id="subscribe_no" value="0"  <?php  if(isset($_GET['subscribe']) && $_GET['subscribe']=="0"){ ?> checked <?php } ?>></td><td>No</td></tr></table></td>                                                                                          
                                </tr>
								
								 <tr>
                                    <td height="25" align="left" valign="middle" colspan="3"><label>
                                      <textarea name="remark" cols="50" rows="6" class="txtbox" id="remark" ><?php if(isset($_GET['remark'])){echo $_GET['remark'];} ?></textarea>
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
                                	<option value="<?php echo $r1['group_id'];?>" <?php if(isset($_GET['grp'])){if($_GET['grp']==$r1['group_id']){echo 'selected="selected"';}} ?>><?php echo $r1['group_name'] ?></option>
                                <?php } ?>
                                </select>
                                
                                </td></tr></table></td>
                                </tr>							
	</table>
    </div>

</div>

</td></tr></table>
<div align="center"><input type="button" name="save" value="Save" onClick="javascript:insert();" class="regbtn"  />
			  <input name="button" type="button" onClick="javascript:history.go(0);" value="Back" class="regbtn" /></div>
</form>                               
