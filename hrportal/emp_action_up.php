<?php
	// session_start();
	include 'config/config.php';
	//$emp_act_id=$_SESSION['action_id'];
	
	$emp_act_val=$_GET['sts'];
	$emp_act_id=$_GET['act_id'];
	 if(isset($emp_act_val))	
	{
		$emp_act_up=mysql_query("update `emp_leaves` set `status`='$emp_act_val' where id='$emp_act_id'");
		if($emp_act_up)
		{
			echo "<p class='alert alert-succcess'>updated</p>";
		}
		else{
			echo "<p class='alert alert-warning'>Not Updated</p>";
		}
	}
	$hr_act_val=$_GET['hr_sts'];
	$hr_act_id=$_GET['hr_act_id'];
	if(isset($hr_act_val)){
		$hr_act_up=mysql_query("update `emp_leaves` set `status`='$hr_act_val' where id='$hr_act_id'");
		if($hr_act_up)
		{	header("#");
			echo "<p class='alert alert-success'>updated</p>";
		}
		else{
			echo "<p class='alert alert-warning'>Not updated</p>";
		}
	}
	$hr_act_val_all=$_GET['hr_sts_all'];
	$hr_act_id_all=$_GET['hr_act_id_all'];
	if(isset($hr_act_val_all)){
		$hr_act_up_all=mysql_query("update `emp_leaves` set `status`='$hr_act_val_all' where id='$hr_act_id_all'");
		if($hr_act_up_all)
		{
			echo "<p class='alert alert-success'>updated</p>";
		}
		else{
			echo "<p class='alert alert-warning'>Not updated</p>";
		}
	}
	
?>