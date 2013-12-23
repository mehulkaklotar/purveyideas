<?php include_once("configure/configure.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Purvey Ideas</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<script>
</script>
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
              <a href="index.php"><li  >HOME</li></a>
              <a href="index.php#aboutus"><li  >ABOUT US</li></a>
              <a href="index.php#service2"><li>SERVICES</li></a>
              <a href="index.php#contactus2"><li class="style1">CONTACT US</li></a>
          </ul>
</div>
 <!--header end-->
  <!--main start-->
  <div id="main">
      
        
        <div id="maincontent" class="maincontent" > <!--main content start-->
           
            <div  class="heading">
                 Thank You
              </div> 
              
             <div class="contact" >
             <div>
                  <img src="images/ic1.png" alt="Inverted Comma"/>
              </div>
               <div class="middle">
                Thank you for contact us. we will respond to you soon.
               </div>
                <div class=" floatright middle">
                  <img src="images/ic2.png" alt="Inverted Comma"/>
          	 </div>

         
         <div class="clear"></div>
             </div>  
            
            
        </div><!--main content end-->
        </div><!--main end--> 
      <div id="border" >
          <img src="images/newborder.png" alt="border" />
      </div>
    
     <div class="footer">
     Purvey Ideas @ 2011
  	 </div>
  
 
</div>

</body>
</html>
