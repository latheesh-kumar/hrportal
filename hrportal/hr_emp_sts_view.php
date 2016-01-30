<?php include 'header.php';
$sid=$_SESSION['sel_id'];
?>
<div class="container-fluid">
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
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
		<?php $sel_emp_sts1=mysql_query("select * from employment where user_id=$sid");
			while($sel_emp_sts=mysql_fetch_array($sel_emp_sts1)){
				$emp_sts=$sel_emp_sts['status'];
				$emp_em=$sel_emp_sts['email'];
				$emp_pass=$sel_emp_sts['password'];
				$emp_mgr=$sel_emp_sts['manager'];
				$emp_cmp=$sel_emp_sts['new_company'];
				$emp_em_per=$sel_emp_sts['email_personal'];
				$emp_locate=$sel_emp_sts['location'];
				$emp_cdet=$sel_emp_sts['contact_details'];

			}?>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<h3 class="view_head">Status Employment</h3>
	<div class="employment_ed">
		<?php if($emp_sts==1){?>
		<table class="table table-responsive" border="1">
		<thead>
		<th>Email</th>
		<th>Manager</th>
		<th>Status</th>
	</thead>
		<tr>
		<td><?php echo $emp_em ;?></td>
		<td><?php echo $emp_mgr ;?></td>
		<td><?php echo "Active" ;?></td>
		</tr>
		</table>
	<?php
		}
		else
		{?>
		<table class="table table-responsive" border="1">
		<thead>
		<th>New Company</th>
		<th>Personal Email</th>
		<th>Location</th>
		<th>Contact No</th>
		<th>Status</th>
		</thead>
		<tr>
		<td><?php echo $emp_cmp ;?></td>
		<td><?php echo $emp_em_per ;?></td>
		<td><?php echo $emp_locate ;?></td>
		<td><?php echo $emp_cdet ;?></td>
		<td><?php echo "Ex-Employee" ;?></td>
		</tr>
		<?php
		}
		?>
		</table>
		<button type="submit" class="btn btn-primary emp_edit">EDIT</button>
	</div>
	<?php
	if(isset($_POST['sub6_ed']))
	{  
	if(!empty($_POST['active_ed'])) {
	$email_ed=$_POST['act_email_ed'];
	$password1=$_POST['pass_ed'];
	$password_ed=md5($password1);
	$man_name_ed=$_POST['manager_ed'];
	$up_ed=mysql_query("update employment set `email`='$email_ed',`password`='$password_ed',`manager`='$man_name_ed' where user_id=$sid");
}
else
{
	$comp_name_ed=$_POST['company_name_ed'];
	$email_per_ed=$_POST['ex_email_ed'];
	$locat_ed=$_POST['location_ed'];
	$cdetails_ed=$_POST['cdetails_ed'];
	$up_ex=mysql_query("update `employment` set `new_company`='$comp_name_ed',`email_personal`='$email_per_ed',`location`='$locat_ed',`contact_details`='$cdetails_ed' ,`status`='2' where user_id=$sid");
	$sel=mysql_query("select * from employment where user_id=$sid and status='2'");
	while($row=mysql_fetch_array($sel))
	{
		$sts_ed=$row['status'];
		$user_ed=$row['user_id'];
	}
	$up_ed=mysql_query("update `user` set status='$sts_ed' where user_id='$user_ed'");
}
if($up_ed){
	header("Location:#");
}
else
{
	echo "<p class='alert alert-danger'>Not Updated</p>";
}
}
?>
	<div id="employee_ed">
				
				<form role="form" method="post">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<input type="checkbox" id="chk_ed1"  name="active_ed" class="chk">
							<label>Active</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<input type="checkbox" id="chk_ed2" class="chk" name="ex_ed">
							<label>Ex-Employee</label>
						</div>
					</div>
					<div class="row active">
					<h4>Active</h4>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<label>Email Id *</label>
							<input type="email" class="form-control" id="act_email_ed" name="act_email_ed" value="<?php echo $emp_em ;?>" >
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<label>Password *</label>
							<input type="password" class="form-control" id="pass_ed" name="pass_ed" value="<?php echo $emp_pass ;?>">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<label>Manager *</label>
							<select id="manager_ed" name="manager_ed" class="form-control" >
		    				<option value="<?php echo $emp_mgr ;?>"><?php echo $emp_mgr ;?></option>
		    				<option value="none">None</option>
		    				</select>
						</div>
					</div>
					<div class="row ex_employee">
					<h4>Ex-Employee</h4>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>New Company Name *</label>
							<input type="text" class="form-control" id="new_company_ed" name="company_name_ed" value="<?php echo $emp_cmp;?>">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>Email Id *</label>
							<input type="email" class="form-control" id="ex_email_ed" name="ex_email_ed" value="<?php echo $emp_em_per;?>">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>Location *</label>
							<input type="text" class="form-control" id="location_ed" name="location_ed" value="<?php echo $emp_locate;?>">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>Contact Details *</label>
							<input type="text" class="form-control" id="cdetails_ed" name="cdetails_ed" value="<?php echo $emp_cdet;?>">
						</div>
					</div>
					<button type="submit" class="btn btn-success" name="sub6_ed" id="sub_emp">Save</button>
					<button type="button" name="sub6_can" class="btn btn-warning" id="emp_can">CANCEL</button> 
				</form>
			</div>

</div>
</div>
<script>
	$(document).ready(function(){
		$("#chk_ed1").change(function(){
 		$('input.chk').not(this).prop('checked', false);
 		if($("#chk_ed1").is(':checked')){
 			$(".ex_employee").hide(); 
    		$(".active").toggle(); 
    	}	// $("#pass,#act_email,#act_manager").prop('required',true);
    	
    });
    $("#chk_ed2").change(function(){
 		$('input.chk').not(this).prop('checked',false);
 		if($("#chk_ed2").is(':checked')){
 			 $(".active").hide();
 			$(".ex_employee").toggle(); 
    		}
    });
    $('.emp_edit').click(function(){
		$('#employee_ed').css({'visibility':'visible'});
	});
	$('#emp_can').click(function(){
		$('#employee_ed').css({'visibility':'hidden'});
	});

	});
</script>
<?php include 'footer.php';
?>