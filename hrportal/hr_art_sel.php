<?php
include 'config/config.php';
?>
		<table  class="table" border="1" id="tab_shw">
          <tr>
          <th>S.NO</th>
          <th>Asset Name </th>
          <th>Employee ID </th>
          </tr>
          <?php
         	$sel_asst=$_GET['chk'];
         	for($i=0;$i<sizeof($sel_asst);$i++){
			     $sel=mysql_query("select * from `articles` where articles='$sel_asst[$i]'");
				}
          	while($row_ast=mysql_fetch_array($sel)){
        	echo "
              <tr>
              <td></td>
              <td>$row_ast[articles]</td>
              <td>$row_ast[user_id]</td>
              </tr>";
     }

          ?>
          </table>