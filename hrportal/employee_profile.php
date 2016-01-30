<?php include 'header.php';
include 'usernotlogin.php';
$emp_prof_id=$_SESSION['user_id'];
$emp_name=$_SESSION['name'];
echo '<p class="wel_mesg">Welcome &nbsp' .$emp_name.'</p>';
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
				   		<li><a href="#">Logout</a></li>
				    </ul>
			    </li>
			</ul>
  		</div>
  		<div class="inner_title">
  			<p>My Profile</p>
  		</div>
  		<div id="prof_head">
				<button class="btn btn-primary prs_shw">Personal Details</button>
				<button class="btn btn-primary edu_shw">Educational Details</button>
				<button class="btn btn-primary prf_shw">Professional Details</button>
				<button class="btn btn-primary ast_shw">Assets Details</button>
				<button class="btn btn-primary doc_shw">Documents Details</button>
				<button class="btn btn-primary emp_shw">Employment Details</button>
  		</div>
  		<div id="personal_shw">
  		<?php $emp_per_shw1=mysql_query("select * from user where user_id=$emp_prof_id");
			while($emp_per_shw=mysql_fetch_array($emp_per_shw1)){
				$emp_per_name1=$emp_per_shw['name'];
				$emp_per_id1=$emp_per_shw['employee_id'];
				$emp_per_fat1=$emp_per_shw['father'];
				$emp_per_mot1=$emp_per_shw['mother'];
				$emp_per_dob1=$emp_per_shw['dob'];
				$emp_per_mst1=$emp_per_shw['maritial_status'];
				$emp_per_bg1=$emp_per_shw['blood_group'];
				$emp_per_mob1=$emp_per_shw['mobile'];
				$emp_per_emgno1=$emp_per_shw['emergency_number'];
				$emp_per_emgp1=$emp_per_shw['emergency_person'];
				$emp_per_pap1=$emp_per_shw['parent_phone'];
				$emp_per_email1=$emp_per_shw['email_personal'];
				$emp_per_sib1=$emp_per_shw['siblings'];
				$emp_per_add1=$emp_per_shw['address'];
				$emp_per_addp1=$emp_per_shw['address_perm'];
				$emp_per_adde1=$emp_per_shw['address_emergency'];
		}?>
		<table class="table table-responsive" border="1">
		<tr><th>Full Name</th><td><?php echo $emp_per_name1 ;?></td></tr>
		<tr><th>Employee Id</th><td><?php echo $emp_per_id1 ;?></td></tr>
		<tr><th>Father's Name</th><td><?php echo $emp_per_fat1;?></td>
		<tr><th>Mother's Name</th><td><?php echo $emp_per_mot1 ;?></td>
		<tr><th>DOB </th><td><?php echo $emp_per_dob1 ;?></td></tr>
		<tr><th>Marital Status</th><td><?php echo $emp_per_mst1;?></td>
		<tr><th>Blood Group</th><td><?php echo $emp_per_bg1 ;?></td></tr>
		<tr><th>Mobile Number</th><td><?php echo $emp_per_mob1 ;?></td>
		<tr><th>Emergency Contact Number</th><td><?php echo $emp_per_emgno1 ;?></td></tr>
		<tr><th>Emergency Contact Person Name</th><td><?php echo $emp_per_emgp1 ;?></td>
		<tr><th>Parents/Guardian Number </th><td><?php echo $emp_per_pap1 ;?></td></tr>
		<tr><th>Personal Email Id</th><td><?php echo $emp_per_email1 ;?></td>
		<tr><th>Siblings</th><td><?php echo $emp_per_sib1;?></td></tr>
		<tr><th>Current Address</th><td><?php echo $emp_per_add1;?></td>
		<tr><th>Permanent Address</th><td><?php echo $emp_per_addp1 ;?></td></tr>
		<tr><th>Emergency Contact Address</th><td><?php echo $emp_per_adde1;?></td>
		</table>

  		</div>
  		<div id="educational_shw">
  		<table id="tbl_shw" class="table" border="1">
					<th>Qualification *</th>
					<th>Board/University *</th>
					<th>Year of Completion *</th>
					<th>Percentage *</th>
					<?php $edu_shw1=mysql_query("select * from education where user_id=$emp_prof_id");
					while($edu_shw=mysql_fetch_array($edu_shw1)){?>
					<tr class="tbl_data">
				<td ><?php echo $user_qul1=$edu_shw['Qualification'];?></td>
				<td ><?php echo $user_univ1=$edu_shw['university'];?></td>
				<td ><?php echo $user_year1=$edu_shw['year'];?></td>
				<td ><?php echo $user_per1=$edu_shw['percentage'];?></td>
			</tr>
			<?php }?>
				</table>

  		</div>
  		<div id="professional_shw">
  			<?php $emp_prf_shw1=mysql_query("select * from professional_details where user_id=$emp_prof_id");?>
  			<table class="table table-responsive tab_det" border="1">
	<thead>
		<th>Category</th>
		<th>Company Name</th>
		<th>Years of Experience</th>
		<th>Old company offer Letter</th>
		<th>Salary Slip</th>
		<th>Bank Statement</th>
	</thead>
	<?php while($emp_prf_shw=mysql_fetch_array($emp_prf_shw1)){?>
		<tr>
				<td><?php echo $cat1=$emp_prf_shw['category'];?></td>
				<td><?php echo $cmp1=$emp_prf_shw['company_name'];?></td>
				<td><?php echo $ex1=$emp_prf_shw['year_experience'];?></td>
				<td><?php echo $off1=$emp_prf_shw['offer_letter'];?></td>
				<td><?php echo $sal1=$emp_prf_shw['salary_slip'];?></td>
				<td><?php echo $bank1=$emp_prf_shw['bank_state'];?></td>
		</tr>
		<?php } ?>
		
		</table>
		</div>
		<div id="asset_shw">
		<?php $ed_art_shw1=mysql_query("select * from articles where user_id=$emp_prof_id");
			while ($ed_art_shw=mysql_fetch_array($ed_art_shw1)){
				 $sel_art_vw1=$ed_art_shw['articles'];
					echo "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'><table class='table table-striped art_ed'><tr><td>$sel_art_vw1</td></tr></table></div> ";
				  }

			?>
		</div>
		<div id="documents_shw">
			<?php $dir = str_replace("'", "", $emp_prof_id);
			  if ($file_rd_shw= opendir($dir)){
			    while (($file_shw= readdir($file_rd_shw)) !== false){
			    	if (($file_shw !== '.') && ($file_shw !== '..')) {
			    		$file_rm_ext_shw=preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_shw);
			      	echo "<p class=''>" . $file_rm_ext_shw ."</p>";
					}
			}
			    closedir($file_rd_shw);
			}
			
		?>
		</div>
		<div id="employment_shw">
			<?php $emp_sts_shw1=mysql_query("select * from employment where user_id=$emp_prof_id");
			while($emp_sts_shw=mysql_fetch_array($emp_sts_shw1)){
				$emp_sts1=$emp_sts_shw['status'];
				$emp_em1=$emp_sts_shw['email'];
				$emp_pass1=$emp_sts_shw['password'];
				$emp_mgr1=$emp_sts_shw['manager'];
				$emp_cmp1=$emp_sts_shw['new_company'];
				$emp_em_per1=$emp_sts_shw['email_personal'];
				$emp_locate1=$emp_sts_shw['location'];
				$emp_cdet1=$emp_sts_shw['contact_details'];

			}?>
			<?php if($emp_sts1==1){?>
		<table class="table table-responsive" border="1">
		<thead>
		<th>Email</th>
		<th>Manager</th>
		<th>Status</th>
		</thead>
		<tr>
		<td><?php echo $emp_em1 ;?></td>
		<td><?php echo $emp_mgr1 ;?></td>
		<td><?php echo "Active" ;?></td>
		</tr>
		</table>
		<?php } ?>
		</div>
  		
	</div>
