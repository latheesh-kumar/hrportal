<?php

if(isset($_POST['sub5'])){
	$reffered=$_POST['reference'];
	$ref_id=$_POST['ref_id'];
	$post=$_POST['post'];
	$idate1=strtotime($_POST['idate']);
	$idate=date('y-m-d',$idate1);
	$jdate1=strtotime($_POST['jdate']);
	$jdate=date('y-m-d',$jdate1);
	$salary=$_POST['salary_emp'];
	$prob_period=$_POST['p_period'];
	$ins=mysql_query("insert into recruitment values('','$user_empe','$reffered','$ref_id','$post','$idate','$jdate','$salary','$prob_period')");
	if($ins){
		header("Location:#documents");
	}
	else
	{
		header("Location:#recruitment");
	}
	$sel=mysql_query("select * from recruitment where user_id='$user_empe'");
	while($row=mysql_fetch_array($sel)){
		$user_recr=$row['1'];
		$pos=$row['4'];
	}
	if($pos==$post)
	{
		$_SESSION['recr']=$user_recr;
	}
	else
	{
		unset($_SESSION['recr']);
	}
}

?>