<?php
include("configure/configure.php");
include("configure/sessioncheck.php");?>

<?php

		
$c_id="";
$sql="select * from contact_mst";

if($_REQUEST['op']=='edit')
{

$sqlupdate="update contact_mst set f_name='".addslashes($_GET['f_name'])."',l_name='".addslashes($_GET['l_name'])."',gender='".$_GET['gender']."',dob='".$_GET['dob']."',p_add1='".addslashes($_GET['addr1'])."',p_add2='".addslashes($_GET['addr2'])."',p_city='$_GET[city]',p_state='$_GET[state]',p_country='$_GET[country]',p_pincode='$_GET[pincode]',phone1='".$_GET['phone1']."',phone2='".$_GET['phone2']."',mobile1='".$_GET['mobile1']."',mobile2='".$_GET['mobile2']."',fax='".$_GET['fax']."',email1='".$_GET['email1']."',email2='".$_GET['email2']."',email3='".$_GET['email3']."',website='".addslashes($_GET['website'])."',org_name='".addslashes($_GET['orgname'])."',o_add1='".addslashes($_GET['oaddr1'])."',o_add2='".addslashes($_GET['oaddr2'])."',o_city='$_GET[ocity]',o_state='$_GET[ostate]',o_country='$_GET[ocountry]',o_pincode='$_GET[opincode]',category='".$_GET['category']."',source='".$_GET['source']."',remarks='".addslashes($_GET['remark'])."',subscribe='".$_GET['subscribe']."',group_id='".$_GET['grp']."' where contact_id=".$_GET['id'];


mysql_query($sqlupdate);
}
if($_REQUEST['op']=='delete')
{
	$id_delete=$_GET['id_delete'];
	$id_del=substr($id_delete,1);
	$id_delete=explode(",",$id_delete);  
 	if($id_delete!="")
	{	
	  		//echo $id_delete[$i]." ";
	    	$sql_delete="delete from contact_mst where contact_id in(".$id_del.") ";
			//echo $sql_delete;
			mysql_query($sql_delete) ;	  	
	}
	if($_GET['lastpage']==$_GET['page'])
	{		
		//echo count($id_delete);
		//echo "     ".$_GET['lpr'];
		if(count($id_delete)==$_GET['lpr'])
		{
			$del_last="true";
			//echo $del_last;
			//echo $_GET['page'];
		}
	}
}
		if(isset($_GET['reclimit']))
		{
			$rec_limit=$_GET['reclimit'];
		}
		else
		{
			$rec_limit=10;
		}
		
		if(isset($_GET['page']))
		{			
			if(isset($del_last))
			{
				//echo $del_last;
				if($del_last=="true" && $_GET['page']!=-1)
				{
					$page=$_GET['page']-1;					
				}
				else
				{
					$page=$_GET['page'];
				}
			}
			else
			{
				$page=$_GET['page'];
			}
			$page+=1;
			$offset=$rec_limit*$page;
		}
		else
		{
			$page=0;
			$offset=0;
		}

if($_GET['op']=='search')
{
	$where=" where 1=1 ";
	if(isset($_REQUEST['country']) && $_REQUEST['country']!="")	
	{
		$where.=" and o_country=".$_REQUEST['country'];
	}
	if(isset($_REQUEST['state']) && $_REQUEST['state']!="")	
	{
		$where.=" and o_state=".$_REQUEST['state'];
	}
	if(isset($_REQUEST['city']) && $_REQUEST['city']!="")	
	{
		$where.=" and o_city=".$_REQUEST['city'];
	}
	if(isset($_REQUEST['group']) && $_REQUEST['group']!="")	
	{
		$where.=" and group_id=".$_REQUEST['group'];
	}
	if(isset($_REQUEST['source']) && $_REQUEST['source']!="")	
	{
		$where.=" and source like '%".$_REQUEST['source']."%'";
	}
	if(isset($_REQUEST['category']) && $_REQUEST['category']!="")	
	{
		$where.=" and category like '%".$_REQUEST['category']."%'";
	}
	
	
			
		$query1="select contact_id,f_name,l_name,gender,dob,p_add1,p_add2,p_city,p_state,p_country,p_pincode,org_name,o_add1,o_add2,o_city,o_state,o_country,o_pincode,source,phone1,phone2,mobile1,mobile2,fax,email1,email2,email3,website,category,remarks,subscribe from contact_mst $where";
		
		$sql="select a.contact_id,a.f_name,a.l_name,a.gender,a.dob,a.p_add1,a.p_add2,a.p_city,a.p_state,a.p_country,a.p_pincode,a.org_name,a.o_add1,a.o_add2,a.o_city,a.o_state,a.o_country,a.o_pincode,a.source,a.phone1,a.phone2,a.mobile1,a.mobile2,a.fax,a.email1,a.email2,a.email3,a.website,a.category,a.remarks,a.subscribe from (select contact_id,f_name,l_name,gender,dob,p_add1,p_add2,p_city,p_state,p_country,p_pincode,org_name,o_add1,o_add2,o_city,o_state,o_country,o_pincode,source,phone1,phone2,mobile1,mobile2,fax,email1,email2,email3,website,category,remarks,subscribe from contact_mst $where limit $offset,$rec_limit) a";		
	
}
echo "<br>";

