<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bookstyle.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
</head>
<body>
	<?php
	include('header2.php');
	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="list">
					<!-- first li -->
					<!-- <li><a href="">Clothing</a></li> -->
					<!-- second li -->
					<li class="dropdown">
						<a href=""class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Women</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#" id="all">All</a>
				          <a class="dropdown-item" href="#" id="office">office wear</a>
				          <a class="dropdown-item" href="#" id="nativef">Native</a>
				          <a class="dropdown-item" href="#" id="setf">Set</a>
				          <a class="dropdown-item" href="#" id="skirt">Skirt</a>
			        	</div>
					</li>
					<!-- third li -->
					<li class="dropdown">
						<a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Men</a>

						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="#" id="nativem">Native</a>
				          <a class="dropdown-item" href="#" id="kaftan">Kaftan</a>
				         
			        	</div>
					</li>
					
					<!-- fourth li -->
					<li><a href="">Kids</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col pix">
				
			</div>
		</div>
		<!-- bespoke order -->
		<div class="row d-none" id="bespoke">
			<div class="col">
				<div class="text-center" style="background-color:rgba(255,0,0,0.7);color:white;padding:10px;width:50%;margin:auto;">
				<h2 >Please Request as Custom order</h2>
				<button type="submit" class="btn btn-dark my-3">Request</button>
				</div>
			</div>
		</div>
		<!-- end of bespoke order -->
		<div class="row py-3" id="owear">
			<div class="col-md-4">
				<img src="photos/w_office.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/jumpsuit2.jpg" class="img-fluid" >
				
			</div>
			<div class="col-md-4">
				<img src="photos/jumpsuit.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/office.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/w_top.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/jumpsuit3.jpg" class="img-fluid">
				
			</div>
		</div>
	
		<div class="row py-3" id="set">
			<div class="col-md-4">
				<img src="photos/w_set.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/w_set2.jpg" class="img-fluid" >
				
			</div>
			<div class="col-md-4">
				<img src="photos/jumpsuit3.jpg" class="img-fluid">
				
			</div>
			
		</div>
		<div class="row" id="ankara">
			<div class="col-md-4">
				<img src="photos/ankarablouse.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/ankarakimono.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/ankarakimonu2.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/ankara-pinafore.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/wnative1.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/product-1.jpg" class="img-fluid">
				
			</div>
		</div>
		<div class="row" id="sk">
			<div class="col-md-4">
				<img src="photos/skirt.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/skirt2.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/skirt3.jpg" class="img-fluid">
				
			</div>
		</div>
		<!-- men Clothing -->
		<div class="row" id="men">
			<div class="col-md-4">
				<img src="photos/kaftan-men10.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men1.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men3.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men4.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men5.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men6.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men7.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men8.jpg" class="img-fluid">
				
			</div>
			<div class="col-md-4">
				<img src="photos/kaftan-men9.jpg" class="img-fluid">
				
			</div>
		</div>
		<!-- end of men clothing -->

		
		
	</div>






	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/logbook.js"></script>
</body>
</html>