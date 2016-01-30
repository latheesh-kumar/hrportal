<?php 
	session_start();
	include 'config/config.php';
	$sid=$_SESSION['sel_id'];
	$sid_emp=str_replace("'","", $sid)
?>
<?php
	$qual_ed_ins=$_POST['qul_ed'];
	$univer_ed_ins=$_POST['uni_ed'];
	$year_ed_ins=$_POST['year_ed'];
	$percent_ed_ins=$_POST['percent_ed'];
	for($j=0;$j<sizeof($qual_ed_ins);$j++){
	$sel_edu_ins=mysql_query("insert into education values('','$sid_emp','$qual_ed_ins[$j]','$univer_ed_ins[$j]','$year_ed_ins[$j]','$percent_ed_ins[$j]')");
	}
	if($sel_edu_ins)
	{
		echo "inserted";
	}
	else
	{
		echo "<p class='alert alert-danger'>Not inserted</p>";
	}
			
?>