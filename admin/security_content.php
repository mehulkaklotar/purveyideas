<div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground"  align="left">
                
                  <input type="hidden" id="total_ids" name="total_ids" size="2" value="<?php echo $total_id;?>"/>
                    <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="6.3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	  
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn"><?php } ?></th>
           <th class="thbackground" width="100%"> Users
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
              			<td><a onclick="desc(<?php echo '1' ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a></td>
                        <td><a onclick="asc(<?php echo '1' ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a></td>
              			<td>Login Name</td>
                     
         	</tr>
            </table>
            <td class="tabletitle">
            <table>
           	<tr>
                    <td><a onclick="desc(<?php echo '2' ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/up.png" height="15" width="15" title="Descending" /></a></td>
                        <td><a onclick="asc(<?php echo '2' ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>)"><img src="images/down.png" height="15" width="15" title="Ascending"/></a></td>
              			<td>Email ID</td>
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
                <td class="tdbg1">
                <table>
                <tr>
                <td ></td>
                <td width="149">Username</td>
                <td width="149">Email ID:</td>

                <td width="149">Password</td>  
                
                <td width="149">Confirm Password</td>
                </tr>
                <tr>
                <td width="26"></td>
                <td width="149"><table><tr><td><input type="text" id="security_name"  onkeypress="insert_oe(event)"></td><td><div id="d_security_name"></div></td></tr></table></td>
                <td width="149"><table><tr><td><input type="text" id="txtemail"  onkeypress="insert_oe(event)"></td><td nowrap="nowrap"><div id="d_txtemail"></div></td></tr></table></td>
                <td width="149"><table><tr><td><input type="password" id="password"  onkeypress="insert_oe(event)"></td><td><div id="d_password"></div></td></tr></table></td>  
                <td width="149"><table><tr><td><input type="password" id="con_password"  onkeypress="insert_oe(event)"></td><td nowrap="nowrap"><div id="d_con_password"></div></td></tr></table></td>
                <td class="txt2"><?php if(isset($err))
							{
								echo "Duplicate Username...";
							}
							
				?></td>
                </tr>
                </table>
                </td>
                <td class="tdbg1"></td>
				<td class="tgbg1 tdaction tdbg" ><a onClick="javascript:insert();" ><img src="images/success.gif" title="Save"/></a></td>
                
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
			
			$sql ="select a.user_id,a.username,a.emailid from (select user_id,username,emailid from sysadmin where username!='".$_SESSION['user']."' and username like '%".$search."%' or emailid like '%".$search."%' limit $offset,$rec_limit) a order by ".$_GET['field']." ".$_GET['order'] ;									
			}
			else
			{
				$sql ="select * from sysadmin where username!='".$_SESSION['user']."' and username like '%".$search."%' or emailid like '%".$search."%'  limit $offset,$rec_limit";				 
			}
			
			$res = mysql_query($sql);
			
			$total_id = "0";
			//$count++;
			$cnt=0;
			while($row = mysql_fetch_object($res))
			{
				//$count++;
				$total_id .= ",".$row->user_id;
				$cnt++;
			?>
			<tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row->user_id;?>"  id="C1_<?php echo $row->user_id;?>"/></td>
            
            <?php 
			  
			  if(isset($_GET['op']))
			  {
			  		if($_GET['op']=="update")
					{
			  			if($_GET['id']==$row->user_id)
						{			  	
			  ?>
              
              
              
              
            
            <td class="tdbg1"><table><tr><td><input type="text" class="txtedit" id="security_name" value="<?php echo stripslashes($row->username);?>" onkeypress="javascript:security_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');"/></td><td class="txt2"><div id="d_security_name"><?php if(isset($err)){if($err=="Duplicate Username..."){echo $err;}} ?></div></td></tr></table></td>
            
            <td class="tdbg1"><table><tr><td><input type="text" class="txtedit" id="security_email" value="<?php echo stripslashes($row->emailid);?>" onkeypress="javascript:security_edit_oe(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,event,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');"/></td><td class="txt2"><div id="d_security_email"><?php if(isset($err)){if($err=="Duplicate Email..."){echo $err;}} ?></div></td></tr></table></td>
            <td class="tdbg">
            <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction"><div align="center"><a onClick="javascript:security_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>');"><img src="images/success.gif" title="Save"/></a></div></td>
                    </tr>
                </table>
                </td>
            <?php
			  			}
						else
						{
				?>
                
                <td class="tdbg1"><?php echo stripslashes($row->username);?></td>
              <td class="tdbg1"><?php echo stripslashes($row->emailid);?></td>
             
                
               
              
           
                <td class="tdbg">
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
                     <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="6.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
             <div align="center"><a onClick="javascript:update(<?php echo $row->user_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>
               <?php }?>		</td>  
               	</tr>
                </table>
                </td>
             
                
             <?php 	}
			   		}
					else
					{?>
           <td class="tdbg1"><?php echo stripslashes($row->username);?></td>
              <td class="tdbg1"><?php echo stripslashes($row->emailid);?></td>
              
              
             
                <td class="tdbg">                      
            	<table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
                     <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="6.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                   <div align="center"><a onClick="javascript:update(<?php echo $row->user_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>
                       <?php }?>
                   </td>
                </tr>
                </table>
                </td>
             
					<?php }
				}
			   else
			   {?>
                        
                       <td class="tdbg1"><?php echo stripslashes($row->username);?></td>
              <td class="tdbg1"><?php echo stripslashes($row->emailid);?></td>
              
              
                 <td class="tdbg">    
                <table align="center" cellpadding="5" cellspacing="5">
                <tr>
                	<td class="tdaction">
            <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="6.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
                <div align="center"><a onClick="javascript:update(<?php echo $row->user_id;?>,<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>,'<?php if(isset($_GET['order'])){echo $_GET['order'];}else{ echo "0";} ?>')"><img src="images/edit-icon.png" title="Edit"/></a></div>      <?php }?></td>  </tr>
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
                
                  <input type="hidden" id="total_ids" name="total_ids" size="2" value="<?php echo $total_id;?>"/>
                     <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="6.3")
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