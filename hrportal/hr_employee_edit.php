<?php 
include 'header.php';
$emp_ed_id=$_GET["id"];
$_SESSION['$emp_vw_id']=$emp_ed_id;
$id_emp=$_SESSION['$emp_vw_id'];
?>
<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_view.php">Personal Details</a></li>
					<li><a href="hr_emp_edu_view.php">Educational Qualification</a></li>
					<li><a href="hr_emp_prof_view.php">Professional Details</a></li>
					<li><a href="hr_emp_art_view.php">Returnable Articles</a></li>
					<li><a href="hr_emp_recr_view.php">Recruitment Process</a></li>
					<li><a href="hr_emp_doc_view.php">Documents</a></li>
					<li><a href="hr_emp_sts_view.php">Staus Employment</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<h3 class="view_head">Personal Details</h3>
		</div>
</div>
<?php include 'footer.php';?>