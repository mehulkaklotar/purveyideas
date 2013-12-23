<div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
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
					if($subrights[$i]=="3.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn"><?php } ?></td>
                  <td>
                  <input type="button" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })" value="Send SMS" class="regbtn1"class="regbtn"/>
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
           <th class="thbackground" width="100%"> Group
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
        <tr>
        <td class="tabletitle"><input type="checkbox" name="check" id="check"  onclick="checkall_none();"/></td>
            <td class="tabletitle">
            <table>
                
             		<tr>
              			<td><a onclick="desc(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a></td>
                        <td><a onclick="asc(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a></td>
              			<td>Group</td>
              	</tr>
             	</table>
            
            </td>
            <td class="tabletitle">Actions</td>
        </tr>
        <?php
		  	if(isset($_GET['op']))
			{
				if($_GET['op']=="add")
				{?>
                 <tr>
      			<td class="tdbg tgbg1"></td>
            	<td class="tdbg tdbg1"><table><tr><td><input type="text" id="group_name"  onkeypress="insert_oe(event)"/></td><td><div id="d_group_name"><?php if(isset($err))
							{
								echo "<font color='red'>Duplicate Group...</font>";
							}
							
				?></div>
                </td></tr></table></td>
            	<td class="tdbg tgbg1"><a onClick="javascript:insert();" ><img src="images/success.gif" title="Save"/></a></td>
        		</tr>
                
                
                
                
                
                
                
                
                <?php
			 }
		} ?>
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
				$sql ="select a.group_id,a.group_name from (select group_id,group_name from groups where group_name like '%".$search."%' limit $offset,$rec_limit) a order by group_name ".$_GET['order'] ;
			}
			else
			{
				$sql ="select * from groups where group_name like '%".$search."%' limit $offset,$rec_limit" ;
			}
			$res = mysql_query($sql);
			$cnt=0;
			$total_id = "0";
			//$count++;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$total_id .= ",".$row->group_id;
				$cnt++;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->group_id;?>" id="C1_<?php echo $row->group_id;?>"/></td>
            
            <?php if(isset($_GET['op']) )
					{	
						if($_GET['op']=="update")
						{		  			
							if($_GET['id']==$row->group_id)
							{							
			   ?>
            
            <td class="tdbg1"><table><tr><td><input type="text" class="txtedit" value="<?php echo stripslashes($row->group_name);?>" id="txtgroup" onkeypress="javascript:group_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');"/></td><td><div id="d_group_name"><?php if(isset($err1))
							{
								echo "<font color='red'>Duplicate Group...</font>";
							}							
				?></div></td></tr></table></td>
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <div align="center"><a onClick="javascript:group_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');" ><img src="images/success.gif" title="Save"/></a></div>
            		</td>  
               	</tr>
                </table>
                </td>
             <?php 			}
			  				else
							{?>
            
             <td class="tdbg1"><?php echo stripslashes($row->group_name);?></td>
              
                <td class="tdbg">                      
            	<table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
                    <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="3.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                   <div align="center"><a onClick="javascript:update(<?php echo $row->group_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php } ?>
                   </td>
                </tr>
                </table>
                </td>
               
                <?php }
						}
						else
						{	?>
                        
                       <td class="tdbg1">  <?php echo stripslashes($row->group_name);?></td>
             
                 <td class="tdbg">    
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="3.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	 
               <div align="center"><a onClick="javascript:update(<?php echo $row->group_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>  <?php } ?></td>  </tr>
                </table></td>
                
                <?php
							}
						}	
			  			else
						{
						?>
             <td class="tdbg1"> <?php echo stripslashes($row->group_name);?></td>
             
              
                 <td class="tdbg">    
                 <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
           <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="3.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
               <div align="center"><a onClick="javascript:update(<?php echo $row->group_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php } ?> </td>  </tr>
                </table></td>
               
                 <?php } ?>
        </tr>
        
        
        
        <?php }?>
        
        
        
        
        <tr>
        <td colspan="3">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tablefootright.png" /></th>
                <th class="thbackground1" width="100%" align="left">
                  
                  <input type="hidden" name="total_ids" id="total_ids" size="2" value="<?php echo $total_id;?>"/>
                     <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="3.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php } ?>
                  <input type="button" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })" value="Send SMS" class="regbtn1"class="regbtn"/>
          			<div class="highslide-maincontent" >
                  <table>    				
            		<tr>	
                		<td valign="top"><b>Message:</b></td>
               		 <td><textarea name="sms" cols="35" rows="5" id="sms1"></textarea></td>   
      		
        			</tr>
           			 <tr>
            			<td></td>
                		<td><input type="button" value="Send" onclick="sendsms1()"/> </td>
            		</tr>
        		</table>   
                         </div>
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
    </select>
                </th>
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
        </td> 
        </tr>
        </table>
    </div>
    
</div>