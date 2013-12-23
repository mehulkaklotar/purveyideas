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
           <th class="thbackground" width="100%"> category
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
              			<td>Category</td>
                     </td>
                     </tr></table>
                     <td class="tabletitle">
                     
       <table>
           <tr><td>
                     <td>Parent Category</td>
                 
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
            	<td class="tdbg1"><table><tr><td><input type="text" id="category_name" onkeypress="insert_oe(event)"/></td><td><div id="d_category_name"><?php if(isset($err))
							{
								echo "<font color='red'>Duplicate Category...</font>";
							}
							
							
				?></div></td></tr></table></td>
                <td class="tdbg1"><select name="parent" id="parent">
              <option value="0">Select Category</option>
              <?php 
			  $s = "select * from category_mst";
			  $r1 = mysql_query($s);
			   while($rowcategory = mysql_fetch_object($r1))
			   {
			   ?>
			   <option value = "<?php echo $rowcategory->category_id?>"><?php echo $rowcategory->category_name?></option>
			  <?php
			   }
			   ?>
               </select></td>
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
				$sql ="select a.category_id,a.category_name,a.parent_id from (select category_id,category_name,parent_id from category_mst where category_name like '%".$search."%' limit $offset,$rec_limit) a order by category_name ".$_GET['order'] ;				
			}
			else
			{
				$sql ="select * from category_mst where category_name like '%".$search."%'  limit $offset,$rec_limit";
				
			}
			
			$res = mysql_query($sql);
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$res1=mysql_query("select * from category_mst where category_id=".$row->parent_id);
				if(mysql_num_rows($res1)==0)
				{
					$f=1;
				}
				else
				{
					$f=0;
					$r=mysql_fetch_object($res1);
				}
				$total_id .= ",".$row->category_id;
				$cnt++;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->category_id;?>" id="C1_<?php echo $row->category_id;?>" /></td>
            
            <?php if(isset($_GET['op']) )
					{	
					
						if($_GET['op']=='update')
						{		  			
							if($_GET['id']==$row->category_id)
							{							
			   ?>
              
            
            <td class="tdbg1"><table><tr><td><input type="text" value="<?php echo stripslashes($row->category_name);?>" id="category_name" onkeypress="javascript:category_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>');"/></td><td><div id="d_category_name"><?php if(isset($err1))
							{
								echo "<font color='red'>Duplicate category...</font>";
							}
							
				?></div></td></tr></table></td>
                <td class="tdbg"><select name="parent" id="parent">
              <option>Select Category</option>
              <?php 
			  $s = "select * from category_mst";
			  $r1 = mysql_query($s);
			   while($rowcategory = mysql_fetch_object($r1))
			   {
			   ?>
			   <option value = "<?php echo $rowcategory->category_id?>" <?php if($rowcategory->category_id == $row->parent_id ) { ?> selected <?php } ?>><?php echo $rowcategory->category_name?></option>
			  <?php
			   }
			   ?>
               </select></td>
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <dic align="center"><a onClick="javascript:category_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/success.gif" title="Save"/></a></div>
            		</td>  
               	</tr>
                </table>
                </td>
             <?php 			}
			  				else
							{?>
            <td class="tdbg1"><?php echo stripslashes($row->category_name);?></td>
             <td class="tdbg1"><?php if($f==0){echo stripslashes($r->category_name);}else{echo "---";} ?></td>
             
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
                   <div align="center"><a onClick="javascript:update(<?php echo $row->category_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php } ?>
                   </td>
                </tr>
                </table>
                </td>
               
                <?php }
						}
						else
						{	?>
                        
                        <td class="tdbg1"><?php echo stripslashes($row->category_name);?></td>
             <td class="tdbg1"><?php if($f==0){echo stripslashes($r->category_name);}else{echo "---";} ?></td>
              
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
                <div align="center"><a onClick="javascript:update(<?php echo $row->category_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php } ?></td>  </tr>
                </table></td>
                 
                <?php
							}
						}	
			  			else
						{
						?>
             <td class="tdbg1"><?php echo stripslashes($row->category_name);?></td>
             <td class="tdbg1"><?php if($f==0){echo stripslashes($r->category_name);}else{echo "---";} ?></td>
             
             
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
                <div align="center"><a onClick="javascript:update(<?php echo $row->category_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>','<?php if(isset($_GET['field'])){echo $_GET['field'];}else{echo "0";}?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>  <?php } ?> </td>  </tr>
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