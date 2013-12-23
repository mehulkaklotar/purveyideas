<?php 
include_once("configure/configure.php");
$f1=0;
$f2=0;
if(isset($_GET['user']))
{
	mysql_query("update sysadmin set rights='".$_GET['rights']."',subrights='".$_GET['subrights']."',ssrights='".$_GET['ssrights']."' where user_id='".$_GET['user']."'");
}
$usql="select * from sysadmin where username!='".$_SESSION['user']."'";
$ures=mysql_query($usql);
if(mysql_num_rows($ures)>0)
{?>

<?php 
if(isset($_GET['user']))
{
	$rq=mysql_query("select * from sysadmin where user_id=".$_GET['user']);
	$row=mysql_fetch_array($rq);
	echo "<center><b><h2>Settings Changed for ".$row['username']."</h2></b></center>";
}
?>

<center><b><h3>Edit User Settings</h3></b></center>
<form name="frmsecurity" class="editsecurity">
<table align="center">

<tr>
	<td>
		Select User :
	</td>
    <td align="left" width="200">
<select name="users" class="combostyle" id="users" onChange="loadrights(<?php echo $_GET['reclimit'] ?>);">
<option value="0">Select user</option>

<?php
$checkrec="";
	while($urow=mysql_fetch_array($ures))
	{
?>
 	<option value="<?php echo $urow['user_id']; ?>" <?php if(isset($_GET['id'])){if($_GET['id']==$urow['user_id']){echo 'selected="selected"';}} ?>><?php echo $urow['username']; ?></option>
<?php } ?>
</select>
</td>
<td width="100"></td>
</tr>
<tr>
	<td valign="top">Select Rights :</td>
    <td>
    	<table>
        	<?php 
				if(isset($_GET['id']))
				{
					$rc=mysql_query("select * from sysadmin where user_id=".$_GET['id']);
					$rowc=mysql_fetch_array($rc);
					$rights=$rowc['rights'];
					$subrights=$rowc['subrights'];
					$ssrights=$rowc['ssrights'];
					$rights=explode(",",$rights);
					$subrights=explode(",",$subrights);
					$ssrights=explode(",",$ssrights);
				}
				$rsql="select * from rights";
				$rres=mysql_query($rsql);
				$total_id="0";
				while($rrow=mysql_fetch_array($rres))
				{
					$f=0;
					$total_id.=",".$rrow['right_id'];
			?>
            	<tr>
                	<td valign="top" nowrap="nowrap"><input type="checkbox"  
                    <?php if($rrow['right_id']=="2" || $rrow['right_id']=="3" || $rrow['right_id']=="4" || $rrow['right_id']=="6" || $rrow['right_id']=="10" || $rrow['right_id']=="11" || $rrow['right_id']=="12" || $rrow['right_id']=="13" || $rrow['right_id']=="14"){ ?>
                    onclick="optch('C1_<?php echo $rrow['right_id']; ?>','opt<?php echo $rrow['right_id']; ?>');" 
					<?php } ?>
                    value="<?php echo $rrow['right_id'];?>" name="C1_<?php echo $rrow['right_id']; ?>" id="C1_<?php echo $rrow['right_id']; ?>" 
                    
                    <?php
					if(isset($rights))
					{
						for($i=0;$i<count($rights);$i++)
						{
							if($rrow['right_id']==$rights[$i])
							{
								echo 'checked="true"';
								$f=1;
								break;
							}
						}
					} 					
					?>
                    
                    ><?php echo $rrow['right_name']; ?></td>
                    <?php if(isset($rrow['right_id']) && $rrow['right_id']=="2" || $rrow['right_id']=="3" || $rrow['right_id']=="4" || $rrow['right_id']=="6" || $rrow['right_id']=="10" || $rrow['right_id']=="11" || $rrow['right_id']=="12" || $rrow['right_id']=="13" || $rrow['right_id']=="14")
					{ ?>
                    <td>
                    <div id="opt<?php echo $rrow['right_id']; ?>" <?php if($f==1){echo 'class="disop1"'; }else{echo 'class="disop2"';} ?> >
                    	<table>
                        <?php 
						$checkrec.=",".$rrow['right_id'].".1".",".$rrow['right_id'].".2".",".$rrow['right_id'].".3";
						?>
                        	<tr><td valign="top"><input type="checkbox" id="<?php echo $rrow['right_id'].".1"; ?>"  <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($subrights);$i++)
						{
							if($rrow['right_id'].".1"==$subrights[$i])
							{
								echo 'checked="true"';
								$f1=1;
								break;
							}
							$f1=0;
						}
					} 					
					?> <?php if($rrow['right_id']=="4"){?> onclick="rightch('<?php echo $rrow['right_id'].".1"; ?>','contactadd');" <?php } ?>/></td><td valign="top">Add</td>
                    <?php if($rrow['right_id']=="4"){?>
					<td>
                    <div id="contactadd" <?php if($f1==1){echo 'class="disop1"'; }else{echo 'class="disop2"';} ?>>
                    	<table>
                        	<tr>
                            	<td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".1.1"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".1.1"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/>
                                </td>
                                <td>Personal</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".1.2"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".1.2"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?> />
                                </td>
                                 <td>Organizational</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".1.3"; ?>"  <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".1.3"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/>
                                </td>
                                 <td>Communication</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".1.4"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".1.4"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?> />
                                </td>
                                 <td>Other</td>
                            </tr>
                        </table>
                    </div>
                    </td>
					<?php }?>
                    </tr>
                            <tr><td valign="top"><input type="checkbox" id="<?php echo $rrow['right_id'].".2"; ?>"  <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($subrights);$i++)
						{
							if($rrow['right_id'].".2"==$subrights[$i])
							{
								echo 'checked="true"';
								$f2=1;
								break;
							}
							$f2=0;
						}
					} 					
					?> <?php if($rrow['right_id']=="4"){?> onclick="rightch('<?php echo $rrow['right_id'].".2"; ?>','contactedit');" <?php } ?>					
					/></td><td valign="top">Edit</td>
                     <?php if($rrow['right_id']=="4"){?>
					<td>
                    <div id="contactedit" <?php if($f2==1){echo 'class="disop1"'; }else{echo 'class="disop2"';} ?>>
                    	<table>
                        	<tr>
                            	<td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".2.1"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".2.1"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/>
                                </td>
                                <td>Personal</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".2.2"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".2.2"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?> />
                                </td>
                                 <td>Organizational</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".2.3"; ?>"  <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".2.3"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/>
                                </td>
                                 <td>Communication</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".2.4"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".2.4"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?> />
                                </td>
                                 <td>Other</td>
                            </tr>
                        </table>
                    </div>
                    </td>
					<?php }?>
                    </tr> 
                    <?php 
					if($rrow['right_id']==4)
					{
					?>
                    <tr><td valign="top"><input type="checkbox" id="<?php echo $rrow['right_id'].".4"; ?>"  <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($subrights);$i++)
						{
							if($rrow['right_id'].".4"==$subrights[$i])
							{
								echo 'checked="true"';
								$f1=1;
								break;
							}
							$f1=0;
						}
					} 					
					?> <?php if($rrow['right_id']=="4"){?> onclick="rightch('<?php echo $rrow['right_id'].".4"; ?>','contactview');" <?php } ?>/></td><td valign="top">View</td>
                    <?php if($rrow['right_id']=="4"){?>
					<td>
                    <div id="contactview" <?php if($f1==1){echo 'class="disop1"'; }else{echo 'class="disop2"';} ?>>
                    	<table>
                        	<tr>
                            	<td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".4.1"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".4.1"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/>
                                </td>
                                <td>Personal</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".4.2"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".4.2"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?> />
                                </td>
                                 <td>Organizational</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".4.3"; ?>"  <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".4.3"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/>
                                </td>
                                 <td>Communication</td>
                                </tr>
                                <tr>
                                <td>
                                	<input type="checkbox" id="<?php echo $rrow['right_id'].".4.4"; ?>"  <?php
					if(isset($ssrights))
					{
						for($i=0;$i<count($ssrights);$i++)
						{
							if($rrow['right_id'].".4.4"==$ssrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?> />
                                </td>
                                 <td>Other</td>
                            </tr>
                        </table>
                    </div>
                    </td>
					<?php }?>
                    </tr>    
                    <?php }?>                       
                            <tr><td><input type="checkbox" id="<?php echo $rrow['right_id'].".3"; ?>"   <?php
					if(isset($subrights))
					{
						for($i=0;$i<count($subrights);$i++)
						{
							if($rrow['right_id'].".3"==$subrights[$i])
							{
								echo 'checked="true"';
							}
						}
					} 					
					?>/></td><td>Delete</td></tr>                            
                        </table></div>
                    </td>
					<?php }?>
                </tr>
            <?php } ?>
            <input type="hidden" value="<?php echo $total_id; ?>" id="total_ids" name="total_ids" />
            <input type="hidden" value="<?php echo $checkrec; ?>" id="checkrec" name="checkrec" />
        </table>
    </td>
</tr>
<tr>
	<td colspan="3">
    	<table>
        	<tr>
            	<td>
                	<input type="button" value="Check All" class="regbtn1" onClick="checkallr();">
              	</td>
                <td>
                	<input type="button" value="Check None" class="regbtn1"  onClick="checknoner();">
              	</td>
                <td>
                	<input type="button" value="Grant Rights" class="regbtn1" onClick="grant(<?php  echo $_GET['reclimit'];?>);">
              	</td>
            </tr>
        </table>
    </td>
</tr>
</table>
</form>
<?php
}
else
{
?>

<center><h2><b>Sorryy.!! No users</b></h2></center>

<?php }?>