<div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="8">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground"  align="left">
                
                <table>
                <tr><td>
                  <input type="hidden" name="total_ids" id="total_ids" size="2" value="<?php echo $total_id;?>"/>
                      <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="4.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn"><?php } ?></td>
                  <td>
                  <input type="button" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })" value="Send SMS" class="regbtn1"class="regbtn1"/>
          			<div class="highslide-maincontent" >
                  <table>
    				
            		<tr>	
                		<td valign="top"><b>Message:</b></td>
               		 <td><textarea name="sms" cols="35" rows="5" id="sms1"></textarea></td>   
      		
        			</tr>
           			 <tr>
            			<td></td>
                		<td><input type="button" value="Send" onclick="sendsms1()" /> </td>
            		</tr>
        		</table>
        </div></td>
                         <td>
                         <select id="sel_mask">
        <option value="0">Select Mask</option>
    	<?php 
		$s1="select * from setting";
		$r1=mysql_query($s1);
		$row1=mysql_fetch_array($r1);
		$a=$row1[2];
		$a=explode(",",$a);		
		for($i=0;$i<count($a);$i++)
		{
		?>
        	<option value="<?php echo $a[$i];?>"><?php echo $a[$i];?></option>
        <?php } ?> 
    </select></td></tr></table></th>
           <th class="thbackground" width="100%"> Contact
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
        <tr>
        <td class="tabletitle"><input type="checkbox" name="check" id="check"  onclick="checkall_none();"/></td>
            
          
              			<td class="tabletitle1" align="left"><a onclick="desc(<?php echo "1";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onclick="asc(<?php echo "1";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Name</td>
              	
                
                <td class="tabletitle1" align="left"><a onclick="desc(<?php echo "2";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onclick="asc(<?php echo "2";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
                       
              			Mobile1</td>
                        <td class="tabletitle1"  align="left"><a onclick="desc(<?php echo "4";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onclick="asc(<?php echo "4";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
                                 Email1</td>
                        
                        <td class="tabletitle1"  align="left"><a onclick="desc(<?php echo "5";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onclick="asc(<?php echo "5";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Organization</td>
                        
                        <td class="tabletitle1"  align="left"><a onclick="desc(<?php echo "5";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onclick="asc(<?php echo "5";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Pincode</td>
                        
                        <td class="tabletitle1" align="left"><a onclick="desc(<?php echo "6";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onclick="asc(<?php echo "6";?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Subscribe</td>
                      
            <td class="tabletitle">Actions</td>
        </tr>
     
             <?php
			if(isset($_GET['search']))
			{
				$search=$_GET['search'];
			}
			else
			{
				$search="";
			}
			
			if(isset($_GET['order']))
			{
				
			$sql ="select a.contact_id,a.f_name,a.l_name,a.p_pincode,a.org_name,a.mobile1,a.email1,a.subscribe from (select contact_id,f_name,l_name,p_pincode,org_name,mobile1,email1,subscribe from contact_mst where f_name like '%".$search."%' or l_name like '%".$search."%' or p_pincode like '%".$search."%' or org_name like '%".$search."%' or mobile1 like '%".$search."%' or email1 like '%".$search."%' limit $offset,$rec_limit) a order by ".$_GET['field']." ".$_GET['order'] ;						
			}
			else
			{
				$sql="select contact_id,f_name,l_name,p_pincode,org_name,mobile1,email1,subscribe from contact_mst where f_name like '%".$search."%' or l_name like '%".$search."%' or p_pincode like '%".$search."%' or org_name like '%".$search."%' or mobile1 like '%".$search."%' or email1 like '%".$search."%' limit $offset,$rec_limit";
			}
			// echo $sql;
			$res = mysql_query($sql);
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$cnt++;
				$total_id .= ",".$row->contact_id;
			
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->contact_id;?>"  id="C1_<?php echo $row->contact_id;?>" /></td>
            
           
            
            <td class="tdbg1"><a href="preview.php?id=<?php echo $row->contact_id;?>"  class="link" target="_blank"><?php echo $row->f_name;?>&nbsp;<?php echo $row->l_name;?></a></td>
            
            <td class="tdbg1"><?php echo $row->mobile1;?></td>
            <td class="tdbg1"><?php echo $row->email1;?></td>
            <td class="tdbg1"><?php echo $row->org_name;?></td>
            <td class="tdbg1"><?php echo $row->p_pincode;?></td>
            <td class="tdbg1"><?php if($row->subscribe=="0"){echo "No";}else{echo "Yes";} ?></td>
             <?php 
			   	if($cnt==0)
				{?>
                	<center><h1>No Records Found...	</h1></center>
				<?php }?>
           
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
           					<table>
              <tr>
              <td><a href="" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })"><img title="Send SMS" src="images/sms.png" border="0"/></a>
              <div class="highslide-maincontent" >
                         <table>
                            <tr>
                                <td valign="top"><b>To:</b></td>
                                <td><?php echo $row->f_name." ".$row->l_name ?></td>
                            </tr>
                            <tr>	
                                <td valign="top"><b>Message:</b></td>
                                <td><textarea name="sms" id="msg<?php echo $row->contact_id; ?>" cols="35" rows="5"></textarea></td>   
                            
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="button" value="Send" onclick="sendsingle(<?php echo $row->contact_id; ?>)" /> </td>
                            </tr>
                        </table>
       		 </div>    
         	</td>
                
              <td><?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="4.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	 <a onClick="javascript:update(<?php echo $row->contact_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/edit-icon.png" title="Edit"/></a></td><?php } ?></tr></table>
            		</td>  
               	</tr>
                </table>
                </td>
            <?php } ?>
            </tr>
        
        <tr>
        <td colspan="8">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tablefootright.png" /></th>
                <th class="thbackground1" width="100%" align="left">
                 
                <table>
                <tr><td>
                  <input type="hidden" name="total_ids" id="total_ids" size="2" value="<?php echo $total_id;?>"/>
                      <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="4.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete"  class="regbtn"><?php } ?></td>
                  <td>
                  <input type="button" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })" value="Send SMS" class="regbtn1"class="regbtn1"/>
          			<div class="highslide-maincontent" >
                  <table>
    				
            		<tr>	
                		<td valign="top"><b>Message:</b></td>
               		 <td><textarea name="sms" cols="35" rows="5" id="sms1"></textarea></td>   
      		
        			</tr>
           			 <tr>
            			<td></td>
                		<td><input type="button" value="Send" onclick="sendsms1()" /> </td>
            		</tr>
        		</table>
        </div></td>
                         <td>
                         <select id="sel_mask1">
        <option value="0">Select Mask</option>
    	<?php 
		$s1="select * from setting";
		$r1=mysql_query($s1);
		$row1=mysql_fetch_array($r1);
		$a=$row1[2];
		$a=explode(",",$a);		
		for($i=0;$i<count($a);$i++)
		{
		?>
        	<option value="<?php echo $a[$i];?>"><?php echo $a[$i];?></option>
        <?php } ?> 
    </select></td></tr></table>
                </th>
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
        </td> 
        </tr>
        </table>
    </div>
    
</div>