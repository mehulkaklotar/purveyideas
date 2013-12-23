    <div id="searchbar">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground12" width="100%">Search:
                <input type="text" size="25" id="txtsearch" name="txtsearch" value="" onKeyUp="javascript:tsearch()"  />
                <input type="button"  value="Show All" class="regbtn1" size="40" onclick="javascript:showall();"/> 
                Display:
                    <select onchange="recperpage()" id="sel_limit">
                    <?php 
						$sql="select * from setting";
						$res=mysql_query($sql);
						$row1=mysql_fetch_array($res);
						$a=$row1[0];
						$a=explode(",",$a);
						$_GET['reclimit']=$a[0];
						for($i=0;$i<count($a);$i++)
						{
						?>
                   <option value="<?php echo $a[$i];?>"><?php echo $a[$i];?></option>
        <?php } ?> 
                    </select>
                    
                    Records per page
                     <?php
		$flag=0; 
		include("rights.php");
		for($i=0;$i<count($subrights);$i++)
		{
			if($subrights[$i]=="14.1")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{		?>
                <div class="floatright"><a onclick="javascript:addrecord();"><img src="images/addnew.png"  class="noborder"/></a></div>
   <?php } ?>
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
       </table>
    </div>
    <div id="content">
	<?php include_once("pagingsmstemp.php");?>
    </div>