<?php
$dir_ed = str_replace("'", "", $sid);
$path="./$dir_ed";
 if(isset($_FILES['files'])){
 @mkdir($path, 0777); 

    $errors= array();
	$countfail=0;
	$countupload=0;
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 21097152){
			$errors[]='File size must be less than 20 MB';
        }		
       
        if(empty($errors)==true){
		$filename = $file_name;
		$source = $file_tmp;
		$type = $file_type;
		$name = explode(".", $filename);
		$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/zip-compressed', 'application/octet-stream');
		foreach($accepted_types as $mime_type) {
			if($mime_type == $type) {
				$okay = true;
				break;
		} 
	}
  // $path = "./$mid";  // absolute path to the directory where zipper.php is in
  $targetdir = $path;
  @mkdir($targetdir, 0777);
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		//$message = "The file you are trying to upload is not a .zip file. Please try again.";
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if( $ext == 'pdf' || $ext == 'PDF' || $ext == 'docs'|| $ext == 'docx'|| $ext == 'doc'|| $ext == 'jpg'|| $ext == 'png' ){
		$filenameup=str_replace($key,"",$filename);
		move_uploaded_file($source,"$path/".$filenameup);
		
	    $countupload=$countupload+1;
		} 
else {

$countfail=$countfail+1;
}
		//removefile ( $targetdir);	
		
		
	} else {
 
  /* PHP current path */
 // define ("FILEREPOSITORY","./$mid");

  $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
  $filenoext = basename ($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)
 
  //$targetdir = $path . $filenoext; // target directory
  $targetzip = $filename; // target zip file
	// target directory
	// $targetzip = $path; // target zip file
 
  /* create directory if not exists', otherwise overwrite */
  /* target directory is same as filename without extension */
 
 //if (is_dir($targetdir))  rmdir_recursive ( $targetdir);

//echo "reached here"; 
//exit();
  /* here it is really happening */
 
	if(move_uploaded_file($source, $targetzip)) {
	//echo "Here";
	//exit();
		$zip = new ZipArchive();
		$x = $zip->open($targetzip);  // open the zip file to extract
		if ($x === true) {
			$zip->extractTo($targetdir); // place in the directory with same name  
			$zip->close();
 
			//unlink($targetzip);
		//removefile ( $targetdir);
			

		}
		$countupload=$countupload+1;
	} else {	
		$countfail=$countfail+1;
	}
	}
}
} 
if($countupload >=1){
if($countfail >=1){

$message = "The upload of the files and zip folder were successful. Number of successful uploads are ".$countupload." and number of failed uploads are".$countfail;

} else {

$message = "The upload of the files and zip folder were successful. Number of successful uploads are ".$countupload;
}

} 
else {
$message1 = "There was a problem with the upload. Please try again.";
}
} 
?>