</div>
<script>
$(document).ready(function(){
	$('#personal_shw').show();
	$('.prs_shw').click(function(){
		$('#personal_shw').show();
		$('#educational_shw').hide();
		$('#professional_shw').hide();
		$('#asset_shw').hide();
		$('#documents_shw').hide();
		$('#employment_shw').hide();
	});
	$('.edu_shw').click(function(){
		$('#educational_shw').show();
		$('#personal_shw').hide();
		$('#professional_shw').hide();
		$('#asset_shw').hide();
		$('#documents_shw').hide();
		$('#employment_shw').hide();
	});
$('.prf_shw').click(function(){
		$('#professional_shw').show();
		$('#personal_shw').hide();
		$('#educational_shw').hide();
		$('#asset_shw').hide();
		$('#documents_shw').hide();
		$('#employment_shw').hide();
	});
$('.ast_shw').click(function(){
		$('#asset_shw').show();
		$('#personal_shw').hide();
		$('#educational_shw').hide();
		$('#professional_shw').hide();
		$('#documents_shw').hide();
		$('#employment_shw').hide();
	});
$('.doc_shw').click(function(){
		$('#documents_shw').show();
		$('#personal_shw').hide();
		$('#educational_shw').hide();
		$('#professional_shw').hide();
		$('#asset_shw').hide();
		$('#employment_shw').hide();
	});
$('.emp_shw').click(function(){
		$('#employment_shw').show();
		$('#personal_shw').hide();
		$('#educational_shw').hide();
		$('#professional_shw').hide();
		$('#asset_shw').hide();
		$('#documents_shw').hide();
	});
	$('[href]').each(function(){
		if(this==window.location.href){
			$(this).addClass("active1");
		}
	});

});

</script>
<?php include 'footer.php';?>