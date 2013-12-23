<?php include_once("configure/configure.php"); ?>
<?php      
if(isset($_POST['register']))
{
	
		$to = "Purwayidea.com";
		$subject = 'Purwayidea.com Contact Request';
		$msg = "New Contact request have been recieved: \n\n";
		$msg .="Details are as belowed: \n\n";
		$msg .="Name: $_POST[name] \n";
		$msg .="Email: $_POST[email] \n";
		$msg .="Subject: $_POST[subject] \n";
		$msg .="Message: $_POST[message] \n";
		
		$msg .="Regards, \n team.";
		$email = $_POST['email'];
		$headers = 'From: ' . $email . "\r\n" .
					'Reply-To: ' . $email . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();
		 
		@mail($to, $subject, $msg, $headers);
		echo "<script>location.href='thanks.php';</script>";	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Purvey Ideas</title>
<link href="style.css" rel="stylesheet" type="text/css" />
  
 <script type="text/javascript" src="js/mootools.js"></script>
<script type="text/javascript" src="js/formcheck.js"></script>
<script type="text/javascript">
	window.addEvent('domready', function(){check = new FormCheck('third', {
		display : {
			fadeDuration : 500,
			errorsLocation : 1,
			indicateErrors : 1,
			showErrors : 1
		}
	})});
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/bookmarkscroll.js"></script>
<script>



var imgarray=new Array();
 <?php
     $sql="select * from gallery";
	 
	 $res=mysql_query($sql);
	 $cnt=-1;
	 while($row=mysql_fetch_array($res))
	 {
	 $cnt++;
?>
	imgarray[<?php echo $cnt; ?>]="uploadfiles/<?php echo $row['name'] ?>";

<?php } ?>


var cnt=0;

function abc(a)
{	
	
	document.getElementById("original").src=imgarray[a];
	
	cnt=a;
	switch(a)
	{
		case 0:
			document.getElementById("img0").src="images/btngreen.png";
			document.getElementById("img1").src="images/btnwhite.png";
			document.getElementById("img2").src="images/btnwhite.png";
			document.getElementById("img3").src="images/btnwhite.png";
			
			document.getElementById("imgtext1").style.display="block";
			document.getElementById("imgtext2").style.display="none";
			document.getElementById("imgtext3").style.display="none";
			document.getElementById("imgtext4").style.display="none";
			break;
		case 1:
			document.getElementById("img1").src="images/btngreen.png";
			document.getElementById("img0").src="images/btnwhite.png";
			document.getElementById("img2").src="images/btnwhite.png";
			document.getElementById("img3").src="images/btnwhite.png";
			
			document.getElementById("imgtext1").style.display="none";
			document.getElementById("imgtext2").style.display="block";
			document.getElementById("imgtext3").style.display="none";
			document.getElementById("imgtext4").style.display="none";
			break;
		case 2:
			document.getElementById("img2").src="images/btngreen.png";
			document.getElementById("img0").src="images/btnwhite.png";
			document.getElementById("img1").src="images/btnwhite.png";
			document.getElementById("img3").src="images/btnwhite.png";
			
			
			document.getElementById("imgtext1").style.display="none";
			document.getElementById("imgtext2").style.display="none";
			document.getElementById("imgtext3").style.display="block";
			document.getElementById("imgtext4").style.display="none";
			break;
		case 3:
			document.getElementById("img3").src="images/btngreen.png";
			document.getElementById("img1").src="images/btnwhite.png";
			document.getElementById("img2").src="images/btnwhite.png";
			document.getElementById("img0").src="images/btnwhite.png";
			
			
			document.getElementById("imgtext1").style.display="none";
			document.getElementById("imgtext2").style.display="none";
			document.getElementById("imgtext3").style.display="none";
			document.getElementById("imgtext4").style.display="block";
	        break;
	}
	if(cnt==3)
	{
		cnt=0;
	}
	else
	{
		cnt++;	
	}			
}


function play()
{
	//alert("dsa");
	s=setInterval("abc(cnt)",3000);
}

function stop1()
{
	//alert("dsa");
	clearInterval(s);
}
var s=setInterval("abc(cnt)",3000);

var s1=setInterval("preloader(cnt)",1000);
	
function go_abt()
{
window.location.href="aboutus.php";

}	
function go_news()
{
window.location.href="newsletter.php";

}

function preloader(a)
{
heavyImage = new Image(); 
heavyImage.src = imgarray[a];

}

</script>

 <!--header end-->
  <!--main start-->
  

  </head>

<body>


  <div id="wraper">

 <div id="header" >
        <div id="logo" class="floatleft">
          <img src="images/newlogo.png" alt="logo" />
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
              <a  href="javascript:bookmarkscroll.scrollTo('#top')"><li class="style1">HOME</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('about1')"><li  >ABOUT US</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('service1')"><li>SERVICES</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('contactus1')"><li>CONTACT US</li></a>
          </ul>
</div>
 
  





      
     
<!--       <div id="blank"></div>      
--><div id="main">
        <div id="maincontent" > <!--main content start-->
        	 <?php
     $sql="select * from gallery";
	 
	 $res=mysql_query($sql);
	 $cnt=0;
	 while($row=mysql_fetch_array($res))
	 {	
			$a[$cnt]=$row['caption'];
			$cnt++;
	 } ?>
             <div id="left" class="floatleft">
                 <div id="imgtext1" class="imgtext" >
                   <span class="txtgreen">
				   <?php 
				   		$b=explode(" ",$a[0]);				   
						for($i=0;$i<strlen($b[0]);$i++)
						{
							echo " ".substr($b[0],$i,1);
						}				   		
				   ?>
                   </span><br />
                       <span class="txtgray">
					   <?php
                       		for($i=1;$i<count($b);$i++)
							{
								echo $b[$i]."<br>";
							}
					   ?>
                       </span>
                 </div>
                 <div id="imgtext2" class="imgtext">
                    <span class="txtgreen"><?php 
				   		$b=explode(" ",$a[1]);				   
						for($i=0;$i<strlen($b[0]);$i++)
						{
							echo " ".substr($b[0],$i,1);
						}				   		
				   ?>
                   </span><br />
                       <span class="txtgray">  
					   <?php
                       		for($i=1;$i<count($b);$i++)
							{
								echo $b[$i]."<br>";
							}
					   ?>
                             </span>
                 </div>
                 <div id="imgtext3" class="imgtext">
                     <span class="txtgreen"><?php 
				   		$b=explode(" ",$a[2]);				   
						for($i=0;$i<strlen($b[0]);$i++)
						{
							echo " ".substr($b[0],$i,1);
						}				   		
				   ?>
                   </span><br />
                       <span class="txtgray">  <?php
                       		for($i=1;$i<count($b);$i++)
							{
								echo $b[$i]."<br>";
							}
					   ?>
                            </span>
                 </div>
                 <div id="imgtext4" class="imgtext">
                     <span class="txtgreen">
                     <?php 
				   		$b=explode(" ",$a[3]);				   
						for($i=0;$i<strlen($b[0]);$i++)
						{
							echo " ".substr($b[0],$i,1);
						}				   		
				   ?>
                     </span><br />
                       <span class="txtgray"> <?php
                       		for($i=1;$i<count($b);$i++)
							{
								echo $b[$i]."<br>";
							}
					   ?>
                             </span>
                 </div> 
                   
                
             </div>
             <div id="right" class="floatleft"  onmouseover="stop1()" onmouseout="play();">  
             <img src="baner.jpg" class="bgimg" id="original" height="437" width="521" />           	
             <img src="images/navigationbar.png"  class="fgimg"/> 
             <a onclick="abc(0);"><img src="images/btngreen.png" class="btnimg" id="img0" /></a>
             <a onclick="abc(1);"><img src="images/btnwhite.png" class="btnimg1" id="img1"/></a>
             <a onclick="abc(2);"><img src="images/btnwhite.png" class="btnimg2" id="img2"/></a>
             <a onclick="abc(3);"><img src="images/btnwhite.png" class="btnimg3" id="img3"/></a>
             </div> 
              
             
          <div class="clear"></div>
          
        </div><!--main content end-->
        
       <div id="content"> <!-- content start-->
          <!--<div id="c1" class="floatleft">
                <div id="news">
                     <div id="news_head">
                        Newsletter
                     </div>
                     <div id="news_main">
                     <form action="newsletter.php" method="post" enctype="multipart/form-data">
                       <input type="text" class="txtnews" name="txtname"  value="Enter Your Name Here.." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/><br /><br />
                        <input type="text" class="txtnews" name="txtemail" value="Enter Your Email Here.." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                     </div>
                     <div id="news_footer">
                        <input type="submit" class="btnnews" value="Subscribe Now"  />
                        </form>
                     </div>
                 </div>
            
          </div>-->
          
          <div id="c2" class="floatleft">
              <div class="heading">
                  Welcome!
              </div>
              <div class="text" >
             	<?php
                $sql="select * from cms where cms_title='Profile'";
				$res=mysql_query($sql);
				$row=mysql_fetch_array($res);
				?>
                 <?php echo $row[2]; ?>
              </div>
              <div align="center">
                <input type="button" value=" " class="btnmore" />
              </div>
          </div>
          
          
          <div id="c3" class="floatright">
          
              <div class="heading">
                  About Us
              </div>
              <div class="text" >
                <?php
                $sql="select * from cms where cms_title='About Us'";
				$res=mysql_query($sql);
				$row=mysql_fetch_array($res);
				?>
                 <?php echo $row[2]; ?>
              </div>
          
              <div align="center">
                <input type="button" value=" " class="btnmore" onclick="javascript:bookmarkscroll.scrollTo('about1')" />
              </div>
              
          </div>
          
        </div>
          
          <div class="clear"></div>
           
        <div id="back">
        <a name="aboutus"></a>
         <div id="about1">
         
         <div id="wraper">

 <div id="header" >
        <div id="logo" class="floatleft">
          <img src="images/newlogo.png" alt="logo" />
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
              <a  href="javascript:bookmarkscroll.scrollTo('#top')"><li  >HOME</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('about1')"><li class="style1">ABOUT US</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('service1')"><li>SERVICES</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('contactus1')"><li>CONTACT US</li></a>
          </ul>
</div>
 
  





         </div>
                 
         <div id="about">         
           <?php 
				 $sql="select * from cms where cms_title='About Us'";
				$res=mysql_query($sql);
				$row=mysql_fetch_object($res);
				?>            
                 <table width="100%"> 
                 <tr>
                 	<td class="heading">
				 		<?php echo stripslashes($row->cms_title); ?></td>
                 	<td align="right">&nbsp;</td>
                 </tr>
                 <tr>
                 	<td class="text">
                		<?php echo stripslashes($row->cms_desc); ?>
                	</td>
                </tr>
            	</table>
            </div>
            
           
         <div id="service1">
         <a name="service2"></a>
         <div id="wraper">

 			<div id="header" >
        	<div id="logo" class="floatleft">
          	<img src="images/newlogo.png" alt="logo" />
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
              <a  href="javascript:bookmarkscroll.scrollTo('#top')"><li  >HOME</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('about1')"><li  >ABOUT US</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('service1')"><li class="style1">SERVICES</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('contactus1')"><li>CONTACT US</li></a>
          </ul>
</div>
 
  




</div>
          
            <div id="service">
              
			 <?php 
				 $sql="select * from cms where cms_title='Services'";
				$res=mysql_query($sql);
				$row=mysql_fetch_object($res);
				?>
              <table width="100%"> 
                 <tr>
                 	<td class="heading">
				 		<?php echo stripslashes($row->cms_title); ?></td>
                 	<td align="right">&nbsp;</td>
                 </tr>
                 <tr>
                 	<td class="text">
                		<?php echo stripslashes($row->cms_desc); ?>
                	</td>
                </tr>
            	</table>
           </div>  
           <a name="contactus2"></a>
           <div id="contactus1"><div id="wraper">

 <div id="header" >
        <div id="logo" class="floatleft">
          <img src="images/newlogo.png" alt="logo" />
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
              <a  href="javascript:bookmarkscroll.scrollTo('#top')"><li  >HOME</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('about1')"><li  >ABOUT US</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('service1')"><li>SERVICES</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('contactus1')"><li class="style1">CONTACT US</li></a>
          </ul>
</div>
 
  




</div>
          
           <div id="contactus">  
           
              <?php 
				 $sql="select * from cms where cms_title='Contact Us'";
				$res=mysql_query($sql);
				$row=mysql_fetch_object($res);
				?>
            <div  class="heading">
                <table width="100%">
                 <tr><td> <?php echo $row->cms_title; ?>
                 </td>
                 <td align="right">&nbsp;</td>
                 </tr>
                 </table>
              </div> 
             
                <div id=address class=address>
                   <p><span class="adds">Address:</span>
                   <?php
				   $sql="select * from cms where cms_id=4";
				   $res=mysql_query($sql);
				   $row=mysql_fetch_array($res);
				   echo $row['cms_desc'];
				    ?>
                </div>
           <div id="contact">
                 <form name="frmregister" method="post" action="" id="third" class="niceform">
						<table width="70%" border="0" cellspacing="2" cellpadding="2">
                          <tr>
                            <td colspan="2" align="center"><?php if(isset($msg)){echo $msg;}?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" id="text_box" class="validate['required']" /></td>
                          </tr>
                          <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email"  value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" id="text_box" class="validate['required','email']" /></td>
                          </tr>
                          <tr>
                            <td>Subject:</td>
                            <td><input type="text" name="subject"  value="<?php if(isset($_POST['subject'])){echo $_POST['subject'];}?>" id="text_box" class="validate['required']" /></td>
                          </tr>
                          <tr>
                            <td valign="top">Message:</td>
                            <td><textarea name="message" rows="6" cols="40" class="textarea" ><?php if(isset($_POST['message'])){echo $_POST['message'];}?></textarea></td>
                          </tr>
                          <tr></tr>
                          <tr></tr>
                          <tr>
                            <td>&nbsp;</td>
                             <td><input type="submit" name="register" value="Submit" class="button" />&nbsp;<input type="reset" name="clear" class="button" value="Clear"  /></td>
                          </tr>
                        </table>
</form>
             		 </div> 
             	</div>  
          
        </div><!-- back end--> 
    
    <div id="f1">
      <div class="footer">
        Purvey Ideas @ 2011
     </div>
    </div>
 </div><!--main end--> 
</body>
</html>
