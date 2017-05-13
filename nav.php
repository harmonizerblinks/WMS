<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Coca cola Inventory Management System </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>COCA-COLA WAREHOUSE INVENTORY MANAGMENT SYSTEM </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['inventoryUserFullname'] ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear">
							<use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel">
							<use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

			<!--
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Add Employees</a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
			-->

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sales"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Sales</span>
				</a>
				<ul class="children collapse" id="sales">
					<li>
						<a class="" href="new-sales.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Enter Sales
						</a>
					</li>
					<li>
						<a class="" href="view-sales.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View Sales Record
						</a>
					</li>
					<li>
						<a class="" href="search-sales.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search Sales Details
						</a>
					</li>
				</ul>
			</li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#supply"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Supply</span>
				</a>
				<ul class="children collapse" id="supply">
					<li>
						<a class="" href="new-supply.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Enter Supply
						</a>
					</li>
					<li>
						<a class="" href="view-supply.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View Supply Record
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search Supply Details
						</a>
					</li>
				</ul>
			</li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#product"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Product</span>
				</a>
				<ul class="children collapse" id="product">
					<li>
						<a class="" href="new-item.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Product
						</a>
					</li>
					<li>
						<a class="" href="view-item.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View All Products
						</a>
					</li>
					<li>
						<a class="" href="search-item.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search Product Details
						</a>
					</li>
				</ul>
			</li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#stock"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Stock</span>
				</a>
				<ul class="children collapse" id="stock">
					<li>
						<a class="" href="new-stock.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Stock
						</a>
					</li>
					<li>
						<a class="" href="view-stock.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View All Stocks
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search Stock Details
						</a>
					</li>
				</ul>
			</li>

			<li role="presentation" class="divider"></li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#employee"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Employees </span>
				</a>
				<ul class="children collapse" id="employee">
					<li>
						<a class="" href="new-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add New
						</a>
					</li>
					<li>
						<a class="" href="view-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View All 
						</a>
					</li>
					<li>
						<a class="" href="search-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search 
						</a>
					</li>
					<li>
						<a class="" href="search-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Payrol 
						</a>
					</li>
				</ul>
			</li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#report"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Report</span>
				</a>
				<ul class="children collapse" id="employee">
					<li>
						<a class="" href="new-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Generate Report
						</a>
					</li>
					<li>
						<a class="" href="view-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> View All 
						</a>
					</li>
					<li>
						<a class="" href="search-Employee.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Search 
						</a>
					</li>
				</ul>
			</li>
