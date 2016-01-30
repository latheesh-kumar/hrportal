<?php include 'header.php';
include 'usernotlogin.php';?>
	<div class="container-fluid">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="side_menu_page">
				<ul>
					<li><a href="hr_employee_details.php">Employee Details</a></li>
					<li><a href="add_employee.php">Add Employee </a></li>
					<li><a href="hr_employee_leave.php">Employee Leaves</a></li>
					<!-- <li><a href="hr_documents.php">Employee Documents</a></li> -->
					<li><a href="hr_articles.php">Assets</a></li>
					<li><a href="hr_holiday.php">Holiday List</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="dropdown">
				<ul class="my_profile">
					<li><a href=""><i class="fa fa-user"></i>My Account &#9662;</a>
						<ul class="dropmenu">
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="inner_title">
				<p>Holiday List</p>
			</div>
			<?php 
				if(isset($_POST['sub']))
				{
					$year=$_POST['year'];
					$sel_year1=mysql_query("select year from holiday where year='$year'");
					while($sel_year=mysql_fetch_array($sel_year1)){
						$holi_year=$sel_year['year'];
					}
					if($year==$holi_year)
					{	echo $year;
						$del_year=mysql_query("delete from holiday where year='$year'");
					}
					$file1=__DIR__."\\holidaydocs\\".$_FILES['holiday_docs']['name'];
					$file_ins=str_replace('\\', '/', $file1);
					move_uploaded_file($_FILES['holiday_docs']['tmp_name'],"holidaydocs/".$_FILES['holiday_docs']['name']);
					 //mysql_query("insert into holiday (year) values ('$year')");
	               	 $sql="LOAD DATA LOCAL INFILE '$file_ins'
							INTO TABLE holiday 
							FIELDS TERMINATED BY ','
							(id,date,day,holiday)
							SET 
							year='$year',
							id=null
							";
					    $sql1=mysql_query($sql);
					    if($sql1)
					    {
					    	header("Location:#");
					    }
					    else{
					    	echo "<p class='alert alert-danger'>Not Inserted</p>";
					    }
					   // duration = 1 * TRIM(TRAILING 'Secs' FROM @duration),
					    // addr = NULLIF(@addr, 'null'),
					    // pin  = NULLIF(@pin, 'null'),
					    // city = NULLIF(@city, 'null'),
					    // state = NULLIF(@state, 'null'),
					    // country = NULLIF(@country, 'null') 
				}
			?>
			
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<form method="post" enctype="multipart/form-data">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<label>Enter Year</label>
				<input type="text" id="" name="year" class="form-control">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<label>upload Document</label>
				<input type="file" id="" name="holiday_docs">
			</div>
			<div class="clear"></div>
				<input type="submit" id="holi_sub" name="sub" class="btn btn-success" value="Submit">
			</form>
			
			<!-- <table id="holiday" class=" table table-responsive" border="1">
					<tr><th>S.NO</th><th>DATE</th><th>DAY</th><th>HOLIDAY</th></tr>
					<tr><td>1</td><td>01-01-2016</td><td>Friday</td><td>New Year</td></tr>
					<tr><td>2</td><td>15-01-2016</td><td>Friday</td><td>Makara Sankranthi</td></tr>
					<tr><td>3</td><td>26-01-2016</td><td>Tuesday</td><td>Republic Day</td></tr>
					<tr><td>4</td><td>08-04-2016</td><td>Friday</td><td>Ugadi</td></tr>
					<tr><td>5</td><td>06-07-2016</td><td>Wednesday</td><td>Ramzan</td></tr>
					<tr><td>6</td><td>15-08-2016</td><td>Monday</td><td>Independence Day</td></tr>
					<tr><td>7</td><td>05-09-2016</td><td>Monday</td><td>Ganesh Chaturthi</td></tr>
					<tr><td>8</td><td>11-10-2016</td><td>Tuesday</td><td>Vijaya Dashami</td></tr>
					<tr><td>9</td><td>31-10-2016</td><td>Monday</td><td>Deepawali</td></tr>
					<tr><td>10</td><td>01-11-2016</td><td>Tuesday</td><td>Karnataka Formation Day</td></tr>
				</table>
				 -->
			</div>
			
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<label>Select Years</label>
				<select class="form-control" id="holiday">
					<option value="">-----Select</option>
				<?php
					$sel_holi1=mysql_query("select DISTINCT year from holiday order by year ASC");
					while($sel_holi=mysql_fetch_array($sel_holi1))
					{
						$holi_list=$sel_holi['year'];
						echo "<option value='$holi_list'>$holi_list</option>";
					}
				?>

				</select>
					

			</div>
			<div id="holi_shw"></div>
		</div>
	</div>

<?php include 'footer.php';?>
<script>
	$(document).ready(function(){
		$('.side_menu_page [href]').each(function(){
			if(this.href==window.location.href){
				$(this).addClass("active1");
			}
		});
		$("#holiday").change(function(){
			var holi=$(this).val();
			$.ajax({
					url:"hr_holi_shw.php",
					data:{ holi_shw:holi },
					type:"GET",
					success:function(data){
						$("#holi_shw").html(data);
					}
			});
		});
	});
</script>
<!-- LOAD DATA INFILE  'C:/xampp/htdocs/apps/hrportal/holidaydocs/Holiday_List_2016.csv' INTO TABLE holiday FIELDS TERMINATED BY  ',' OPTIONALLY ENCLOSED BY  '"' LINES TERMINATED BY  ',,,\r\n' IGNORE 1 LINES (
id, DATE, DAY , holiday
)
LOAD DATA  INFILE 'C:/xampp/htdocs/apps/hrportal/holidaydocs/Holiday_List_2016.csv'
							INTO TABLE holiday 
							FIELDS TERMINATED BY ','  
							LINES TERMINATED BY '\\r\\n'
							(id,date,day,holiday)

LOAD DATA INFILE  'C:/xampp/htdocs/apps/hrportal/holidaydocs/Holiday_List_2016.csv' INTO TABLE holiday FIELDS TERMINATED BY  ',' LINES TERMINATED BY  '\r'(
id, DATE, DAY , holiday
)
C:/xampp/htdocs/apps/hrportal/hr_holiday.php/Holiday_List_2016.csv
C:\xampp\htdocs\apps\hrportal/holidaydocs/Holiday_List_2016.csv -->