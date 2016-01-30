<?php
include 'config/config.php';
$emp_holi_shw1=$_GET['emp_holi_shw'];
?>
<table class="table table-responsive table-striped holiday_tbl" border="1">
      <tr>
        <tr>
        <th>S.NO</th>
        <th>DATE</th>
        <th>DAY</th>
        <th>HOLIDAY</th>
        <th>YEAR</th>
    </tr>
 <?php
	$emp_holiday_shw1=mysql_query("select * from holiday where year='$emp_holi_shw1'");
	while($emp_holiday_shw=mysql_fetch_array($emp_holiday_shw1))
		echo "
			<tr>
			<td></td>
			<td>$emp_holiday_shw[date]</td>
			<td>$emp_holiday_shw[day]</td>
			<td>$emp_holiday_shw[holiday]</td>
			<td>$emp_holiday_shw[year]</td>
			</tr>
         "?>
</table>