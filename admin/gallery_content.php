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
					if($subrights[$i]=="13.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	   
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php } ?></th>
           <th class="thbackground" width="100%"> Gallery
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
        <tr>
        <td class="tabletitle"><input type="checkbox" name="check" id="check"  onclick="checkall_none();"/></td>
           
              			<td class="tabletitle1" align="left"><a onClick="desc(<?php echo '1';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onClick="asc(<?php echo '1';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Title</td>
       
                                            
                <td class="tabletitle1" align="left"><a onClick="desc(<?php echo '2';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onClick="asc(<?php echo '2';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Image</td>
                 
         		
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
				$sql ="select a.id,a.caption,a.name from (select id,caption,name from gallery where caption like '%".$search."%' limit $offset,$rec_limit) a order by ".$_GET['field']." ".$_GET['order'];
			}
			else
			{
				$sql ="select * from gallery where caption like '%".$search."%' limit $offset,$rec_limit";
				
			}
			$res = mysql_query($sql);
			
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;				
				$total_id .= ",".$row->id;
				$cnt++;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->id;?>"  id="C1_<?php echo $row->id;?>" /></td>
            <td class="tdbg1"><?php echo stripslashes($row->caption);?></td>
            <td class="tdbg1" height="50"><img src="../uploadfiles/<?php echo stripslashes($row->name); ?>" height="50" width="50"></td>
            
           
            
          
                <td class="tdbg1">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
                     <?php
				$flag=0; 
			include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="13.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
           <div align="center"><a onClick="javascript:update(<?php echo $row->id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/edit-icon.png" title="Edit"/></a></div>
            <?php } ?>
            		</td>  
               	</tr>
                </table>
                </td>
           
            </tr>
            <?php
}
?>
        
        
        
        <tr>
        <td colspan="5">
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
					if($subrights[$i]=="13.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	 
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php } ?>
                </th>
                
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
        </td> 
        </tr>
        </table>
    </div>
    
</div>