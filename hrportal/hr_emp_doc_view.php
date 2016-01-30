<?php include 'header.php';
$sid=$_SESSION['sel_id'];
include 'upload_document_ed.php';?>
<script src="/apps/hrportal/js/bootstrap.min.js"></script>

<div class="container-fluid">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_view.php?id=<?php echo $sid;?>">Personal Details</a></li>
					<li><a href="hr_emp_edu_view.php?id=<?php echo $sid;?>">Educational Details</a></li>
					<li><a href="hr_emp_prof_view.php?id=<?php echo $sid;?>">Professional Details</a></li>
					<li><a href="hr_emp_art_view.php?id=<?php echo $sid;?>">Returnable Articles</a></li>
					<li><a href="hr_emp_recr_view.php?id=<?php echo $sid;?>">Recruitment Process</a></li>
					<li><a href="hr_emp_doc_view.php?id=<?php echo $sid;?>">Documents</a></li>
					<li><a href="hr_emp_sts_view.php?id=<?php echo $sid;?>">Staus Employment</a></li>
				</ul>
			</div>
		</div>
	
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<h3 class="view_head">List of Documents</h3>
	<div class="doc_file">
		<?php 	
		 $dir = str_replace("'", "", $sid);
			  if ($file_rd= opendir($dir)){
			    while (($file = readdir($file_rd)) !== false){
			    	if (($file !== '.') && ($file !== '..')) {
			    		$file_rm_ext=preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);
			      	echo "<p class='alert alert-info'><a href='hr_emp_doc_view_dw.php?dwf=$file'>" . $file_rm_ext ."</a><a href='#'' class='rename_file' data-toggle='modal' data-target='#myModal' data-fid='" . $file."'><img title='Rename File' class='rename' src='/apps/hrportal/images/edit.png'></a><a href='delete_file.php?delete=$file'><img title='Delete File' class='delete' src='/apps/hrportal/images/file_delete.png'></a></p>";
					}
			}
			    closedir($file_rd);
			}
			
		?>
			<?php 
			    if(@$message) {
			    	echo "<p class='alert alert-success'>$message</p>"; 
			    	?>
					<script>
						window.location="#";
					</script>
					<?php
				    }
			    	?>
			    	<?php
			    		if(isset($_GET['rename'])){
			    				$oldname= $_GET['fid'];
							 	
								$newname=$_GET['newname'];
								$ext=pathinfo($oldname,PATHINFO_EXTENSION);
								// $path=pathinfo($oldname,PATHINFO_DIRNAME);
								$fname=$newname.'.'.$ext;
								$resultrename=rename($dir.'/'.$oldname, $dir.'/'.$fname);?>
								 <script>
   									window.location = 'hr_emp_doc_view.php';
  								</script>
						<?php
			    		}
			   //  		$name= $_GET['dwf'];
						// header('Content-Description: File Transfer');
						// header('Content-Type: application/force-download');
						// header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
						// header('Content-Transfer-Encoding: binary');
						// header('Expires: 0');
						// header('Cache-Control: must-revalidate');
						// header('Pragma: public');
						// header('Content-Length: ' . filesize($name));
						// ob_clean();
						// flush();
						// readfile("$dir/".$name); //showing the path to the server where the file is to be download
						// exit;

			    	?>

<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> 
					&times;</button>
					<h4 class="modal-title" id="myModalLabel">File Rename</h4>
				</div>
				<div id="popp" class="modal-body">
			    	<!-- <img src="images/closebutton.png"  onclick="popclose();"  style="border:none; float:right; margin:-10px -5px 0px 0px;" > -->
					<form action="" name="nameoffile" id="nameoffile"   method="GET" >
					<p class="notify_text1">Change filename of <span id='textfid'></span> to <input type="text" name="newname" id="newname" value="">
					<input type="submit" size="11" id="change"  name="rename" value="Rename"/>
					<input type="hidden" id="fid" name="fid" value=""/>
					<input type="hidden" id="crurl" name="crurl" value="<?php  echo $ulink;  ?>"/>
					</form>
				</div>
				<!-- <div class="modal-footer">
					<button class="btn btn-default" class="close" data-dismiss="modal">
					Close</button>
					<button class="btn- btn-primary">
					Submit changes</button>	
				</div> -->
			</div>
		</div>
	</div>
		<button type="submit"  class="btn btn-primary doc_edit">ADD</button>
		<div id="document_ed">
				<form enctype="multipart/form-data" method="post" action="">
				     <input type="file" name="files[]" multiple="" placeholder="Upload The Resumes"  />
				     <button type="submit" class="btn btn-primary" name="sub_docu" id="sub_docu">SAVE</button>
				     <button type="button" name="doc_can" class="btn btn-warning" id="doc_can">CANCEL</button> 
			    </form>
		</div>
	</div>
</div>
</div>
<script>
$(document).ready(function(){
	$('.doc_edit').click(function(){
		$('#document_ed').css({'visibility':'visible'});
	});
	$('#doc_can').click(function(){
		$('#document_ed').css({'visibility':'hidden'});
	});
	
	$('.rename_file').on('click', function(e){
		
        e.preventDefault(); // stops the link doing what it normally 
                           // would do which is jump to page top with href="#"
        rename($(this).data('fid'));
 	function rename(fid){
 	document.getElementById('popp').style.display="block";
	document.getElementById('fid').value  = fid;
	document.getElementById('textfid').innerHTML  = fid;
}
        
    });
});
</script>

<?php include 'footer.php';?>