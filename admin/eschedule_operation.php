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



$sql="select * from eschedule";
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
$ids="";


if($_REQUEST['groups']=="")
{
	echo "<script>alert('plaese select at least one group');</script>";
}
else{
$groups=$_REQUEST['groups'];
for($i=0;$i<count($groups);$i++)
{
	$ids.=",".$groups[$i];
}
$ids=substr($ids,1);

$schedule=$_REQUEST['txtschedule']." ".$_REQUEST['hour'].":".$_REQUEST['minute'].":".$_REQUEST['second'];

$sqlinsert="insert into eschedule set email_msg='".addslashes($_REQUEST['content'])."',email_group='".$ids."',email_schedule='".$schedule."'";

mysql_query($sqlinsert);
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="12")
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
					if($rights[$i]=="12")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
<div >
<ul>
	<li class="submenuitem"><a href="schedule.php">SMS Scheduler </a> |</li>
    <li class="submenuitem"><a href="eschedule.php">E-MAIL Scheduler </a> </li>
    
    
</ul>
</div>
<?php	$flag=0;
				}
?>

</div>

<?php
}
}
if($_REQUEST['op']=='edit')
{
$ids="";
if($_REQUEST['groups']=="")
{
	echo "<script>alert('plaese select at least one group');</script>";
	die();
}
else{
$groups=$_REQUEST['groups'];
for($i=0;$i<count($groups);$i++)
{
	$ids.=",".$groups[$i];
}
$ids=substr($ids,1);

$schedule=$_REQUEST['txtschedule']." ".$_REQUEST['hour'].":".$_REQUEST['minute'].":".$_REQUEST['second'];
$sqlupdate="update eschedule set email_msg='".addslashes($_REQUEST['content'])."',email_group='".$ids."',email_schedule='".$schedule."' where email_id=".$_REQUEST['editid'];

mysql_query($sqlupdate);
$flag=0;
$sql = "select * from sysadmin where username='".$_SESSION['user']."'";
$res=mysql_query($sql);
$r=mysql_fetch_array($res);
$rights=explode(",",$r['rights']);
$subrights=explode(",",$r['subrights']);
for($i=0;$i<count($rights);$i++)
{
	if($rights[$i]=="12")
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
					if($rights[$i]=="12")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
<div >
<ul>
	<li class="submenuitem"><a href="schedule.php">SMS Scheduler </a> |</li>
    <li class="submenuitem"><a href="eschedule.php">E-MAIL Scheduler </a> </li>
    
    
</ul>
</div>
<?php	$flag=0;
				}
?>

</div>

<?php
}
}
if($_REQUEST['op']=='delete')
{

$id_delete=$_REQUEST['id_delete'];
$id_del=substr($id_delete,1);
$id_delete=explode(",",$id_delete);
  
  if($id_delete!="")
	{	
	  
	    $sql_delete="delete from eschedule where email_id in(".$id_del.") ";
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
$sql=  "select * from eschedule where email_msg like '%".$search."%' or email_group like '%".$search."%' or email_schedule like '%".$search."%'" ;
					
		}
if($_REQUEST['op']=='allsearch')
{
$sql="select * from eschedule";
					
		}
?>
    
<?php 
if(isset($_REQUEST['aa']))
{
	?><div id="maincontent">
	<?php include("eschedule1.php"); ?></div><?php
}
else
{
include("pagingeschedule.php"); 
}?>
<script language="javascript">


function template_change()
{
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
 				document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
 			}
 		};
		var id=document.getElementById("sel_temp").value;
		var schedule=document.getElementById("txtschedule").value;
	 	var hour=document.getElementById("hour").value;
		var minute=document.getElementById("minute").value;
		var second=document.getElementById("second").value;
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
		var editid=document.getElementById("editid").value;
		//alert("addschedule.php?tid="+id+"&msg="+msg+"&mask="+mask+"&schedule="+schedule+"&hour="+hour+"&minute="+minute+"&second="+second+"&ids="+ids+"&editid="+editid);
		xmlhttp.open("GET","addeschedule.php?tid="+id+"&schedule="+schedule+"&hour="+hour+"&minute="+minute+"&second="+second+"&ids="+ids+"&editid="+editid,true);
		xmlhttp.send(null);	
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
		xmlhttp.open("GET","pagingeschedule.php?page="+d+"&page_no_start="+p+"&flag="+f+"&search="+s+"&reclimit="+r+"&rn="+Math.random(),true);
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
   var url = "addeschedule.php?reclimit="+r;
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
     var url = "eschedule_operation.php?id_delete="+id_delete +"&op=delete&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&reclimit="+r+"&lpr="+lpr+"&search="+ssearch+"&rn="+Math.random() ;
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
  
  
   function validate()
 {
 	 var oEditor = FCKeditorAPI.GetInstance('content') ;
	 var msg =  oEditor.GetXHTML(true);
	 
	 var schedule=document.getElementById("txtschedule").value;
	
	 
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
		if(msg=="")
		{
		     alert("Please enter the message...!");			 
			 return false;
		
		}
		
		if(schedule=="")
		{
		     alert("Please select Schedule Date...!");			 			 
			 return false;		
		}	
		if(document.getElementById("hour").value=="HH")
		{
			 alert("Please select Schedule Hour...!");			 			 
			 return false;	
		}
		if(document.getElementById("minute").value=="MM")
		{
			 alert("Please select Schedule Minute...!");			 			 
			 return false;	
		}
		if(document.getElementById("second").value=="SS")
		{
			 alert("Please select Schedule Second...!");			 			 
			 return false;	
		}
		return true;
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
     var oEditor = FCKeditorAPI.GetInstance('content') ;
	 //var pageValue =	
	 var msg =  oEditor.GetXHTML(true);
	 var schedule=document.getElementById("txtschedule").value;
	 schedule+=" "+document.getElementById("hour").value+":"+document.getElementById("minute").value+":"+document.getElementById("second").value;
	 
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
		if(msg=="")
		{
		     alert("Please enter the message...!");			 
			 return;
		
		}
		
		if(schedule=="")
		{
		     alert("Please select Schedule...!");			 			 
			 return;		
		}
		
		 		
		else
			{
			
			var url = "eschedule_operation.php";
			  xmlhttp.open("POST",url,true);
			var params="aa=yes&op=insert&msg="+msg+"&schedule="+schedule+"&ids="+ids+"&reclimit="+r;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", params.length);
		xmlhttp.setRequestHeader("connection", "close");
			  xmlhttp.send(params);	
			 
			}		
 }
  function schedule_edit(id,de,p,f,lp,lpr,r)
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
     var oEditor = FCKeditorAPI.GetInstance('content') ;
	 //var pageValue =	
	 var msg =  oEditor.GetXHTML(true);
	 var schedule=document.getElementById("txtschedule").value;
	 schedule+=" "+document.getElementById("hour").value+":"+document.getElementById("minute").value+":"+document.getElementById("second").value;
	 
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
		if(msg=="")
		{
		     alert("Please enter the message...!");			 
			 return;
		
		}
		
		if(schedule=="")
		{
		     alert("Please select Schedule...!");			 			 
			 return;		
		}
		 		
		else
			{
			var url = "eschedule_operation.php";
			  xmlhttp.open("POST",url,true);
			var params="id="+id +"&aa=yes&op=edit&msg="+msg+"&schedule="+schedule+"&ids="+ids+"&page="+de+"&flag="+f+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r;
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", params.length);
		xmlhttp.setRequestHeader("connection", "close");
			  xmlhttp.send(params);							 
			}	
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
    
			 var url = "addeschedule.php";
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
	  	    var url="eschedule_operation.php?search="+ssearch +"&op=search&reclimit="+r ;
    		
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
	  	    var url="eschedule_operation.php?op=allsearch&reclimit="+r ;
    		
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
	 	var field="email_msg";
	 }	 
	 else if(f=="3")
	 {
	 	var field="email_schedule";
	 }
	 else
	 {
	 	var field="email_group";
	 }
	
	  	    var url="pagingeschedule.php?search="+ssearch +"&op=search&order=asc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random() ;    		
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
   var url = "pagingeschedule.php?reclimit="+reclimit+"&search="+ssearch;
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
   var url = "pagingeschedule.php?reclimit="+reclimit+"&page="+page+"&pns="+pns+"&search="+ssearch;
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
	 	var field="email_msg";
	 }
	 if(f=="3")
	 {
	 	var field="email_schedule";
	 }
	 if(f=="4")
	 {
	 	var field="email_group";
	 }
	 var ssearch = document.getElementById("txtsearch").value;
	
	  	    var url="pagingeschedule.php?search="+ssearch+"&op=search&order=desc&field="+field+"&page="+de+"&flag="+f1+"&page_no_start="+p+"&lastpage="+lp+"&lpr="+lpr+"&reclimit="+r+"&rn="+Math.random();    		
    		xmlhttp.open("GET",url,true);
    		xmlhttp.send(null);	
	 
  }


</script>
</html>