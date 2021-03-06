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
				<li class="active">Supply</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add New Supply</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<form method="post" action="logs/addsupply.php" role="form" enctype="multipart/form-data">

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
						<legend>Supply Information</legend>

						<div style="width: 60%; margin: 0px auto;">
						
						<div class="form-group">
					    <label class="control-label col-sm-4" for="Stock_id">Supply Id:</label>

					    <div class="col-sm-8">
					      <input type="text" name="supply_id" class="form-control" <?php $id = "SUP".date('mdhis'); echo"value='$id'"; ?> placeholder="Auto generate" required />
					    </div>
					  </div>	

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="fullName">Cust FullName:</label>

					    <div class="col-sm-8">
					      <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Enter Full Name" required />
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="phone">Cust Phone No:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required />
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="State">Product Name:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="items_name" list="iteml" class="form-control" id="items_name" placeholder="enter product_name " required />
					    </div>
					  </div>
					  <?php
					  	include 'logs/itemlist.php';
					  	?>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="email">Quantity:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="noc" class="form-control" id="quantity" placeholder="Enter crate quantity" required />
					    </div>
					  </div>

					  <div class="form-group">
					 	 <label for="resident" class="control-label col-sm-4">Delivery Address:</label>
					 	 <div class="col-sm-8"> 
					  		<textarea name="resident" class="form-control" rows="5" id="resident" placeholder="Enter Customer Delivery Address" required /></textarea>
					  	</div> 
					</div>
					<br /><br />
					<div class="form-group"> 
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" name="submit" class="btn btn-success">ADD Supply</button>
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
