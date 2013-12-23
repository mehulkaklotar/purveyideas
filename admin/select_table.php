<?php 
include("configure/configure.php");
?>
<?php 
if($_REQUEST['databases'] == 'sql')
{
}
else if($_REQUEST['databases'] == 'other')
{?>
<font face="Verdana, Arial, Helvetica, sans-serif">
<table border="0">
 <tr>
   <td colspan="2" align="center">&nbsp;  </td>
 </tr>
 <tr>
   <td colspan="2" align="center"> Choose Table : </td>
 </tr>
   <form name="frmtable" method="post">
    <tr>
       <td>Tables</td>
       <td>
   
           <select  name="seltable" id="seltable">
               <option value=""  >Select Table</option>
               <option value="<?php echo 'category_mst'?>">Contact Category</option>
               <option value="<?php echo 'city_mst'?>">City</option>
               <option value="<?php echo 'state_mst'?>">State</option>
               <option value="<?php echo 'country_mst'?>">Country</option>
                <option value="<?php echo 'groups'?>">Contact Group</option>
                 <option value="<?php echo 'source_mst'?>">Contact Source</option>                  
                   <option value="<?php echo 'contact_mst'?>">Contacts</option>
                <?php /*?> <?php 
			       $tables = array();
				   $result = mysql_query('SHOW TABLES');
				   while($row = mysql_fetch_row($result))
	            	{
					 if($row[0] != "login" and $row[0] != "sysadmin" and $row[0] != "rights" and $row[0] != "setting" and $row[0] != "newsletter" and $row[0] != "cms" )
					 {
			     ?>
               <option value="<?php echo $tables[] = $row[0];?>"> <?php echo $tables[] = $row[0]; ?></option>
               <?php }
			        }
					?><?php */?>
           </select>
       
       </td>
  </form>
 </tr>
</table>
<?php
}
?>
