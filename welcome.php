<?php
include("configure/configure.php");
include("configure/sessioncheck.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" href="highslide.css"/>
<script type="text/javascript" src="highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="mouseovertabs.css" />

<script src="mouseovertabs.js" type="text/javascript">

/***********************************************
* Mouseover Tabs Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script type="text/javascript">
	hs.graphicsDir = './graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
<script type="text/javascript">
function checkall_none()
{
	total_ids=document.getElementById("total_ids").value;
	total_ids=total_ids.split(",");
	var objname;

	for(i=0;i<=total_ids.length-1;i++)
	{
		if(document.getElementById("check").checked==true)
		{
			objname="document.getElementById('C1_" + total_ids[i] + "').checked=true";
			if(objname != "document.getElementById('C1_0').checked=true")
			{
				eval(objname); //is used to execute dynamic javascript code
			}
		}
		else
		{			
			objname="document.getElementById('C1_" + total_ids[i] + "').checked=false";
			if(objname != "document.getElementById('C1_0').checked=false")
			{	
				eval(objname); //is used to execute dynamic javascript code
			}
		}
	}
}

function sendsms()
{
var xmlhttp;
   if(window.XMLHttpRequest)
   {
    xmlhttp = new XMLHttpRequest();
   }
   else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function()
   {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	 document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
   }
	 var md=document.getElementById("total_ids").value;
	md=md.split(",");
	
   var id="";
   for(var i=1;i<=md.length-1;i++)
   {
     if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  {		
	   id  += "," + md[i] ;
	  }
    }
	id=id.substring(1,id.length);
	var message=document.getElementById("sms").value;
	
	//alert(id_delete);
		var mask=document.getElementById("sel_mask").value;
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
	if(message=="")
	{
		alert("Please write Message");
		return;
	}
	if(id == "")
	{
	  alert("Please select atleast one record!");
	  return;
	}
	var url="sendsms.php?id="+id+"&message="+message+"&mask="+mask;
	//alert(url);
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

function checkall_none1()
{
	total_ids1=document.getElementById("total_ids1").value;
	total_ids1=total_ids1.split(",");
	var objname;

	for(i=0;i<=total_ids1.length-1;i++)
	{
		if(document.getElementById("check1").checked==true)
		{
			objname="document.getElementById('C2_" + total_ids1[i] + "').checked=true";
			if(objname != "document.getElementById('C2_0').checked=true")
			{
				eval(objname); //is used to execute dynamic javascript code
			}
		}
		else
		{			
			objname="document.getElementById('C2_" + total_ids1[i] + "').checked=false";
			if(objname != "document.getElementById('C2_0').checked=false")
			{	
				eval(objname); //is used to execute dynamic javascript code
			}
		}
	}
}


function sendsms1()
{
var xmlhttp;
   if(window.XMLHttpRequest)
   {
    xmlhttp = new XMLHttpRequest();
   }
   else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function()
   {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	 document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
   }
	 var md=document.getElementById("total_ids1").value;
	md=md.split(",");
	
   var id="";
   for(var i=1;i<=md.length-1;i++)
   {
     if(eval("document.getElementById('C2_"+md[i]+"').checked==true"))
	  {		
	   id  += "," + md[i] ;
	  }
    }
	id=id.substring(1,id.length);
	var message=document.getElementById("sms1").value;
	
	//alert(id_delete);
		var mask=document.getElementById("sel_mask1").value;
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
	if(message=="")
	{
		alert("Please write Message");
		return;
	}
	if(id == "")
	{
	  alert("Please select atleast one record!");
	  return;
	}
	var url="sendsms.php?id="+id+"&message="+message+"&mask="+mask;
	//alert(url);
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}


function sendsingle(id)
{
var xmlhttp;
   if(window.XMLHttpRequest)
   {
    xmlhttp = new XMLHttpRequest();
   }
   else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function()
   {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	 document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
   }
  	var msg="msg"+id;
	var message=document.getElementById(msg).value;
	var mask=document.getElementById("sel_mask").value;
	//alert(msg);
	//alert(id_delete);
	
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
	
	if(message=="")
	{
		alert("Please write Message");
		return;
	}
	if(id == "")
	{
	  alert("Please select atleast one record!");
	  return;
	}
	var url="sendsms.php?id="+id+"&message="+message+"&mask="+mask;
	//alert(url);
	//alert(url);
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}


function sendsingle1(id)
{
var xmlhttp;
   if(window.XMLHttpRequest)
   {
    xmlhttp = new XMLHttpRequest();
   }
   else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function()
   {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	 document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
   }
  	var msg="msg1"+id;
	var message=document.getElementById(msg).value;
	var mask=document.getElementById("sel_mask1").value;
	//alert(msg);
	//alert(id_delete);
	
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
	
	if(message=="")
	{
		alert("Please write Message");
		return;
	}
	if(id == "")
	{
	  alert("Please select atleast one record!");
	  return;
	}
	var url="sendsms.php?id="+id+"&message="+message+"&mask="+mask;
	//alert(url);
	//alert(url);
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}


</script>

</head>

<body>

<?php include("header.php");?>
<?php include("menu.php");?>
<!--<div id="menu">
<ul>

	<li class="menuitemactive"><a href="welcome.php">Home</a></li>			
    <li class="menuitem"><a href="masters.php">Master</a></li>
    <li class="menuitem"><a href="">Groups</a></li>
    <li class="menuitem"><a href="">Contacts</a></li>
    <li class="menuitem"><a href="">Reports</a></li>
    <li class="menuitem"><a href="">Newsletter</a></li>
    <li class="menuitem"><a href="">Gallery</a></li>
    <li class="menuitem"><a href="">More</a></li>
</ul>
</div>
<div id="submenu">

</div>-->



<div id="content">
    
    <div id="dashboard">
    	
        <div id="imglink">
       	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="7">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground" width="100%">Dashboard</th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
        </td>            
        </tr>
        <tr>
                
            	<td class="tdbg2"><a href="security.php"><img src="images/usermanagement.png" /></a></td>
                <td class="tdbg2"><a href="gallery.php"><img src="images/manage-photo-gallery.png" /></a></td>
                <td class="tdbg2"><a href="smstemp.php"><img src="images/changetemplate.png" /></a></td>
<!--                <td class="tdbg2"><a href=""><img src="images/homenstatepage.png" /></a></td>-->
                <td class="tdbg2"><a href="security.php"><img src="images/websecurity.png" /></a></td>
                <td class="tdbg2"><a href="select.php?type=category"><img src="images/printpage.png" /></a></td>
                <td class="tdbg2"><a href="settings.php"><img src="images/favsettings.png" /></a></td>
                <td class="tdbg2"><a href="searchcombo.php"><img src="images/search_icon.jpg" /></a></td>
         </tr>
           
          </table>
        </div>
    </div>
    
    
   <?php $d=date("Y-m-d");
$d=substr($d,strpos($d,"-"));
$sql="select * from contact_mst where dob like '%".$d."'";
//echo $sql;
$res=mysql_query($sql);
if(mysql_num_rows($res)>0)
{
?> 
    <div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="6">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th align="left"  class="thbackground">
        	 <input type="button" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })" value="Send SMS" />
          			<div class="highslide-maincontent" >
                  <table>
    				
            		<tr>	
                		<td valign="top"><b>Message:</b></td>
               		 <td><textarea name="sms" cols="35" rows="5" id="sms"></textarea></td>   
      		
        			</tr>
           			 <tr>
            			<td></td>
                		<td><input type="button" value="Send" onclick="sendsms()" /> </td>
            		</tr>
        		</table>
        </div>
        </th>
        <th align="left"  class="thbackground">
        <select id="sel_mask">
        <option value="0">Select Mask</option>
    	<?php 
		$s="select * from setting";
		$r=mysql_query($s);
		$row1=mysql_fetch_array($r);
		$a=$row1[2];
		$a=explode(",",$a);		
		for($i=0;$i<count($a);$i++)
		{
		?>
        	<option value="<?php echo $a[$i];?>"><?php echo $a[$i];?></option>
        <?php } ?> 
    </select></th>
                <th class="thbackground" width="100%">Birthday Reminders</th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
        <tr>
        	<td class="tabletitle"><input type="checkbox" name="check" id="check"  onclick="checkall_none();"/></td>
            <td class="tabletitle">Name</td>
            <td class="tabletitle">Date Of Birth</td>
            <td class="tabletitle">Mobile No.</td>
            <td class="tabletitle">Email ID</td>
            <td class="tabletitle">Action</td>
        </tr>
        <?php

$cnt=0;
$total_ids="0";
while($row=mysql_fetch_array($res))
{
$cnt++;
$total_ids.=",".$row['contact_id'];
?>

        <tr>
        	<td class="tdbg"><input type="checkbox" name="C1_<?php echo $row['contact_id'];?>" id="C1_<?php echo $row['contact_id'];?>" /></td>
            <td class="tdbg1"><?php echo $row['f_name'];?></td>
            <td class="tdbg"><?php echo $row['dob'];?></td>
            <td class="tdbg"><?php echo $row['mobile1'];?></td>
            <td class="tdbg"><?php echo $row['email1'];?></td>
            <td class="tdbg"><a href="" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })"><img src="images/sms.png" /></a>
            <div class="highslide-maincontent" >
         <table>
    		<tr>
                <td valign="top"><b>To:</b></td>
                <td><?php echo $row['f_name']." ".$row['l_name'] ?></td>
            </tr>
            <tr>	
                <td valign="top"><b>Message:</b></td>
                <td><textarea name="sms" cols="35" rows="5" id="msg<?php echo $row['contact_id']; ?>"></textarea></td>   
      		
        	</tr>
            <tr>
            	<td></td>
                <td><input type="button" value="Send" onclick="sendsingle('<?php echo $row['contact_id']; ?>')" /> </td>
            </tr>
        </table>
        </div>  
            
            </td>
        </tr>
        
        <?php }?>
<input type="hidden" name="total_ids" id="total_ids" value="<?php echo $total_ids; ?>" />
        <tr>
        <td colspan="6">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tablefootright.png" /></th>
                <th class="thbackground1" width="100%" align="left">
                
               
                </th>
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
           
            
        </td> 
        </tr>
        </table>
        </div>
         <?php
}
else
{
?>
<br />
<center><h3><b>No Birthdays Today..!!!</b></h3></center>
<?php } ?>

<?php $d=date("Y-m-d");
$d=substr($d,strpos($d,"-"));

$sql="select * from contact_mst where anniversary like '%".$d."'";
//echo $sql;
$res=mysql_query($sql);
if(mysql_num_rows($res)>0)
{
?>
<div id="table">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="6">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
               <th align="left" class="thbackground">
        	 <input type="button" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })" value="Send SMS" class="regbtn"/>
          			<div class="highslide-maincontent" >
                  <table>
    				
            		<tr>	
                		<td valign="top"><b>Message:</b></td>
               		 <td><textarea name="sms" cols="35" rows="5" id="sms1"></textarea></td>   
      		
        			</tr>
           			 <tr>
            			<td></td>
                		<td><input type="button" value="Send" onclick="sendsms1()" /> </td>
            		</tr>
        		</table>
        </div>
        </th>
        <th align="left" class="thbackground">
        <select id="sel_mask1">
        <option value="0">Select Mask</option>
    	<?php 
		$s="select * from setting";
		$r=mysql_query($s);
		$row1=mysql_fetch_array($r);
		$a=$row1[2];
		$a=explode(",",$a);		
		for($i=0;$i<count($a);$i++)
		{
		?>
        	<option value="<?php echo $a[$i];?>"><?php echo $a[$i];?></option>
        <?php } ?> 
    </select></th>
                <th class="thbackground" width="100%">Anniversary Reminders </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
        <tr>
        	<td class="tabletitle"><input type="checkbox" name="check1" id="check1"  onclick="checkall_none1();"/></td>
            <td class="tabletitle">Name</td>
            <td class="tabletitle">Anniversary Date</td>
            <td class="tabletitle">Mobile No.</td>
            <td class="tabletitle">Email ID</td>
            <td class="tabletitle">Action</td>
        </tr>
        <?php

$cnt=0;
$total_ids1="0";
while($row=mysql_fetch_array($res))
{
$cnt++;
$total_ids1.=",".$row['contact_id'];
?>

        <tr>
        	<td class="tdbg"><input type="checkbox" name="C2_<?php echo $row['contact_id'];?>" id="C2_<?php echo $row['contact_id'];?>" /></td>
            <td class="tdbg1"><?php echo $row['f_name'];?></td>
            <td class="tdbg"><?php echo $row['anniversary'];?></td>
            <td class="tdbg"><?php echo $row['mobile1'];?></td>
            <td class="tdbg"><?php echo $row['email1'];?></td>
            <td class="tdbg"><a href="" onClick="return hs.htmlExpand(this, { headingText: 'Send SMS' })"><img src="images/sms.png" /></a>
            <div class="highslide-maincontent" >
         <table>
    		<tr>
                <td valign="top"><b>To:</b></td>
                <td><?php echo $row['f_name']." ".$row['l_name'] ?></td>
            </tr>
            <tr>	
                <td valign="top"><b>Message:</b></td>
                <td><textarea name="sms" cols="35" rows="5" id="msg<?php echo $row['contact_id']; ?>"></textarea></td>   
      		
        	</tr>
            <tr>
            	<td></td>
                <td><input type="button" value="Send" onclick="sendsingle('<?php echo $row['contact_id']; ?>')" /> </td>
            </tr>
        </table>
        </div>  
            
            </td>
        </tr>
        
        <?php }?>
<input type="hidden" name="total_ids1" id="total_ids1" value="<?php echo $total_ids1; ?>" />
        <tr>
        <td colspan="6">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tablefootright.png" /></th>
                <th class="thbackground1" width="100%" align="left">
                
               
                </th>
                <th><img src="images/tablefootleft.png" /></th>
            </tr>
            </table>
           
            
        </td> 
        </tr>
        </table>
        
         <?php
}
else
{
?>

<center><h3><b>No Anniversaries Today..!!!</b></h3></center>
<br />
<?php } ?>

    </div>    
</div>




</body>
<?php include("footer.php");?>
</html>
