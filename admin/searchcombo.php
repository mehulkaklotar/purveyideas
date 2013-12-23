<?php
include("configure/configure.php");
include("configure/sessioncheck.php");
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="5")
	{
		$flag=1;
	}					
}
if($flag!=1)
{
	echo '<script>history.go(-1);</script>';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" media="screen" /><script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="highslide.css"/>
<script type="text/javascript" src="highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="mouseovertabs.css" />
<script type="text/javascript">
	hs.graphicsDir = './graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
<link rel="stylesheet" type="text/css" href="tabcontent.css" />


<script type="text/javascript" src="tabcontent.js"></script>
<script src="mouseovertabs.js" type="text/javascript">

/***********************************************
* Mouseover Tabs Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
</head>

<body>
<?php include("header.php");?>
<?php include("menu.php");?>
<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<?php	
				
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="5")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
<div >
<ul>

</ul>
</div>
<?php	$flag=0;
				}
?>

</div>

<div id="maincontent">
<form name="frmsearch">
    <div id="searchbar">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground12" width="100%">Search By:
                <select name="sel_country" id="sel_country" onChange="tsearch()">
        	<option value="">Country</option>
            <?php
				$cosql="select * from country_mst"; 
				$cores=mysql_query($cosql);
				while($corow=mysql_fetch_array($cores))
				{?>
					<option value="<?php echo $corow['country_id']; ?>"	><?php echo $corow['country_name']; ?></option>
			<?php	}
			?>
        </select>
        <select name="sel_state" id="sel_state"  onChange="tsearch()">
        	<option value="">State</option>
            <?php
				$stsql="select * from state_mst"; 
				$stres=mysql_query($stsql);
				while($strow=mysql_fetch_array($stres))
				{?>
					<option value="<?php echo $strow['state_id']; ?>"	><?php echo $strow['state_name']; ?></option>
			<?php	}
			?>
        </select>
        <select name="sel_city"  id="sel_city" onChange="tsearch()">
        	<option value="">City</option>
            <?php
				$cisql="select * from city_mst"; 
				$cires=mysql_query($cisql);
				while($cirow=mysql_fetch_array($cires))
				{?>
					<option value="<?php echo $cirow['city_id']; ?>"	><?php echo $cirow['city_name']; ?></option>
			<?php	}
			?>
        </select>
        <select name="sel_category" id="sel_category"  onChange="tsearch()">
                        <option value="">Category</option>
                        <?php
                            $casql="select * from category_mst"; 
                            $cares=mysql_query($casql);
                            while($carow=mysql_fetch_array($cares))
                            {?>
                                <option value="<?php echo $carow['category_id']; ?>"	><?php echo $carow['category_name']; ?></option>
                        <?php	}
                        ?>
                    </select>
                <select name="sel_source" id="sel_source"  onChange="tsearch()">
                        <option value="">Source</option>
                        <?php
                            $sosql="select * from source_mst"; 
                            $sores=mysql_query($sosql);
                            while($sorow=mysql_fetch_array($sores))
                            {?>
                                <option value="<?php echo $sorow['source_id']; ?>"	><?php echo $sorow['source_name']; ?></option>
                        <?php	}
                        ?>
                    </select>
                <select name="sel_group" id="sel_group"  onChange="tsearch()">
                        <option value="">Group</option>
                        <?php
                            $gsql="select * from groups"; 
                            $gres=mysql_query($gsql);
                            while($grow=mysql_fetch_array($gres))
                            {?>
                                <option value="<?php echo $grow['group_id']; ?>"	><?php echo $grow['group_name']; ?></option>
                        <?php	}
                        ?>
                    </select> 
                    <input type="button"  value="Show All" class="regbtn1" size="40" onclick="javascript:showall();"/> 
                    Display:
                     <select onchange="recperpage()" id="sel_limit" class="combostyle">
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
                    </select>(rpp)
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
       </table>
        </div>
</form> 
    <div id="content">
	
    </div>
    
<div id="blank"></div>

<?php include("footer.php");?>
</body>
<script type="text/javascript" src="validation.js"></script>
<script language="javascript">


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
	 document.getElementById("maincontent").innerHTML = xmlhttp.responseText;
	}
   }
	 var md=document.getElementById("total_ids").value;
	md=md.split(",");
	
   var id="";
   for(var i=1;i<=md.length-2;i++)
   {
     if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  {		
	   id  += "," + md[i] ;
	  }
    }
	id=id.substring(1,id.length);
	var message=document.getElementById("sms").value;
	var mask=document.getElementById("sel_mask").value;
	//alert(id_delete);
	if(mask==0)
	{
		var mask=document.getElementById("sel_mask1").value;
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
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
	 document.getElementById("maincontent").innerHTML = xmlhttp.responseText;
	}
   }
	 var md=document.getElementById("total_ids").value;
	 alert(md);
	md=md.split(",");
	
   var id="";
   for(var i=1;i<=md.length-2;i++)
   {
     if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  {		
	   id  += "," + md[i] ;
	  }
    }
	id=id.substring(1,id.length);
	var message=document.getElementById("sms1").value;
	var mask=document.getElementById("sel_mask1").value;
	//alert(id_delete);
	if(mask==0)
	{
		var mask=document.getElementById("sel_mask").value;
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
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
	 document.getElementById("maincontent").innerHTML = xmlhttp.responseText;
	}
   }
  	var msg="msg"+id;
	var message=document.getElementById(msg).value;
	var mask=document.getElementById("sel_mask1").value;
	//alert(msg);
	//alert(id_delete);
	if(mask==0)
	{
		var mask=document.getElementById("sel_mask").value;
		if(mask==0)
		{
			alert("please select mask");
			return;
		}
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

function page(d,p,f,r)
{		
	//	alert("sd");
		//alert(f);
		if (window.XMLHttpRequest)
	 		{// code for IE7+, Firefox, Chrome, Opera, Safari
 				xmlhttp=new XMLHttpRequest();
 			}
 		else
 		{// code for IE6, IE5
 				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
 		xmlhttp.onreadystatechange=function()
 		{	
 			if (xmlhttp.readyState==4 && xmlhttp.status==200)
 			{
 				document.getElementById("content").innerHTML=xmlhttp.responseText;
 			}
 		};
		//alert(flag);
		var co=document.getElementById("sel_country").value;
		var st=document.getElementById("sel_state").value;
		var ci=document.getElementById("sel_city").value;
		var ca=document.getElementById("sel_category").value;
		var so=document.getElementById("sel_source").value;
		var g=document.getElementById("sel_group").value;
		
		xmlhttp.open("GET","searchc.php?op=search&page="+d+"&page_no_start="+p+"&flag="+f+"&country="+co+"&state="+st+"&city="+ci+"&category="+ca+"&source="+so+"&group="+g+"&reclimit="+r+"&rn="+Math.random(),true);
		xmlhttp.send(null);		
}


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

function GetXmlHttpObject() 
  {
    var xmlhttp=null;
    try 
	{
        
        xmlhttp=new XMLHttpRequest();
    }
    catch (e) 
	{
       
        try 
		{
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) 
		{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}

function mdelete(de,p,f,lp,lpr,r)
 {
 
   var md=document.getElementById("total_ids").value;
	md=md.split(",");	
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
   
   var id_delete="";
   for(var i=1;i<=md.length-2;i++)
   {
   	//alert(md[i]);
     if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  {		
	   id_delete  += "," + md[i] ;
	  }
    }
	id_delete=id_delete.substring(1,id_delete.length);
	//alert(id_delete);
	//return;
	if(id_delete == "")
	{
	  alert("Please select atleast one record to delete!");
	  return;
	}
   else
   {
    var con = confirm("Are u sure u want to delete?");
    if (con == true)
    {    
		document.getElementById("sel_country").value="";
		document.getElementById("sel_state").value="";
		document.getElementById("sel_city").value="";
		document.getElementById("sel_category").value="";
		document.getElementById("sel_source").value="";
     var url = "searchc.php?id_delete="+id_delete +"&op=delete&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r ;
    }
	else
	{
	  return checknone();
	}
   
   }
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
   
  }
  
  

  function contact_edit(id,de,p,f,lp,lpr,r)
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
	 document.getElementById("maincontent").innerHTML = xmlhttp.responseText;
	}
   }
      var f_name = document.getElementById("firstname").value;
	 var l_name = document.getElementById("lastname").value;
	 if(document.frmeditcontact.gender[0].checked==true )
	  {
	   var gender = document.frmeditcontact.gender[0].value;
	  }
	  if(document.frmeditcontact.gender[1].checked==true )
	  {
	   var gender = document.frmeditcontact.gender[1].value;
	  }
	 
	 
	 var dob = document.getElementById("dob").value;
	 var addr1 = document.getElementById("addr1").value;
	 var addr2 = document.getElementById("addr2").value;
	 var city = document.getElementById("selcity").value;
	 var state = document.getElementById("selstate").value;
	 var country = document.getElementById("selcountry").value;
	 var pincode = document.getElementById("pincode").value;
	 
	 var phone1 = document.getElementById("phone1").value;
	  var phone2 = document.getElementById("phone2").value;
	  var mobile1 = document.getElementById("mobile1").value;
	  var mobile2 = document.getElementById("mobile2").value;
	  var fax = document.getElementById("fax").value;
	  var email1 = document.getElementById("email1").value;
	  var email2 = document.getElementById("email2").value;
	  var email3 = document.getElementById("email3").value;
	  var website = document.getElementById("website").value;
	
	  var orgname = document.getElementById("orgname").value;
	  var oaddr1 = document.getElementById("oaddr1").value;

	  var oaddr2 = document.getElementById("oaddr2").value;
	  var ocity = document.getElementById("selocity").value;
	  var ostate = document.getElementById("selostate").value;
	  var ocountry = document.getElementById("selocountry").value;
	   var opincode = document.getElementById("opincode").value;
	    var grp=document.getElementById("grp").value;
	   
	   var t = document.frmeditcontact.total_cats.value;
			if(document.getElementById("subscribe_yes").checked==true)
	  {
	  		var subscribe="1";
	  }
	  else
	  {
	  		var subscribe="0";
	  }
		t=t.split(",");
		
	    var category="";
   for(var i=1;i<=t.length-1;i++)
   {
     if(eval("document.frmeditcontact.cat_"+t[i]+".checked==true"))
	  {		
	   category  += "," + t[i] ;
	  }
    }
	category+=",0";
	   var s = document.frmeditcontact.total_sor.value;
	   s=s.split(",");
	    var source="";
   for(var i=1;i<=s.length-1;i++)
   {
     if(eval("document.frmeditcontact.sor_"+s[i]+".checked==true"))
	  {		
	   source  += "," + s[i] ;
	  }
    }
	source+=",0";
	   var remark = document.getElementById("remark").value; 

	// alert(name);
	
		if(!validate())
		{
			return;
		}	
		else
			{
			
			 var url="searchcombo_operation.php?id="+id+"&op=edit&f_name="+f_name+"&l_name="+l_name+"&gender="+gender+"&dob="+dob+"&addr1="+addr1+"&addr2="+addr2+"&city="+city+"&state="+state+"&country="+country+"&pincode="+pincode+"&phone1="+phone1+"&phone2="+phone2+"&mobile1="+mobile1+"&mobile2="+mobile2+"&fax="+fax+"&email1="+email1+"&email2="+email2+"&email3="+email3+"&website="+website+"&orgname="+orgname+"&oaddr1="+oaddr1+"&oaddr2="+oaddr2+"&ocity="+ocity+"&ostate="+ostate+"&ocountry="+ocountry+"&opincode="+opincode+"&category="+category+"&source="+source+"&remark="+remark+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&subscribe="+subscribe+"&reclimit="+r+"&grp="+grp;
			}
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
 }
 
function update(cid,de,p,f,lp,lpr,r)
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
	 		document.getElementById("maincontent").innerHTML = xmlhttp.responseText;
		}
   	}
   	
			 var url = "contact_edit.php";			 
			 url = url +"?id="+cid+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r;
			 			
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
 }
 
 function validate()
{
	var f_name = document.getElementById("firstname").value;
	 var l_name = document.getElementById("lastname").value;
	 if(document.getElementById("male").checked==true )
	  {
	   var gender = document.getElementById("male").value;
	  }
	  
	  else if(document.getElementById("female").checked==true )
	  {
	   var gender = document.getElementById("female").value;
	  }
	  else
	  {
	  	var gender="";
	  }
	 
	 
	 var dob = document.getElementById("dob").value;
	 var addr1 = document.getElementById("addr1").value;
	 var addr2 = document.getElementById("addr2").value;
	 var city = document.getElementById("selcity").value;
	 var state = document.getElementById("selstate").value;
	 var country = document.getElementById("selcountry").value;
	 var pincode = document.getElementById("pincode").value;
	 
	 var phone1 = document.getElementById("phone1").value;
	  var phone2 = document.getElementById("phone2").value;
	  var mobile1 = document.getElementById("mobile1").value;
	  var mobile2 = document.getElementById("mobile2").value;
	  var fax = document.getElementById("fax").value;
	  var email1 = document.getElementById("email1").value;
	  var email2 = document.getElementById("email2").value;
	  var email3 = document.getElementById("email3").value;
	  var website = document.getElementById("website").value;
	
	  var orgname = document.getElementById("orgname").value;
	  var oaddr1 = document.getElementById("oaddr1").value;
	  var oaddr2 = document.getElementById("oaddr2").value;
	  var ocity = document.getElementById("selocity").value;
	  var ostate = document.getElementById("selostate").value;
	  var ocountry = document.getElementById("selocountry").value;
	   var opincode = document.getElementById("opincode").value;	  
	
		if(f_name=="")
		{
		     document.getElementById("d_f_name").innerHTML="*";
		}
		else if(!checkChar(f_name))
		{
			document.getElementById("d_f_name").innerHTML="Enter a valid name";
		}		 		
		else
		{
			document.getElementById("d_f_name").innerHTML="";
		}
		if(l_name=="")
		{
		     document.getElementById("d_l_name").innerHTML="*";

		}
		else if(!checkChar(l_name))
		{
			document.getElementById("d_l_name").innerHTML="Enter a valid name";
		}		 		
		else
		{
			document.getElementById("d_l_name").innerHTML="";
		}
		if(addr1=="")
		{
		     document.getElementById("d_add1").innerHTML="*";
		}				 		
		else
		{
			document.getElementById("d_add1").innerHTML="";
		}
		
		if(pincode=="")
		{
		     document.getElementById("d_pincode").innerHTML="*";
		}
		else if(!checkDigit(pincode))
		{
			document.getElementById("d_pincode").innerHTML="Enter a valid pincode";
		}		 		
		else
		{
			document.getElementById("d_pincode").innerHTML="";
		}
		if(dob=="")
		{
		     document.getElementById("d_dob").innerHTML="*";
		}				 		
		else
		{
			document.getElementById("d_dob").innerHTML="";
		}
		if(city=="0")
		{
		     document.getElementById("d_city").innerHTML="*";	
		}				 		
		else
		{
			document.getElementById("d_city").innerHTML="";
		}
		if(state=="0")
		{
		     document.getElementById("d_state").innerHTML="*";
		}				 		
		else
		{
			document.getElementById("d_state").innerHTML="";
		}
		if(country=="0")
		{
		     document.getElementById("d_country").innerHTML="*";
		}				 		
		else
		{
			document.getElementById("d_country").innerHTML="";
		}
		if(gender=="")
		{
			document.getElementById("d_gender").innerHTML="*";
		}
		else
		{
			document.getElementById("d_gender").innerHTML="";
		}
		if(phone1=="")
		{ 
		     document.getElementById("d_phone1").innerHTML="*";
		}
		else if(!checkDigit(phone1))
		{
			document.getElementById("d_phone1").innerHTML="Enter a valid phone no.";
		}		 		
		else
		{
			document.getElementById("d_phone1").innerHTML="";
		}
		
		if(mobile1=="")
		{
		     document.getElementById("d_mobile1").innerHTML="*";
		}
		else if(!checkDigit(mobile1))
		{
			document.getElementById("d_mobile1").innerHTML="Enter a valid mobile no.";
		}		 		
		else
		{
			document.getElementById("d_mobile1").innerHTML="";
		}
		if(email1=="")
		{
		     document.getElementById("d_email1").innerHTML="*";
		}
		else if(!checkEmail(email1))
		{
			document.getElementById("d_email1").innerHTML="Enter a valid Email ID";
		}		 		
		else
		{
			document.getElementById("d_email1").innerHTML="";
		}
		if(orgname=="")
		{
		     document.getElementById("d_orgname").innerHTML="*";
		}	 		
		else
		{
			document.getElementById("d_orgname").innerHTML="";
		}	
		if(oaddr1=="")
		{
		     document.getElementById("d_oadd1").innerHTML="*";
		}	 		
		else
		{
			document.getElementById("d_oadd1").innerHTML="";
		}
		if(ocity=="0")
		{
		     document.getElementById("d_ocity").innerHTML="*";	
		}				 		
		else
		{
			document.getElementById("d_ocity").innerHTML="";
		}
		if(ostate=="0")
		{
		     document.getElementById("d_ostate").innerHTML="*";
		}				 		
		else
		{
			document.getElementById("d_ostate").innerHTML="";
		}
		if(ocountry=="0")
		{
		     document.getElementById("d_ocountry").innerHTML="*";
		}				 		
		else
		{
			document.getElementById("d_ocountry").innerHTML="";
		}
		if(opincode=="")
		{
		     document.getElementById("d_opincode").innerHTML="*";
		}
		else if(!checkDigit(opincode))
		{
			document.getElementById("d_opincode").innerHTML="Enter a valid pincode";
		}		 		
		else
		{
			document.getElementById("d_opincode").innerHTML="";
		}
		
		return f_name!="" && l_name!="" && gender!="" && addr1!=""  && city!="0" && state!="0" && country!="0" && pincode!="" && phone1!="" && mobile1!="" && email1!="" && orgname!="" && oaddr1!="" && ocity!="0" && ostate!="0" && country!="0" && dob!="" && checkChar(f_name) && checkChar(l_name) && checkDigit(pincode) && checkDigit(phone1) && checkDigit(mobile1) && checkEmail(email1); 
}



   function asc(f,de,p,f1,lp,lpr,r) 
  {

   xmlhttp=GetXmlHttpObject();
    if(xmlhttp==null) 
	 {
       alert ("Your browser does not support AJAX!");
       return;
     }
    
    xmlhttp.onreadystatechange=function() 
	 {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
            document.getElementById('content').innerHTML=xmlhttp.responseText;			
        }
     }
	    if(f=="1")
	 {
	 	var field="f_name";
	 }
	 else if(f=="2")
	 {
	 	var field="mobile1";
	 }
	 else if(f=="3")
	 {
	 	var field="phone1";
	 }
	 else if(f=="4")
	 {
	 	var field="email1";
	 }
	 else if(f=="5")
	 {
	 	var field="org_name";
	 }
	 else if(f=="6")
	 {
	 	var field="subscribe";
	 }
	var co=document.getElementById("sel_country").value;
		var st=document.getElementById("sel_state").value;
		var ci=document.getElementById("sel_city").value;
		var ca=document.getElementById("sel_category").value;
		var so=document.getElementById("sel_source").value;
		var g=document.getElementById("sel_group").value;
	 
	  	    var url="searchc.php?op=search&order=asc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&country="+co+"&state="+st+"&city="+ci+"&category="+ca+"&source="+so+"&group="+g+"&reclimit="+r;   
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);	
	 
  }


function desc(f,de,p,f1,lp,lpr,r) 
  {

   xmlhttp=GetXmlHttpObject();
    if(xmlhttp==null) 
	 {
       alert ("Your browser does not support AJAX!");
       return;
     }
    
    xmlhttp.onreadystatechange=function() 
	 {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
            document.getElementById('content').innerHTML=xmlhttp.responseText;			
        }
     }
	
	 if(f=="1")
	 {
	 	var field="f_name";
	 }
	 else if(f=="2")
	 {
	 	var field="mobile1";
	 }
	 else if(f=="3")
	 {
	 	var field="phone1";
	 }
	 else if(f=="4")
	 {
	 	var field="email1";
	 }
	 else if(f=="5")
	 {
	 	var field="org_name";
	 }
	 else if(f=="6")
	 {
	 	var field="subscribe";
	 }
	 var co=document.getElementById("sel_country").value;
		var st=document.getElementById("sel_state").value;
		var ci=document.getElementById("sel_city").value;
		var ca=document.getElementById("sel_category").value;
		var so=document.getElementById("sel_source").value;
		var g=document.getElementById("sel_group").value;
	 
	  	    var url="searchc.php?op=search&order=desc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&country="+co+"&state="+st+"&city="+ci+"&category="+ca+"&source="+so+"&group="+g+"&reclimit="+r;    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);	
	 
  }


  function recperpage()
{
 	xmlhttp = GetXmlHttpObject();
    if(xmlhttp==null) 
	{  
       alert ("Your browser does not support AJAX!");
       return;
    }
  	xmlhttp.onreadystatechange = function()
   	{
    	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
	//alert(xmlhttp.responseText);
	 	document.getElementById("content").innerHTML=xmlhttp.responseText;
		}
   }
   var reclimit=document.getElementById("sel_limit").value;
  var co=document.getElementById("sel_country").value;
		var st=document.getElementById("sel_state").value;
		var ci=document.getElementById("sel_city").value;
		var ca=document.getElementById("sel_category").value;
		var so=document.getElementById("sel_source").value;
		var g=document.getElementById("sel_group").value;
   var url = "searchc.php?reclimit="+reclimit+"&country="+co+"&state="+st+"&city="+ci+"&category="+ca+"&source="+so+"&group="+g+"&op=search";
   xmlhttp.open("GET",url,true);
   xmlhttp.send();	
}

function offsetchange()
{
 	xmlhttp = GetXmlHttpObject();
    if(xmlhttp==null) 
	{  
       alert ("Your browser does not support AJAX!");
       return;
    }
  	xmlhttp.onreadystatechange = function()
   	{
    	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
	//alert(xmlhttp.responseText);
	 	document.getElementById("content").innerHTML=xmlhttp.responseText;
		}
   }
   var reclimit=document.getElementById("sel_limit").value;
   var page=document.getElementById("sel_offset").value;
   var pns=document.getElementById("pns").value;
  var co=document.getElementById("sel_country").value;
		var st=document.getElementById("sel_state").value;
		var ci=document.getElementById("sel_city").value;
		var ca=document.getElementById("sel_category").value;
		var so=document.getElementById("sel_source").value;
		var g=document.getElementById("sel_group").value;
   
   var url = "searchc.php?reclimit="+reclimit+"&page="+page+"&pns="+pns+"&country="+co+"&state="+st+"&city="+ci+"&category="+ca+"&source="+so+"&group="+g+"&op=search";
   xmlhttp.open("GET",url,true);
   xmlhttp.send();	
}

 
 function tsearch() 
  {

   xmlhttp=GetXmlHttpObject();
    if(xmlhttp==null) 
	 {
       alert ("Your browser does not support AJAX!");
       return;
     }
    
    xmlhttp.onreadystatechange=function() 
	 {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
            document.getElementById('content').innerHTML=xmlhttp.responseText;
        }
     }
	  var co=document.getElementById("sel_country").value;
		var st=document.getElementById("sel_state").value;
		var ci=document.getElementById("sel_city").value;
		var ca=document.getElementById("sel_category").value;
		var so=document.getElementById("sel_source").value;
		var g=document.getElementById("sel_group").value;
	 var r=document.getElementById("sel_limit").value;
	
	  	    var url="searchc.php?+country="+co+"&state="+st+"&city="+ci+"&category="+ca+"&source="+so+"&group="+g+"&op=search&reclimit="+r;
    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);
 	
		
	 
  }
  
  
 function showall()
  {
   xmlhttp=GetXmlHttpObject();
    if(xmlhttp==null) 
	 {
       alert ("Your browser does not support AJAX!");
       return;
     }
    
    xmlhttp.onreadystatechange=function() 
	 {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		{
            document.getElementById('content').innerHTML=xmlhttp.responseText;
        }
     }
	
		var r = document.getElementById("sel_limit").value;
		document.getElementById("sel_country").value="";
		document.getElementById("sel_state").value="";
		document.getElementById("sel_city").value="";
		document.getElementById("sel_category").value="";
		document.getElementById("sel_source").value="";
	  	    var url="searchc.php?op=allsearch&reclimit="+r ;
    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);
 	
		
  }

 function contact_edit_oe(id,de,p,f,lp,lpr,r,e)
 {
 	if (window.event) { e = window.event; }
        if (e.keyCode == 13)
        {    	 		
			contact_edit(id,de,p,f,lp,lpr,r);
 		}
		else
		{
			return;
		}      
 }
</script>
</html>
