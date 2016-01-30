<?php
ob_start();
error_reporting(0);
if(isset($_POST['sub1']))
{
	$name=$_POST['usrname'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$dob1=strtotime($_POST['dob']);
	$dob=date('Y-m-d',$dob1);
	$mstatus=$_POST['mstatus'];
	$bgroup=$_POST['bgroup'];
	$mnumber=$_POST['mnumber'];
	$emnumber=$_POST['emnumber'];
	$emname=$_POST['emname'];
	$parnum=$_POST['parnum'];
	$peremail=$_POST['peremail'];
	$sibling=$_POST['sibling'];
	$caddress=$_POST['caddress'];
	$paddress=$_POST['paddress'];
	$ecaddress=$_POST['ecaddress'];
	$sel=mysql_query("select * from `user` where email_personal='$peremail' or mobile='$mnumber'");
	while($row=mysql_fetch_array($sel)){
	 	 $email=$row['email_personal'];
	 	 $mobile=$row['mobile'];
	}
	if($mobile==$mnumber){
		echo "Mobile Number Already Exists";
	 }
	elseif($email==$peremail)
	 	{
	 		echo "Email Already Exists";
	 	}
	else{
		$selid=mysql_query("SELECT employee_id  FROM  `user` ORDER BY `employee_id` DESC LIMIT 0 ,1");
		while($employ=mysql_fetch_array($selid)){
			$emp_id_last=$employ['employee_id'];
		}
		
		 $emp_id_number=str_replace("VAR","",$emp_id_last);
		 $emp_id_number=$emp_id_number+1;
		if($emp_id_number<10){
			 $employee_id="VAR00".$emp_id_number;
		}
		elseif(($emp_id_number>=10) && ($emp_id_number<99))
		{
			$employee_id="VAR0".$emp_id_number;
		}
		else{
			$employee_id="VAR".$emp_id_number;
		}
		$ins=mysql_query("insert into user values('','$name','$employee_id','$peremail','$mnumber','$fname','$mname','$parnum','$caddress','$ecaddress','$paddress','$dob','$mstatus','$bgroup','$emname','$emnumber','$sibling','2','2','2')");
		 //echo $peremail;
		if($ins)
		{
			header("Location:#education");
		}
		else{
			//echo "<p class='alert alert-danger'>Details Could not be added.Please Try Again</p>";
			?>
			<script>
			alert("Could Not Added the details.Please Try Again");
			 window.location = "#personal";
			 </script>
			 <?php
		}
		$sel=mysql_query("select * from `user` where `email_personal`='$peremail'");
		while($row=mysql_fetch_array($sel)){
			$user_emp=$row['0'];
			$email_emp=$row['email_personal'];
		}
		$_SESSION['user_emp']=$user_emp;
		
		if($email_emp==$peremail){
			$_SESSION['emp_email']=$email_emp;
		}
		else{
			unset($_SESSION['emp_email']);
		}
	 }
}	
?>