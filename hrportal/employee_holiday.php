<?php include 'header.php';

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
				   		<li><a href="logout.php">Logout</a></li>
				    </ul>
			    </li>
			</ul>
  		</div>
  		<div class="inner_title">
  			<p>Holiday List</p>
  		</div>
  		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<label>Select Years</label>
				<?php $current_year=date('Y');?>
				<select class="form-control" id="holiday_emp">
					<option value="<?php echo $current_year;?>" selected="true" disabled="disabled"><?php echo $current_year;?></option>
					<?php
						$holi_list_emp_sel1=mysql_query("select DISTINCT  year from holiday order by year ASC");
						while($holi_list_emp_sel=mysql_fetch_array($holi_list_emp_sel1))
						{
							$emp_holi_list=$holi_list_emp_sel['year'];
							 echo "<option value='$emp_holi_list'>$emp_holi_list</option>";
						}
					?>
				</select>
			</div>
			<div class="clear"></div>
			<table class="table table-responsive holiday_tbl" border="1" id="holiday_current">
				      <tr>
				        <tr>
				        <th>S.NO</th>
				        <th>DATE</th>
				        <th>DAY</th>
				        <th>HOLIDAY</th>
				        <th>YEAR</th>
				    </tr>
				<?php 
				$holi_list_curr_year1=mysql_query("select * from  holiday where year='$current_year'");
				while($holi_list_curr_year=mysql_fetch_array($holi_list_curr_year1))
				{
					echo "
							<tr>
							<td></td>
							<td>$holi_list_curr_year[date]</td>
							<td>$holi_list_curr_year[day]</td>
							<td>$holi_list_curr_year[holiday]</td>
							<td>$holi_list_curr_year[year]</td>
							</tr>
				         ";
				
				}
				?>
				</table>
			<div id="holiday_day_shw"></div> 
	</div>
</div>
<?php include 'footer.php';?>
<script>
	$(document).ready(function(){
		$('#holiday_emp').hover(function(){
			$(this).prop('disabled',false);
		});
		$("#holiday_emp").change(function(){

			var emp_holi=$(this).val();
			//alert(emp_holi);
			$.ajax({
					url:"emp_holi_shw.php",
					data:{ emp_holi_shw:emp_holi },
					type:"GET",
					success:function(data){
						$("#holiday_day_shw").html(data);
						$('#holiday_current').hide();
					}
			});
		});
		$('[href]').each(function(){
			if(this.href==window.location.href){
				$(this).addClass("active1");
			}
		});
	});
</script>