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
	if($rights[$i]=="2")
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

<div id="submenu">

<!--1st link within submenu container should point to the external submenu contents file-->
<?php
				
				for($i=0;$i<count($rights);$i++)
				{
					
					if($rights[$i]==2)
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{	?>	
<div >
<ul >
	
    <li class="submenuitem"><a href="country.php">Country </a> |</li>
    <li class="submenuitem"><a href="state.php">State </a> |</li>
    <li class="submenuitem"><a href="city.php">City</a> |</li>
    <li class="submenuitem"><a href="category.php">Category </a> |</li>
    <li class="submenuitem"><a href="source.php">Source </a> </li>
</ul>
</div>
<?php $flag=0;
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
			if($subrights[$i]=="2.1")
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
    <div id="content">
	<?php include_once("pagingcategory.php");?>
    </div>
    
<div id="blank"></div>

<?php include("footer.php");?>

</body>
<script language="javascript">

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
		xmlhttp.open("GET","pagingcategory.php?page="+d+"&page_no_start="+p+"&flag="+f+"&search="+s+"&reclimit="+r+"&rn="+Math.random(),true);
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
 
 function category_edit_oe(id,de,p,f,lp,lpr,r,e,o)
 {
 	if (window.event) { e = window.event; }
        if (e.keyCode == 13)
        {    	 		
			category_edit(id,de,p,f,lp,lpr,r,o);
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
	//alert(xmlhttp.responseText);
	 document.getElementById("content").innerHTML=xmlhttp.responseText;
	}
   }
   var ssearch = document.getElementById("txtsearch").value;
   var r = document.getElementById("sel_limit").value;
   var url = "pagingcategory.php?op=add&search="+ssearch+"&reclimit="+r;
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
	var ssearch = document.getElementById("txtsearch").value;
    if (con == true)
    {    
     var url = "category_operation.php?id_delete="+id_delete +"&op=delete&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&search="+ssearch+"&rn="+Math.random() ;
    }
	else
	{

	  return checknone();
	}
   
   }
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
   document.getElementById("ajaxapp").style.display="none";
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
     var name = document.getElementById("category_name").value;
	 var parent= document.getElementById("parent").value;
	var ssearch = document.getElementById("txtsearch").value;
	var r = document.getElementById("sel_limit").value;

	
		if(name=="")
		{
		     //alert("Please enter country Name...!");
			 document.getElementById("category_name").focus();
			 document.getElementById("d_category_name").innerHTML="*";
			 return;
		
		}
				
		else
			{
			 var url = "category_operation.php?op="+'insert' +"&name="+name +"&parent="+parent+"&search="+ssearch+"&reclimit="+r ;
			 
			}
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
 }
 
 
  function category_edit(id,de,p,f,lp,lpr,r,o)
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
     var name = document.getElementById("category_name").value;
	var parent= document.getElementById("parent").value;
	var s=document.getElementById("txtsearch").value;
	// alert(name);
	
		if(name=="")
		{
		     //alert("Please enter country Name...!");
			 document.getElementById("category_name").focus();
			 document.getElementById("d_category_name").innerHTML="*";
			 return;
		
		}
			
		else
			{
			
			if(o!="0")
			{
			var url = "category_operation.php?id="+id +"&op=edit&name="+name +"&parent="+parent+"&search="+s+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&order="+o+"&rn="+Math.random();
			}
			else
			{
			var url = "category_operation.php?id="+id +"&op=edit&name="+name +"&parent="+parent+"&search="+s+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();
			}
			
			
			}
	 xmlhttp.open("GET",url,true);
     xmlhttp.send();
	 //document.getElementById("ajaxapp").style.display="none";
 }
 
  function update(cid,de,p,f,lp,lpr,r,o)
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
    
			 var url = "pagingcategory.php";
			 var s=document.getElementById("txtsearch").value;
			 
			 if(o!="0")
			 {
			 url = url +"?id="+cid+"&search="+s+"&op=update&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&order="+o+"&rn="+Math.random();
			 }
			 else
			 {
			 url = url +"?id="+cid+"&search="+s+"&op=update&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();
			 }
			 
			 
			
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
	  	    var url="category_operation.php?search="+ssearch +"&op=search&reclimit="+r ;
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
	     
	  	    var url="category_operation.php?op=allsearch&reclimit="+r ;
    			xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);
 	
		
  }
  
   function asc(de,p,f1,lp,lpr,r) 
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
	
	  	    var url="pagingcategory.php?search="+ssearch +"&op=search&order=asc&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random() ;    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);	
	 
  }


function desc(de,p,f1,lp,lpr,r) 
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
	
	  	    var url="pagingcategory.php?search="+ssearch +"&op=search&order=desc&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();    		
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
   var url = "pagingcategory.php?reclimit="+reclimit+"&search="+ssearch;
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
   var url = "pagingcategory.php?reclimit="+reclimit+"&page="+page+"&pns="+pns+"&search="+ssearch;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();	
}
</script>
</html>
