<?php 
error_reporting(0);
include 'header.php';
include 'usernotlogin.php';
$emp_prof_id=$_SESSION['user_id'];
$emp_name=$_SESSION['name'];
echo '<p class="wel_mesg">Welcome'.$emp_name.'</p>';

?>
<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="side_menu_page">
			<ul>
				<li><a href="employee_dashboard.php">Dashboard</a></li>
				<li><a href="employee_profile.php">My Profile</a></li>
				<li><a href="employee_leave.php">Leave</a></li>
				<li><a href="employee_notification.php">Notifications</a></li>
				<li><a href="employee_holiday.php">Holiday List</a></li>
			</ul>
		</div> 
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<div class="dropdown">
		    <ul class="my_profile">
		     	<li><a href=""><i class="fa fa-user"></i>My Account &#9662;</a>
				    <ul class="dropmenu">
				    	<li class="divider"></li>
				   		<li><a href="logout.php">Logout</a></li>
				    </ul>
			    </li>
			</ul>
  		</div>
  		<div id="emp_ins"></div>
  		<div class="inner_title">
  			<p>Leave</p>
  		</div>
  		<div class="col-md-6">
  			<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
	  			<fieldset>
						<label>Apply Leave</label>
						<input type="checkbox" name="" id="leave_chk"  class="chk_leave" value="">
				</fieldset>
			</div>
			<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
				<fieldset>
						<label>Leave List</label>
						<input type="checkbox" name="" id="report_chk" class="chk_report" value="">
				</fieldset>
			</div>
  		</div>
  		<div class="clear"></div>
  		<div class="tbl_leave">
  		<form method="post" id="lve_form">
		<table class="emp_leave_tbl">
			<tr><td>
				<fieldset>
					<label>Start Date</label>
				</fieldset>
				</td>
				<td>
				<fieldset>
					<input type="text" id="emp_dat" placeholder="mm-dd-yyyy" name="sdate" required>
				</fieldset>
				</td>
			</tr>
			<tr><td>
				<fieldset>
					<label>End Date</label>
				</fieldset>
				</td>
				<td>
				<fieldset>
					<input type="text"  id="emp_dat1" placeholder="mm-dd-yyyy" name="edate" required>
				</fieldset>
				</td>
			</tr>
			<?php 
				$sel_lve_bal_list1=mysql_query("select
						emp_leave_list.casual,
						emp_leave_list.sick,
						emp_leave_list.bereavement,
						emp_leave_list.marriage,
						recruitment.prob_period,
						recruitment.join_date
						from `emp_leave_list` join `recruitment` on emp_leave_list.user_id=recruitment.user_id
						"
						);

			// $sel_emp_leave_list1=mysql_query("select * from emp_leave_list where user_id=$emp_prof_id");

			while($sel_leave_list=mysql_fetch_array($sel_lve_bal_list1))
			{
			$sel_casual=$sel_leave_list['casual'];
			$sel_sick=$sel_leave_list['sick'];
			$sel_bereave=$sel_leave_list['bereavement'];
			$sel_marriage=$sel_leave_list['marriage'];
			$sel_prob_period=$sel_leave_list['prob_period'];
			$sel_join_date=$sel_leave_list['join_date'];
		}
		echo $sel_join_date;
		echo $sel_prob_period;
		 $effectiveDate = date('Y-m-d', strtotime("+$sel_prob_period months", strtotime($sel_join_date)));
		// echo $effectiveDate1 = date('Y-m-d', strtotime("+6 months", strtotime($sel_join_date)));
		if($effectiveDate)
		{
			// $sel_up_prob_period=mysql_query("update `recruitment` set `prob_period`=0 where user_id=$emp_prof_id");
		}
			if($sel_prob_period==0){
				echo"<tr><td id='lvb'>
					<label>Leave Balance</label>
				</td>
				<td>
				<fieldset>
					<input type='checkbox' id='lve_list_chk'>
					<label class='lve_list1'>Casual</label><input type='text' value= $sel_casual id='lve_list' class='lve_list lve_list1'>
					<label class='lve_list1'>sick</label><input type='text' value= $sel_casual id='lve_list1' class='lve_list lve_list1'>
					<label class='lve_list1'>Bereavement</label><input type='text' value= $sel_bereave id='lve_list2' class='lve_list lve_list1'>
					<label class='lve_list1'>Marriage</label><input type='text' value= $sel_marriage id='lve_list3' class='lve_list lve_list1'>
				</fieldset>
				</td>
			</tr>";
			}
			else{
				echo"<tr><td id='lvb'>
					<label>Leave Balance</label>
				</td>
				<td>
				<fieldset>
					<input type='checkbox' id='lve_list_chk'>
					<label class='lve_list1'>Casual</label><input type='text' value=$sel_casual id='lve_list' class='lve_list lve_list1'>
				</fieldset>
				</td>
			</tr>";
			}
			?>
			<tr>
			<td>
				<fieldset>
					<label>Leave Type</label>
				</fieldset>
				</td>
				<td>
				<fieldset>
				<?php if($sel_prob_period==0){
					echo "<select name='leave_type' value='' id='leave_sel' required>
						<option value=''>----Select----</option>
						<option value='casual'>Casual</option>
						<option value='sick'>Sick</option>
						<option value='bereavement' >Bereavement</option>
						<option value='marriage'>Marriage</option>
					</select>
					<input type='radio' name='leavetype_day' id='' value='1'><label>Full Day</label>
					<input type='radio' name='leavetype_day' id='' value='0.5'><label>Half Day</label>
				</fieldset>
				</td>
			</tr>
			";}
			else{
				echo "<select name='leave_type' value='' id='leave_sel' required>
						<option value=''>----Select----</option>
						<option value='casual'>Casual</option>
						
					</select>
					<input type='radio' name='leavetype_day' id='' value='1'><label>Full Day</label>
					<input type='radio' name='leavetype_day' id='' value='0.5'><label>Half Day</label>
				</fieldset>
				</td>
			</tr>
			";
				}?>
			<tr>
			<td>
			<fieldset>
					<label>Comments</label>
			</fieldset>
			</td>
			<td>
				<fieldset>
					<textarea rows="5" cols="35" name="comment"></textarea>
				</fieldset>
			</tr>
		</table>
		<?php $cur_month=date("m");
		$sel_leave_list1=mysql_query("select * from emp_leave_list ");
		while($sel_leave_list=mysql_fetch_array($sel_leave_list1))
		{
			$sel_casual=$sel_leave_list['casual'];
			$sel_sick=$sel_leave_list['sick'];
			$sel_user=$sel_leave_list['user_id'];
		}
		//echo $sel_user;
		if($sel_user==""){
					$casual=$sel_casual;
					$sick=$sel_sick;
					$casual=$casual+1;
					$sick=$sick;
					$ins_leave_list=mysql_query("insert into emp_leave_list(casual,sick)values($casual,$sick)");
					}
					else{
					}
				?>
		<input type="button" id="lev_sub" class="btn btn-success" name="lev_sub" value="SUBMIT">
		</form>
		</div>
		<div class="leave_sts">
			<div class="row">
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio"  name="emp_lvs" class="all_sts_date" value="">By Date
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio" name="emp_lvs" id="emp_lvs1" value="">All
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio" name="emp_lvs" id="emp_lvs"value="Approved">Approved
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio" name="emp_lvs" id="emp_lvs"value="Pending">Pending
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio" name="emp_lvs" id="emp_lvs"value="Rejected">Rejected
				</div>
				<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
					<input type="radio" name="emp_lvs" id="emp_lvs" value="cancelled">Cancelled
				</div>
			</div>
		</div>
		<div class="report_tbl">
	  		<form method="post" id="rep_form">
				<table class="emp_report_tbl">
					<tr><td>
						<fieldset>
							<label>From</label>
						</fieldset>
						</td>
						<td>
						<fieldset>
							<input type="text" id="emp_rep_dat" name="sdate1" placeholder="mm/dd/yyyy" >
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
							<input type="text"  id="emp_rep_dat1" name="edate1" placeholder="mm/dd/yyyy" >
						</fieldset>
						</td>
					</tr>
				</table>
				<input type="button" id="rep_sub" name="rep_sub" class="btn btn-success" value="SEARCH">
			</form>
		</div>
		<div id="shw_emp_leave"></div>
		<div id="emp_dat_tbl"></div>
		<?php $sel_leave_sts1=mysql_query("select * from emp_leaves where user_id='$emp_prof_id'");
				while($sel_leave_sts=mysql_fetch_array($sel_leave_sts1))
				{
					$emp_leave_user_id=$sel_leave_sts['user_id'];
					$emp_sts=$sel_leave_sts['status'];
				}
				if($emp_sts=="")
				{?>	
				<div id=="emp_shw_all">
					<table class="table table-responsive leave_tbl table-striped" border="1">
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
						<td colspan="9">No Records Found</td>
						</tr>
					</table>
				</div>
				<?php
				}
				if($emp_leave_user_id!="")
				{
				?>
			<div id="emp_shw_all">
				<table class="table table-responsive leave_tbl table-striped leave_tbl1" border="1">
				<th>S.No</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Employee Name</th>
				<th>Leave Type</th>
				<th>Leave Balance</th>
				<th>Status</th>
				<th>Comments</th>
				<th>Action</th>
				<!-- <tr>
				<td colspan="9">No Records Found</td>
				</tr> -->
				<?php 
				$cur_year=date("Y");
				$sel_leave_days1=mysql_query("select * from holiday where year='$cur_year'");
				while($sel_leave_days=mysql_fetch_array($sel_leave_days1))
				{
					$leave[]= $sel_leave_days['date']?>
				<?php
				}
				json_encode($leave);
				?>
				<input type='hidden' name='' class="leave_dates" value='<?php echo $leave;?>'>
				<?php
				// $sel_leave_days1=mysql_query("select * from holiday where year=2016");
				// while($sel_leave_days=mysql_fetch_array($sel_leave_days1))
				// {
				// 	echo $sel_leave_days['holiday'];
				// 	echo "<input type='hidden' name='leave_dates' id='leave_dates' value='$sel_leave_days[date]'";
				// 	$sel_leave_days['date'];
				// }
				//echo $sel_leave_days['date'];
				$sel_leave_sts1=mysql_query("select * from emp_leaves where user_id='$emp_prof_id'");
				while($sel_leave_sts=mysql_fetch_array($sel_leave_sts1))
				{	 $sel_action_id=$sel_leave_sts['id'];
					 $sel_sdate=$sel_leave_sts['start_date'];
					 $sel_edate=$sel_leave_sts['end_date'];
					 $sel_lev_type=$sel_leave_sts['leave_type'];
					 $sel_status=$sel_leave_sts['status'];
					 $sel_comm=$sel_leave_sts['comments'];
				?>
				<tr><td></td>
					<td><?php  echo $sel_sdate=$sel_leave_sts['start_date'];?></td>
					<td><?php  echo $sel_edate=$sel_leave_sts['end_date']; ?></td>
					<td><?php  echo $emp_name ?></td>
					<td><?php  echo $sel_lev_type=$sel_leave_sts['leave_type']; ?></td>
					<td><?php  echo $sel_sdate=$sel_leave_sts['start_date']; ?></td>
					<td><?php  echo $sel_leave_sts['status'];?></td>
					<td><?php  echo $sel_comm=$sel_leave_sts['comments']; ?></td>
					<td>
					<?php  

					$cur_date=date("Y-m-d");
					if($cur_date>$sel_edate){?>
						<select name="emp_action1" id="<?php echo $sel_action_id;?>" class="emp_action" disabled="disabled">
						<option value="">----Select----</option>
						<option value="Cancelled">Cancel</option>
						<?php
						}
						else
						{?>
						<select name="emp_action1" id="<?php echo $sel_action_id;?>" class="emp_action">
						<option value="">----Select----</option>
						<option value="Cancelled">Cancel</option>
						<?php
						}
						?>
					</td>
				</tr>
				<?php }} ?>
			</table>
		</div>
	</div>
</div>
<script>
		$("[href]").each(function() {
   		if(this.href == window.location.href) {
        $(this).addClass("active1");
        }
	});
		$(document).on('click','#lve_sub',function(){
			$('#lve_form')[0].reset();
		});

		$("textarea").prop('required',true);
   		var array = <?php echo json_encode($leave);?>;
		$('#emp_dat,#emp_rep_dat').datepicker({
			buttonImage:'/apps/hrportal/images/calendar.png',
			changeMonth:true,
			// changeYear:true,
			showOn:'button',
			buttonImageOnly:true,
			dateFormat:'dd-mm-yy',
			beforeShowDay: disable,    
			onSelect:function(selected){
				$('#emp_dat1,#emp_rep_dat1').datepicker("option","minDate", selected);
			}
		});
		$('#emp_dat1,#emp_rep_dat1').datepicker({
			buttonImage:'/apps/hrportal/images/calendar.png',
			changeMonth:true,
			// changeYear:true,
			showOn:'button',
			buttonImageOnly:true,
			dateFormat:'dd-mm-yy',
			beforeShowDay: function(date){
	        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
	        // var l=date.getDay() != 0, '';
	        var holi_list=[array.indexOf(string) == -1];
	        var dis_sunday=[date.getDay() != 0, ''];
	        return holi_list;
	        //return l;
    		}, 
			onSelect:function(selected){
				$('#emp_dat,#emp_rep_dat').datepicker("option","maxDate", selected)
			}
		});
		// var array = <?php echo json_encode($leave);?>;
		// function(date){
	 //        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
	 //        return [ array.indexOf(string) == -1 ]
	 //    }
	// 	var unavailableDates = <?php echo json_encode($leave);?>;
	// 	//alert(unavailableDates);
	// 	alert(unavailableDates);
	// 	function unavailable(date) {
	//     dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
	//     if ($.inArray(dmy, unavailableDates) == -1  ) {
	//         return [true, ""];
	//     } else {
	//         return [false, "", "Unavailable"];
	//     }
	// }

		$(document).on('click',function(){
			$('#leave').show();
		});
		$('#report_chk').click(function(){
			$('input.chk_leave').not(this).prop('checked',false);
			if($('#report_chk').is(':checked')){
			$('.emp_leave_tbl,.leave_sts,.leave_tbl,#rep_sub').show();
			$('.tbl_leave').hide();
		}
	});
		$('#leave_chk').click(function(){
			$('input.chk_report').not(this).prop('checked',false);
			if($('#leave_chk').is(':checked')){
			$('.tbl_leave').show();
			$('.leave_sts,.leave_tbl,.leave_tbl1,.report_tbl,#rep_sub').hide();
		}
		});
		$('.emp_action').change(function(e){
			
		var emp_act=$(this).val();
		if(confirm("Are You sure want to "+ emp_act)==true)
		{
		 var act_row=(this).id;
		 //alert(act_row);
		// window.location.href="emp_action_up.php?act_id="+ act_row;
		// // alert(act_row);
		// alert(emp_act);
		$.ajax({
				url:'emp_action_up.php?act_id='+ act_row,
				data:{sts:emp_act},
				type:"GET",
				success:function(data){
						window.location.reload(true);
				}
		});
	}
	else{
		window.location.reload(true);
	}
});
	$(document).on('click','#lev_sub',function(){
		var lvs_ins=$('#lve_form').serialize();
		$.ajax({
				url:'emp_leave_ins.php',
				type:"POST",
				data:lvs_ins,
				success:function(data){
					$('#emp_ins').html(data);
				}
		});
	});
	$("input:radio[id=emp_lvs]").on('click',function(){
		var select_emp_sts= [];
	$('.leave_sts input:checked').each(function(){
		select_emp_sts.push($(this).val());
		//alert(select_sts);
		});
	$.ajax({
			url:'emp_leave_sts_search.php',
			type:"GET",
			data:{ emp_chk_ls:select_emp_sts },
			success:function(data){
				$('#shw_emp_leave').html(data);
				$('.leave_tbl').hide();
				$('#shw_emp_leave').show();
				$('#emp_dat_tbl').hide();
				$('#rep_form').hide();
				$('.emp_shw_all').hide();
				// $('.hr_leave_tbl').hide();
				// $('#shw_leave').show();
			}
	});
});
	$('#emp_lvs1').click(function( ){
		$('.leave_tbl').show();
		$('#shw_emp_leave').hide();
		$('#rep_form').hide();
		$('#emp_shw_all').show();
	});
	$('.all_sts_date').click(function(){
		$('.report_tbl').show();
		$('#shw_emp_leave').hide();
		$('#rep_form').show();
		$('#emp_shw_all').hide();
	});
	$('#emp_shw_all').click(function(){
		$('#rep_form').hide();
		//$('#emp_shw_all').show();
	});
	$(document).on('click','#rep_sub',function(){
		var emp_date_sch=$('#rep_form').serialize();
	$.ajax({
			url:"emp_leave_dat_search.php",
			type:"POST",
			data:emp_date_sch,
			success:function(data){
				$('#emp_dat_tbl').html(data);
				$('#emp_dat_tbl').show();
				$('#shw_emp_leave').hide();
			}
	});
	
});
	// $('#leave_sel').change(function(){
	// 	var sl=$(this).val();
	// 	$.ajax({
	// 		url:'emp_leave_list.php',
	// 		data:{emp_leave_list:sl},
	// 		type:"GET",
	// 		success:function(data){
	// 			$('#emp_leave_list').html(data);
	// 		}

	// 	});

	// });
	$('#lve_list_chk').on('click',function(){
		if ($(this).is(':checked')){
		$('.lve_list1').show();
	}
	else{
		$('.lve_list1').hide();
	}
	
	});
	function disable(date){
	        var string = jQuery.datepicker.formatDate('dd-mm-yy',date);
	        return [array.indexOf(string) == -1 ];
	        	// return [false];
	  //       }
	  //       var day = date.getDay();
   //  		if(day != 0 && day != 2){
			// return [false];
			// }
	  //       return [true];
	    }
	// $(document).on('click','#emp_dat',function(){
	// var a=$('#leave_dates').val();
	// alert(a);
	// });
	
	// $(document).on('click','#rep_sub',function(){
	// 	var rep_search=$('#rep_form').serialize();
	// 	$.ajax({
	// 			url:'emp_leave_dat_search',
	// 			type:"POST",
	// 			data:rep_search,
	// 			success:function(data){
	// 				$('#emp_dat_search').html(data);
	// 			}
	// 	});
	// });
</script>
<?php include 'footer.php';?>