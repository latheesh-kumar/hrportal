<?php include 'header.php';
$sid=$_SESSION['sel_id'];
?>
<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_view.php?id=<?php echo $sid;?>">Personal Details</a></li>
					<li><a href="hr_emp_edu_view.php?id=<?php echo $sid;?>">Educational Details</a></li>
					<li><a href="hr_emp_prof_view.php?id=<?php echo $sid;?>">Professional Details</a></li>
					<li><a href="hr_emp_art_view.php?id=<?php echo $sid;?>">Returnable Articles</a></li>
					<li><a href="hr_emp_recr_view.php?id=<?php echo $sid;?>">Recruitment Process</a></li>
					<li><a href="hr_emp_doc_view.php?id=<?php echo $sid;?>">Documents</a></li>
					<li><a href="hr_emp_sts_view.php?id=<?php echo $sid;?>">Staus Employment</a></li>
				</ul>
			</div>
		</div>
		<?php $sel_emp_recr1=mysql_query("select * from recruitment where user_id=$sid");?>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<h3 class="view_head">Recruitment Details</h3>
	<div class="recruitment_ed">
	<table class="table table-responsive tab_det" border="1">
	<thead>
		<th>Reffered By</th>
		<th>Refference Id</th>
		<th>Post</th>
		<th>Interview Date</th>
		<th>Joining Date</th>
		<th>Salary</th>
		<th>Probation Period</th>
	</thead>
	<?php while($sel_emp_recr=mysql_fetch_array($sel_emp_recr1)){?>
		<tr>
				<td><?php echo $ref_ed=$sel_emp_recr['reffered'];?></td>
				<td><?php echo $ref_id_ed=$sel_emp_recr['reffered_id'];?></td>
				<td><?php echo $post_ed=$sel_emp_recr['post'];?></td>
				<td><?php echo $int_ed=$sel_emp_recr['inter_date'];?></td>
				<td><?php echo $join_ed=$sel_emp_recr['join_date'];?></td>
				<td><?php echo $sal_ed=$sel_emp_recr['salary'];?></td>
				<td><?php echo $prob_ed=$sel_emp_recr['prob_period'];?></td>
		</tr>
		<?php } ?>
		</table>
		<button type="submit"  class="btn btn-primary recr_edit">EDIT</button>
	</div>
	<?php
		if(isset($_POST['sub5_ed'])){
		$ref_ed=$_POST['reference_ed'];
		$ref_id_ed=$_POST['ref_id_ed'];
		$post_ed=$_POST['post_ed'];
		$idate2=strtotime($_POST['idate_ed']);
		$idate_ed=date('y-m-d',$idate2);
		$jdate2=strtotime($_POST['jdate_ed']);
		$jdate_ed=date('y-m-d',$jdate2);
		$salary_ed=$_POST['salary_emp_ed'];
		$prob_per_ed=$_POST['p_period_ed'];
		$ins=mysql_query("update `recruitment` set  `reffered`='$ref_ed',`reffered_id`='$ref_id_ed',`post`='$post_ed',`inter_date`='$idate_ed',`join_date`='$jdate_ed',`salary`='$salary_ed',`prob_period`='$prob_per_ed' where user_id=$sid");
		if($ins){
			header("Location:#");
		}
		else
		{
			echo "<p class='alert alert-danger'>Not Updated</p>";
		}
	}
	?>
	<div id="recruitment_ed">
		<form role="form" method="post">
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<label>Reffered By *</label><br>
					<select name="reference_ed" class="form-control">
						<option value="<?php echo $ref_ed;?>"><?php echo $ref_ed;?></option>
						<option value="none">None</option>
							<option value="employee">Employee</option>
							<option value="hr">HR Manager</option>
					</select>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Refference ID *</label>
					<input type="text" class="form-control" id="ref_id" name="ref_id_ed" value="<?php echo $ref_id_ed;?>">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Post *</label>
					<input type="text" class="form-control" id="post" name="post_ed" value="<?php echo $post_ed;?>">
					 <select class="form-control">
					 <option value="<?php echo $post_ed;?>"><?php echo $post_ed;?></option>
					<?php 
					$sel_pos1=mysql_query("select * from emp_position");
					while($sel_pos=mysql_fetch_array($sel_pos1)){
						echo "<option value='$sel_pos[position]'>$sel_pos[position]</option>";
						} 
					?>
					</select>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Interview Date *</label>
					<input type="text" class="form-control cdate" id="idate" placeholder="mm/dd/yyyy" name="idate_ed" value="<?php echo $int_ed;?>">
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Joining Date *</label>
					<input type="text" class="form-control cdate" id="jdate" placeholder="mm/dd/yyyy" class="date" name="jdate_ed" value="<?php echo $join_ed;?>">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Salary *</label>
					<input type="text" class="form-control" id="salary_emp" placeholder="Salary" class="salary" name="salary_emp_ed" value="<?php echo $sal_ed;?>">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Probation Period *</label>
					<select name="p_period_ed" class="form-control">
					<option value="<?php echo $prob_ed;?>"><?php echo $prob_ed;?></option>
					<option value="none">None</option>
					<option value="3">3 Months</option>
					<option value="6">6 Months</option>
					</select>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Offer Letter</label>
					<input type="text" class="form-control" id="off_letter" name="off_letter">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Appointment Letter</label>
					<input type="text" class="form-control" id="app_letter" name="app_letter">
				</div>
			</div> -->
			</div>
			<button type="submit" class="btn btn-success" name="sub5_ed"  id="sub_recu">SAVE</button>
			<button type="button" name="sub5_can" class="btn btn-warning" id="recr_can">CANCEL</button> 
		</form>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.recr_edit').click(function(){
		$('#recruitment_ed').css({'visibility':'visible'});
	});
	$('#recr_can').click(function(){
		$('#recruitment_ed').css({'visibility':'hidden'});
	});
});
</script>
<?php include 'footer.php';?>