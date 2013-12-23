<?php
include_once("configure/configure.php");
$flag=0;
$id="0";
$editid="";
if(isset($_REQUEST['id']))
{
	$res=mysql_query("select * from schedule where sms_id='".$_REQUEST['id']."'");
	$row=mysql_fetch_array($res);
	$flag=1;
	$id=$_REQUEST['id'];
	$ids=explode(",",$row['sms_group']);
	$mask=$row['sms_mask'];
	$schedule=$row['sms_schedule'];
	$schedule=explode(" ",$schedule);
	$date=$schedule[0];
	$time=explode(":",$schedule[1]);
}
if(isset($_REQUEST['tid']))
{
	$mask=$_REQUEST['mask'];
	$schedule=$_REQUEST['schedule'];
	$hour=$_REQUEST['hour'];
	$minute=$_REQUEST['minute'];
	$second=$_REQUEST['second'];
	$ids=explode(",",$_REQUEST['ids']);
	if(isset($_REQUEST['editid']) && $_REQUEST['editid']!="")
	{
		$editid=$_REQUEST['editid'];
		$_REQUEST['op']="update";
	}	
}
?>
<form name="frmschedule">
<table align="center">

<caption><h4><b><?php if(isset($_REQUEST['id'])){echo "Edit";}else{echo "Add";}?> Schedule</b></h4></caption>
	<tr>
    	<td valign="top" class="fontstyle1">Select Template :</td>
        <td>
        <input type="hidden" name="editid" id="editid" value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];}else{echo $editid;} ?>" />
        	<select name="sel_temp" id="sel_temp" onchange="template_change();">
            	<option value="0">Select Template</option>
				<?php
					$sql1="select * from sms_template";
					$res1=mysql_query($sql1);
					while($row1=mysql_fetch_array($res1))
					{?>
						<option value="<?php echo $row1['sms_id']; ?>" <?php 
						if(isset($_REQUEST['tid']))
						{
							if($row1['sms_id']==$_REQUEST['tid'])
							{
								echo 'selected="selected"';
							}
						} ?>><?php echo $row1['sms_title'];?></option>
				<?php }?>
            </select>
        </td>
    </tr> 
	<tr>
    	<td valign="top" class="fontstyle1">Message :</td>
        <td><textarea name="txtmsg" id="txtmsg" rows="8" cols="100"><?php 
			if(isset($_REQUEST['tid']))
			{
				$tsql="select sms_text from sms_template where sms_id='".$_REQUEST['tid']."'";
				$tres=mysql_query($tsql);
				$trow=mysql_fetch_array($tres);
				echo $trow['sms_text'];
			}
			else if(isset($_REQUEST['id']))
			{ echo $row['sms_msg']; } 
		?></textarea><div id="d_txtmsg"></div></td>
    </tr>           
         <tr>
         <tr>
         	<td valign="top" class="fontstyle1">Select Mask :</td>
            <td><select id="sel_mask">
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
        			<option value="<?php echo $a[$i];?>" <?php if(isset($_REQUEST['id'])){if($a[$i]==$mask){echo 'selected="selected"';}}else if(isset($_REQUEST['tid'])){if($a[$i]==$mask){echo 'selected="selected"';}}?>><?php echo $a[$i];?></option>
        			<?php } ?> 
    			</select><div id="d_sel_mask"></div></td>
         </tr>
         <tr>
         <td valign="top" class="fontstyle1">Schedule Date/Time :</td>
         <td><input type="text" value="<?php if(isset($_REQUEST['id'])){ echo $date; }else if(isset($_REQUEST['tid'])){ echo $schedule; } ?>" name="txtschedule" id="txtschedule"  onfocus="displayCalendar(document.frmschedule.txtschedule,'yyyy-mm-dd',this)" >
         <select name="hour" id="hour">
         	<option value="HH" <?php if(isset($_REQUEST['tid'])){if($hour=="HH"){echo 'selected="selected"';}}?>>HH</option>
            <?php 
				$cnt=-1;
				while($cnt<23)
				{
					$cnt++;?>
					<option value="<?php echo $cnt; ?>" <?php if(isset($_REQUEST['id'])){ if($cnt==$time[0]){echo 'selected="selected"';} }else if(isset($_REQUEST['tid']) && $hour!="HH"){if($cnt==$hour){echo 'selected="selected"';}}?>><?php echo $cnt; ?></option>';
		<?php		}
			?>
         </select> : 
         <select name="minute" id="minute">
         	<option value="MM" <?php if(isset($_REQUEST['tid'])){if($minute=="MM"){echo 'selected="selected"';}}?>>MM</option>
            <?php 
				$cnt=-1;
				while($cnt<59)
				{
					$cnt++;?>
					<option value="<?php echo $cnt; ?>" <?php if(isset($_REQUEST['id'])){if($cnt==$time[1]){echo 'selected="selected"';} }else if(isset($_REQUEST['tid']) && $minute!="MM"){if($cnt==$minute){echo 'selected="selected"';}}?>><?php echo $cnt; ?></option>';
			<?php	}
			?>
         </select> : 
          <select name="second" id="second">
         	<option value="SS" <?php if(isset($_REQUEST['tid'])){if($second=="SS"){echo 'selected="selected"';}}?>>SS</option>
            <?php 
				$cnt=-1;
				while($cnt<59)
				{
					$cnt++;?>
					<option value="<?php echo $cnt; ?>" <?php if(isset($_REQUEST['id'])){ if($cnt==$time[2]){echo 'selected="selected"';} }else if(isset($_REQUEST['tid']) && $second!="SS"){if($cnt==$second){echo 'selected="selected"';}}?>><?php echo $cnt; ?></option>';
			<?php	}
			?>
         </select>
         </td>
         </tr>
         <td valign="top" class="fontstyle1">Select Groups :</td>
         <td><table cellspacing="10" width="100%"><tr>
         	<?php
				$sql="select * from groups";
				$res=mysql_query($sql);
				$cnt=0;
				$total_ids="0";
				while($r=mysql_fetch_array($res))
				{ 
				$cnt++;
				$total_ids.=",".$r['group_id'];
			?>
            
            <td>
            	<input type="checkbox" name="C1_<?php echo $r['group_id']?>" id="C1_<?php echo $r['group_id']?>" value="<?php echo $r['group_id'];?>" <?php 
				if(isset($_REQUEST['id']))
				{
					for($i=0;$i<count($ids);$i++)
					{
						if($r['group_id']==$ids[$i])
						{
							echo 'checked="checked"';
						}
					}
					}
				if(isset($_REQUEST['tid']))
				{
					for($i=0;$i<count($ids);$i++)
					{
						if($r['group_id']==$ids[$i])
						{
							echo 'checked="checked"';
						}
					}
					}
				 ?> /><?php echo $r['group_name'];?>
                </td>
               <?php if($cnt%6==0)
			   {
			   		echo "</tr><tr>";
			   }?>
                
            <?php } ?>
         </tr></table></td>       
    </tr>
    
    <tr>
    <td></td>
    	<td>
        <table>
        	<tr>
            	<td><input type="hidden" id="total_ids" name="total_ids" value="<?php echo $total_ids; ?>" />
                 <input type="button" value="Check all" onClick="javascript:checkall();" class="regbtn"></td>
                <td><input type="button" onClick="javascript:checknone();" value="None" class="regbtn"/></td>
                <td>
				<?php 
				if(isset($_REQUEST['op']) && $_REQUEST['op']=="update")
				{ ?>
                
                <input type="button" value="Save" class="regbtn" onClick="javascript:schedule_edit(<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];}else{echo $editid;} ?>)" >
				
				<?php }
				else
				{?>
                
                <input type="button" value="Save" class="regbtn" onClick="insert()" >
				
				<?php }?></td>                                               
                <td><input type="button" value="Back" class="regbtn"  onClick="javascript:history.go(0);"></td>
 	   </tr>
		</table>
        </td>
        </tr>
</table>
    </form>