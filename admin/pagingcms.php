<?php
		
		include_once("configure/configure.php");
		
		$search="";
		if(isset($_REQUEST['search']))
		{
			$search=$_REQUEST['search'];
		}
		$query="select count(cms_id) from cms where cms_title like '%".$search."%'";
		
		
		$r=mysql_query($query);
		$a=mysql_fetch_array($r);
		$rec_count=$a[0];
		if(isset($_REQUEST['reclimit']))
		{
			$rec_limit=$_REQUEST['reclimit'];
		}
		else
		{
			$rec_limit=10;
		}
		
		if(isset($_REQUEST['page']))
		{			
			if(isset($del_last))
			{
				//echo $del_last;
				if($del_last=="true" && $_REQUEST['page']!=-1)
				{
					$page=$_REQUEST['page']-1;					
				}
				else
				{
					$page=$_REQUEST['page'];
				}
			}
			else
			{
				$page=$_REQUEST['page'];
			}
			$page+=1;
			$offset=$rec_limit*$page;
		}
		else
		{
			$page=0;
			$offset=0;
		}
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
		if(isset($_REQUEST['flag']))
		{
			$flag=$_REQUEST['flag'];
		}
		if(isset($_REQUEST['page_no_start']))
		{
			$page_no_start=$_REQUEST['page_no_start'];
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
		else if(isset($_REQUEST['pns']))
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
				//$page_no_start=$_REQUEST['pns'];
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
				$sql1 ="select a.cms_id,a.cms_title,a.cms_short_desc,a.cms_desc from (select cms_id,cms_title,cms_short_desc,cms_desc from cms where cms_title like '%".$search."%' limit $offset,$rec_limit) a order by ".$_REQUEST['field']." ".$_REQUEST['order'];
			}
			else
			{
				$sql1 ="select * from cms where cms_title like '%".$search."%' limit $offset,$rec_limit";
				
			}
			$result1 = mysql_query($sql1);
		$total_id="0";
		while($row1=mysql_fetch_array($result1))
		{
			$total_id.=",".$row1['cms_id'];
		}
				
				if(mysql_num_rows($result1)>0)
				{
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

       
        <?php include("cms_content.php"); ?>
		
        
        <?php
        }
		else
		{?>
			<center><h3>No Records Found...	</h3></center>
	<?php }
		?>