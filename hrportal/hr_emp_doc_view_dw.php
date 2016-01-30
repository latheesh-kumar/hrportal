<?php
session_start();
// phpinfo();
$sid=$_SESSION['sel_id'];
$name= $_GET['dwf'];
echo $dir = str_replace("'", "", $sid);
echo  $rd=__DIR__ . '/'.$dir.'/'.$name;
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: '. filesize($name));
ob_clean();
flush();
ob_end_flush();
readfile($rd); 
//readfile(__DIR__.'/'.$dir.'/'.$name);//showing the path to the server where the file is to be download
?>