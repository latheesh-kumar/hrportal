<?php include 'header.php';
include 'usernotlogin.php';
?>
	<div class="container-fluid">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_details.php">Employee Details</a></li>
					<li><a href="add_employee.php" target="_blank">Add Employee </a></li>
					<li><a href="hr_employee_leave.php">Employee Leaves</a></li>
					<!-- <li><a href="hr_documents.php">Employee Documents</a></li> -->
					<li><a href="hr_articles.php">Assets</a></li>
					<li><a href="hr_holiday.php">Holiday List</a></li>
				</ul>
			</div>
		</div>
		<?php
			$sel_employee=mysql_query("select user.name,user.user_id,employment.email,employment.manager,employment.status from `user` inner join `employment`
								  on user.user_id=employment.user_id where user.role='2'");
		?>
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
				<p>Employee Details</p>
			</div>
			<div class="table-responsive">
				<table id="tbl" class="table table-striped " border="1">
				<thead class="thead">
				<th>S.No</th>
				<th>Name</th>
				<th>Email Id</th>
				<th>Manager</th>
				<th>Status</th>
				</thead>
				<?php while($sel_emp_list=mysql_fetch_array($sel_employee)){?>
				<tr>
				<td></td>
				<td><a href="hr_employee_view.php?id='<?php echo $sel_emp_list['user_id'];?>'" target="_blank"><?php echo $sel_emp_list['name'];?></a></td>
				<td><?php echo $sel_emp_list['email'];?></td>
				<td><?php echo $sel_emp_list['manager'];?></td>
				<td>
				<?php 
					if($sel_emp_list['status']==1)
						echo "Active";
					else
						echo "Ex-Employee";
					?>
					</td>
				</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function( ) {
    $('#tbl').DataTable( {
        "pagingType": "full_numbers",
        "bSort": false
    });
    $('[href]').each(function(){
    	if(this.href==window.location.href){
    		$(this).addClass("active1");
    	}
    });
 } );
</script>
<?php include 'footer.php';?>
