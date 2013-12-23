<?php
		
		include_once("configure/configure.php");
		
		$search="";
		if(isset($_GET['search']))
		{
			$search=$_GET['search'];
		}
		$query="select count(country_id) from country_mst where country_name like '%".$search."%'";
		
		
		$r=mysql_query($query);
		$a=mysql_fetch_array($r);
		$rec_count=$a[0];
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
		//echo $page;
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
						echo '<a onclick="page($page_no_start+$i-2,$page_no_start,0,$rec_limit)" class="paging">[';
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
						echo '<a onclick="page($page_no_start+$i-2,$page_no_start,0,$rec_limit)" class="paging">[';
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
						echo '<a onclick="page($page_no_start+$i-2,$page_no_start,0,$rec_limit)" class="paging">[';
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
				$sql1 ="select a.country_id,a.country_name from (select country_id,country_name from country_mst where country_name like '%".$search."%' limit $offset,$rec_limit) a order by country_name ".$_GET['order'] ;
			}
			else
			{
				$sql1="select * from country_mst where country_name like '%".$search."%' limit $offset,$rec_limit" ;
			}
		$result1=mysql_query($sql1);
		$total_id="0";
		while($row1=mysql_fetch_array($result1))
		{
			$total_id.=",".$row1['country_id'];
		}
			if(mysql_num_rows($result1)>0)
			{	
		?>
        
				<li class="floatright">
                	<input type="hidden"  value="<?php echo $page_no_start; ?>" id="pns"/>
        			<select onchange="offsetchange();" id="sel_offset">
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
       
		
		
<?php include("country_content.php"); ?>
		
        <?php
        }
		else
		{?>
        
         
        <?php
		if(isset($_GET['op']))
		{
		 	if($_GET['op']=='add')
			{ ?>
            
      			<tr>
      			<td class="tgbg tdbg1"></td>
            	<td class="tgbg tdbg1"><table><tr><td><input type="text" id="country_name" onkeypress="insert_oe(event)"/></td><td><div id="d_country_name"></div></td><td>
                <?php if(isset($err))
							{
								echo "<font color='red'>Duplicate Country...</font>";
							}
							
				?></td></tr></table></td>
            	<td class="tdbg"><a onClick="javascript:insert();" ><img src="images/success.gif" title="Save"/></a></td>
        		</tr>
        		
          <?php }
		 
		 else
		 {?>
		 <center><h3>No Records Found...	</h3></center>
		 <?php }
		 }
		 else
		 {?>
		 <center><h3>No Records Found...	</h3></center>
		 <?php }
		  ?>
	<?php }
		?>
        
   