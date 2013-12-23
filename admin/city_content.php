<div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground"  align="left">
                
                  <input type="hidden" name="total_ids" id="total_ids" size="2" value="<?php echo $total_id;?>"/>
                       <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="2.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php }?></th>
           <th class="thbackground" width="100%"> city
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
              			<td><a onclick="desc(<?php echo '1';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a></td>
                        <td><a onclick="asc(<?php echo '1';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a></td>
              			<td>City</td>
                     </td>
                     </tr></table>
                     <td class="tabletitle">
                     
       <table>
           <tr>
                     <td>                       
                <td><a onclick="desc(<?php echo '2';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a></td>
                        <td><a onclick="asc(<?php echo '2';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a></td>
              			<td>State</td>
                 
            </td>
            </tr>
            </table>
            </td>
            <td class="tabletitle">Actions</td>
        </tr>
         <?php
		if(isset($_GET['op']))
		{
		 	if($_GET['op']=='add')
			{ ?>
        
        		<tr>
      			<td class="tdbg1"></td>
            	<td class="tdbg1"><table><tr><td><input type="text" id="city_name" onkeypress="insert_oe(event)"/></td><td><div id="d_city_name"><?php if(isset($err))
							{
								echo "<font color='red'>Duplicate City...</font>";
							}
							
				?></div></td></tr></table></td>
                <td class="tdbg1"><table><tr><td><select name="state" id="state">
              <option value="0">Select State</option>
              
			  <?php 
			  
			  $s = "select * from state_mst";
			  $r1 = mysql_query($s);
			   while($rowstate = mysql_fetch_object($r1))
			   {
			   ?>
			   <option value = "<?php echo $rowstate->state_id?>"><?php echo $rowstate->state_name?></option>
			  <?php
			   }
			   ?>
               </select></td><td><div id="d_state"></div></td></tr></table></td>
            	<td class="tgbg1 tdaction tdbg"><a onClick="javascript:insert();" ><img src="images/success.gif" title="Save"/></a></td>
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
				$sql="select a.city_id,a.city_name,a.state_name,a.state_id from (select c1.city_id,c1.city_name,c1.state_id,s1.state_name from city_mst c1,state_mst s1 where c1.state_id=s1.state_id and c1.city_name like '%".$search."%' limit $offset,$rec_limit) a order by ".$_GET['field']." ".$_GET['order'];
							
			}
			else
			{
				$sql ="select * from city_mst where city_name like '%".$search."%' limit $offset,$rec_limit";
				
			}
			
			$res = mysql_query($sql);
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$res1=mysql_query("select state_name from state_mst where state_id=".$row->state_id);
				$r=mysql_fetch_object($res1);
				$cnt++;
				$total_id .= ",".$row->city_id;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox"  name="C1_<?php echo $row->city_id;?>" id="C1_<?php echo $row->city_id;?>"/></td>
            
            <?php if(isset($_GET['op']) )
					{	
					
						if($_GET['op']=='update')
						{		  			
							if($_GET['id']==$row->city_id)
							{							
			   ?>
              
            
            <td class="tdbg1"><table><tr><td><input type="text" value="<?php echo stripslashes($row->city_name);?>" id="city_name" onkeypress="javascript:city_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>');"/></td><td><div id="d_city_name"><?php if(isset($err1))
							{
								echo "<font color='red'>Duplicate city...</font>";
							}
							
				?></div></td></tr></table></td>
                <td class="tdbg"><table><tr><td><select name="state" id="state" >
              <option value="0">Select state</option>
              <?php 
			  $s = "select * from state_mst";
			  $r1 = mysql_query($s);
			   while($rowstate = mysql_fetch_object($r1))
			   {
			   ?>
			   <option value = "<?php echo $rowstate->state_id?>" <?php if($rowstate->state_id == $row->state_id ) { ?> selected <?php } ?>><?php echo $rowstate->state_name?></option>
			  <?php
			   }
			   ?>
               </select></td><td><div id="d_state"></div></td></tr></table></td>
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <dic align="center"><a onClick="javascript:city_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/success.gif" title="Save"/></a></div>
            		</td>  
               	</tr>
                </table>
                </td>
             <?php 			}
			  				else
							{?>
            <td class="tdbg1"><?php echo stripslashes($row->city_name);?></td>
             <td class="tdbg1"><?php echo stripslashes($r->state_name);?></td>
              
                <td class="tdbg">                      
            	<table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
                    <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="2.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                   <div align="center"><a onClick="javascript:update(<?php echo $row->city_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php }?>
                   </td>
                </tr>
                </table>
                </td>
               
                <?php }
						}
						else
						{	?>
                        
                        <td class="tdbg1"><?php echo stripslashes($row->city_name);?></td>
             <td class="tdbg1"><?php echo stripslashes($r->state_name);?></td>
             
                 <td class="tdbg">    
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="2.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	 
                <div align="center"><a onClick="javascript:update(<?php echo $row->city_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>  <?php } ?></td>  </tr>
                </table></td>
                
                <?php
							}
						}	
			  			else
						{
						?>
             <td class="tdbg1"><?php echo stripslashes($row->city_name);?></td>
             <td class="tdbg1"><?php echo stripslashes($r->state_name);?></td>
             
              
                 <td class="tdbg">    
                 <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
           <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="2.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                <div align="center"><a onClick="javascript:update(<?php echo $row->city_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/edit-icon.png" title="Edit"/></a></div><?php } ?> </td>  </tr>
                </table></td>
                
                 <?php } ?>
        </tr>
        
        
        
        <?php }?>
        
        
        
        
        <tr>
        <td colspan="4">
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
					if($subrights[$i]=="2.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
           <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" align="left" class="regbtn"><?php } ?>
                </th>
                
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
        </td> 
        </tr>
        </table>
    </div>
    
</div>