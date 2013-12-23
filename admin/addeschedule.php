<?php include_once "fckeditor/fckeditor.php"; ?>
<?php
include_once("configure/configure.php");
$flag=0;
$id="0";
if(isset($_REQUEST['id']))
{
	$res=mysql_query("select * from eschedule where email_id='".$_REQUEST['id']."'");
	$row=mysql_fetch_array($res);
	$flag=1;
	$msg=$row['email_msg'];
	$id=$_REQUEST['id'];
	$ids=explode(",",$row['email_group']);
	$schedule=$row['email_schedule'];
	$schedule=explode(" ",$schedule);
	$date=$schedule[0];
	$time=explode(":",$schedule[1]);
	$_REQUEST['op']="edit";
}
else
{
	$_REQUEST['op']="insert";
}
if(isset($_REQUEST['tid']))
{
	$tsql="select email_text from email_template where email_id='".$_REQUEST['tid']."'";
	$tres=mysql_query($tsql);
	$trow=mysql_fetch_array($tres);
	$msg=$trow['email_text'];	
	$schedule=$_REQUEST['schedule'];
	$hour=$_REQUEST['hour'];
	$minute=$_REQUEST['minute'];
	$second=$_REQUEST['second'];
	$ids=explode(",",$_REQUEST['ids']);
	if(isset($_REQUEST['editid']) && $_REQUEST['editid']!="")
	{
		$editid=$_REQUEST['editid'];
		$_REQUEST['op']="edit";
	}	
	else
	{
		$_REQUEST['op']="insert";
	}
}
//echo $_REQUEST['op'];
?>
<form name="frmeschedule" action="eschedule_operation.php" method="post" onsubmit="return validate();">
<table align="center">

<caption><h4><b><?php if(isset($_REQUEST['id'])){echo "Edit";}else{echo "Add";}?> Schedule</b></h4></caption>
	<tr>
    	<td valign="top" class="fontstyle1">Select Template :</td>
        <td>
        <input type="hidden" name="editid" id="editid" value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];}else if(isset($editid)){echo $editid;} ?>" />
        	<select name="sel_temp" id="sel_temp" onchange="template_change();">
            	<option value="0">Select Template</option>
				<?php
					$sql1="select * from email_template";
					$res1=mysql_query($sql1);
					while($row1=mysql_fetch_array($res1))
					{?>                   
						<option value="<?php echo $row1['email_id']; ?>" <?php 
						if(isset($_REQUEST['tid']))
						{
							if($row1['email_id']==$_REQUEST['tid'])
							{
								echo 'selected="selected"';
							}
						} ?>><?php echo $row1['email_title'];?></option>
				<?php }?>
            </select>
        </td>
    </tr> 
 
        <tr>
    	<td valign="top"><b><h3>E-Mail Content :</h3></b></td>        
        <?php if($_REQUEST['op']=="edit" || isset($_REQUEST['tid']))
		{?>
        <td><?php
  				$oFCKeditor = new FCKeditor('content');
			  	$oFCKeditor->BasePath = "fckeditor/";
		 		$oFCKeditor->Value    = $msg;
  				$oFCKeditor->Width    = 800;
  				$oFCKeditor->Height   = 350;
  				echo $oFCKeditor->CreateHtml();
			?>
         </td>
        <?php
		}
		else
		{?>
        <td><?php
  				$oFCKeditor = new FCKeditor('content');
			  	$oFCKeditor->BasePath = "fckeditor/";
		 		$oFCKeditor->Value    = "";
  				$oFCKeditor->Width    = 800;
  				$oFCKeditor->Height   = 350;
  				echo $oFCKeditor->CreateHtml();
			?>
         </td>
         </tr>
          <?php }?><div id="d_txtmsg"></div></td>
    </tr>                   
         <tr>
         <td valign="top" class="fontstyle1">Schedule Date/Time :</td>
         <td><input type="text" value="<?php if(isset($_REQUEST['id'])){ echo $date; }else if(isset($_REQUEST['tid'])){ echo $schedule; }  ?>" name="txtschedule" id="txtschedule"  onfocus="displayCalendar(document.frmeschedule.txtschedule,'yyyy-mm-dd',this)" >
         <select name="hour" id="hour">
         	<option value="HH"  <?php if(isset($_REQUEST['tid'])){if($hour=="HH"){echo 'selected="selected"';}}?>>HH</option>
            <?php 
				$cnt=-1;
				while($cnt<23)
				{
					$cnt++;?>
					<option value="<?php echo $cnt; ?>" <?php if(isset($_REQUEST['id'])){ if($cnt==$time[0]){echo 'selected="selected"';} }else if(isset($_REQUEST['tid']) && $hour!="HH"){if($cnt==$hour){echo 'selected="selected"';}}?> ><?php echo $cnt; ?></option>';
		<?php		}
			?>
         </select> : 
         <select name="minute" id="minute">
         	<option value="MM" <?php if(isset($_REQUEST['tid'])){if($second=="MM"){echo 'selected="selected"';}}?>>MM</option>
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
            	<input type="checkbox" name="groups[]" id="C1_<?php echo $r['group_id']?>" value="<?php echo $r['group_id'];?>" <?php 
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
            	<td><input type="hidden" name="total_ids" id="total_ids" value="<?php echo $total_ids; ?>" />
                 <input type="button" value="Check all" onClick="javascript:checkall();" class="regbtn"></td>
                <td><input type="button" onClick="javascript:checknone();" value="None" class="regbtn"/></td>
                <td>
				<?php 
				if($_REQUEST['op']=="edit")
				{ ?>
                
                <input type="submit" value="Save" class="regbtn"  >
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"/>
				
				<?php }
				else
				{?>
                
                <input type="submit" value="Save" class="regbtn">
				
				<?php }?></td>
                
                
               
                <td><input type="button" value="Back" class="regbtn"  onClick="javascript:history.go(0);"></td>
                <input type="hidden" name="op" id="op" value="<?php echo $_REQUEST['op'];?>"/>
                <input type="hidden" name="aa" value="yes"  />
 	   </tr>
		</table>
        </td>
        </tr>
</table>
    </form>