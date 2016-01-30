<?php 
include 'config/config.php'; ?>
<table class="table table-responsive table-striped hr_leave_tbl1" border="1">
      <tr>
        <th>S.NO</th>
        <th>Start Date</th>
		<th>End Date</th>
		<th>Employee Name</th>
		<th>Leave Type</th>
		<th>Leave Balance</th>
		<th>Status</th>
		<th>Comments</th>
		<th>Action</th>
    </tr>
<?php
	// $hr_ls1=$_GET['chk_ls'];
	$hr_sdate_sch=date('Y-m-d',strtotime($_POST['sdate']));
	$hr_eadte_sch=date('Y-m-d',strtotime($_POST['edate1']));
	if(isset($hr_sdate_sch)){
	$hr_ls=mysql_query("select 
					emp_leaves.user_id,
					emp_leaves.id,
					emp_leaves.start_date,
					emp_leaves.end_date,
					emp_leaves.leave_type,
					emp_leaves.status,
					emp_leaves.comments,
					user.name 
					from `emp_leaves` join `user` on emp_leaves.user_id=user.user_id where emp_leaves.start_date >= '$hr_sdate_sch' and emp_leaves.end_date <= '$hr_eadte_sch' order by start_date ASC");

	while($leave_sts=mysql_fetch_array($hr_ls)){
			$leave_sts_id=$leave_sts['id'];

		echo "
         <tr>
            <td></td>
			<td> $leave_sts[start_date]</td>
			<td> $leave_sts[end_date]</td>
			<td> $leave_sts[name]</td>
			<td> $leave_sts[leave_type]</td>
			<td> $leave_sts[start_date]</td>
			<td> $leave_sts[status]</td>
			<td> $leave_sts[comments]</td>
			<td>
			<select name='hr_action1' class='hr_action1' id='$leave_sts_id'>
						<option value=''>----Select----</option>
						<option value='Approved'>Approved</option>
						<option value='Rejected'>Rejected</option></td>
			</select>
        </tr>";
	}
}
?>
</table>
 <script src="/apps/hrportal/js/jquery.js"></script>
 <script>
 	$('.hr_action1').change(function(){
		var hr_act=$(this).val();
		//alert(hr_act);
		var hr_act_id1=(this).id;
		// alert(hr_act_id1);
		$.ajax({
				url:'emp_action_up.php?hr_act_id='+ hr_act_id1,
				type:"GET",
				data:{hr_sts:hr_act},
				success:function(data){
					window.location.reload(true);
				}
		});
	});
</script>
