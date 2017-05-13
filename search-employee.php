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
				<h1 class="page-header">Search for Employees</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div style="width: 60%; margin: 0px auto;">
				<form method="post" action="">

					<div class="form-group">
									  <div class="input-group">
									      <input type="text" class="form-control" name="world"	 placeholder="Enter Employee's ID or name" required />
									      <span class="input-group-btn">
									        <button class="btn btn-success" name="search" type="submit">Go!</button>
									      </span>
									    </div>		 		
								</div>
					
				</form>

			</div>
		</div><!--/.row-->

		<div class="row">
			<?php


	if (isset($_POST['world'])) {

		$c = 1; 
		$conn = new mysqli("localhost", "root", "", "inventory");

		$word = $_POST['world'];

			$Employees = $conn->query("SELECT * FROM Employees where Employee_id like '%$word%' or full_name like '%$word%' ");

			echo'<fieldset>
						<legend>Result Found</legend>';

		while ($Employee = $Employees->fetch_assoc()) {
			
			$fullName = $Employee['full_name'];
			$phone =  $Employee['phone'];
			$gender =  $Employee['gender'];
			$email =  $Employee['email'];
			$dob =  $Employee['date_of_birth'];
			$position =  $Employee['position'];
			$salary =  $Employee['salary'];
			$resident = $Employee['resident'];
			$img = $Employee['pix'];
		
		echo"

						<div style='width: 60%; margin: 0px auto;'>
							
						<div class='form-group'>
					    <label class='control-label col-sm-4' for='image'>Employee Passport:</label>

					    <div class='col-sm-8'>
					      <img src='images/$img' width='100' height='100' />
					    </div>
					  </div>

					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='fullName'>Full Name:</label>
					    <div class='col-sm-8'>
					      <label>$fullName </label>
					    </div>
					  </div>


					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='calendar'>Date of Birth</label>
					    <div class='col-sm-8'> 
					      <label> $dob </label>
					    </div>
					  </div>

					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='phone'>Phone Number:</label>
					    <div class='col-sm-8'> 
					      <label> $phone </label>
					    </div>
					  </div>

					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='State'>Gender:</label>
					    <div class='col-sm-8'> 
					      <label>$gender </label>
					    </div>
					  </div>

					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='email'>Email:</label>
					    <div class='col-sm-8'> 
					      <label> $email </label>
					    </div>
					  </div>

					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='State'>Department:</label>
					    <div class='col-sm-8'> 
					      <label>" .$Employee['salary']." </label>
					    </div>
					  </div>

					  <div class='form-group'>
					    <label class='control-label col-sm-4' for='State'>Position:</label>
					    <div class='col-sm-8'> 
					      <label>" .$Employee['position']." </label>
					    </div>
					  </div>

					  <div class='form-group'>
					 	 <label for='resident' class='control-label col-sm-4'>Residential Address:</label>
					 	 <div class='col-sm-8'> 
					  		<label>" .$Employee['resident']." </label>
					  	</div> 
					</div>";
					echo'

					<br /><br />
					<div class="form-group"> 
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" name="update" class="btn btn-success">Update</button>
				    </div>
				    <td><a href="logs/delete.php?id='.$Employee['employee_id'].'" style="color: red">Delete</a></td>
				  </div>
						</div>
					</fieldset>';
				}
			}

?>
		</div><!--/.row-->
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
		</div>					
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
