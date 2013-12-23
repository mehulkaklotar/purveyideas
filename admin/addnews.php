<?php include_once "fckeditor/fckeditor.php"; ?>
<?php
include_once("configure/configure.php");
$flag=0;
$id="0";
if(isset($_REQUEST['id']))
{
	$res=mysql_query("select * from newsletter where news_id='".$_REQUEST['id']."'");
	$row=mysql_fetch_array($res);
	$flag=1;
	$id=$_REQUEST['id'];
}
?>


<form name="frmnews" action="news_operation.php" method="post" onsubmit="return validate();">
<table align="center">

<caption><h3><b><?php if(isset($_REQUEST['id'])){echo "Edit";}else{echo "Add";}?> News</b></h3></caption>
	<tr>
    	<td><b><h4>News Subject :</h4></b></td>
        <td><input type="text" name="txtsub" id="txtsub" value="<?php if(isset($_REQUEST['id'])){ echo $row['news_sub']; } ?>"/><div id="d_txtsub"></div></td>

    </tr>
    <tr>
    	<td valign="top"><b><h4>News Content :</h4></b></td>
        <?php if(isset($_REQUEST['op']))
		{?>
        <td><?php
  				$oFCKeditor = new FCKeditor('content');
			  	$oFCKeditor->BasePath = "fckeditor/";
		 		$oFCKeditor->Value    = $row['news_content'];
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
          <?php }?>
         <tr>
         <td valign="top"><b><h4>Select Groups :</h4></b></td>
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
            	<input type="checkbox" name="C1_<?php echo $r['group_id']?>" id="C1_<?php echo $r['group_id']?>" value="<?php echo $r['group_id'];?>"  /><?php echo $r['group_name'];?>
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
				if(isset($_REQUEST['op']))
				{ ?>
                
                <input type="submit" value="Save" class="regbtn"  >
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"/>
				
				<?php }
				else
				{?>
                
                <input type="submit" value="Save" class="regbtn">
				
				<?php }?></td>
                
                
               <td><input type="button" value="Save & Send" class="regbtn1"  onClick="sendmail(<?php echo $_REQUEST['reclimit']?>,<?php echo $flag; ?>,<?php echo $id; ?>)"></td> 
                <td><input type="button" value="Back" class="regbtn"  onClick="javascript:history.go(0);"></td>
                <input type="hidden" name="op" id="op" value="<?php if(isset($_GET['op'])){echo "edit";}else{echo "insert";}?>"/>
                <input type="hidden" name="aa" value="yes"  />
  	   </tr>
		</table>
        </td>
        </tr>
</table>
    </form>
    