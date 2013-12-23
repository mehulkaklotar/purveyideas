<?php 
			include_once("configure/configure.php");
			$sql="select * from sysadmin where username='".$_SESSION['user']."'";
			$res=mysql_query($sql);
			$row=mysql_fetch_array($res);
			$rights=$row['rights'];
			$rights=explode(",",$rights);
			$flag=0;
		?>
<div id="menu" class="tabsmenuclass">
<ul>
	
	<li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="welcome.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="welcome.php" rel="gotsubmenu[selected]">Home</a></li>	
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
					 <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="masters.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="country.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="state.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="city.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="category.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="source.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="country.php" rel="gotsubmenu">Master</a></li>
					<?php $flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
     <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="group.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="group.php" rel="gotsubmenu">Groups</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="4")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
   <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="contact.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="contact.php" rel="gotsubmenu">Contacts</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="5")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="searchcombo.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="searchcombo.php" rel="gotsubmenu">Search</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="7")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="select.php?type=category" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="select.php?type=source"  || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="select_location.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="select.php?type=category" rel="gotsubmenu">Reports</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="9")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="export.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="import.php" ){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="export.php" rel="gotsubmenu">Backup</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="10")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="news.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="news_operation.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="news.php" rel="gotsubmenu">Newsletter</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="12")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="schedule.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="eschedule.php"  || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="eschedule_operation.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="schedule.php" rel="gotsubmenu">Scheduler</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="14")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="smstemp.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="emailtemp.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="emailtemp_operation.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="smstemp.php" rel="gotsubmenu">Template</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="13")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="gallery.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="gallery.php" rel="gotsubmenu">Gallery</a></li>
<?php	$flag=0;
				}
				for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="6" || $rights[$i]=="11" || $rights[$i]=="8")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>     
    <li <?php if(substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="security.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="settings.php" || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="cms.php"  || substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1)=="cms_operation.php"){ ?> class="menuitem1" <?php }else{?> class="menuitem" <?php } ?>><a href="security.php" rel="gotsubmenu">More</a></li>
<?php $flag=0; } ?>
</ul>
</div>


<script type="text/javascript">
//mouseovertabsmenu.init("tabs_container_id", "submenu_container_id", "bool_hidecontentsmouseout")
mouseovertabsmenu.init("menu", "submenu", true)

</script>










