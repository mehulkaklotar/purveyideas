<?php include_once "fckeditor/fckeditor.php"; ?>
<?php
include_once("configure/configure.php");
$flag=0;
$id="0";
if(isset($_REQUEST['id']))
{
	$res=mysql_query("select * from email_template where email_id='".$_REQUEST['id']."'");
	$row=mysql_fetch_array($res);
	$flag=1;
	$id=$_REQUEST['id'];
}
?>
<form name="frmemailtemp" action="emailtemp_operation.php" method="post" onsubmit="return validate();">
<table align="center">

<caption><h4><b><?php if(isset($_REQUEST['id'])){echo "Edit";}else{echo "Add";}?> E-Mail Template</b></h4></caption>
	<tr>
    	<td><b><h3>Title :</h3></b></td>
        <td><input type="text" name="txttitle" id="txttitle" value="<?php if(isset($_REQUEST['id'])){ echo $row['email_title']; } ?>"/><div id="d_txtsub"></div></td>

    </tr>
    <tr>
    	<td valign="top"><b><h3>Text :</h3></b></td>
        <?php if(isset($_REQUEST['op']))
		{?>
        <td><?php
  				$oFCKeditor = new FCKeditor('content');
			  	$oFCKeditor->BasePath = "fckeditor/";
		 		$oFCKeditor->Value    = $row['email_text'];
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
    <td></td>
    	<td>
        <table>
        	<tr>            	
				<?php 
				if(isset($_REQUEST['op']))
				{ ?>
                
                <td><input type="submit" value="Save" class="regbtn"  ></td>
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"/>
				
				<?php }
				else
				{?>
                
                <td><input type="submit" value="Save" class="regbtn"></td>
				
				<?php }?></td>
                                               
                <td><input type="button" value="Back" class="regbtn"  onClick="javascript:history.go(0);"></td>
                <input type="hidden" name="op" id="op" value="<?php if(isset($_GET['op'])){echo "edit";}else{echo "insert";}?>"/>
                <input type="hidden" name="aa" value="yes"  />
  	   </tr>
		</table>
        </td>
        </tr>
</table>
    </form>
    