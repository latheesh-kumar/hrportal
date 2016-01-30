<?php
if(isset($_POST['sub3'])){
	$category=$_POST['masters'];
	$cmpy_name=$_POST['company_name'];
	$experience=$_POST['experience'];
	$off_letter=$_POST['offer_letter'];
	$sal_slip=$_POST['salary_slip'];
	$bank_state=$_POST['bank_state'];
	$ins=mysql_query("insert into professional_details values('','$user_empe','$category','$cmpy_name','$experience','$off_letter','$sal_slip','$bank_state')");
	if($ins){
		
		header("location:#article");
	}
	else
	{
		header("location:#profession");
	}
	 $select=mysql_query("select * from `professional_details` where `user_id`='$user_empe'");
	 while($row=mysql_fetch_array($select)){
	 	$user_prof=$row['1'];
	 	$cat=$row['2'];
	 }
	 if($cat==$category){
	 	$_SESSION['prof']=$user_prof;
	 }
	 else
	 {
	 	unset($_SESSION['prof']);
	 }

}

?>