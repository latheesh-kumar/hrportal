<?php
if(isset($_POST['sub6']))
{  
	$ins_leave=mysql_query("insert into emp_leave_list value('','$user_empe','1','1','1','4')");
	if(!empty($_POST['active'])) {
	$email=$_POST['act_email'];
	$password1=$_POST['pass'];
	$password=md5($password1);
	$man_name=$_POST['manager'];
	$ins=mysql_query("insert into employment(`id`,`user_id`,`email`,`password`,`manager`,`role`,`status`)values('','$user_empe','$email','$password','$man_name','2','1')");
	$sel=mysql_query("select * from employment where user_id='$user_empe' and status='1'");
	while($row=mysql_fetch_array($sel))
	{
		$sts=$row['status'];
		$user=$row['user_id'];
	}
	$up=mysql_query("update `user` set status='$sts' where user_id='$user'");
}
else
{
	$comp_name=$_POST['company_name'];
	$email_per=$_POST['ex_email'];
	$locat=$_POST['location'];
	$cdetails=$_POST['c_details'];
	$ins=mysql_query("insert into employment (`id`,`user_id`,`new_company`,`email_personal`,`location`,`contact_details`,`role`,`status`)values('','$user_empe','$comp_name','$email_per','$locat','$cdetails','2','2')");

}
if($ins){

		header("Location:#personal");
		unset($_SESSION['emp_email']);
		unset($_SESSION['edu']);
		unset($_SESSION['prof']);
		unset($_SESSION['article']);
		unset($_SESSION['recr']);
		unset($_SESSION['user_emp']);
	}
	else
	{
		 header("Location:#employee");
	}
}
?>