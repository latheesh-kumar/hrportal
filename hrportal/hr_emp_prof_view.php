<?php include 'header.php';
$sid=$_SESSION['sel_id'];
?>
<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_view.php?id=<?php echo $sid;?>">Personal Details</a></li>
					<li><a href="hr_emp_edu_view.php??id=<?php echo $sid;?>">Educational Details</a></li>
					<li><a href="hr_emp_prof_view.php?id=<?php echo $sid;?>">Professional Details</a></li>
					<li><a href="hr_emp_art_view.php?id=<?php echo $sid;?>">Returnable Articles</a></li>
					<li><a href="hr_emp_recr_view.php?id=<?php echo $sid;?>">Recruitment Process</a></li>
					<li><a href="hr_emp_doc_view.php?id=<?php echo $sid;?>">Documents</a></li>
					<li><a href="hr_emp_sts_view.php?id=<?php echo $sid;?>">Staus Employment</a></li>
				</ul>
			</div>
		</div>
		<?php $sel_emp_edit=mysql_query("select * from professional_details where user_id=$sid");?>
	<div class="col-lg-9 col-md-9 col-xs-9 col-xs-12">
	<h3 class="view_head">Professional Details</h3>
	<div class="professional_ed">
	<table class="table table-responsive tab_det" border="1">
	<thead>
		<th>Category</th>
		<th>Company Name</th>
		<th>Years of Experience</th>
		<th>Old company offer Letter</th>
		<th>Salary Slip</th>
		<th>Bank Statement</th>
	</thead>
	<?php while($sel_emp_prof=mysql_fetch_array($sel_emp_edit)){?>
		<tr>
				<td><?php echo $cat=$sel_emp_prof['category'];?></td>
				<td><?php echo $cmp=$sel_emp_prof['company_name'];?></td>
				<td><?php echo $ex=$sel_emp_prof['year_experience'];?></td>
				<td><?php echo $off=$sel_emp_prof['offer_letter'];?></td>
				<td><?php echo $sal=$sel_emp_prof['salary_slip'];?></td>
				<td><?php echo $bank=$sel_emp_prof['bank_state'];?></td>
		</tr>
		<?php } ?>
		
		</table>
		<button type="button"  class="btn btn-primary prf_edit">EDIT</button>
	</div>
	<?php		
	if(isset($_POST['sub3_ed'])){
	$category1=$_POST['profess_ed'];
	$cmpy_name1=$_POST['cmp_ed'];
	$experience1=$_POST['experience_ed'];
	$off_letter1=$_POST['offer_letter_ed'];
	$sal_slip1=$_POST['salary_slip_ed'];
	$bank_state1=$_POST['bank_state_ed'];
	$ins1=mysql_query("update `professional_details` set `category`='$category1',`company_name`='$cmpy_name1',`year_experience`='$experience1',`offer_letter`='$off_letter1',`salary_slip`='$sal_slip1',`bank_state`='$bank_state1' where user_id=$sid ");
	if($ins1){
		header("Location:#");
	}
	else{
		
		echo "<p class='alert alert-danger'>Not updated</p>";
	}
	 
}
?>
<div id="profession_edit">
	<form role="form" method="post" enctype="multipart/form-data" action="">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
					<div class="drop-down">
						<label>Fresher/Experienced *</label><br>
						<select  class="form-control" id="profess_ed" name="profess_ed" >
							<option value="<?php echo $cat;?>"><?php echo $cat;?></option>
							<option value="Fresher">Fresher</option>
							<option value="Experienced">Experienced</option>
						</select>
					</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Company Name *</label>
					<input type="text" class="form-control" id="company_name_ed" name="cmp_ed"  value="<?php echo $cmp;?>" >
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Years of Experience *</label>
					<input type="text" class="form-control" id="experience_ed" name="experience_ed" value="<?php echo $ex;?>" >
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Offer Letter of old company *</label><br>
					<select  class="form-control" id="offer_letter_ed" name="offer_letter_ed">
							<option value="<?php echo $off;?>"><?php echo $off;?></option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
					</select>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>3 Month Salary Slip *</label><br>
					<select class="form-control" id="salary_slip_ed" name="salary_slip_ed" >
						<option value="<?php echo $sal;?>"><?php echo $sal;?></option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>3 Month Bank Statement *</label><br>
					<select  class="form-control" id="bank_state_ed" name="bank_state_ed">
						<option value="<?php echo $bank;?>"><?php echo $bank;?></option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<label>Resume *</label>
				<input type="file"  id="Resume" name="resume" required>
			</div> -->
		</div><!-- <button type="button" name="sub3_can" class="btn btn-warning" id="prof_can">CANCEL</button> -->
		
		<button type="submit"  name="sub3_ed" class="btn btn-success" id="sub_prof_ed">SAVE </button>		
		<button type="button" name="sub3_can" class="btn btn-warning" id="prof_can">CANCEL</button> 
		

		</form>
		
	</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.prf_edit').click(function(){
		$('#profession_edit').css({'visibility':'visible'});
	});
	$('#prof_can').click(function(){
		$('#profession_edit').css({'visibility':'hidden'});
	});
});
</script>
<?php include 'footer.php'; ?>

