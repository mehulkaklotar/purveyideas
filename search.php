<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Purvey Ideas</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>


  <div id="wraper">

 <div id="header" >
        <div id="logo" class="floatleft">
          <img src="images/newlogo.png" alt="logo" />
        </div>
        <div id="search" class="floatright">
           <div style="float:left;">
           <form action="search.php" method="get">

           <input  type="text" class="txtsearch" name="query" id="query" size="40" autocomplete="off"
            value="<?php if(isset($_GET['query'])){ echo $_GET['query'];}else{echo "Search Site...";}?>" action="sphider/include/js_suggest/suggest.php" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /></div><div style="float:left; padding-left:2px;">
           <input type="submit" value="" class="btn" />
           
           
          <input type="hidden" name="search" value="1"> 
          </form> 
           </div>
           <div style="clear:both;"></div>
        </div>
        <div class="clear"></div>
  
  </div>
  
  
  
   <?php @$pagearr = explode("/",$_SERVER['PHP_SELF']);
				$cnt = count($pagearr);
				$cnt--;?>

<div id="menu" >
            <ul>
              <a  href="index.php"><li class="style1">HOME</li></a>
              <a href="index.php#aboutus"><li  >ABOUT US</li></a>
              <a href="index.php#service2"><li>SERVICES</li></a>
              <a href="index.php#contactus2"><li>CONTACT US</li></a>
          </ul>
</div>
 
  





 <!--header end-->
  <!--main start-->
  <div id="main">
      
        
        <div id="maincontent" class="maincontent" > <!--main content start-->
           
            <div class="a1">
            	<div class="heading1 floatleft">
                 	Search Result for : &nbsp;
                 </div> 				 
                 <div  class="keyword">
              		<?php echo $_GET['query']; ?>
              </div>
            </div> 
              
              
             <div id="sitesearch">
			 <?php
/*******************************************
* Sphider Version 1.3.x
* This program is licensed under the GNU GPL.
* By Ando Saabas          ando(a t)cs.ioc.ee
********************************************/
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); 
error_reporting(E_ALL); 
$include_dir = "sphider/include"; 
include ("$include_dir/commonfuncs.php");
//extract(getHttpVars());

if (isset($_GET['query']))
	$query = $_GET['query'];
if (isset($_GET['search']))
	$search = $_GET['search'];
if (isset($_GET['domain'])) 
	$domain = $_GET['domain'];
if (isset($_GET['type'])) 
	$type = $_GET['type'];
if (isset($_GET['catid'])) 
	$catid = $_GET['catid'];
if (isset($_GET['category'])) 
	$category = $_GET['category'];
if (isset($_GET['results'])) 
	$results = $_GET['results'];
if (isset($_GET['start'])) 
	$start = $_GET['start'];
if (isset($_GET['adv'])) 
	$adv = $_GET['adv'];
	
	
$include_dir = "sphider/include"; 
$template_dir = "sphider/templates"; 
$settings_dir = "sphider/settings"; 
$language_dir = "sphider/languages";


require_once("$settings_dir/database.php");
require_once("$language_dir/en-language.php");
require_once("$include_dir/searchfuncs.php");
require_once("$include_dir/categoryfuncs.php");


include "$settings_dir/conf.php";

include "$template_dir/$template/header.html";
include "$language_dir/$language-language.php";


if ($type != "or" && $type != "and" && $type != "phrase") { 
	$type = "and";
}

if (preg_match("/[^a-z0-9-.]+/", $domain)) {
	$domain="";
}


if ($results != "") {
	$results_per_page = $results;
}

if (get_magic_quotes_gpc()==1) {
	$query = stripslashes($query);
} 

if (!is_numeric($catid)) {
	$catid = "";
}

if (!is_numeric($category)) {
	$category = "";
} 



if ($catid && is_numeric($catid)) {

	$tpl_['category'] = sql_fetch_all('SELECT category FROM '.$mysql_table_prefix.'categories WHERE category_id='.(int)$_REQUEST['catid']);
}
	
$count_level0 = sql_fetch_all('SELECT count(*) FROM '.$mysql_table_prefix.'categories WHERE parent_num=0');
$has_categories = 0;

if ($count_level0) {
	$has_categories = $count_level0[0][0];
}



//require_once("$template_dir/$template/search_form.html");


function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }



function poweredby () {
	global $sph_messages;
    //If you want to remove this, please donate to the project at http://www.sphider.eu/donate.php
    print $sph_messages['Powered by'];?>  <a href="http://www.sphider.eu/"><img src="sphider-logo.png" border="0" style="vertical-align: middle" alt="Sphider"></a>

    <?php 
}


function saveToLog ($query, $elapsed, $results) {
        global $mysql_table_prefix;
    if ($results =="") {
        $results = 0;
    }
    $query =  "insert into ".$mysql_table_prefix."query_log (query, time, elapsed, results) values ('$query', now(), '$elapsed', '$results')";
	mysql_query($query);
                    
	echo mysql_error();
                        
}

switch ($search) {
	case 1:

		if (!isset($results)) {
			$results = "";
		}
		$search_results = get_search_results($query, $start, $category, $type, $results, $domain);
		require("$template_dir/$template/search_results.html");
	break;
	default:
		if ($show_categories) {
			if ($_REQUEST['catid']  && is_numeric($catid)) {
				$cat_info = get_category_info($catid);
			} else {
				$cat_info = get_categories_view();
			}
			require("$template_dir/$template/categories.html");
		}
	break;
	}

include "$template_dir/$template/footer.html";
?>
        </div>

         
          
            
            
        </div><!--main content end-->
        </div><!--main end--> 
     <!-- <div id="border" >
          <img src="images/newborder.png" alt="border" />
      </div>-->
    
      <div id="f1">
      <div id="footer">
        Purvey Ideas @ 2011
     </div>
    </div>
  
 
</div>

