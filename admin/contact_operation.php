<?php
include("configure/configure.php");

$sql="select * from contact_mst";
if(isset($_GET['search']))
{
$search = $_GET['search'];
}
else
{
$search="";
}
if($_REQUEST['op']=='insert')
{
	$flag=0;
	$result1=mysql_query($sql);
	while($r3=mysql_fetch_object($result1))
	{
		if($_GET['email1']==$r3->email1)
		{	
			$flag=1;
		}
	}
	if($flag==0)
	{
		$sqlinsert="insert into contact_mst set f_name='".addslashes($_GET['f_name'])."',l_name='".addslashes($_GET['l_name'])."',gender='".$_GET['gender']."',dob='".$_GET['dob']."',anniversary='".$_GET['ads']."',p_add1='".addslashes($_GET['addr1'])."',p_add2='".addslashes($_GET['addr2'])."',p_city='$_GET[city]',p_state='$_GET[state]',p_country='$_GET[country]',p_pincode='$_GET[pincode]',phone1='".$_GET['phone1']."',phone2='".$_GET['phone2']."',mobile1='".$_GET['mobile1']."',mobile2='".$_GET['mobile2']."',fax='".$_GET['fax']."',email1='".$_GET['email1']."',email2='".$_GET['email2']."',email3='".$_GET['email3']."',website='".addslashes($_GET['website'])."',org_name='".addslashes($_GET['orgname'])."',o_add1='".addslashes($_GET['oaddr1'])."',o_add2='".addslashes($_GET['oaddr2'])."',o_city='$_GET[ocity]',o_state='$_GET[ostate]',o_country='$_GET[ocountry]',o_pincode='$_GET[opincode]',category='".$_GET['category']."',source='".$_GET['source']."',remarks='".addslashes($_GET['remark'])."',subscribe='".$_GET['subscribe']."',group_id='".$_GET['grp']."'";

		mysql_query($sqlinsert) or die(mysql_error());
	}
	else
	{
		include("contact_add.php");
		exit();
	}
}

if($_REQUEST['op']=='edit')
{
	$flag=0;
	$sql1="select * from contact_mst where contact_id!='".$_GET['id']."'";
	$result1=mysql_query($sql1);
	while($r3=mysql_fetch_object($result1))
	{
		if($_GET['email1']==$r3->email1)
		{	
			$flag=1;
		}
	}
	if($flag==0)
	{

$sqlupdate="update contact_mst set f_name='".addslashes($_GET['f_name'])."',l_name='".addslashes($_GET['l_name'])."',gender='".$_GET['gender']."',dob='".$_GET['dob']."',anniversary='".$_GET['ads']."',p_add1='".addslashes($_GET['addr1'])."',p_add2='".addslashes($_GET['addr2'])."',p_city='$_GET[city]',p_state='$_GET[state]',p_country='$_GET[country]',p_pincode='$_GET[pincode]',phone1='".$_GET['phone1']."',phone2='".$_GET['phone2']."',mobile1='".$_GET['mobile1']."',mobile2='".$_GET['mobile2']."',fax='".$_GET['fax']."',email1='".$_GET['email1']."',email2='".$_GET['email2']."',email3='".$_GET['email3']."',website='".addslashes($_GET['website'])."',org_name='".addslashes($_GET['orgname'])."',o_add1='".addslashes($_GET['oaddr1'])."',o_add2='".addslashes($_GET['oaddr2'])."',o_city='$_GET[ocity]',o_state='$_GET[ostate]',o_country='$_GET[ocountry]',o_pincode='$_GET[opincode]',category='".$_GET['category']."',source='".$_GET['source']."',remarks='".addslashes($_GET['remark'])."',subscribe='".$_GET['subscribe']."',group_id='".$_GET['grp']."' where contact_id=".$_GET['id'];

mysql_query($sqlupdate);
	}
	else
	{
		include("contact_edit.php");
		exit();
	}
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_GET['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{		 
	    $sql_delete="delete from contact_mst where contact_id in(".$id_del.")";
		mysql_query($sql_delete);
	}
	if($_GET['lastpage']==$_GET['page'])
	{		
		//echo count($id_delete);
		//echo $_GET['lpr'];
		if(count($id_delete)-1==$_GET['lpr'])
		{
			$del_last="true";
			//echo $_GET['page'];
		}
	}
}

if($_REQUEST['op']=='search')
{
$sql=  "select contact_id,f_name,l_name,gender,dob,p_add1,p_add2,p_city,p_state,p_country,p_pincode,org_name,o_add1,o_add2,o_city,o_state,o_country,o_pincode,source,phone1,phone2,mobile1,mobile2,fax,email1,email2,email3,website,category,remarks,subscribe from contact_mst where f_name like '%".$search."%' or l_name like '%".$search."%' or gender like '%".$search."%' or dob like '%".$search."%' or anniversary like '%".$search."%' or p_pincode like '%".$search."%' or org_name like '%".$search."%' or p_add1 like '%".$search."%' or p_add2 like '%".$search."%' or o_add1 like '%".$search."%' or o_add2 like '%".$search."%' or o_pincode like '%".$search."%' or phone1 like '%".$search."%' or phone2 like '%".$search."%' or mobile1 like '%".$search."%' or mobile2 like '%".$search."%' or fax like '%".$search."%' or email1 like '%".$search."%'  or email2 like '%".$search."%' or email3 like '%".$search."%' or website like '%".$search."%' or remarks like '%".$search."%'";
}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from contact_mst";
					
		}
?>

<div class="blankcolor"></div>
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
			if($subrights[$i]=="4.1")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{			
	?>
    <a  onclick="print1()" class="fontstyle">Print</a>
                <div class="floatright"><a onclick="javascript:addrecord();"><img src="images/addnew.png"  class="noborder"/></a></div>
   <?php }?>
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
       </table>
    </div>
<div class="blankcolor"></div>  
<div id="content">
<?php include_once("pagingcontact.php"); ?> 
</div>

