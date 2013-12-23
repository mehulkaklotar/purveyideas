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
					if($subrights[$i]=="12.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php } ?></th>
           <th class="thbackground" width="100%">E-MAIL Scheduler
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
              			Message</td>
       
                                            
                <td class="tabletitle1" align="left"><a onClick="desc(<?php echo '3';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onClick="asc(<?php echo '3';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Schedule</td>
                 
         		<td class="tabletitle1" align="left"><a onClick="desc(<?php echo '4';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a>
                        <a onClick="asc(<?php echo '4';?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a>
              			Group</td>
            <td class="tabletitle">Actions</td>
        </tr>
        
            <?php
			if(isset($_REQUEST['search']))
			{
				$search=$_REQUEST['search'];
			}
			else
			{
				$search="";
			}
			
			if(isset($_REQUEST['order']))
			{
				$sql ="select a.email_id,a.email_msg,a.email_schedule,a.email_group from (select email_id,email_msg,email_schedule,email_group from eschedule where email_msg like '%".$search."%' or email_group like '%".$search."%' or email_schedule like '%".$search."%' limit $offset,$rec_limit) a order by ".$_REQUEST['field']." ".$_REQUEST['order'];
			}
			else
			{
				$sql ="select * from eschedule where email_msg like '%".$search."%' or email_group like '%".$search."%' or email_schedule like '%".$search."%' limit $offset,$rec_limit";
				
			}
			//echo $sql;
			$res = mysql_query($sql);
			
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;				
				$total_id .= ",".$row->email_id;
				$cnt++;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->email_id;?>"  id="C1_<?php echo $row->email_id;?>" /></td>
            <td class="tdbg1"><?php echo stripslashes($row->email_msg);?></td>
            <td class="tdbg1"><?php echo stripslashes($row->email_schedule); ?></td>
            <td class="tdbg1"><?php 
			  		$b=$row->email_group;
					 $cat=explode(",",$b);
					 $cat=array_slice($cat,0,count($cat));
					 //print_r($cat);					 
					 $cat_name="";
					 for($i=0;$i<count($cat);$i++)
					 {
						$sql1=mysql_query("select group_name from groups where group_id='".$cat[$i]."'");
						$row1=mysql_fetch_array($sql1);
						$cat_name.=$row1['group_name'].",";	
					 }
					$value=substr($cat_name,0,strlen($cat_name)-1);
					//$cat_name.="0";
					//echo $value;
			  
			  
			  
			  
			   echo stripslashes($value);?></td>
          
          
                <td class="tdbg1">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
                     <?php
				$flag=0; 
			include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="12.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
            
            <div align="center"><a onClick="javascript:update(<?php echo $row->email_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/edit-icon.png" title="Edit"/></a></div>  <?php } ?>
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
					if($subrights[$i]=="12.3")
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