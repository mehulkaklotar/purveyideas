<?php
include_once("configure/configure.php");
$flag=0;
$id="0";

$err="";
$img_path="";
if(isset($_GET['id']))
{
	$res=mysql_query("select * from gallery where id='".$_GET['id']."'");
	$row=mysql_fetch_array($res);
	$flag=1;
	$pid=$_GET['id'];
	 $name=$row['name'];
	// echo $name;
	 $caption=$row['caption'];
	
}

if(isset($_POST['save']))
{
$caption=$_POST['txtcaption'];

        if(!empty($_FILES["photo"]["name"]))
				{
					
					$fileName = date("YmdHis")."_".$_FILES["photo"]["name"];
					$extension= strtolower(strrchr($fileName,"."));
					
					if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" || $extension == ".bmp" || $extension == ".png")
					{
						if ($_FILES["photo"]["error"] > 0)
						{
							$err=$_FILES["photo"]["error"] . "<br />";
						}
						else
						{
						$sql = "select * from gallery where id=".$_POST['photo_id'];
						
								$res = mysql_query($sql) or die(mysql_error());
								$row = mysql_fetch_object($res);
								if($row->name != "")
								{
									unlink("../uploadfiles/".$row->name);
								}
							
								move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploadfiles/" . $fileName);
								$img_path = $fileName;
								
						}
					}
					else
					{
						$err="Please upload image file...";
						
					}
				}
 
			
	if($err == "")
		{
					$sqlinsert = "update gallery set caption='".addslashes($_POST['txtcaption'])."'";
					
					if($img_path != "")
					{
						$sqlinsert .=" ,name ='".$img_path."'";
					}
					$sqlinsert.=" where id=".$_POST['photo_id'];
					//echo $sqlinsert;					
					mysql_query($sqlinsert) or die(mysql_error());
					
				
				
				
				
				echo "<script>location.href='gallery.php';</script>";
		

        }
 

}		
?>
<form name="frmgallery" method="post" action="editgallery.php" enctype="multipart/form-data" onsubmit="return validate1();">
<table align="center">

<caption><h4><b><?php if(isset($_GET['id'])){echo "Edit";}else{echo "Add";}?> Image</b></h4></caption>
	<tr>
    	<td valign="top" class="fontstyle1">Caption :</td>
        <td><input type="text" value="<?php if(isset($_GET['id'])){echo stripslashes($caption);}?>" name="txtcaption" id="txtcaption"  /></td>
    </tr>           
         
         <tr>
         <td valign="top" class="fontstyle1">Photo :</td>
         <td valign="top"><?php if(isset($_GET['id'])){?> <img src="../uploadfiles/<?php echo $name?>" 
		title="Click to enlarge" height="50" width="50" /><?php } ?>
        <input type="file" name="photo" id="photo"/></td></tr>
         	
         <input type="hidden" value="<?php echo $pid ?>" name="photo_id" id="photo_id" />  
    
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