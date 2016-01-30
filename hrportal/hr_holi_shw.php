<?php
include 'config/config.php';
$hr_holi_shw1=$_GET['holi_shw'];
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
	$hr_holiday_shw1=mysql_query("select * from holiday where year='$hr_holi_shw1'");
	while($hr_holiday_shw=mysql_fetch_array($hr_holiday_shw1))
		echo "
			<tr>
			<td></td>
			<td>$hr_holiday_shw[date]</td>
			<td>$hr_holiday_shw[day]</td>
			<td>$hr_holiday_shw[holiday]</td>
			<td>$hr_holiday_shw[year]</td>
			</tr>
         "?>
</table>