<?php 
error_reporting(0);
include 'header.php';
$sid=$_SESSION['sel_id'];?>
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
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<h3 class="view_head">Educational Qualification</h3>
			<div class="table-responsive">
				<table id="tbl_ed" class="table" border="1">
					<th>Qualification *</th>
					<th>Board/University *</th>
					<th>Year of Completion *</th>
					<th>Percentage *</th>
					<?php $sel_edu1=mysql_query("select * from education where user_id=$sid");
					while($sel_edu=mysql_fetch_array($sel_edu1)){?>
					<tr class="tbl_data">
				<?php  $user_ed_id=$sel_edu['id'];?>
				<td ><?php echo $user_qul=$sel_edu['Qualification'];?></td>
				<td ><?php echo $user_univ=$sel_edu['university'];?></td>
				<td ><?php echo $user_year=$sel_edu['year'];?></td>
				<td ><?php echo $user_per=$sel_edu['percentage'];?><img id="<?php echo $user_ed_id;?>" class="edit_img"  src="/apps/hrportal/images/edit.png"></td>
			</tr>
			<?php }?>
				</table>
				<button type="button" id="add_ed" class="btn btn-primary">+ ADD MORE</button>
				<script type="text/javascript">
				$(document).on('click','img',function(){
					var row_id=(this).id;
					// alert(row_id);
			    	window.location.href = "hr_edu_up.php?id_sel=" + row_id;
					});
				</script>
				<?php 
					 $sel_id_row=$_GET['id_sel'];
					 if(isset($_POST['sub2_ed_up'])){
						$qual_ed=$_POST['qul_ed'];
						$univer_ed=$_POST['uni_ed'];
						$year_ed=$_POST['year_ed'];
						$percent_ed=$_POST['percent_ed'];
					for($i=0;$i<sizeof($qual_ed);$i++)
					{
						// echo $qual_ed[$i];
						// echo $univer_ed[$i];
				$up_edu_ed=mysql_query("update `education` set `Qualification`='$qual_ed[$i]',`university`='$univer_ed[$i]',`year`='$year_ed[$i]',`percentage`='$percent_ed[$i]' where id=$sel_id_row");
				//echo "update `education` set `Qualification`='$qual_ed[$i]',`university`='$univer_ed[$i]',`year`='$year_ed[$i]',`percentage`='$percent_ed[$i]' where id=$sel_id_row";
				}
				if($up_edu_ed){
					header("Location:#");
				}
				else
				{
					echo "<p class='alert alert-danger'>Not updated</p>";
				}
			}
			?>
			<form role="form" method="post" action="" id="edu_ed_up">
				<table id="tbl_upd" class="table table-responsive">
					<?php 
					 $sel_id_row=$_GET['id_sel'];
					 $sel_edu_ed1=mysql_query("select * from education where id=$sel_id_row");
					 while($sel_edu_ed=mysql_fetch_array($sel_edu_ed1)){
						$user_qul=$sel_edu_ed['Qualification'];
						$user_univ=$sel_edu_ed['university'];
						$user_year=$sel_edu_ed['year'];
						$user_per=$sel_edu_ed['percentage'];
						}?>
					<tr >
						<td ><input type="text" id="qul_ed" name="qul_ed[]" class="form-control" value="<?php echo $user_qul;?>"></td>
						<td ><input type="text" id="uni_ed" name="uni_ed[]" class="form-control" value="<?php echo $user_univ;?>"></td>
						<td ><input type="text" id="year_ed" name="year_ed[]" class="form-control" value="<?php echo $user_year;?>"></td>
						<td ><input type="text" id="percent_ed" name="percent_ed[]" class="form-control" value="<?php echo $user_per;?>"></td>
					</tr>
				</table>
				<button type="submit" id="edu_up" name="sub2_ed_up" class="btn btn-success">Update</button>
				<button type="button"  name="sub2_can" class="btn btn-warning edu_can">CANCEL</button>
				</form>
				<form role="form" method="post" action="" id="edu_ins_form">
				<table id="tbl_add" class="table table-responsive">
					<th>Qualification *</th>
					<th>Board/University *</th>
					<th>Year of Completion *</th>
					<th>Percentage *</th>
					</table>
					<button type="submit" id="edu_ins" name="sub2_ed" class="btn btn-success">SAVE</button>
					<button type="button" id="edu_can" name="sub2_can" class="btn btn-warning edu_can">CANCEL</button>
				</form>
				</div>
				</div>
				</div>
<script>
		$(document).ready(function(){
			$("#add_ed").on("click",function(){
			$("#edu_ins_form").show();
			$("#tbl_add").append("<tr><td><input type='text' id='qul_ed' name='qul_ed[]' class='form-control' required></td><td><input type='text' id='uni_ed' name='uni_ed[]' class='form-control' required></td><td><input type='text'id='year_ed' name='year_ed[]' class='form-control' required></td><td><input type='text' id='percent_ed' name='percent_ed[]' class='form-control' required></td><td><button type='button' class='btn btn-default remo'>REMOVE</a></td></tr>");
		});
		$('table').on('click', 'tr .remo',function(){
			$(this).closest('tr').remove();
		});
		$('img').click(function(){
			$('#edu_ed_up').show();
			$('#add_ed').hide();
		});
		$('.edu_can').click(function(){
			$('#edu_ins_form,#edu_ed_up').hide();
		});
		// 
		$(document).on('click','#edu_ins',function(e) {
			var data = $("#edu_ins_form").serialize();
			$.ajax({
			data: data,
			type: "POST",
			url: "hr_edu_ins.php",
			success: function(data){
			$('#edu_ed_up').hide();
			}
			});
		});
	});
</script>
<?php include 'footer.php';?>
