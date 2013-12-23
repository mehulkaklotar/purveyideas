<?php
include_once("configure/configure.php");
include_once("configure/sessioncheck.php");
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="4")
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
					if($rights[$i]=="4")
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
    <div id="searchbar">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td colspan="5">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>            
                <th><img src="images/tableheadleft.png" /></th>
                <th class="thbackground12" width="100%">Search:
                <input type="text" size="25" id="txtsearch" name="txtsearch" value="" onKeyUp="javascript:tsearch()"  />
                <input type="button"  value="Show All" class="regbtn1" size="40" onclick="javascript:showall();" class="regbtn1"/> 
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
    <a  onclick="print1()">Print</a>
                <div class="floatright"><a onclick="javascript:addrecord();"><img src="images/addnew.png"  class="noborder"/></a></div>
    <?php } ?>
                </th>
                <th><img src="images/tableheadright.png" /></th>
            </tr>
            </table>
            </td>            
        </tr>
       </table>
    </div>

    <div id="content">
	<?php include_once("pagingcontact.php");?>
    </div>
    
<div id="blank"></div>

<?php include("footer.php");?>

</body>
<script type="text/javascript" src="validation.js"></script>
<script language="javascript">

function abc()
{
var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()
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


function print1()
{
	var s=document.getElementById("txtsearch").value;
	window.open("report.php?fsearch="+s);
}


function detail(a)
{

	switch(a)
	{
		case 'd_personal':
			document.getElementById("d_personal").style.display="block";
			document.getElementById("d_org").style.display="none";
			document.getElementById('d_commu').style.display="none";
			document.getElementById('d_other').style.display="none";
			
			document.getElementById('l_personal').style.backgroundImage="url(images/btntab1.png)";
			document.getElementById('l_org').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_commu').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_other').style.backgroundImage="url(images/btntab.png)";						
			
			document.getElementById('l_personal').style.color="#273449";
			document.getElementById('l_org').style.color="#ffffff";
			document.getElementById('l_commu').style.color="#ffffff";
			document.getElementById('l_other').style.color="#ffffff";
			
			break;
		case 'd_org':
			document.getElementById("d_personal").style.display="none";
			document.getElementById("d_org").style.display="block";
			document.getElementById('d_commu').style.display="none";
			document.getElementById('d_other').style.display="none";
				
			document.getElementById('l_personal').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_org').style.backgroundImage="url(images/btntab1.png)";
			document.getElementById('l_commu').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_other').style.backgroundImage="url(images/btntab.png)";	
			
			document.getElementById('l_personal').style.color="#ffffff";
			document.getElementById('l_org').style.color="#273449";
			document.getElementById('l_commu').style.color="#ffffff";
			document.getElementById('l_other').style.color="#ffffff";
			break;
		case 'd_commu':
			document.getElementById("d_personal").style.display="none";
			document.getElementById("d_org").style.display="none";
			document.getElementById('d_commu').style.display="block";
			document.getElementById('d_other').style.display="none";
				
			document.getElementById('l_personal').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_org').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_commu').style.backgroundImage="url(images/btntab1.png)";
			document.getElementById('l_other').style.backgroundImage="url(images/btntab.png)";	
			
			document.getElementById('l_personal').style.color="#ffffff";
			document.getElementById('l_org').style.color="#ffffff";
			document.getElementById('l_commu').style.color="#273449";
			document.getElementById('l_other').style.color="#ffffff";
			break;
		case 'd_other':
			document.getElementById("d_personal").style.display="none";
			document.getElementById("d_org").style.display="none";
			document.getElementById('d_commu').style.display="none";
				document.getElementById('d_other').style.display="block";
				
			document.getElementById('l_personal').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_org').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_commu').style.backgroundImage="url(images/btntab.png)";
			document.getElementById('l_other').style.backgroundImage="url(images/btntab1.png)";	
			
			document.getElementById('l_personal').style.color="#ffffff";
			document.getElementById('l_org').style.color="#ffffff";
			document.getElementById('l_commu').style.color="#ffffff";
			document.getElementById('l_other').style.color="#273449";
			break;
	}
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
		var s=document.getElementById("txtsearch").value;
		xmlhttp.open("GET","pagingcontact.php?page="+d+"&page_no_start="+p+"&flag="+f+"&search="+s+"&reclimit="+r+"&rn="+Math.random(),true);
		xmlhttp.send(null);		
}

