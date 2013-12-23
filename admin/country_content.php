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
                
           <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" align="left" class="regbtn"><?php } ?></th>
           <th class="thbackground" width="100%"> Country
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
              			<td>Country</td>
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
      			<td class="tgbg tdbg1"></td>
            	<td class="tgbg tdbg1"><table><tr><td><input type="text" id="country_name" onkeypress="insert_oe(event)"/></td><td><div id="d_country_name"></div></td><td>                <?php if(isset($err))
							{
								echo "<font color='red'>Duplicate Country...</font>";
							}
							
				?></td></tr></table></td>
            	<td class="tdbg"><a onClick="javascript:insert();" ><img src="images/success.gif" title="Save"/></a></td>
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
				$sql ="select a.country_id,a.country_name from (select country_id,country_name from country_mst where country_name like '%".$search."%' limit $offset,$rec_limit) a order by country_name ".$_GET['order'] ;
			}
			else
			{
				$sql ="select * from country_mst where country_name like '%".$search."%' limit $offset,$rec_limit" ;
			}
			$res = mysql_query($sql);
			$cnt=0;
			$total_id = "0";
			//$count++;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$total_id .= ",".$row->country_id;
				$cnt++;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->country_id;?>" id="C1_<?php echo $row->country_id;?>"/></td>
            
             <?php if(isset($_GET['op']) )
					{	
						if($_GET['op']=="update")
						{		  			
							if($_GET['id']==$row->country_id)
							{							
			   ?>
            
            <td class="tdbg1"><input type="text"  value="<?php echo stripslashes($row->country_name);?>" id="txtcountry" onkeypress="javascript:country_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');"/><div id="d_country_name"><?php if(isset($err1))
							{
								echo "<font color='red'>Duplicate Country...</font>";
							}							
				?></div></td>
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <a onClick="javascript:country_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');" ><img src="images/success.gif" title="Save"/></a></div>
            		</td>  
               	</tr>
                </table>
                </td>
             <?php 			}
			  				else
							{?>
            
             <td class="tdbg1"><?php echo stripslashes($row->country_name);?></td>
              
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
                   <div align="center"><a onClick="javascript:update(<?php echo $row->country_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div><?php } ?>
                   </td>
                </tr>
                </table>
                </td>
                
                <?php }
						}
						else
						{	?>
                        
                       <td class="tdbg1">  <?php echo stripslashes($row->country_name);?></td>
              
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
                <div align="center"><a onClick="javascript:update(<?php echo $row->country_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div> <?php } ?></td>  </tr>
                </table></td>
                 
                <?php
							}
						}	
			  			else
						{
						?>
             <td class="tdbg1">  <?php echo stripslashes($row->country_name);?></td>
             
             
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
                <div align="center"><a onClick="javascript:update(<?php echo $row->country_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div><?php } ?> </td>  </tr>
                </table></td>
                
                 <?php } ?>
        </tr>
        
        
        
        <?php }?>
        
        
        <input type="hidden" name="total_ids" id="total_ids" value="<?php echo $total_id;?>"/>
        
        <tr>
        <td colspan="3">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tablefootright.png" /></th>
                <th class="thbackground1" width="100%" align="left">
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