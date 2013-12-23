<?php 
$s="select * from sysadmin where username='".$_SESSION['user']."'";
$rs=mysql_query($s);
$p=mysql_fetch_array($rs);
$rights=explode(",",$p['rights']);
$subrights=explode(",",$p['subrights']);
$ssrights=explode(",",$p['ssrights']);
?>