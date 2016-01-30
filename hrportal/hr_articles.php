<?php include 'header.php';
include 'usernotlogin.php';?>
<script src="/apps/hrportal/js/bootstrap.min.js"></script>
<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="side_menu_page">
			<ul>
				<li><a href="hr_employee_details.php">Employee Details</a></li>
					<li><a href="add_employee.php">Add Employee </a></li>
					<li><a href="hr_employee_leave.php">Employee Leaves</a></li>
					<!-- <li><a href="hr_documents.php">Employee Documents</a></li> -->
					<li><a href="hr_articles.php">Assets</a></li>
					<li><a href="hr_holiday.php">Holiday List</a></li>
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
			<p>Assets</p>
		</div>
		<div id="asset">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 emp_asset">
					<input type="checkbox" name="emp_ast" class="emp_ast chk"><label>Employee Assets</label>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<input type="checkbox" name="cmp_ast" class="cmp_ast chk"><label>Company Assets</label>
				</div>
			</div>
			<div id="emp_asset_list">
				<?php 	
					$sel_ast1=mysql_query("select * from emp_asset");
					while($sel_ast=mysql_fetch_array($sel_ast1)){
						$shw=$sel_ast['emp_asset_name'] ;
						echo "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12 emp_asset_form'>
							<input type='radio' id='emp_ast' name='emp_ast' value='".$shw."'>
							<label>".$shw."</label></div>";
						}
					?>
				</div><div class="clear"></div>
				<button type="button"  class="btn btn-primary ast_add" data-toggle="modal" data-target="#popup">Add</button>
				<button type="button"  class="btn btn-warning ast_del" data-toggle="modal" data-target="#popup_del">Delete</button>
				
				<div class=" modal fade "id="popup">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Add Employee Assets</h4>
							</div>
							<div class="modal-body">
								<form action="" name="" id="asst_form"   method="post" >
									<p class="notify_text1">Add Asset <input type="text" name="newasset" id="newasset" value="">
									<input type="submit" name="ast_add" id="ast_add" value="Add">
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php 
					if(isset($_POST['del_ast']))
					{
						$delete_ast=$_POST['ast_del'];
						for($i=0;$i<sizeof($delete_ast);$i++)
							$del=mysql_query("delete from `emp_asset` where emp_asset_name='$delete_ast[$i]'");
						if($del){
							header("Location:#");
						}
						else
						{
							echo "<p class='alert alert-danger'>Not Deleted</p>";
						}
					}
				?>				
					<div class=" modal fade "id="popup_del">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Delete Employee Assets</h4>
							</div>
							<div class="modal-body">
								<form action="" name="" id="asst_form"   method="post" >
									<?php 	
										$sel_ast1=mysql_query("select * from emp_asset");
										while($sel_ast=mysql_fetch_array($sel_ast1)){
											$shw=$sel_ast['emp_asset_name'] ;
											echo "<p class='col-md-3 '>
												<input type='checkbox' id='ast_del' name='ast_del[]' value='".$shw."'>
												<label class='del_lab'>".$shw."</label></p>";
											}
										?>
										<input type="submit" class="btn btn-warning" name="del_ast" id="del_ast"value="Delete">
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php 
					if(isset($_POST['del_ast_cmp']))
					{
						$delete_ast_cmp=$_POST['ast_del_cmp'];
						for($i=0;$i<sizeof($delete_ast_cmp);$i++)
							$del=mysql_query("delete from `cmp_asset` where cmp_asset_name='$delete_ast_cmp[$i]'");
						if($del){
							header("Location:#");
						}
						else
						{
							echo "<p class='alert alert-danger'>Not Deleted</p>";
						}
					}
				?>				
					<div class=" modal fade "id="popup_del_cmp">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Delete Company Assets</h4>
							</div>
							<div class="modal-body">
								<form action="" name="" id=""   method="post" >
									<?php 	
										$sel_ast1=mysql_query("select * from cmp_asset");
										while($sel_ast=mysql_fetch_array($sel_ast1)){
											$shw_del=$sel_ast['cmp_asset_name'] ;
											echo "<p class='col-md-2'>
												<input type='checkbox' id='ast_del' name='ast_del_cmp[]' value='".$shw_del."'>
												<label>".$shw_del."</label></p>";
											}
										?>
										<input type="submit" class="btn btn-warning" name="del_ast_cmp" id="del_ast_cmp"value="Delete">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div id="cmp_asset_list">
				<?php 	
					$sel_cmp_ast1=mysql_query("select * from cmp_asset");
					while($sel_cmp_ast=mysql_fetch_array($sel_cmp_ast1)){
						$shw_cmp_ast=$sel_cmp_ast['cmp_asset_name'] ;
						echo "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12 cmp_asset_form'>
							<input type='radio' id='cmp_ast' name='cmp_ast' value='".$shw_cmp_ast."'>
							<label>".$shw_cmp_ast."</label></div>";
						}
					?>
				</div><div class="clear"></div>
				<button type="button"  class="btn btn-primary cmp_ast_add" data-toggle="modal" data-target="#cmp_popup">Add</button>
				<button type="button"  class="btn btn-warning ast_del_cmp" data-toggle="modal" data-target="#popup_del_cmp">Delete</button>
				<div class="modal fade" id="cmp_popup">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Company Asset</h4>
							</div>
							<div class="modal-body">
								<form action="" name="" id="asst_cmp_form" method="post" >
									<p class="notify_text1">Add Asset <input type="text" name="cmp_newasset" id="cmp_newasset" value="">
									<input type="submit" name="cmp_ast_add" id="cmp_ast_add" value="Add">
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="table-responsive" id="shw"></div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.side_menu_page [href]').each(function(){
		if(this.href==window.location.href){
			$(this).addClass("active1");
		}
	});
