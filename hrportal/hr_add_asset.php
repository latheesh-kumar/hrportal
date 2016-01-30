<?php
include 'config/config.php';
$emp_add_ast=$_GET['emp_ast'];
if($emp_add_ast!=""){
$add_ast_ins=mysql_query("insert into `emp_asset` values('','$emp_add_ast')");
	if($add_ast_ins){
		header("Location:#");
	}
	else{
		echo "<p class='alert alert-danger'>Not inserted</p>";
	}
	
}
else{
$cmp_add_ast=$_GET['cmp_ast'];
if($cmp_add_ast!=""){
$cmp_ast_ins=mysql_query("insert into `cmp_asset` values('','$cmp_add_ast')");
if($cmp_ast_ins){
	header("Location:#");
}
else{
		echo "<p class='alert alert-danger'>Not inserted</p>";
	}
}
}
	
?>
