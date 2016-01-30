<?php include 'header.php' ; ?>

<div class="container-fluid">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login">
	<?php include 'logindet.php' ;?>
	<!-- <img id="usr_img" src="/apps/hrportal/images/download.png"> -->
		<div class="login_header">
			<h2>LOGIN</h2>
		</div>
		<div class="inner">
			<div class="login1">
				<form method="post" role="form">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					<input type="text" id="user" class="form-control" name="usr" placeholder="UserName" required><br>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					<input type="password" id="pwd" class="form-control " name="pwd" placeholder="Password" required><br>
				</div>
					
					<input type ="submit" name="sub" class="btn btn-primary" id="usr_sub" value="LOGIN"><span class="for_pass"><a href="#">Forgot Password?</a></span>
					
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
		
	


