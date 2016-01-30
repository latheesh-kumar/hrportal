<?php 
error_reporting(0);
include 'header.php';
include 'usernotlogin.php';?>
	<div class="container-fluid">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_details.php">Employee Details</a></li>
					<li><a href="add_employee.php">Add Employee </a></li>
					<li><a href="hr_employee_leave.php">Employee Leaves</a></li>
					<!-- <li><a href="hr_documents.php">Employee Documents</a></li> -->
					<li><a href="hr_articles.php">Assets</a></li>
					<li><a href="hr_holiday.php">Holiday List</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="dropdown">
				<ul class="my_profile">
					<li><a href=""><i class="fa fa-user"></i>My Account &#9662;</a>
						<ul class="dropmenu">
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
		</div>
		<div class="inner_title">
			<p>Employee Leaves</p>
		</div>
		<div class="hr_leave_sts">
			<div class="row">
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"  name="lvs" id="all_sts_date" value="">By Date
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"  name="lvs" id="all_sts" value="">All
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"  name="lvs" id="lvs"value="Approved">Approved
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"  name="lvs"  id="lvs" value="Pending">Pending
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"   name="lvs"  id="lvs" value="Rejected">Rejected
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"  name="lvs" id="lvs" value="cancelled">Cancelled
				</div>
			</div>
		</div>
		<div class="hr_report_tbl">
  		<form method="post" id="hr_search_date">
			<table class="emp_report_tbl">
				<tr><td>
					<fieldset>
						<label>From</label>
					</fieldset>
					</td>
					<td>
					<fieldset>
						<input type="text" id="hr_dat" placeholder="dd-mm-yyyy" name="sdate">
					</fieldset>
					</td>
				</tr>
				<tr><td>
					<fieldset>
						<label>To</label>
					</fieldset>
					</td>
					<td>
					<fieldset>
						<input type="text"  id="hr_dat1" placeholder="dd-mm-yyyy" name="edate1">
					</fieldset>
					</td>
				</tr>
		</table>
		<input type="button" id="hr_rep_sub" class="btn btn-success" value="SEARCH">
	</form>
		</div>
		
		<div id="shw_leave"></div>
		<div id="shw_lev_date"></div>
		<div class="table_report">
			<table class="table table-responsive hr_leave_tbl_all" border="1">
				<th>S.No</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Employee Name</th>
				<th>Leave Type</th>
				<th>Leave Balance</th>
				<th>Status</th>
				<th>Comments</th>
				<th>Action</th>
				<tr>
				<?php 
				$sel_leave_sts1=mysql_query("select 
					emp_leaves.user_id,
					emp_leaves.id,
					emp_leaves.start_date,
					emp_leaves.end_date,
					emp_leaves.leave_type,
					emp_leaves.status,
					emp_leaves.comments,
					user.name 
					from `emp_leaves` join `user` on emp_leaves.user_id=user.user_id");
				while($sel_leave_sts=mysql_fetch_array($sel_leave_sts1))
				{	 $sel_action_name=$sel_leave_sts['name'];	
					 $sel_action_id1=$sel_leave_sts['id'];						
					 $sel_sdate1=$sel_leave_sts['start_date'];
					 $sel_edate1=$sel_leave_sts['end_date'];
					 $sel_lev_type1=$sel_leave_sts['leave_type'];
					 $sel_status1=$sel_leave_sts['status'];
					 $sel_comm1=$sel_leave_sts['comments'];
				?>
				<tr><td></td>
					<td><?php  echo $sel_sdate1=$sel_leave_sts['start_date'];?></td>
					<td><?php  echo $sel_edate1=$sel_leave_sts['end_date'];?></td>
					<td><?php  echo $sel_action_name=$sel_leave_sts['name']; ?></td>
					<td><?php  echo $sel_lev_type1=$sel_leave_sts['leave_type'];?></td>
					<td><?php  echo $sel_sdate1=$sel_leave_sts['start_date'];?></td>
					<td><?php  echo $sel_status1=$sel_leave_sts['status'];?></td>
					<td><?php  echo $sel_comm1=$sel_leave_sts['comments']; ?></td>
					<td><select name="hr_action" class="hr_action" id="<?php echo $sel_action_id1;?>">
						<option value="">----Select----</option>
						<option value="Approved">Approve</option>
						<!-- <option value="Pending">Pending</option> -->
						<option value="Rejected">Reject</option>
						</select>
						<!-- <option value="Cancelled">Cancelled</option> -->
					</td>
				</tr>
				<?php } ?>
				</tr>
			</table>
		</div>
	</div>
</div>
</div>
<script>
	$('[href]').each(function(){
		if(this.href==window.location.href){
			$(this).addClass("active1");
		}
	});
	
	$('#hr_dat').datepicker({
			buttonImage:'/apps/hrportal/images/calendar.png',
			buttonImageOnly:true,
			changeMonth:true,
			changeYear:true,
			showOn:'button',
			dateFormat:'dd-mm-yy',
			onSelect:function(selected){
				$('#hr_dat1').datepicker("option","minDate",selected)
			}
	});
	$('#hr_dat1').datepicker({
		buttonImage:'/apps/hrportal/images/calendar.png',
		buttonImageOnly:true,
		changeMonth:true,
		changeYear:true,
		showOn:'button',
		dateFormat:'dd-mm-yy',
		onSelect:function(selected){
			$('#hr_dat').datepicker("option","maxDate",selected)
		}
	});
	//$('#all_sts').val('Approved,Pending,Rejected,Cancelled');
	$('.hr_action').change(function(){
		var hr_act_all=$(this).val();
		//alert(hr_act);
		var hr_act_id_all=(this).id;
		$.ajax({
				url:'emp_action_up.php?hr_act_id_all='+ hr_act_id_all,
				type:"GET",
				data:{hr_sts_all:hr_act_all},
				success:function(data){
					window.location.reload(true);
					$('#shw_leave').html(data);
					$('#hr_leave_tbl').show();
				}
		});
	});
	$("input:radio[id=lvs]").on('click',function(){
		var select_sts= [];
	$('.hr_leave_sts input:checked').each(function(){
		select_sts.push($(this).val());
		//alert(select_sts);
		});
	$.ajax({
			url:'leave_status_search.php',
			type:"GET",
			data:{ chk_ls:select_sts },
			success:function(data){
				$('#shw_leave').html(data);
				$('.hr_leave_tbl').hide();
				$('#shw_leave').show();
				$('#shw_lev_date').hide();
				$('.hr_leave_tbl_all').hide();
			}
	});
}); 
	$('#all_sts').click(function(){
		$('.hr_leave_tbl_all').show();
		$('#shw_leave').hide();
		$('.hr_report_tbl').hide();
		$('#shw_lev_date').hide();
	});
	$('#all_sts_date').click(function(){
		$('.hr_report_tbl').show();
		$('#shw_leave').hide();
		$('.hr_leave_tbl').hide();
		
	});
	$(document).on('click','#hr_rep_sub',function(){
	var date_sch=$('#hr_search_date').serialize();
	$.ajax({
		url:'hr_leave_date_sch.php',
		type:"POST",
		data:date_sch,
		success:function(data){
			$('#shw_lev_date').html(data);
			$('#shw_lev_date').show();
		}
	});
});
	// $('.hr_action1').change(function(){
	// 	var hr_act1=$(this).val();
	// 	//alert(hr_act);
	// 	var hr_act_ids=(this).id;
	// 	$.ajax({
	// 			url:'emp_action_up.php?hr_action_id='+ hr_act_ids,
	// 			type:"GET",
	// 			data:{hr_sts1:hr_act1},
	// 			success:function(data){
	// 				window.location.reload(true);
	// 			}
	// 	});
	// });
</script>
<?php include 'footer.php';?>