function insert_oe(e)
 {
 	if (window.event) { e = window.event; }
        if (e.keyCode == 13)
        {    	 		
			insert();
 		}
		else
		{
			return;
		}      
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

function addrecord()
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
	 document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
	 abc();
	}
   }
  // var ssearch = document.getElementById("txtsearch").value;
  	
   var url = "contact_add.php";
			  xmlhttp.open("POST",url,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//xmlhttp.setRequestHeader("Content-length", params.length);
		xmlhttp.setRequestHeader("connection", "close");
			  xmlhttp.send();
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
	//alert(md);
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
   
   var id_delete="";
   for(var i=1;i<=md.length-1;i++)
   {
     if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  {		
	   id_delete  += "," + md[i] ;
	  }
    }
	
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
	var ssearch = document.getElementById("txtsearch").value;  
     var url = "contact_operation.php?id_delete="+id_delete+"&op=delete&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&search="+ssearch+"&rn="+Math.random() ;
    }
	else
	{
	  return checknone();
	}
   
   }
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
   
  }
function validate()
{
		var f_name = document.getElementById("firstname").value;
	 	var l_name = document.getElementById("lastname").value;

	  var email1 = document.getElementById("email1").value; 
	
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
		
		return f_name!="" && l_name!="" && email1!="" && checkChar(f_name) && checkChar(l_name) && checkEmail(email1); 
}
  
  
  function insert()
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
	 if(document.frmaddcontact.gender[0].checked==true )
	  {
	   var gender = document.frmaddcontact.gender[0].value;
	  }
	  
	  else if(document.frmaddcontact.gender[1].checked==true )
	  {
	   var gender = document.frmaddcontact.gender[1].value;
	  }
	  else
	  {
	  	var gender="";
	  }
	 if(document.getElementById("subscribe_yes").checked==true)
	  {
	  		var subscribe="1";
	  }
	  else
	  {
	  		var subscribe="0";
	  }
	 
	 var dob = document.getElementById("dob").value;
	 var ads = document.getElementById("ads").value;
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
	   
	   
	   var t = document.frmaddcontact.total_cats.value;
	   
	  // var ssearch = document.getElementById("txtsearch").value;
		
		t=t.split(",");
		
	 	var category="";
		var selObj=document.getElementById("category");
  		var i;  		
  		for (i=0; i<selObj.options.length; i++) 
		{
    		if (selObj.options[i].selected) 
			{
      			category +=","+ selObj.options[i].value;      		
    		}
  		}				
		category=category.substring(1,category.length);
		//alert(category);
		
		var source="";
		var selObj=document.getElementById("source");
  		var j;  		
  		for (j=0; j<selObj.options.length; j++) 
		{
    		if (selObj.options[j].selected) 
			{
      			source +=","+ selObj.options[j].value;      		
    		}
  		}				
		source=source.substring(1,source.length);
		//alert(source);
		
	   var remark = document.getElementById("remark").value; 

	
     
		//alert(validate());
		if(!validate())
		{
			return;
		}
		else
		{
			 var url = "contact_operation.php?op="+'insert' +"&f_name="+f_name +"&l_name="+l_name +"&gender="+gender+"&dob="+dob+"&ads="+ads+"&addr1="+addr1+"&addr2="+addr2+"&city="+city+"&state="+state+"&country="+country+"&pincode="+pincode+"&phone1="+phone1+"&phone2="+phone2+"&mobile1="+mobile1+"&mobile2="+mobile2+"&fax="+fax+"&email1="+email1+"&email2="+email2+"&email3="+email3+"&website="+website+"&orgname="+orgname+"&oaddr1="+oaddr1+"&oaddr2="+oaddr2+"&ocity="+ocity+"&ostate="+ostate+"&ocountry="+ocountry+"&opincode="+opincode+"&category="+category+"&source="+source+"&subscribe="+subscribe+"&remark="+remark+"&grp="+grp;			 
			}
			
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
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
	 var ads =document.getElementById("ads").value;
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
	   //var ssearch = document.getElementById("txtsearch").value;
		
		t=t.split(",");
		
	    var category="";
		var selObj=document.getElementById("category");
  		var i;  		
  		for (i=0; i<selObj.options.length; i++) 
		{
    		if (selObj.options[i].selected) 
			{
      			category +=","+ selObj.options[i].value;      		
    		}
  		}				
		category=category.substring(1,category.length);
		//alert(category);
		
		var source="";
		var selObj=document.getElementById("source");
  		var j;  		
  		for (j=0; j<selObj.options.length; j++) 
		{
    		if (selObj.options[j].selected) 
			{
      			source +=","+ selObj.options[j].value;      		
    		}
  		}				
		source=source.substring(1,source.length);
		//alert(source);
		
	   var remark = document.getElementById("remark").value; 
		if(document.getElementById("subscribe_yes").checked==true)
	  {
	  		var subscribe="1";
	  }
	  else
	  {
	  		var subscribe="0";
	  }
	// alert(name);
	
		if(!validate())
		{
			return;
		}		 		
		else
			{
			
			 var url = "contact_operation.php?id="+id +"&op="+'edit' +"&f_name="+f_name +"&l_name="+l_name +"&gender="+gender+"&dob="+dob+"&ads="+ads+"&addr1="+addr1+"&addr2="+addr2+"&city="+city+"&state="+state+"&country="+country+"&pincode="+pincode+"&phone1="+phone1+"&phone2="+phone2+"&mobile1="+mobile1+"&mobile2="+mobile2+"&fax="+fax+"&email1="+email1+"&email2="+email2+"&email3="+email3+"&website="+website+"&orgname="+orgname+"&oaddr1="+oaddr1+"&oaddr2="+oaddr2+"&ocity="+ocity+"&ostate="+ostate+"&ocountry="+ocountry+"&opincode="+opincode+"&category="+category+"&source="+source+"&remark="+remark+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&subscribe="+subscribe+"&grp="+grp+"&rn="+Math.random();
			
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
	 abc();
	}
   }
   var ssearch = document.getElementById("txtsearch").value;
    
			 var url = "contact_edit.php";
			 
			 url = url +"?id="+cid+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&search="+ssearch+"&rn="+Math.random();
			 
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
 }
  function preview(cid)
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
    
			 var url = "preview.php";
			 
			 url = url +"?id="+cid;
			 
			
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
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
			document.frmsearch.txtsearch.focus();
        }
     }
	 var ssearch = document.getElementById("txtsearch").value;
		 var r=document.getElementById("sel_limit").value;
	  	    var url="pagingcontact.php?search="+ssearch +"&op=search&reclimit="+r ;
    		
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
	 var ssearch = document.getElementById("txtsearch").value;
		var r = document.getElementById("sel_limit").value;
	document.getElementById("txtsearch").value="";
	  	    var url="pagingcontact.php?op=allsearch&reclimit="+r ;
    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);
 	
		
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
	 var ssearch = document.getElementById("txtsearch").value;
	
	  	    var url="pagingcontact.php?search="+ssearch +"&op=search&order=asc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();    		
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
	 var ssearch = document.getElementById("txtsearch").value;
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
	 
	 
	  	    var url="pagingcontact.php?search="+ssearch +"&op=search&order=desc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();    		
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
   var ssearch = document.getElementById("txtsearch").value;
   var url = "pagingcontact.php?reclimit="+reclimit+"&search="+ssearch;
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
   var ssearch = document.getElementById("txtsearch").value;
   var url = "pagingcontact.php?reclimit="+reclimit+"&page="+page+"&pns="+pns+"&search="+ssearch;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();	
}


</script>
</html>
