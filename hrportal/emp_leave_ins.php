<?php 
session_start();
error_reporting(0);
include 'config/config.php';
$emp_prof_id=$_SESSION['user_id'];
$emp_name=$_SESSION['name']; ?>
<?php
				$sdate=date("Y-m-d",strtotime($_POST['sdate']));
  				$edate1=strtotime($_POST['edate']);
  				$edate=date("Y-m-d",$edate1);
  				$ltype=$_POST['leave_type'];
  				$comment=$_POST['comment'];
          $ltype_day=$_POST['leavetype_day'];
  				$emp_leave_ins=mysql_query("insert into `emp_leaves` values('','$emp_prof_id','$sdate','$edate','$ltype','$comment','pending','$ltype_day')");
  				//echo "insert into `emp_leaves` values('','$emp_prof_id','$sdate','$edate','$ltype','$comment','2'";
  				if($emp_leave_ins){
  					echo "<p class='alert alert-success'>Your Request has been Submitted Successfully</p>";
  				}
  				else{
  					echo "<p class='alert alert-danger'>Your Request has not sent.Please Try again</p>";
  				}

?>