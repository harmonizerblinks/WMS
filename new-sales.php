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
				<li class="active">Sales</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Enter Sales</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<form method="post" action="logs/addsales.php" role="form" enctype="multipart/form-data">

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

					<fieldset>
						<legend>Sales Information</legend>

						<div style="width: 60%; margin: 0px auto;">
							

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="saleid">Sales Id:</label>

					    <div class="col-sm-8">
					      <input type="text" name="sales_id" class="form-control" <?php $id = "SAL".date('mdhis'); echo"value='$id'"; ?>  id="Sale_id" placeholder="Auto generate" required />
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="phone"> Customer Phone No:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required />
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="State">Product:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="items_name" class="form-control" list="iteml" placeholder="Product Name " required />
					      
					    <?php
					  		include 'logs/itemlist.php';
					  	?>
					  	
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="calendar">Quantity</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="noc" class="form-control" placeholder="Enter the no of crate" required />
					    </div>
					  </div>

					<br /><br />
					<div class="form-group"> 
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" name="submit" class="btn btn-success">Save Sales</button>
				    </div>
				  </div>
						</div>

					</fieldset>
				</form>
			</div>
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
