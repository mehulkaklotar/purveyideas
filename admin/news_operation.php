<?php
include("configure/configure.php");
include("configure/sessioncheck.php");

?>
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

<?php


$sql="select * from newsletter";
if(isset($_REQUEST['search']))
{
$search = $_REQUEST['search'];
}
else
{
$search="";
}
if($_REQUEST['op']=='insert')
{
$sqlinsert="insert into newsletter set news_sub='".addslashes($_REQUEST['txtsub'])."',news_content = '".addslashes($_REQUEST['content'])."', date_added=now()";

mysql_query($sqlinsert);

$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="10")
	{
		$flag=1;
	}					
}
if($flag!=1)
{
	echo '<script>history.go(-1);</script>';
}
include("header.php");
include("menu.php");?>
<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<?php	
				
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="10")
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
<?php
}

if($_REQUEST['op']=='edit')
{
$sqlupdate="update newsletter set news_sub='".addslashes($_REQUEST['txtsub'])."',news_content = '".addslashes($_REQUEST['content'])."' where news_id=".$_REQUEST['id'];

mysql_query($sqlupdate);
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="10")
	{
		$flag=1;
	}					
}
if($flag!=1)
{
	echo '<script>history.go(-1);</script>';
}
include("header.php");
include("menu.php");
?>
<div id="submenu" >

<!--1st link within submenu container should point to the external submenu contents file-->
<?php	
				
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="10")
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
<?php
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_REQUEST['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{	
	  
	    $sql_delete="delete from newsletter where news_id in(".$id_del.") ";
		mysql_query($sql_delete) ;
	  
	}
	if($_REQUEST['lastpage']==$_REQUEST['page'])
	{		
		//echo count($id_delete);
		//echo $_REQUEST['lpr'];
		if(count($id_delete)-1==$_REQUEST['lpr'])
		{
			$del_last="true";
			//echo $_REQUEST['page'];
		}
	}
}

if($_REQUEST['op']=='search')
{
$sql=  "select * from newsletter where news_sub like '%".$search."%'  " ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from newsletter";
					
		}
?>
    
<?php 
if(isset($_REQUEST['aa']))
{
	?><div id="maincontent">
	<?php include("news1.php"); ?></div><?php 
}
else
{
include("pagingnews.php"); 
}?>
<script language="javascript">

function validate()
{
	//alert("hello");
	if(document.getElementById("txtsub").value=="")
	{
		alert("Please enter the Subject");
		return false;
	}
	var oEditor = FCKeditorAPI.GetInstance('content') ;
	var content =  oEditor.GetXHTML(true);
	if(content=="")
	{
		alert("Please enter the Content");
		return false;
	}
	return true;
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
		xmlhttp.open("GET","pagingnews.php?page="+d+"&page_no_start="+p+"&flag="+f+"&search="+s+"&reclimit="+r+"&rn="+Math.random(),true);
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

function checkall()
{
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
} 		
		
function checknone()
{			
		
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
	 document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
	}
   }
   var ssearch = document.getElementById("txtsearch").value;
   var r = document.getElementById("sel_limit").value;
   var url = "addnews.php?reclimit="+r;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
  }
  
function sendmail(r,f,news_id)
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
	 var ids="";
   for(var i=1;i<=md.length-1;i++)
   {
     if(eval("document.getElementById('C1_"+md[i]+"').checked==true"))
	  {		
	   ids  += "," + md[i] ;
	  }
    }
	ids=ids.substring(1,ids.length);
	if(ids=="")
	{
		alert("Please select at least one group");
		return false;
	}
	var subject = document.getElementById("txtsub").value;
	 var oEditor = FCKeditorAPI.GetInstance('content') ;
	 var content =  oEditor.GetXHTML(true);	
	
   if(f==1)
   {
   		var op="edit";
   } 
   else
   {
   		var op="insert";
   }
   var url = "sendnews.php?reclimit="+r+"&op="+op+"&ids="+ids+"&nid="+news_id+"&subject="+subject+"&content="+content;
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
     var url = "news_operation.php?id_delete="+id_delete +"&op=delete&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&reclimit="+r+"&lpr="+lpr+"&search="+ssearch+"&rn="+Math.random() ;
    }
	else
	{
	  return checknone();
	}
   
   }
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
  // document.getElementById("ajaxapp").style.display="none";
  }

  
  
  function insert(r)
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
     var subject = document.getElementById("txtsub").value;
	 var oEditor = FCKeditorAPI.GetInstance('content') ;
	 //var pageValue =	
	 var content =  oEditor.GetXHTML(true);
		/*alert(content);
		return;*/
	 
	// alert(name);
	
	 	
		if(subject=="")
		{
		     //alert("Please enter country Name...!");
			 document.getElementById("txtsub").focus();
			 document.getElementById("d_txtsub").innerHTML="*";
			 return;
		
		}
		
		 		
		else
			{
			 var url = "news_operation.php";
			  xmlhttp.open("POST",url,true);
			var params="subject="+subject+"&content="+content+"&aa=yes&op=insert";
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", params.length);
		xmlhttp.setRequestHeader("connection", "close");
			  xmlhttp.send(params);
			}    
	 //document.getElementById("ajaxapp").style.display="none";
 }
  function news_edit(id,de,p,f,lp,lpr,r)
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
     var subject = document.getElementById("txtsub").value;
	 var oEditor = FCKeditorAPI.GetInstance('content') ;
	 //var pageValue = 
	 var content =  oEditor.GetXHTML(true);
		//alert(content);
		
	 
	// alert(name);
	
		if(subject=="")
		{
		     //alert("Please enter country Name...!");
			 document.getElementById("txtsub").focus();
			 document.getElementById("d_txtsub").innerHTML="*";
			 return;
		
		}
		 		
		else
			{
			 var url = "news_operation.php";
			  xmlhttp.open("POST",url,true);
			var params="id="+id+"&aa=yes&op=edit&subject="+subject+"&content="+content+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", params.length);
		xmlhttp.setRequestHeader("connection", "close");
			  xmlhttp.send(params);			 			 
			}	 
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
    
			 var url = "addnews.php";
			 var s=document.getElementById("txtsearch").value;
			 url = url +"?id="+cid+"&op=update&search="+s+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();
			
	
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
	  	    var url="news_operation.php?search="+ssearch +"&op=search&reclimit="+r ;
    		
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
	  	    var url="news_operation.php?op=allsearch&reclimit="+r ;
    		
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
	 if(f=="1")
	 {
	 	var field="news_sub";
	 }
	 else if(f=="2")
	 {
	 	var field="date_added";
	 }
	 else
	 {
	 	var field="news_content";
	 }
	
	  	    var url="pagingnews.php?search="+ssearch +"&op=search&order=asc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random() ;    		
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
   var url = "pagingnews.php?reclimit="+reclimit+"&search="+ssearch;
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
   var url = "pagingnews.php?reclimit="+reclimit+"&page="+page+"&pns="+pns+"&search="+ssearch;
   xmlhttp.open("GET",url,true);
   xmlhttp.send();	
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
	 	var field="news_sub";
	 }
	 else if(f=="2")
	 {
	 	var field="date_added";
	 }
	 else
	 {
	 	var field="news_content";
	 }
	 var ssearch = document.getElementById("txtsearch").value;
	
	  	    var url="pagingnews.php?search="+ssearch+"&op=search&order=desc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);	
	 
  }


</script>
</html>