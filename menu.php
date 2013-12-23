<?php @$pagearr = explode("/",$_SERVER['PHP_SELF']);
				$cnt = count($pagearr);
				$cnt--;?>

<div id="menu" >
            <ul>
              <a href="javascript:bookmarkscroll.scrollTo('#top')"><li <?php if($pagearr[$cnt] == "index.php") { echo "class='style1'";}?> >HOME</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('about1')"><li <?php if($pagearr[$cnt] == "aboutus.php") { echo "class='style1'";}?> >ABOUT US</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('service1')"><li <?php if($pagearr[$cnt] == "services.php") { echo "class='style1'";}?>>SERVICES</li></a>
              <a href="javascript:bookmarkscroll.scrollTo('contactus1')"><li <?php if($pagearr[$cnt] == "contactus.php" || $pagearr[$cnt] == "thanks.php" ) { echo "class='style1'";}?>>CONTACT US</li></a>
          </ul>
        </div>
       