<?php 
if( isset($_POST['usr'])) 
{
	$usr=$_POST['usr'];
	$psd=$_POST['pwd'];
	$psd1=md5($psd);
	$usercheck=mysql_query("select * from `employment` where `email` ='$usr' and `password` ='$psd1' and `status` ='1'");
	$checkexist_check=mysql_num_rows($usercheck);
	if($checkexist_check == 1 ){
		while($sqlf1=mysql_fetch_array($usercheck)){
			 $var=$sqlf1['user_id'];
			 $var2=$sqlf1['role'];
			 $var3=$sqlf1['status'];
			 $email_log=$sqlf1['email'];
			 $pwd_log=$sqlf1['password'];
}
	$row=mysql_num_rows($usercheck);
	if($row==1){	
		$usercheckdetails=mysql_query("select * from `user` where `user_id` ='$var'");
		$checkexist_checkdetails=mysql_num_rows($usercheckdetails);
		if($checkexist_checkdetails == 1 ){
		while($sqlf1details=mysql_fetch_array($usercheckdetails)){
			 $vardetails=$sqlf1details['name'];
		}	
		$_SESSION['user_id']=$var;
		$_SESSION['name']=$vardetails;
		$_SESSION['role']=$var2;
		if($usr==$email_log && $psd1==$pwd_log && $var2==1){
			$_SESSION['isLogged'] = true;
		 header("Location:hr_employee_details.php");
		}
  		elseif($usr==$email_log && $psd1==$pwd_log && $var2==2 && $var3==1){
  			$_SESSION['isLogged'] = true;
 			header("Location:employee_dashboard.php");
		}
	} 
} 
	else{
		echo"<p class='alert alert-warning user_log'>UserName or Password is incorrect</p>";
	} 
}
	 else{
		echo"<p class='alert alert-warning user_log'>UserName or Password is incorrect</p>";
	}
}
?>
		