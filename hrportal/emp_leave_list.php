<?php
error_reporting(0);
session_start();
include 'config/config.php';
$emp_prof_id=$_SESSION['user_id'];
// $emp_name=$_SESSION['name']; 
$sel_emp_leave_list=$_GET['emp_leave_list'];

$sel_emp_leave_list1=mysql_query("select `$sel_emp_leave_list` from emp_leave_list where user_id=$emp_prof_id");
// echo "select `$sel_emp_leave_list` from emp_leave_list where user_id=$emp_prof_id";
// echo "select casual from emp_leave_list where user_id=257";
while($sel_leave_list=mysql_fetch_array($sel_emp_leave_list1))
{
	$sel_casual=$sel_leave_list['casual'];
	$sel_sick=$sel_leave_list['sick'];
	$sel_bereave=$sel_leave_list['bereavement'];
	$sel_marriage=$sel_leave_list['marriage'];
}
?>
<input type="hidden" value="<?php echo $sel_emp_leave_list;?>" id="lve_list">
<fieldset>
	<input type="text" value="<?php echo $sel_casual;?>" id="lve_list">
	<input type="text" value="<?php echo $sel_sick;?>" id="lve_list1">
	<input type="text" value="<?php echo $sel_bereave;?>" id="lve_list2">
	<input type="text" value="<?php echo $sel_marriage;?>" id="lve_list3">
</fieldset>
<script>
	var list=$('lve_list').val();

</script>