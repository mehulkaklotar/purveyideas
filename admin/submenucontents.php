<?php 
			include_once("configure/configure.php");
			$sql="select * from sysadmin where username='".$_SESSION['user']."'";
			$res=mysql_query($sql);
			$row=mysql_fetch_array($res);
			$rights=$row['rights'];
			$rights=explode(",",$rights);
			$flag=0;
?>
<div class="tabsmenucontent">
<ul>

</ul>
</div>
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
<div class="tabsmenucontent">
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
                for($i=0;$i<count($rights);$i++)
				{
					if($rights[$i]=="3")
					{
						$flag=1;
					}					
				}
				if($flag==1)
				{?>
<div class="tabsmenucontent">
<ul>

</ul>
</div>
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
<div class="tabsmenucontent">
<ul>

</ul>
</div>
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
<div class="tabsmenucontent">
<ul>

</ul>
</div>
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
<div class="tabsmenucontent">
<ul>
	<li class="submenuitem"><a href="select.php?type=category">Category </a> |</li>
    <li class="submenuitem"><a href="select.php?type=source">Source </a> |</li>
    <li class="submenuitem"><a href="select_location.php">Location </a> </li>
    
</ul>
</div>
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
<div class="tabsmenucontent">
<ul>
	<li class="submenuitem"><a href="export.php">Export </a> |</li>
    <li class="submenuitem"><a href="import.php">Import </a> </li>
    
    
</ul>
</div>
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
<div class="tabsmenucontent">
<ul>

</ul>
</div>
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
<div class="tabsmenucontent">
<ul>
	<li class="submenuitem"><a href="schedule.php">SMS Scheduler </a> |</li>
    <li class="submenuitem"><a href="eschedule.php">E-MAIL Scheduler </a> </li>
    
    
</ul>
</div>
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
<div class="tabsmenucontent">
<ul>
	<li class="submenuitem"><a href="smstemp.php">SMS Template </a> |</li>
    <li class="submenuitem"><a href="emailtemp.php">E-MAIL Template </a> </li>
    
    
</ul>
</div>
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
<div class="tabsmenucontent">
<ul>

</ul>
</div>
<?php	$flag=0;
				}
			?>   

<div class="tabsmenucontent">
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

