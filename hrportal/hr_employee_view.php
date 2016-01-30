<?php 
include 'header.php';
$view_id_emp=$_GET['id'];
$_SESSION['sel_id']=$view_id_emp;
$sid=$_SESSION['sel_id'];
$root_path=dirname(__FILE__);
// $root_path=str_replace("'", "", $root_path1);

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
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_emp_leave_list.php?id=<?php echo $sid;?>">Add Employee Leaves</a></li>
				</ul>
			</div>
		</div>
		<?php 
			$sel_emp_per1=mysql_query("select * from user where user_id=$sid");
			while($sel_emp_per=mysql_fetch_array($sel_emp_per1)){
				$emp_per_name=$sel_emp_per['name'];
				$emp_per_id=$sel_emp_per['employee_id'];
				$emp_per_fat=$sel_emp_per['father'];
				$emp_per_mot=$sel_emp_per['mother'];
				$emp_per_dob=$sel_emp_per['dob'];
				$emp_per_mst=$sel_emp_per['maritial_status'];
				$emp_per_bg=$sel_emp_per['blood_group'];
				$emp_per_mob=$sel_emp_per['mobile'];
				$emp_per_emgno=$sel_emp_per['emergency_number'];
				$emp_per_emgp=$sel_emp_per['emergency_person'];
				$emp_per_pap=$sel_emp_per['parent_phone'];
				$emp_per_email=$sel_emp_per['email_personal'];
				$emp_per_sib=$sel_emp_per['siblings'];
				$emp_per_add=$sel_emp_per['address'];
				$emp_per_addp=$sel_emp_per['address_perm'];
				$emp_per_adde=$sel_emp_per['address_emergency'];
		}?>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<h3 class="view_head">Personal Details</h3>
		<p class="back_text"><a href="<?php $root_path;?>hr_employee_details.php">  </a></p>
		<div class="personal_ed col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
		<table class="table table-responsive" border="1">
		<tr><th>Full Name</th><td><?php echo $emp_per_name ;?></td></tr>
		<tr><th>Employee Id</th><td><?php echo $emp_per_id ;?></td></tr>
		<tr><th>Father's Name</th><td><?php echo $emp_per_fat;?></td>
		<tr><th>Mother's Name</th><td><?php echo $emp_per_mot ;?></td>
		<tr><th>DOB </th><td><?php echo $emp_per_dob ;?></td></tr>
		<tr><th>Marital Status</th><td><?php echo $emp_per_mst;?></td>
		<tr><th>Blood Group</th><td><?php echo $emp_per_bg ;?></td></tr>
		<tr><th>Mobile Number</th><td><?php echo $emp_per_mob ;?></td>
		<tr><th>Emergency Contact Number</th><td><?php echo $emp_per_emgno ;?></td></tr>
		<tr><th>Emergency Contact Person Name</th><td><?php echo $emp_per_emgp ;?></td>
		<tr><th>Parents/Guardian Number </th><td><?php echo $emp_per_pap ;?></td></tr>
		<tr><th>Personal Email Id</th><td><?php echo $emp_per_email ;?></td>
		<tr><th>Siblings</th><td><?php echo $emp_per_sib;?></td></tr>
		<tr><th>Current Address</th><td><?php echo $emp_per_add ;?></td>
		<tr><th>Permanent Address</th><td><?php echo $emp_per_addp ;?></td></tr>
		<tr><th>Emergency Contact Address</th><td><?php echo $emp_per_adde;?></td>
		</table>
		<button type="submit"  class="btn btn-primary per_edit">EDIT</button>
	</div>
	<div class="clear"></div>
		<?php
			if(isset($_POST['sub1_ed']))
			{
				$name_ed=ucfirst($_POST['usr_ed']);
				$fname_ed=$_POST['fname_ed'];
				$mname_ed=$_POST['mname_ed'];
				$dob1_ed=strtotime($_POST['dob_ed']);
				$dob_ed=date('y-m-d',$dob1_ed);
				$mstatus_ed=$_POST['mstatus_ed'];
				$bgroup_ed=$_POST['bgroup_ed'];
				$mnumber_ed=$_POST['mnumber_ed'];
				$emnumber_ed=$_POST['emnumber_ed'];
				$emname_ed=$_POST['emname_ed'];
				$parnum_ed=$_POST['parnum_ed'];
				$peremail_ed=$_POST['peremail_ed'];
				$sibling_ed=$_POST['sibling_ed'];
				$caddress_ed=$_POST['caddress_ed'];
				$paddress_ed=$_POST['paddress_ed'];
				$ecaddress_ed=$_POST['ecaddress_ed'];
				$up_per=mysql_query("update `user` set `name`='$name_ed',`father`='$fname_ed',`mother`='$mname_ed',`dob`='$dob_ed',`maritial_status`='$mstatus_ed',
								`blood_group`='$bgroup_ed',`mobile`='$mnumber_ed',`emergency_number`='$emnumber_ed',`emergency_person`='$emname_ed',`parent_phone`='$parnum_ed',`email_personal`='$peremail_ed',
								`siblings`='$sibling_ed',`address`='$caddress_ed',`address_perm`='$paddress_ed',`address_emergency`='$ecaddress_ed' where user_id=$sid");
				if($up_per)
				{
					header("Location:#");
				}
				else
				{
					echo "<p class='alert alert-danger'>Not updated</p>";
				}
			}
		?>
		<div id="personal_edit">
			<h3>Personal Details</h3>
			<form role="form" id="per_form" method="post" action="">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Full Name *</label>
		      			<input type="text" class="form-control" id="usr_ed" name="usr_ed" value="<?php echo $emp_per_name;?>">
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label>Father's Name *</label>
		      			 <input type="text" class="form-control" id="fname_ed" name="fname_ed" value="<?php echo $emp_per_fat;?>">
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label >Mother's Name *</label>
		      			 <input type="text" class="form-control" id="mname_ed" name="mname_ed" value="<?php echo $emp_per_mot;?>">
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						  <label>DOB *</label>
		       			  <input type="text" class="form-control cdate" id="dob_ed" placeholder="dd/mm/yyyy" name="dob_ed" value="<?php echo $emp_per_dob;?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group" >
						 <label>Marital Status *</label><br>
		    			 <select class="mstatus form-control"  name="mstatus_ed" >
		    				<option value="<?php echo $emp_per_mst;?>"><?php echo $emp_per_mst;?></option>
		    			 	<option value="single" >Single</option>
		    			 	<option value="married" >Married</option>
		    			 </select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						  <label>Blood Group *</label><br>
		    	          <select name="bgroup_ed" class="form-control" >
		    	          	<option value="<?php echo $emp_per_bg;?>"><?php echo $emp_per_bg;?></option>
		    	          	<option value="A+">A+</option>
		    	          	<option value="A-">A-</option>
		    	          	<option value="B+">B+</option>
		    	          	<option value="B-">B-</option>
		    	          	<option value="AB+">AB+</option>
		    	          	<option value="AB-">AB-</option>
		    	          	<option value="O+">O+</option>
		    	          	<option value="O-">O-</option>
		    	          </select>
					</div>
				</div>
				<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<label>Photo Upload</label>
					<input type="file"  id="photo" name="photo">
				</div> -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Mobile Number *</label>
		    			 <input type="tel" class="form-control" id="mnumber_ed" name="mnumber_ed" value="<?php echo $emp_per_mob;?>">
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label>Emergency Contact Number *</label>
		    			 <input type="tel" class="form-control" id="emnumber_ed" name="emnumber_ed" value="<?php echo $emp_per_emgno;?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Emergency Contact Person Name *</label>
						<input type="text" class="form-control" id="emname_ed" name="emname_ed" value="<?php echo $emp_per_emgp;?>">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Parents/Guardian Number *</label>
						<input type="text" class="form-control" id="parnum_ed" name="parnum_ed" value="<?php echo $emp_per_pap;?>">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Personal Email Id *</label>
						<input type="text" class="form-control" id="peremail_ed" name="peremail_ed" value="<?php echo $emp_per_email;?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Siblings *</label>
		    			<textarea class="form-control" rows="3"  column="5" id="sibling_ed" name="sibling_ed" > <?php echo $emp_per_sib;?></textarea>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Current Address *</label>
		    			<textarea class="form-control" rows="3" columns="5" id="caddress_ed" name="caddress_ed" ><?php echo $emp_per_add;?> </textarea>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Permanent Address *</label>
		    			<textarea class="form-control" rows="3" columns="5" id="paddress_ed" name="paddress_ed" > <?php echo $emp_per_addp;?></textarea>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label>Emergency Contact Address *</label>
		    			<textarea class="form-control" rows="3" columns="5" id="ecaddress_ed" name="ecaddress_ed" > <?php echo $emp_per_adde;?></textarea>
					</div>
				</div>
			</div>		 	
				<button type="submit" class="btn btn-success" id="sub1" name="sub1_ed">SAVE</button>
				<button type="button" name="sub3_can" class="btn btn-warning" id="per_can">CANCEL</button> 
		</form>
		</div>
		</div>
</div>
<script>
$(document).ready(function(){
	$("[href]").each(function() {
    if(this.href == window.location.href) {
        $(this).addClass("active1");
        }
});
	$('.per_edit').click(function(){
		$('#personal_edit').show();
	});
	$('#per_can').click(function(){
		$('#personal_edit').hide();
	});
});
</script>
<?php include 'footer.php';
?>