<?php
	if(isset($_POST['sub4']))
	{
		$art=$_POST['article'];

		if($art==""){
			header("location:#article")	;
		}
		else{
			for($i=0;$i<sizeof($art);$i++){
			$ins=mysql_query("insert into articles values('','$user_empe','$art[$i]')");
			}
	}
		if($ins)
		{
			header("Location:#recruitment");
		}
		else
		{
			header("Location:#article");
		}
		$sel=mysql_query("select * from articles where user_id='$user_empe'");
		while($row=mysql_fetch_array($sel))
		{
			$user_art=$row['1'];
			$arti=$row['2'];
		}
		$_SESSION['article']=$user_art;
	}
?>