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
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php
									$conn = new mysqli("localhost", "root", "", "inventory");

									$id = $conn->query("SELECT count(*) as id From Employees")->fetch_assoc();

									$id1 = $conn->query("SELECT count(*) as id From users")->fetch_assoc();

									echo $id['id'] || $id1['id'];
								?>
							</div>
							<div class="text-muted">Staff</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php
									$conn = new mysqli("localhost", "root", "", "inventory");

									$id = $conn->query("SELECT count(*) as id From Sales")->fetch_assoc();

									echo $id['id'];
								?>
									
								</div>
							<div class="text-muted">Sales</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php
									$conn = new mysqli("localhost", "root", "", "inventory");

									$id = $conn->query("SELECT count(*) as id From Supply")->fetch_assoc();

									echo $id['id'];
								?>


							</div>
							<div class="text-muted">Supply</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php
									$conn = new mysqli("localhost", "root", "", "inventory");

									$id = $conn->query("SELECT count(*) as id From items")->fetch_assoc();

									echo $id['id'];
								?>
									
								</div>
							<div class="text-muted">Total Items</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Pending Supply</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="2"> <span class="percent">
							<?php
									$conn = new mysqli("localhost", "root", "", "inventory");

									$id = $conn->query("SELECT count(*) as id From supply where status='1'")->fetch_assoc();

									echo $id['id'];
								?>
									
								</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Returned Item </h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="27"> <span class="percent"> Total No</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Item Name</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="10"> <span class="percent"> Quatity</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<?php
					$conn = new mysqli("localhost", "root", "", "inventory");

					$items = $conn->query("SELECT * From stock Order by quantity limit 4");
					while ($item = $items->fetch_assoc()){
						echo'<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>'.$item['items_name'].'</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="10"> <span class="percent">'.$item['crate_quantity'].'</span>
						</div>
					</div>
				</div>
			</div>';
					}

			?>
			
			
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
