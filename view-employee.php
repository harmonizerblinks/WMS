<?php 
	ob_start();
	session_start();  

	if(empty($_SESSION['inventoryUserEmail']) || !isset($_SESSION['inventoryUserEmail'])){

			header("location: index.php");
	}
?>


<?php
	include 'nav.php';
?>
			
			<li role="presentation" class="divider"></li>
			<!--
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
			-->
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Employees</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">view All Employees</h1>
			</div>
			<div style="width: 40%; float: right; margin: 0px auto;">
				<form method="post" action="">

					<div class="form-group">
									  <div class="input-group">
									      <input type="text" class="form-control" name="word"	 placeholder="Enter Employeeid or name " required />
									      <span class="input-group-btn">
									        <button class="btn btn-success" name="search" type="submit">Search!</button>
									      </span>
									    </div>		 		
								</div>
					
				</form>

			</div>
		</div><!--/.row-->
		
		<div class="row">
					<?php
						if (isset($_GET['msg'])) {
							echo '
										<div class="alert alert-info">
										 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<center>
												<strong>'. $_GET['msg'].'</strong>
												 
											 </center>
										 </div>
										 ';

						}
					?>
				
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>S/N</td>
						<td>Photo</td>
						<td>Full Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Gender</td>
						<td>Position</td>
						<td>Salary</td>
						<td>Resident</td>
						<td>Date of Birth</td>
						<td>Employee ID</td>
						<td>Date</td>
						<td>Action</td>
					</thead>
					<tbody>
						<?php
							if(isset($_POST['word'])){
								$word = $_POST['word'];
								$c = 1;
							$conn = new mysqli("localhost", "root", "", "inventory");

							$Employees = $conn->query("SELECT * FROM Employees where employee_id = '$word' or full_name = '$word'");

							while ($employee = $Employees->fetch_assoc()) {
								echo '<tr>
									<td>'.$c.'</td>
									<td><img src="images/'.$employee['pix'].'" width="60" height="80" /></td>
									<td>'.$employee['full_name'].'</td>
									<td>'.$employee['email'].'</td>
									<td>'.$employee['phone'].'</td>
									<td>'.$employee['gender'].'</td>
									<td>'.$employee['position'].'</td>
									<td>'.$employee['salary'].'</td>
									<td>'.$employee['resident'].'</td>
									<td>'.$employee['date_of_birth'].'</td>
									<td>'.$employee['employee_id'].'</td>
									<td>'.$employee['date'].'</td>
									<td><a href="logs/delete.php?id='.$employee['employee_id'].'" style="color: red">Delete</a></td>
									</tr>
								';
								$c++;
								}
							}else{
							$c = 1;
							$conn = new mysqli("localhost", "root", "", "inventory");

							$Employees = $conn->query("SELECT * FROM Employees");

							while ($employee = $Employees->fetch_assoc()) {
								echo '<tr>
									<td>'.$c.'</td>
									<td><img src="images/'.$employee['pix'].'" width="60" height="80" /></td>
									<td>'.$employee['full_name'].'</td>
									<td>'.$employee['email'].'</td>
									<td>'.$employee['phone'].'</td>
									<td>'.$employee['gender'].'</td>
									<td>'.$employee['position'].'</td>
									<td>'.$employee['salary'].'</td>
									<td>'.$employee['resident'].'</td>
									<td>'.$employee['date_of_birth'].'</td>
									<td>'.$employee['employee_id'].'</td>
									<td>'.$employee['date'].'</td>
									<td><a href="logs/delete.php?id='.$employee['employee_id'].'" style="color: red">Delete</a></td>
									</tr>
								';
								$c++;
								}
							}
						?>
					</tbody>
					<tfoot>
						<td>S/N</td>
						<td>Photo</td>
						<td>Full Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Gender</td>
						<td>Position</td>
						<td>Salary</td>
						<td>Resident</td>
						<td>Date of Birth</td>
						<td>Employee ID</td>
						<td>Date</td>
						<td>Action</td>
					</tfoot>
				</table>
		</div><!--/.row-->
								
		<!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
