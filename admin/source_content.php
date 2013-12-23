<div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground"  align="left">
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
                
           <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" align="left"><?php } ?></th>
           <th class="thbackground" width="100%"> Source
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
              			<td>Source</td>
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
            	<td class="tdbg tdbg1"><table><tr><td><input type="text" id="source_name"  onkeypress="insert_oe(event)"></td><td><div id="d_source_name"><?php if(isset($err))
							{
								echo "<font color='red'>Duplicate Source...</font>";
							}
							
				?></div></td></tr></table>
                </td>
            	<td class="tdbg tgbg1"><a onClick="javascript:insert()"><img src="images/success.gif"/></a></td>
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
				$sql ="select a.source_id,a.source_name from (select source_id,source_name from source_mst where source_name like '%".$search."%' limit $offset,$rec_limit) a order by source_name ".$_GET['order'] ;	
			}
			else
			{
				$sql ="select * from source_mst where source_name like '%".$search."%'  limit $offset,$rec_limit";
				
			}
			
			$res = mysql_query($sql);
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$cnt++;
				$total_id.= ",".$row->source_id;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->source_id;?>" id="C1_<?php echo $row->source_id;?>" /></td>
            
            <?php
			  	if(isset($_GET['op']))
				{
					if($_GET['op']=="update")
					{
						if($_GET['id']==$row->source_id)
						{
						
		       ?>	
            
            <td class="tdbg1"><table><tr><td><input type="text"  class="txtedit" id="source_name" value="<?php echo stripslashes($row->source_name);?>"  onkeypress="javascript:source_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');"/></td><td><div id="d_source_name"><?php if(isset($err1))
							{
								echo "<font color='red'>Duplicate Source...</font>";
							}
							
				?></div></td></tr></table></td>
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <div align="center"><a onClick="javascript:source_edit(<?php echo $row->source_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/success.gif" title="save"/></a></div>
            		</td>  
               	</tr>
                </table>
                </td>
             <?php 			}
			  				else
							{?>
            
             <td class="tdbg1"><?php echo stripslashes($row->source_name);?></td>
              
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
                   <div align="center"><a onClick="javascript:update(<?php echo $row->source_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php }?>
                   </td>
                </tr>
                </table>
                </td>
               
                <?php }
						}
						else
						{	?>
                        
             <td class="tdbg1"><?php echo stripslashes($row->source_name);?></td>
              
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
                <div align="center"><a onClick="javascript:update(<?php echo $row->source_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php } ?>
                </td>  </tr>
                </table></td>
                 
                <?php
							}
						}	
			  			else
						{
						?>
             <td class="tdbg1">  <?php echo stripslashes($row->source_name);?></td>
             
              
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
                <div align="center"><a onClick="javascript:update(<?php echo $row->source_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>  <?php } ?> </td>  </tr>
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
					if($subrights[$i]=="2.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn"><?php } ?>
                </th>
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
        </td> 
        </tr>
        </table>
    </div>
    
</div>