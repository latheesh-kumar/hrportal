<?php
 session_start();
 $user_empe=$_SESSION['user_emp'];
if(isset($_POST['sub2'])){
	$qual=$_POST['qul'];
	$univer=$_POST['uni'];
	$year=$_POST['year'];
	$percent=$_POST['percent'];
	for($i=0;$i<sizeof($qual);$i++)
	{
	$ins=mysql_query("insert into education values('','$user_empe','$qual[$i]','$univer[$i]','$year[$i]','$percent[$i]')");
	}
	if($ins){
		header("Location:#profession");
	}
	else
	{
		header("Location:#education");
	}
	$sele=mysql_query("select * from education where user_id='$user_empe'");
	while($row=mysql_fetch_array($sele))
	{	$user_edu=$row['1'];
		$qul[]=$row['2'];
		
	}
	 $_SESSION['edu']=$user_edu;
}
?>
