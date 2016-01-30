<?php include 'header.php';
include 'usernotlogin.php';
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
				   		<li><a href="logout.php">Logout</a></li>
				    </ul>
			    </li>
			</ul>
  		</div>
  		<div class="inner_title">
  			<p>Dashboard</p>
  		</div>
  		<div>
  			
  		</div>
	</div>
</div>
<?php include 'footer.php';?>