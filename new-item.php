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
				<li class="active">Items</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Enter Items</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<form method="post" action="logs/addproducts.php" role="form" enctype="multipart/form-data">

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
						<legend>Products Information</legend>

						<div style="width: 60%; margin: 0px auto;">
							

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="productid">Product Id:</label>
					    <div class="col-sm-8">
					      <input type="text" name="item_id" class="form-control"<?php $id = "ITM".date('mdhis'); echo"value='$id'"; ?> placeholder="Auto generate" required />
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="ProductN">Product Name:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="items_name" value="" list="iteml" class="form-control" placeholder="Product Name " required />
					    </div>
					  </div>
					  <?php
					  		include 'logs/itemlist.php';
					  ?>
					  <div class="form-group">
					    <label class="control-label col-sm-4" for="amount"> Amount:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="amount" value="" class="form-control" placeholder="Enter amount per Crate" required />
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-4" for="quantity">Bottles Per-Crate:</label>
					    <div class="col-sm-8"> 
					      <input type="text" name="crate_quantity" value="" class="form-control" placeholder="Enter the no of Bottle in a crate" required />
					    </div>
					  </div>

					<br /><br />
					<div class="form-group"> 
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" name="submit" class="btn btn-success">ADD Product</button>
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