?>
    
<?php
			
		//$query="select count(contact_id) from contact_mst where f_name like '%".$search."%'";
		
		if($_GET['op']=="search")
		{
			//echo $query1;
			$r=mysql_query($query1);
		}
		else
		{
			$r=mysql_query($sql);
		}
		$total_id="0";
		
		while($a=mysql_fetch_array($r))
		{
			$total_id=",".$a[0];
		}
		$rec_count=mysql_num_rows($r);
		//echo $rec_count;
		$left_rec=$rec_count-$offset;
		//echo $rec_count;
		$last_page_rec=$rec_count%$rec_limit;
		//echo $last_page_rec;
		//echo "    ".$last_page_rec;
		if($last_page_rec===0)
		{
			$last_page_rec=$rec_limit;
		}
		//echo "    ".$last_page_rec;
			
		if($rec_count%$rec_limit==0)
		{
			$lastpage=floor($rec_count/$rec_limit)-2;	
		}
		else
		{
			$lastpage=floor($rec_count/$rec_limit)-1;	
		}
		$ft=1;
		$lt=2;
		$nt=3;
		$pr=4;	
		//echo $lastpage." ";
		//echo $page;
		$flag="";
		if(isset($_GET['flag']))
		{
			$flag=$_GET['flag'];
		}
		if(isset($_GET['page_no_start']))
		{
			$page_no_start=$_GET['page_no_start'];
			if($flag==1)
			{
				$page_no_start=1;			
			}
			else if(($page)%4==0 && $flag==3)
			{			
				$page_no_start+=4;			
			}			
			else if($page%4==3 && $flag==4)
			{
				$page_no_start-=4;			
			}
			if($flag==2)
			{
				if(($page+1)%4==0)
				{
					$page_no_start=(floor(($page)/4))*4+1;
				}
				else
				{
					$page_no_start=(floor(($page+1)/4))*4+1;
				}
			}
			if(isset($del_last))
			{
				//echo $del_last;
				if($del_last=="true")
				{
					if($page%4==3)
					{
						$page_no_start-=4;			
						$del_last="false";
					}
				}
			}			
		}
		else if(isset($_GET['pns']))
		{
			if($page%4==0)
			{
				$a1=$page/4;
				$page_no_start=($a1*4)+1;
			}
			else
			{
				$a1=$page/4;
				$page_no_start=($a1*4)+1-($page%4);
				//$page_no_start=$_GET['pns'];
			}			
		}
		else
		{
			$page_no_start=1;
		}
		
	        if($rec_count>0)
			{		
			?>
        

        <div id="navigation">
        	<ul>
 <?php           	
 		if($left_rec<=$rec_limit && $rec_count>$rec_limit)
		{
			$last=$page-2;
			echo "<li><a onclick='page(-1,$page_no_start,$ft,$rec_limit)'><img src='images/btnfirst.png' border='0' title='First'/></a>";
			echo "<li><a onclick='page($last,$page_no_start,$pr,$rec_limit)'><img src='images/btnprev.png' border='0' title='Previous'/></a>";
			for($i=0;$i<4;$i++)
			{
				if($page_no_start+$i<$lastpage+3)
				{
					echo "<li>";					
					if($page_no_start+$i-1==$page)
					{
						echo "<a onclick='page($page_no_start+$i-2,$page_no_start,0,$rec_limit)' class='paging'>[";
						echo $page_no_start+$i;
					echo "]</a>";
					}
					else
					{
						echo "<a onclick='page($page_no_start+$i-2,$page_no_start,0,$rec_limit)'>";
						echo $page_no_start+$i;
					echo "</a>";
					}					
					
					echo "</li>";
				}
			}			
		}
		else if($page==0 && $rec_count>$rec_limit)
		{		
			
			for($i=0;$i<4;$i++)
			{
				if($page_no_start+$i<$lastpage+3)
				{
					echo "<li>";
					if($page_no_start+$i-1==$page)
					{
						echo "<a onclick='page($page_no_start+$i-2,$page_no_start,0,$rec_limit)' class='paging'>[";
						echo $page_no_start+$i;
					echo "]</a>";
					}
					else
					{
						echo "<a onclick='page($page_no_start+$i-2,$page_no_start,0,$rec_limit)'>";
						echo $page_no_start+$i;
					echo "</a>";
					}								
					
					echo "</li>";
				}
			}
			echo "<li><a onclick='page($page,$page_no_start,$nt,$rec_limit)'><img src='images/btnnext.png' border='0' title='Next'/></a>";
			echo "<li><a onclick='page($lastpage,$page_no_start,$lt,$rec_limit)'><img src='images/btnlast.png' border='0' title='Last'/></a>";			
		}
		else if($page>0 && $left_rec>0)
		{
			$last=$page-2;
			echo "<li><a onclick='page(-1,$page_no_start,$ft,$rec_limit)'><img src='images/btnfirst.png' border='0' title='First'/></a>";
			echo "<li><a onclick='page($last,$page_no_start,$pr,$rec_limit)'><img src='images/btnprev.png' border='0' title='Previous'/></a>";
			for($i=0;$i<4;$i++)
			{
				if($page_no_start+$i<$lastpage+3)
				{
					echo "<li>";

					if($page_no_start+$i-1==$page)
					{
						echo "<a onclick='page($page_no_start+$i-2,$page_no_start,0,$rec_limit)' class='paging'>[";
						echo $page_no_start+$i;
					echo "]</a>";
					}
					else
					{
						echo "<a onclick='page($page_no_start+$i-2,$page_no_start,0,$rec_limit)'>";
						echo $page_no_start+$i;
					echo "</a>";
					}			
					
					echo "</li>";
				}
			}						
			echo "<li><a onclick='page($page,$page_no_start,$nt,$rec_limit)'><img src='images/btnnext.png' border='0' title='Next'/></a>";
			echo "<li><a onclick='page($lastpage,$page_no_start,$lt,$rec_limit)'><img src='images/btnlast.png' border='0' title='Last'/></a>";			
		}
?>    
		<li class="floatright">
                	<input type="hidden"  value="<?php echo $page_no_start; ?>" id="pns"/>
        			<select onChange="offsetchange();" id="sel_offset" class="combostyle">
                    	<?php 
							$cnt=$rec_count;
							$start="0";
							$p=-1;
							while($cnt>0)
							{?>
								<option value="<?php echo $p;?>" <?php if($page-1==$p){echo "selected";} ?>><?php echo $start+1;?>-<?php echo $start+$rec_limit;?></option>
							<?php	
								$cnt-=$rec_limit;
								$start+=$rec_limit;
								$p++;
							}
						 ?>                    
			        </select>
                </li>

            </ul>
        </div>
        <div id="blankcolor">
   		</div>
        
        
        
        
        <form name="frmcontact" >
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
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php } ?></td>
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
		
			
			if(isset($_GET['order']))
			{
				$sql.=" order by ".$_GET['field']." ".$_GET['order'];
			}
			if(!isset($query1))
			{
				$sql.=" limit $offset,$rec_limit";
			}			
			 //echo $sql;
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
            
           
            
            <td class="tdbg1"><a href="preview.php?id=<?php echo $row->contact_id;?>"  class="link txt2" target="_blank"><?php echo $row->f_name;?>&nbsp;<?php echo $row->l_name;?></a></td>
            
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
                  <input type="button" onClick="javascript:mdelete(<?php echo $page-1; ?>,<?php echo $page_no_start; ?>,0,<?php echo $lastpage; ?>,<?php echo $last_page_rec; ?>,<?php echo $rec_limit; ?>);" value="Delete" class="regbtn" class="regbtn"><?php } ?></td>
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
</form>
      <?php 
	  
	  }
	  else
	  {?>
	  		<center><h3>No Records Found</h3></center>        
	<?php  }
	  ?>