<?php
include_once("configure/configure.php");
$flag=0;
$id="0";
if(isset($_REQUEST['id']))
{
	$res=mysql_query("select * from sms_template where sms_id='".$_REQUEST['id']."'");
	$row=mysql_fetch_array($res);
	$flag=1;
	$id=$_REQUEST['id'];
	$text=$row['sms_text'];
	$title=$row['sms_title'];
}
?>
<form name="frmsmsschedule">
<table align="center">

<caption><h4><b><?php if(isset($_REQUEST['id'])){echo "Edit";}else{echo "Add";}?> Sms Template</b></h4></caption>
	<tr>
    	<td valign="top" class="fontstyle1">Title :</td>
        <td><input type="text" name="txttitle" id="txttitle" value="<?php if(isset($_REQUEST['id'])){ echo $title; } ?>"/><div id="d_txtmsg"></div></td>
    </tr>      
	<tr>
    	<td valign="top" class="fontstyle1">Text :</td>
        <td><textarea name="txttext" id="txttext" rows="8" cols="100"><?php if(isset($_REQUEST['id'])){ echo $text; } ?></textarea><div id="d_txtmsg"></div></td>
    </tr>           
         <tr>
    	<td colspan="2" align="center">
        <table>
        	<tr>
            	
                <td>
				<?php 
				if(isset($_REQUEST['op']))
				{ ?>
                
                <input type="button" value="Save" class="regbtn" onClick="javascript:smstemp_edit(<?php echo $_REQUEST['id']; ?>,<?php echo $_REQUEST['page'];?>,<?php echo $_REQUEST['page_no_start'];?>,<?php echo $_REQUEST['flag'];?>,<?php echo $_REQUEST['lastpage'];?>,<?php echo $_REQUEST['lpr'];?>,<?php echo $_REQUEST['reclimit'];?>)" >
				
				<?php }
				else
				{?>
                
                <input type="button" value="Save" class="regbtn" onClick="insert(<?php echo $_REQUEST['reclimit']; ?>)" >
				
				<?php }?></td>                                               
                <td><input type="button" value="Back" class="regbtn"  onClick="javascript:history.go(0);"></td>
 	   </tr>
		</table>
        </td>
        </tr>
</table>
    </form>