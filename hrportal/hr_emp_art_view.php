<?php include 'header.php';
$sid=$_SESSION['sel_id'];
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
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		
		<h3 class="view_head">Returnable Articles</h3>
		<?php $sel_ed_art1=mysql_query("select * from articles where user_id=$sid");
			while ($sel_ed_art=mysql_fetch_array($sel_ed_art1)){
				 $sel_art_vw=$sel_ed_art['articles'];
					echo "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'><table class='table table-striped art_ed'><tr><td>$sel_art_vw</td></tr></table></div> ";
				  }

			?>
			<button type="submit"  class="btn btn-primary art_edit">Add</button>
		<?php
			if(isset($_POST['sub4_ed']))
			{
			$art_ed=$_POST['article_vw'];
			for($i=0;$i<sizeof($art_ed);$i++){
			$ins_ed=mysql_query("insert into `articles` values('',$sid,'$art_ed[$i]')");
				}
				if($ins_ed){
					header('Location:#');
				}
				else
				{
					echo "<p class='alert alert-danger'>Not inserted</p>";
				}
			}
		?>
		<div id="article_ed">
			<form role="form" method="post" id="article">
				<div class="row">
				<?php 	
					$sel_emp_ast_ed1=mysql_query("select * from emp_asset");
					while($sel_emp_ast_ed=mysql_fetch_array($sel_emp_ast_ed1)){
						$shw_emp_ed=$sel_emp_ast_ed['emp_asset_name'] ;
						echo "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12 emp_asset_form'>
							<input type='checkbox' id='article_vw[]' name='article_vw[]' value='".$shw_emp_ed."'>
							<label>".$shw_emp_ed."</label></div>";
						}
					?>
				<!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="idcard_ed" name="article_vw[]" value="ID Card">
					<label>ID Card</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="laptop_ed" name="article_vw[]" value="Laptop">
					<label>Laptop</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="mouse_ed" name="article_vw[]" value="Mouse">
					<label>Mouse</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="phone_ed" name="article_vw[]" value="Phone">
					<label>Phone</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="simcard_ed" name="article_vw[]" value="Simcard">
					<label>Sim Card</label>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<input type="checkbox" id="datacard_ed" name="article_vw[]" value="Datacard">
					<label>Data Card</label>
				</div> -->
				</div>
				<button type="submit" class="btn btn-success"  name="sub4_ed" id="sub_art_ed" >SAVE</button>
				<button type="button" name="sub4_can" class="btn btn-warning" id="art_can">CANCEL</button> 
			</div>
	</div>
</div>
<script>
$('.art_edit').click(function(){
		$('#article_ed').css({'visibility':'visible'});
	});
	$('#art_can').click(function(){
		$('#article_ed').css({'visibility':'hidden'});
	});

</script>
<?php include 'footer.php';?>
