
<?php 
session_start();
include 'config/config.php';
$emp_prof_id=$_SESSION['user_id'];
$emp_name=$_SESSION['name']; ?>
<table class="table table-responsive table-striped emp_leave_tbl1" border="1">
      <tr>
        <th>S.NO</th>
        <th>Start Date</th>
		<th>End Date</th>
		<th>Employee Name</th>
		<th>Leave Type</th>
		<th>Leave Balance</th>
		<th>Comments</th>
		<th>Status</th>
    </tr>
    <?php
	$emp_ls1=$_GET['emp_chk_ls'];
	if(isset($emp_ls1)){
	for($i=0;$i<sizeof($emp_ls1);$i++){
	$emp_ls=mysql_query("select * emp_leaves
					 where user_id='$emp_prof_id' and status='$emp_ls1[$i]'");
}
	while($leave_sts1=mysql_fetch_array($emp_ls)){
			$leave_sts_id1=$leave_sts1['id'];

		echo "
         <tr>
            <td></td>
			<td> $leave_sts1[start_date]</td>
			<td> $leave_sts1[end_date]</td>
			<td> $leave_sts1[name]</td>
			<td> $leave_sts1[leave_type]</td>
			<td> $leave_sts1[start_date]</td>
			<td> $leave_sts1[status]</td>
			<td> $leave_sts1[comments]</td>
			<td> </td>
			</select>
        </tr>";
	}
}
?>