<?php
include_once("configure/configure.php");
include("configure/sessioncheck.php");
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" media="screen" /><script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="mouseovertabs.css" />

<script src="mouseovertabs.js" type="text/javascript">

/***********************************************
* Mouseover Tabs Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script type="text/javascript" src="dhtmlgoodies_calendar.js"></script>
<link href="dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php");?>
<?php include("menu.php");?>
<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<div >
<ul>
<?php 
	for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="6")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
	<li class="submenuitem"><a href="security.php">Users </a> |</li>
    <?php $flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="8")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>     
    <li class="submenuitem"><a href="settings.php">Settings</a> |</li>
     <?php $flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="11")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>     
    <li class="submenuitem"><a href="cms.php">CMS </a> </li>
    <?php $flag=0;}?>
</ul>
</div>
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
			if($subrights[$i]=="6.1")
			{
				$flag=1;
			}					
		}
		if($flag==1)
		{			
	?>
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
    <?php
				$flag=0; 
				include("rights.php");
				for($i=0;$i<count($subrights);$i++)
				{
					if($subrights[$i]=="6.2")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>	
<table>
	<tr>
		<td><input type="button" value="Edit Security Settings" onclick="editss();" class="regbtn2"/></td>
    </tr> 
 </table>
 <?php } ?>
    <div id="content">
	<?php include_once("pagingsecurity.php");?>
    </div>
    
<div id="blank"></div>

<?php include("footer.php");?>

</body>
<script language="javascript">

function optch(t,o)
{
	//alert(document.getElementById(t).checked);
	//alert(t);
	//alert(o);
	if(document.getElementById(t).checked==true)
	{
		document.getElementById(o).style.display="block";
	}
	else
	{
		document.getElementById(o).style.display="none";
		var t=t.substring(3,t.length);
		for(var i=1;i<=3;i++)
		{
			var s="document.getElementById('"+t+"."+i+"').checked=false";
			eval(s);
		}
		if(t=="4")
		{
		document.getElementById("contactadd").style.display="none";
		document.getElementById("contactedit").style.display="none";
		document.getElementById("4.1.1").checked=false;
		document.getElementById("4.1.2").checked=false;
		document.getElementById("4.1.3").checked=false;
		document.getElementById("4.1.4").checked=false;
		document.getElementById("4.2.1").checked=false;
		document.getElementById("4.2.2").checked=false;
		document.getElementById("4.2.3").checked=false;
		document.getElementById("4.2.4").checked=false;
		document.getElementById("4.4.1").checked=false;
		document.getElementById("4.4.2").checked=false;
		document.getElementById("4.4.3").checked=false;
		document.getElementById("4.4.4").checked=false;
		}
	}
}

function rightch(t,o)
{
	//alert(document.getElementById(t).checked);
	//alert(t);
	//alert(o);
	if(document.getElementById(t).checked==true)
	{
		document.getElementById(o).style.display="block";
	}
	else
	{
		document.getElementById(o).style.display="none";
		for(var i=1;i<=4;i++)
		{
			var s="document.getElementById('"+t+"."+i+"').checked=false";
			//alert(s)
			eval(s);
		}
	}
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
 
 function security_edit_oe(id,de,p,f,lp,lpr,r,e)
 {
 	if (window.event) { e = window.event; }
        if (e.keyCode == 13)
        {    	 		
			security_edit(id,de,p,f,lp,lpr,r);
 		}
		else
		{
			return;
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
		xmlhttp.open("GET","pagingsecurity.php?page="+d+"&page_no_start="+p+"&flag="+f+"&search="+s+"&reclimit="+r+"&rn="+Math.random(),true);
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


function checkallr()
{
	checkrec=document.getElementById("checkrec").value;
	checkrec=checkrec.split(",");
	total_ids=document.getElementById("total_ids").value;
	total_ids=total_ids.split(",");
	var objname;
	for(i=0;i<=total_ids.length-1;i++)
	{
		objname="document.getElementById('C1_" + total_ids[i] + "').checked=true";
		if(objname != "document.getElementById('C1_0').checked=true")
		{
			eval(objname); //is used to execute dynamic javascript code
		}
	}
	
	//alert(checkrec);
	for(i=1;i<=checkrec.length-1;i++)
	{
		document.getElementById(checkrec[i]).checked=true;
		//alert(obj);
	}
	document.getElementById("4.4").checked=true;
	document.getElementById("4.1.1").checked=true;
	document.getElementById("4.1.2").checked=true;
	document.getElementById("4.1.3").checked=true;
	document.getElementById("4.1.4").checked=true;
	document.getElementById("4.2.1").checked=true;
	document.getElementById("4.2.2").checked=true;
	document.getElementById("4.2.3").checked=true;
	document.getElementById("4.2.4").checked=true;
	document.getElementById("4.4.1").checked=true;
	document.getElementById("4.4.2").checked=true;
	document.getElementById("4.4.3").checked=true;
	document.getElementById("4.4.4").checked=true;
	
	document.getElementById("contactadd").style.display="block";
	document.getElementById("contactedit").style.display="block";
	document.getElementById("contactview").style.display="block";
	
	document.getElementById("opt2").style.display="block";
	document.getElementById("opt3").style.display="block";
	document.getElementById("opt4").style.display="block";
	document.getElementById("opt6").style.display="block";
	//document.getElementById("opt8").style.display="block";
	document.getElementById("opt10").style.display="block";	
	document.getElementById("opt11").style.display="block";	
	document.getElementById("opt12").style.display="block";	
	document.getElementById("opt13").style.display="block";	
	document.getElementById("opt14").style.display="block";	
}

//function to uncheck all checkboxes
function checknoner()
{
	checkrec=document.getElementById("checkrec").value;
	checkrec=checkrec.split(",");
	total_ids=document.getElementById("total_ids").value;
	total_ids=total_ids.split(",");
	var objname;
	for(i=0;i<=total_ids.length-1;i++)
	{
		objname="document.getElementById('C1_" + total_ids[i] + "').checked=false";
		if(objname != "document.getElementById('C1_0').checked=false")
		{
			eval(objname); //is used to execute dynamic javascript code
		}
	}
	for(i=1;i<=checkrec.length-1;i++)
	{
		document.getElementById(checkrec[i]).checked=false;
		//alert(obj);
	}
	
	document.getElementById("4.4").checked=false;
	document.getElementById("4.1.1").checked=false;
	document.getElementById("4.1.2").checked=false;
	document.getElementById("4.1.3").checked=false;
	document.getElementById("4.1.4").checked=false;
	document.getElementById("4.2.1").checked=false;
	document.getElementById("4.2.2").checked=false;
	document.getElementById("4.2.3").checked=false;
	document.getElementById("4.2.4").checked=false;
	document.getElementById("4.4.1").checked=false;
	document.getElementById("4.4.2").checked=false;
	document.getElementById("4.4.3").checked=false;
	document.getElementById("4.4.4").checked=false;
	
	document.getElementById("contactadd").style.display="none";
	document.getElementById("contactedit").style.display="none";
	document.getElementById("contactview").style.display="none";
	
	document.getElementById("opt2").style.display="none";
	document.getElementById("opt3").style.display="none";
	document.getElementById("opt4").style.display="none";
	document.getElementById("opt6").style.display="none";
	//document.getElementById("opt8").style.display="none";
	document.getElementById("opt10").style.display="none";
	document.getElementById("opt11").style.display="none";
	document.getElementById("opt12").style.display="none";
	document.getElementById("opt13").style.display="none";
	document.getElementById("opt14").style.display="none";
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
	//alert(xmlhttp.responseText);
	 document.getElementById("content").innerHTML=xmlhttp.responseText;
	}
   }
   var ssearch = document.getElementById("txtsearch").value;
   var r = document.getElementById("sel_limit").value;
   var url = "pagingsecurity.php?op=add&search="+ssearch+"&reclimit="+r;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
  }
  
  function editss()
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
	 document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
	}
   }   
   var r = document.getElementById("sel_limit").value;
   var url = "security_settings.php?reclimit="+r;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
  }
  
  
function grant(r)
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
	 	document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
		}
   	}   
   	var md=document.getElementById("total_ids").value;
	md=md.split(",");
	var rights="";
   	for(var i=1;i<=md.length-1;i++)
   	{
     	if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  	{		
	   		rights  += "," + md[i] ;
	  	}
    }
	rights=rights.substring(1,rights.length);
	
	var subrights="";
	var rch=new Array("2.1","2.2","2.3","3.1","3.2","3.3","4.1","4.2","4.3","4.4","6.1","6.2","6.3","10.1","10.2","10.3","11.1","11.2","11.3","12.1","12.2","12.3","13.1","13.2","13.3");
	
	for(var j=0;j<rch.length;j++)
	{
		//alert(document.getElementById(eval(rch[j])).checked==true);
		if(document.getElementById(eval(rch[j])).checked==true)
		{
			subrights+=","+rch[j];
		}
	}
	subrights=subrights.substring(1,subrights.length);
	//alert(subrights);
	//return;
	
	var rch1=new Array("4.1.1","4.1.2","4.1.3","4.1.4","4.2.1","4.2.2","4.2.3","4.2.4","4.4.1","4.4.2","4.4.3","4.4.4");
	ssrights="";
	for(var j=0;j<rch1.length;j++)
	{
		//alert("document.getElementById("+rch1[j]+")");
		if(document.getElementById(rch1[j]).checked==true)
		{
			ssrights+=","+rch1[j];
		}
	}
	ssrights=ssrights.substring(1,ssrights.length);
	//alert(ssrights);
	
	var user=document.getElementById("users").value;
	if(user==0)
	{
		alert("Select atleast one user");
		return;
	}
   	var url = "security_settings.php?reclimit="+r+"&user="+user+"&rights="+rights+"&subrights="+subrights+"&ssrights="+ssrights;
   	xmlhttp.open("GET",url,true);
   	xmlhttp.send();
}

function loadrights(r)
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
	 	document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
		}
   	}      	
	
	var id=document.getElementById("users").value;
   	var url = "security_settings.php?reclimit="+r+"&id="+id;
   	xmlhttp.open("GET",url,true);
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
     var url = "security_operation.php?id_delete="+id_delete +"&op=delete&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&search="+ssearch+"&rn="+Math.random() ;
    }
	else
	{
	  return checknone();
	}
   
   }
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
   //document.getElementById("ajaxapp").style.display="none";
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
	 document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
   }
    var name = document.getElementById("security_name").value;
	var password = document.getElementById("password").value;
	var conpassword = document.getElementById("con_password").value;
	var email = document.getElementById("txtemail").value;
	var ssearch = document.getElementById("txtsearch").value;
	var r = document.getElementById("sel_limit").value;
	// alert(name);
	
		if(name=="")
		{
		     document.getElementById("d_security_name").innerHTML="*";
			 document.getElementById("security_name").focus();
			 return;
		
		}
		else if(email=="")
		{
			 document.getElementById("d_security_name").innerHTML="";
			 document.getElementById("d_txtemail").innerHTML="*";
			 document.getElementById("txtemail").focus();
			 return;		
		} 
		else if(password=="")
		{
			 document.getElementById("d_txtemail").innerHTML="";
			 document.getElementById("d_password").innerHTML="*";
			 document.getElementById("password").focus();
			 return;		
		}
			
		if(password!=conpassword)
		{
			 document.getElementById("d_password").innerHTML="";
			 document.getElementById("d_con_password").innerHTML="The password does not match..";
			 document.getElementById("password").focus();
			 document.getElementById("password").value = "";
			 document.getElementById("con_password").value = "";
			 
			 return;
		
		}	
		else
			{
			 var url = "security_operation.php?op=insert&name="+name+"&password="+password+"&search="+ssearch+"&reclimit="+r+"&email="+email;
			 
			}
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
 }
  function security_edit(id,de,p,f,lp,lpr,r)
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
     var name = document.getElementById("security_name").value;
	  var email = document.getElementById("security_email").value;
	var ssearch = document.getElementById("txtsearch").value;
	// alert(name);
	
		if(name=="")
		{
		     //alert("Please enter country Name...!");
			 document.getElementById("security_name").focus();
			 document.getElementById("d_security_name").innerHTML="*";
			 return;
		
		}
		else if(email=="")
		{
		     //alert("Please enter country Name...!");
			 document.getElementById("d_security_name").innerHTML="";
			 document.getElementById("security_email").focus();
			 document.getElementById("d_security_email").innerHTML="*";
			 return;		
		}
		 		
		else
			{
			
			 var url = "security_operation.php?id="+id+"&op=edit&name="+name+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&search="+ssearch+"&email="+email+"&rn="+Math.random();
			// alert(url);
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
	 document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
   }
    var ssearch = document.getElementById("txtsearch").value;
			 var url = "pagingsecurity.php";
			 
			 url = url +"?id="+cid+"&op=update&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&search="+ssearch+"&rn="+Math.random();
			 
			
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
			document.getElementById("txtsearch").focus();
        }
     }
	 var ssearch = document.getElementById("txtsearch").value;
		 var r=document.getElementById("sel_limit").value;
	  	    var url="security_operation.php?search="+ssearch+"&op=search&reclimit="+r;
    		
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
	  document.getElementById("txtsearch").value="";
	  var r = document.getElementById("sel_limit").value;
	
	  	    var url="security_operation.php?op=allsearch&reclimit="+r ;
    		
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
	 var ssearch = document.getElementById("txtsearch").value;
	if(f==1)
	{
		var field="username";
	}
	else
	{
		var field="emailid";
	}
	  	    var url="pagingsecurity.php?search="+ssearch +"&order=asc&field="+field+"&op=search&order=asc&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random() ;    		
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
	if(f==1)
	{
		var field="username";
	}
	else
	{
		var field="emailid";
	}
	  	    var url="pagingsecurity.php?search="+ssearch +"&order=desc&field="+field+"&op=search&order=desc&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();    		
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
   var url = "pagingsecurity.php?reclimit="+reclimit+"&search="+ssearch;
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
   var url = "pagingsecurity.php?reclimit="+reclimit+"&page="+page+"&pns="+pns+"&search="+ssearch;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();	
}



</script>
</html>
