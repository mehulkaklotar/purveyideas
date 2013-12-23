<?php
include_once("configure/configure.php");
$flag=0;
$id="0";

$err="";
$img_path="";
if(isset($_POST['save']))
{
$caption=$_POST['txtcaption'];

         //echo $_FILES["photo"]["error"];
			if(!empty($_FILES["photo"]["name"]))
				{
					
					$fileName = date("YmdHis")."_".$_FILES["photo"]["name"];
					//echo  $fileName;
					$extension= strtolower(strrchr($fileName,"."));
					
					if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" || $extension == ".bmp" || $extension == ".png")
					{
						if ($_FILES["photo"]["error"] > 0)
						{
							$err=$_FILES["photo"]["error"] . "<br />";
						}
						else
						{		
								
								move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploadfiles/" . $fileName);
								$img_path=$fileName;
								
						}
					}
					else
					{
						$err="Please upload image file...";
						
					}
				}
				
				if($err == "")
		{
					$sqlinsert = "insert into gallery  values(NULL,'".addslashes($caption)."','$img_path')";
					echo $sqlinsert;
					
					mysql_query($sqlinsert) or die(mysql_error());
					
						echo "<script>location.href='gallery.php';</script>";
		}
}		
?>
<form name="frmgallery" method="post" action="addgallery.php" enctype="multipart/form-data" onsubmit="return validate();">
<table align="center">

<caption><h2><b><?php if(isset($_GET['id'])){echo "Edit";}else{echo "Add";}?> Image</b></h2></caption>
	<tr>
    	<td valign="top" class="fontstyle1">Caption :</td>
        <td><input type="text" value="<?php if(isset($_GET['id'])){echo $caption;}?>" name="txtcaption" id="txtcaption"  /></td>
    </tr>           
         
         <tr>
         <td valign="top" class="fontstyle1">Photo :</td>
         <td valign="top"><?php if(isset($_GET['id'])){?> <img src="../uploadfiles/<?php echo $r['photo']?>" 
		title="Click to enlarge" height="50" width="50" /><?php } ?>
        <input type="file" name="photo" id="photo"/></td></tr>
         	
            
    
    <tr>
    <td></td>
    	<td>
        <table>
        	<tr>
                            <td>
				
                
                <input type="submit" value="Save" name="save" class="regbtn" >
				
				</td>                                               
                <td><input type="button" value="Back" class="regbtn"  onClick="javascript:history.go(0);"></td>
 	   </tr>
		</table>
        </td>
        </tr>
</table>
    </form>