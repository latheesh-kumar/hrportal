<?php 
error_reporting(0);
include 'config/config.php';
?>

<table class="table table-responsive table-striped hr_leave_tbl1" border="1" id="hr_leave_tbl1">
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
	$hr_ls1=$_GET['chk_ls'];
	// $hr_sdate_sch=date('Y-m-d',strtotime($_POST['sdate']));
	// $hr_eadte_sch=date('Y-m-d',strtotime($_POST['edate1']));
	if(isset($hr_ls1)){
	for($i=0;$i<sizeof($hr_ls1);$i++){
	$hr_ls=mysql_query("select 
					emp_leaves.user_id,
					emp_leaves.id,
					emp_leaves.start_date,
					emp_leaves.end_date,
					emp_leaves.leave_type,
					emp_leaves.status,
					emp_leaves.comments,
					user.name 
					from `emp_leaves` join `user` on emp_leaves.user_id=user.user_id where  emp_leaves.status='$hr_ls1[$i]'");
}
	while($leave_sts=mysql_fetch_array($hr_ls)){
			$leave_sts_id=$leave_sts['id'];

		echo "
         <tr>
            <td></td>
			<td id='td1'> $leave_sts[start_date]</td>
			<td id='td2'> $leave_sts[end_date]</td>
			<td id='td3'> $leave_sts[name]</td>
			<td id='td4'> $leave_sts[leave_type]</td>
			<td id='td5'> $leave_sts[start_date]</td>
			<td id='td6'> $leave_sts[status]</td>
			<td id='td7'> $leave_sts[comments]</td>
			<td id='td8'>
			<select name='hr_action1' class='hr_action1' id='$leave_sts_id' onclick='Reload()'>
						<option value=''>----Select----</option>
						<option value='Approved'>Approve</option>
						<option value='Rejected'>Reject</option></td>
			</select>
        </tr>";
	}
}
?>
</table>
<div id="shw_leave"></div>
 <script src="/apps/hrportal/js/jquery.js"></script>
 <script>
//  $(document).ready(function(){
//  	$('#hr_leave_tbl1').load('leave_status_search.php');
//  	refresh();
//  });
// function reresh(){
// 	setTimeout(function(){
// 		$('#hr_leave_tbl1').load('leave_status_search.php');
// 	},200);
// }
//    function Reload() {
//      document.getElementById('td1').innerHTML;
//       document.getElementById('td2').innerHTML;
//        document.getElementById('td3').innerHTML;
//         document.getElementById('td4').innerHTML;
//          document.getElementById('td5').innerHTML;
//           document.getElementById('td6').innerHTML;
//            document.getElementById('td7').innerHTML;
//             document.getElementById('td8').innerHTML;
// }
 	$('.hr_action1').change(function(){
		var hr_act=$(this).val();
		//alert(hr_act);
		var hr_act_id1=(this).id;
		// alert(hr_act_id1);
		$.ajax({
				cache:false,
				url:'emp_action_up.php?hr_act_id='+ hr_act_id1,
				type:"GET",
				data:{hr_sts:hr_act},
				success:function(data){
					refresh();
				}
				});
			});
</script>
<!-- function loadlink(){
    $('#links').load('test.php',function () {
         $(this).unwrap();
    });
}

loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 5000);
 -->
 <!-- setTimeout(function refreshTable() {
$.ajax({
    url:'/some-script.php',
    dataType:'html',
    data:{
       someparam:'someval'
    },
    success:function(data) {
        $('#yourTable').find('tbody').empty().append(data);
        setTimeout(refreshTable, 5000);
    }
 });
}, 5000); //every 5 seconds refresh -->