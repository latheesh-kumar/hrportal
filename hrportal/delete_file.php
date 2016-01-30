<?php
session_start();
$sid=$_SESSION['sel_id'];
 if(isset($_GET['delete']))
    {
    	$sel_del=$_GET['delete'];
    	$file_dir=str_replace("'", "", $sid);
        $del=unlink(dirname(__FILE__).'/'.$file_dir.'/'.$sel_del);
        if($del){
        	header("Location:hr_emp_doc_view.php");
        }
        else
        {
        	echo "<p class='danger'>NOT DELETED</p>";
        }
    }
?>