$('.emp_ast').change(function(){
 $('input.chk').not(this).prop('checked',false);
	 if($('.emp_ast').is(':checked')){
	$('#emp_asset_list').toggle();
	$('#shw').show();
	$('.ast_add').show();
	$('.cmp_ast_add').hide();
	$('#cmp_asset_list').hide();
	$('.ast_del').show();
	$('.ast_del_cmp').hide();
}

});
$(document).on('click','#emp_ast',function(){
$('input[type=checkbox]').not(this).prop('checked',false);

});
$('.cmp_ast').change(function(){
 $('input.chk').not(this).prop('checked',false);
	 if($('.cmp_ast').is(':checked')){
	$('.cmp_ast_add').show();
	$('#cmp_asset_list').show();
	$('.ast_add').hide();
	$('#emp_asset_list').hide();
	$('#shw').hide();
	$('.ast_del').hide();
	$('.ast_del_cmp').show();
	//$('#cmp_asset_list').toggle();
	}
});
	$(document).on('click','#ast_add',function(e){
	var emp_data = $("#newasset").val();
	$.ajax({
	 data:{ emp_ast:emp_data},
	 type: "GET",
	 url: "hr_add_asset.php",
	 success: function(data){
	 	window.location.reload(true);
	 }
	});
//$("#tbl_add").append("<tr><td><input type='text' id='qul_ed' name='qul_ed[]' class='form-control' required></td><td><input type='text' id='uni_ed' name='uni_ed[]' class='form-control' required></td><td><input type='text'id='year_ed' name='year_ed[]' class='form-control' required></td><td><input type='text' id='percent_ed' name='percent_ed[]' class='form-control' required></td><td><button type='button' class='btn btn-default remo'>REMOVE</a></td></tr>");
});
	$(document).on('click','#cmp_ast_add',function(e) {
	var cmp_data = $("#cmp_newasset").val();
	$.ajax({
	 data:{ cmp_ast:cmp_data},
	 type: "GET",
	 url: "hr_add_asset.php",
	 success: function(data){
	 	window.location.reload(true);
	 }
	});
});
	$('#emp_asset_list').on('click', function(){
	var selected = [];
	$('#emp_asset_list input:checked').each(function() {
	selected.push($(this).val());
	});
	$.ajax({
	data:{ chk:selected },
	type:"GET",
	url:'hr_art_sel.php',
	success:function(data){
	$('#shw').html(data);
	}

	});
});

});
</script>
<?php include 'footer.php';?>

