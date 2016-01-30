<?php include 'header.php';?>
<?php 
if($_SESSION['role']!=1){
header("Location:index.php");
}
?>
<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="side_menu_page">
			<ul>
				<li><a href="#employeelist.php">Employee List</a></li>
				<li><a href="#leave.php">Leaves List</a></li>
				<li><a href="#article.php">Articles List</a></li>
				<li><a href="#holiday.php">Holiday List</a></li>
				<li><a href="#notification.php">Notifications</a></li>
			</ul>
		</div>
	</div>
	<?php
		$sel_employee=mysql_query("select user.name,employment.email,employment.manager,employment.status from `user` inner join `employment`
								  on user.user_id=employment.user_id where user.role='2'");
	?>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<form method="post" class="row hr_con">
			<div class="table-responsive">
				<table id="tbl" class="table table-striped" border="1">
				<thead class="thead">
				<th>Name</th>
				<th>Email Id</th>
				<th>Manager</th>
				<th>Status</th>
				</thead>
				<?php while($sel_emp_list=mysql_fetch_array($sel_employee)){?>
				<tr>
				<td><?php echo $sel_emp_list['name'];?></td>
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
		</form>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#tbl').DataTable( {
        "pagingType": "full_numbers",
        "bSort": false
    } );
 } );
</script>
<?php include 'footer.php';?>