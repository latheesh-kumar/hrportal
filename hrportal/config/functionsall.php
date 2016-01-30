<?php


function mailfun($nam,$emd,$mg,$link){
$email='support@employeemasterdatabase.com'; 		
$to = $emd;
$subject = 'Verification Mail From Employeemasterdatabase.com';
$link=$link;
$message = '
<html>
<head>
<title>Verification Mail From Employeemasterdatabase.com</title>
</head>
<body>

Hello '."$nam".',

<p>'."$mg".'</p>
<p>'."$link".'</p>
<p>Note: Follow the directions in your account page after logging in</p>
<p><i>Regards<i></p>
<p>Employeemasterdatabase.com</p>
</body>
</html>
';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: '."$email \r\n";


$success=mail($to,$subject,$message,$headers);  
}
//Message sent to User
function sendmessagetouser($ufulname,$emailtosend,$mesg,$fulname,$recruiteremail){
$email=$recruiteremail; 		
$to = $emailtosend;
$subject = 'Notification Mail From Employeemasterdatabase.com';

$message = '
<html>
<head>
<title>Notification Mail From Employeemasterdatabase.com</title>
</head>
<body>

Hello '."$ufulname".',

<p>'."$mesg".'</p>
<p><i>Regards<i></p>
<p>'."$fulname".'</p>
<p>Employeemasterdatabase.com</p>
</body>
</html>
';
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: '."$email \r\n";


$success=mail($to,$subject,$message,$headers);  
}
//Message sent to User

function ifidavail($mid){
$cmid=$mid;
$es=1;
while ($es=='1'){
$ifidexist = "SELECT * FROM `user` WHERE member_id='$cmid'";
$ifidexist_query=mysql_query($ifidexist);
$ifidexist_check=mysql_num_rows($ifidexist_query);
if($ifidexist_check >= 1 ){
$tm=time();
$tempid=mt_rand (10,99);
$cmid=$tempid.$tm;
$es=1;
} 
else {
$es=2;
return $cmid;
}
} }

function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }
 
   rmdir($dir);
}
function removefile($dir) {
if ($handle = opendir("$dir")) {

    while (false !== ($entry = readdir($handle))) {


        if ($entry != "." && $entry != "..") {

$path = $entry;
$ext = pathinfo($path, PATHINFO_EXTENSION);
if( $ext == 'pdf' || $ext == 'PDF' || $ext == 'docs'|| $ext == 'docx'|| $ext == 'doc'  ){
} else {
$filepathunlink="./$dir/".$entry;
@unlink($filepathunlink);

}
 }



    }

    closedir($handle);
} }
function curPageURL() {
 $pageURL = 'http';
 if (@$_SERVER["HTTPS"] == "on") {@$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function extract_email_address ($string) {
    foreach(preg_split('/\s/', $string) as $token) {
        $email = filter_var(filter_var($token, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        if ($email !== false) {
            $emails[] = $email;
        }
    }
    return $emails;
}
?>