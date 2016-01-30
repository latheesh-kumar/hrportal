<?php session_start();
include 'config/config.php';
$emp_prof_id=$_SESSION['user_id'];
$emp_name=$_SESSION['name']; ?>
<table class="table table-responsive table-striped leave_tbl1" border="1">
      <tr>
        <th>S.NO</th>
        <th>Start Date</th>
		<th>End Date</th>
		<th>Employee Name</th>
		<th>Leave Type</th>
		<th>Leave Balance</th>
		<th>Status</th>
		<th>Comments</th>
    </tr>
<?php 	
		
		 $emp_sdate=date("Y-m-d",strtotime($_POST['sdate1']));
		 $emp_edate=date("Y-m-d",strtotime($_POST['edate1']));
		 $emp_leave_search1=mysql_query("select * from emp_leaves where start_date >= '$emp_sdate' and end_date <= '$emp_edate' and `user_id`='$emp_prof_id' order by start_date ASC");
		 //echo "select * from emp_leaves where `start_date` BETWEEN '$emp_sdate' and '$emp_edate' and `user_id`='$emp_prof_id'";
		// echo "select * from emp_leaves where start_date >= '$emp_sdate' and end_date <= '$emp_edate' and `user_id`='$emp_prof_id'";
		 while($emp_leave_search=mysql_fetch_array($emp_leave_search1)){

		 	echo "
         <tr>
            <td></td>
			<td> $emp_leave_search[start_date]</td>
			<td> $emp_leave_search[end_date]</td>
			<td> $emp_name</td>
			<td> $emp_leave_search[leave_type]</td>
			<td> $emp_leave_search[start_date]</td>
			<td> $emp_leave_search[status]</td>
			<td> $emp_leave_search[comments]</td>
        </tr>";
		 }
	
?>
</table>