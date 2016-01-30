<?php 
ob_start();
@session_start();
include("config/config.php");
?>
<!DOCTYPE html>
<html>
<head>
   <title>Variance HR Portal</title>
   <link href="/apps/hrportal/css/bootstrap.min.css" rel="stylesheet">
   <link rel="icon" href="/apps/hrportal/images/favicon.png" sizes="16*16">
   <link href="/apps/hrportal/css/style.css" rel="stylesheet">
   <script src="/apps/hrportal/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="/apps/hrportal/css/font-awesome.min.css">
   <link rel="stylesheet" href="/apps/hrportal/js/jquery-ui.css">
   <script src="/apps/hrportal/js/jquery.js"></script>
   <script src="/apps/hrportal/js/jquery-ui.js"></script>
   <script src="/apps/hrportal/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="/apps/hrportal/js/jquery.dataTables.min.css">
   <script>
   	$(document).ready(function(){
			$(".cdate").datepicker({
			changeMonth:true,
			changeYear:true,
			dateFormat: 'dd-mm-yy'
		});
	});
</script>
</head>
<body>
<!-- <div class="navbar-collapse collapse" style="display: block;"> -->
	<div class="logo">
		<img src="/apps/hrportal/images/varLogo.png">
			<!-- <a href="#"><p class="register"><i class="fa fa-user"></i>Register</p></a>
			<a href="#"><p class="login"><i class="fa fa-sign-in"></i>Login</p></a> -->
	<!-- </div> -->
</div>
<hr></hr>

<!-- <div class="header-image" id="">	<img class="img-responsive "src="/apps/hrportal/images/woman.jpg">
</div>
 -->


