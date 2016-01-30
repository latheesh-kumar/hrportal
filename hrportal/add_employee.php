<?php include 'header.php';?>
<?php 
include 'usernotlogin.php';
if($_SESSION['role']!=1){
header("Location:index.php");
}
include 'personal_db.php';
include 'educational_db.php';
include 'professional_details_db.php';
include 'articles_db.php';
include 'recruitment_db.php';
include 'upload_document.php';
include 'employment_db.php';
?>
  <div class="container-fluid">
	<div class="tabs" >
		<div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
			<div class="side_menu">
			<ul>
				<li><a href="#personal">Personal Details</a></li>
				<!-- <li><a href="#profile">Profile Image</a></li> -->
				<li><a href="#education">Education Qualification</a></li>
				<li><a href="#profession">Professional Details</a></li>
				<li><a href="#article">Returnable Articles</a></li>
				<li><a href="#recruitment">Recruitment Process</a></li>
				<li><a href="#documents">Documents</a></li>
				<li><a href="#employee">Status of Employment</a></li>
			</ul>
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div id="personal">
			<?php 
				if($_SESSION['emp_email']==""){
					//echo "<p class='alert alert-danger'>Details Could not be added.Please Try Again</p>";
			?>
			<h3>Personal Details</h3>
			<form role="form" id="per_form" method="post" action="">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Full Name *</label>
		      			<input type="text" class="form-control" id="usr" name="usrname" required>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label>Father's Name *</label>
		      			 <input type="text" class="form-control" id="fname" name="fname" required>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label >Mother's Name *</label>
		      			 <input type="text" class="form-control" id="mname" name="mname" required>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						  <label>DOB *</label>
		       			  <input type="text" class="form-control cdate" id="dob" placeholder="dd/mm/yyyy" name="dob" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group" >
						 <label>Marital Status *</label><br>
		    			 <select class="mstatus form-control"  name="mstatus" required>
		    				<option value="">---Select---</option>
		    			 	<option value="single" required>Single</option>
		    			 	<option value="married" required>Married</option>
		    			 </select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						  <label>Blood Group *</label><br>
		    	          <select name="bgroup" class="form-control" required>
		    	          	<option value="">---Select---</option>
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
		    			 <input type="tel" class="form-control" id="mnumber" name="mnumber" required>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label>Emergency Contact Number *</label>
		    			 <input type="tel" class="form-control" id="emnumber" name="emnumber" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Emergency Contact Person Name *</label>
						<input type="text" class="form-control" id="em_name" name="emname" required>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Parents/Guardian Number *</label>
						<input type="text" class="form-control" id="par_num" name="parnum" required>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Personal Email Id *</label>
						<input type="text" class="form-control" id="per_email" name="peremail" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Siblings *</label>
		    			<textarea class="form-control" rows="3"  column="5" id="sibling" name="sibling" required> </textarea>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Current Address *</label>
		    			<textarea class="form-control" rows="3" columns="5" id="caddress" name="caddress" required> </textarea>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Permanent Address *</label>
		    			<textarea class="form-control" rows="3" columns="5" id="paddress" name="paddress" required> </textarea>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						 <label>Emergency Contact Address *</label>
		    			<textarea class="form-control" rows="3" columns="5" id="ecaddress" name="ecaddress" required> </textarea>
					</div>
				</div>
			</div>		 	
				<button type="submit" class="btn btn-primary" id="sub1" name="sub1" >NEXT</button>
		</form>
		<?php } else{
			echo "<p class='alert alert-success'>Personal details has been filled.Please go to the next section</p>";
		}
			?>
		</div>
		<div id="education">
			<?php
				 
				if(!isset($_SESSION['edu'])){
			?>
		<h3>Educational Qualification</h3>
		<form role="form" method="post" action="">
			<div class="table-responsive">
				<table id="tbl" class="table">
					<th>Qualification *</th>
					<th>Board/University *</th>
					<th>Year of Completion *</th>
					<th>Percentage *</th>
					<tr>
						<td><input type="text" id="qul" name="qul[]" class="form-control" required></td>
						<td><input type="text" id="uni" name="uni[]" class="form-control" required></td>
						<td><input type="text" id="year" name="year[]" class="form-control" required></td>
						<td><input type="text" id="percent" name="percent[]" class="form-control" required></td>
						<td></td>
					</tr>
				</table>
				</div>
				<button type="button" id="add" class="btn btn-primary">+ ADD MORE</button>
				<button type="submit" class="btn btn-primary" id="sub_education" name="sub2" disabled="disabled">NEXT</button>
				<?php
			if($user_empe!=""){
			?>
			<script type="text/javascript">
			$('#sub_education').prop('disabled',false);</script>
			<?php } ?>
			</form>
			<?php } else{
			echo "<p class='alert alert-success'>Educational details has been filled.Please go to the next section</p>";
			}
			?>
		</div>
		<div id="profession">
		<?php 
				if($_SESSION['prof']==""){
			?>
		<h3>Professional Details</h3>
		<form role="form" method="post" enctype="multipart/form-data" action="">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
					<div class="drop-down">
						<label>Fresher/Experienced *</label><br>
						<select name="masters" class="form-control" id="profess" required>
							<option value="">-----Select-----</option>
							<option value="Fresher">Fresher</option>
							<option value="Experienced">Experienced</option>
						</select>
					</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Company Name *</label>
					<input type="text" class="form-control" id="company_name" name="company_name" required>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Years of Experience *</label>
					<input type="text" class="form-control" id="experience" name="experience" required>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Offer Letter of old company *</label><br>
					<select name="offer_letter" class="form-control" id="offer_letter" required>
							<option value="">-----Select-----</option>
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
					<select name="salary_slip"class="form-control" id="salary_slip" required>
						<option value="">-----Select-----</option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>3 Month Bank Statement *</label><br>
					<select name="bank_state" class="form-control" id="bank_state" required>
						<option value="">-----Select-----</option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<label>Resume *</label>
				<input type="file"  id="Resume" name="resume" required>
			</div> -->
		</div>
		<button type="submit"  name="sub3" class="btn btn-primary" id="sub_prof" disabled="disabled">NEXT</button>
		<?php
			if($user_empe!=""){
			?>
			<script type="text/javascript">
			$('#sub_prof').prop('disabled',false);</script>
			<?php } ?>
		</form>
		<?php } 
		else{
			echo "<p class='alert alert-success'>Professional details has been filled.Please go to the next section.";
			}
			?>
		</div>
		<div id="article">
			<?php 
				if(!isset($_SESSION['article'])){
			?>
		<h3>Returnable Articles</h3>
			<form role="form" method="post" id="article">
				<div class="row">
				<?php 	
					$sel_emp_ast1=mysql_query("select * from emp_asset");
					while($sel_emp_ast=mysql_fetch_array($sel_emp_ast1)){
						$shw_emp=$sel_emp_ast['emp_asset_name'] ;
						echo "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12 emp_asset_form'>
							<input type='checkbox' id='article[]' name='article[]' value='".$shw_emp."'>
							<label>".$shw_emp."</label></div>";
						}
					?>
				<!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="id_card" name="article[]" value="ID Card">
					<label>ID Card</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="laptop" name="article[]" value="Laptop">
					<label>Laptop</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="mouse" name="article[]" value="Mouse">
					<label>Mouse</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="phone" name="article[]" value="Phone">
					<label>Phone</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="sim_card" name="article[]" value="Simcard">
					<label>Sim Card</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="data_card" name="article[]" value="Datacard">
					<label>Data Card</label>
				</div> -->
				</div>
				<button type="submit" class="btn btn-primary" id="sub_art" name="sub4" id="sub_art" disabled="disabled">NEXT</button>
				<?php
			if($user_empe!=""){
			?>
			<script type="text/javascript">
			$('#sub_art').prop('disabled',false);</script>
			<?php } ?>
			</form>
				<?php }
			else{
					echo "<p class='alert alert-success'>Articles Details has been filled.Please go to the next section</p>";
				}
			?>
			</div>
			<div id="recruitment">
			<?php
				if($_SESSION['recr']==''){
			?>
		<h3>Recruitment Process</h3>
		<form role="form" method="post">
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<label>Reffered By *</label><br>
					<select name="reference" class="form-control" required>
						<option value="">-----Select-----</option>
						<option value="none">None</option>
							<option value="employee">Employee</option>
							<option value="hr">HR Manager</option>
					</select>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Refference ID *</label>
					<input type="text" class="form-control" id="ref_id" name="ref_id" required>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Post *</label>
					 <select class="form-control">
					 <option value=''>-----Select------</option>
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
					<input type="text" class="form-control cdate" id="idate" placeholder="mm/dd/yyyy" name="idate" required>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Joining Date *</label>
					<input type="text" class="form-control cdate" id="jdate" placeholder="mm/dd/yyyy" class="date" name="jdate" required>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Salary *</label>
					<input type="text" class="form-control" id="salary_emp" placeholder="Salary" class="salary" name="salary_emp" required>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label>Probation Period *</label>
					<select name="p_period" class="form-control">
					<option value="">----Select----</option>
					<option value="0">None</option>
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
			<button type="submit" class="btn btn-primary" name="sub5"  id="sub_recu" disabled="disabled">NEXT</button>
			<?php
			if($user_empe!=""){
			?>
			<script type="text/javascript">
			$('#sub_recu').prop('disabled',false);</script>
			<?php } ?>
		</form>
			<?php }
			else{
					echo "<p class='alert alert-success'>Recruitment Process has been filled.Please go to the next section</p>";

				}?>
		</div>
			<div id="documents">
				<h3>List of Documents</h3>
				<form enctype="multipart/form-data" method="post" action="">
				     <input type="file" name="files[]" multiple="" placeholder="Upload The Resumes"  />
				     <button type="submit" class="btn btn-primary" name="sub_docu" id="sub_docu" disabled="disabled">NEXT</button>
				     <?php
						if($user_empe!=""){
						?>
						<script type="text/javascript">
						$('#sub_docu').prop('disabled',false);</script>
						<?php } ?>
			    </form>
			    <?php 
			    if(@$message) {
			    	echo "<p class='alert alert-success'>$message</p>"; 
			    	?>
					<script>
						window.location="#employee";
					</script>
					<?php
				    }
			    else if(@$message1==""){
			    	echo "<p class='alert alert-danger empty'>$message1</p>";
			    	?>
			    	<script type="text/javascript">
			    	$('.empty').hide()</script>
			    	<?php
			    	}
			    	else{
			    		echo "<p class='alert alert-danger'>$message1</p>";
			    		?>
			    		<script>
			    			window.location="#documents";
			    		</script>
			    		<?php
			    	}
			    	?>
			    </div>
		<div id="employee">
				<h3>Status of Employment</h3>
				<form role="form" method="post">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<input type="checkbox" id="chk1"  name="active" class="chk">
							<label>Active</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<input type="checkbox" id="chk2" class="chk" name="ex">
							<label>Ex-Employee</label>
						</div>
					</div>
					<div class="row active">
					<h4>Active</h4>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<label>Email Id *</label>
							<input type="email" class="form-control" id="act_email" name="act_email" >
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<label>Password *</label>
							<input type="password" class="form-control" id="pass" name="pass" >
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<label>Manager *</label>
							<select id="act_manager" name="manager" class="form-control" >
		    				<option value="">---Select---</option>
		    				<option value="none">None</option>
		    				</select>
						</div>
					</div>
					<div class="row ex_employee">
					<h4>Ex-Employee</h4>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>New Company Name *</label>
							<input type="text" class="form-control" id="new_company" name="company_name" >
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>Email Id *</label>
							<input type="email" class="form-control" id="ex_email" name="ex_email" >
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>Location *</label>
							<input type="text" class="form-control" id="location" name="location" >
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label>Contact Details *</label>
							<input type="text" class="form-control" id="c_details" name="c_details" >
						</div>
					</div>
					<button type="submit" class="btn btn-primary" name="sub6" id="sub_emp" disabled="disabled">SUBMIT</button>
					<?php
						if($user_empe!=""){
						?>
						<script type="text/javascript">
						$('#sub_emp').prop('disabled',false);</script>
						<?php } ?>
					</form>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $("#add").on("click",function(){
  		$("#tbl").append("<tr><td><input type='text' id='qul' name='qul[]' class='form-control' required></td><td><input type='text' id='uni' name='uni[]' class='form-control' required></td><td><input type='text'id='year' name='year[]' class='form-control' required></td><td><input type='text' id='percent' name='percent[]' class='form-control' required></td><td><button type='button' class='btn btn-default remo'>REMOVE</a></td></tr>");
	});
	$('table').on('click','tr .remo',function(e){
	    e.preventDefault();
        $(this).closest('tr').remove();
      });
	$('.tabs')
    .tabs()
    .addClass('ui-tabs-vertical ui-helper-clearfix');
    $('#profess').change(function(){
    	if ($(this).val() == "experienced") {
    		$('#company_name,#experience,#offer_letter,#salary_slip,#bank_state').prop("disabled",false);
    	}
    	else{
    		$('#company_name,#experience,#offer_letter,#salary_slip,#bank_state').prop("disabled",true);
    	}
    });
 	$("#chk1").change(function(){
 		$('input.chk').not(this).prop('checked', false);
 		if($("#chk1").is(':checked')){
 			$(".ex_employee").hide(); 
    		$(".active").toggle(); 
    		// $("#pass,#act_email,#act_manager").prop('required',true);
    	}
    });
    $("#chk2").change(function(){
 		$('input.chk').not(this).prop('checked',false);
 		if($("#chk2").is(':checked')){
 			$(".active").hide(); 
 			$(".ex_employee").toggle(); 
    		}
    });
   $("#sub_art").click(function(){
   		var chk=$("#article input[type=checkbox]:checked")
   		if(chk.length==0)
   		{
   			alert("Please select atleast one checkbox");
   		}
   });
});
</script>
<?php include 'footer.php';?>