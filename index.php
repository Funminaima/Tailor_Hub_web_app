<!DOCTYPE html>
<html>
<head>
	<title>My web app</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>
	<?php
	include('header2.php');
	?>

				

	<div class="container-fluid">
		<section >
			<div class="row height align-items-center" id="bg-img">
				<div class="col-md-12">
					<div class="text-center py-2">
						<div id="dissa" class="bg-color" style="display:none">
							<h3><span style="color:black">Your cloths</span> can be what you are not....<span style="font-size:30px; font-style:italic; color:rgb(230,230,0);">Perfect and perfectly fit!</span></h3>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>
			<!--col of tittle-->
			<div class="row">
				<div class="col text-center">
					<h1 class="mt-4">How it works</h1>
					<hr style="background-color:red; width:8%">
					<hr style="background-color:red; width:30%">
					<h5>As a Customer</h5>
				</div>
			</div>
				<!--end of tittle section-->
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="box">
						<p class="num">1</p>
						<i class="fa fa-check-circle fa-5x my-3"></i>
						<h5 class="text-danger">Sign in</h5>
						<p>Sign in as a customers to get started, this is done by simply clicking on the sign in button</p>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="box">
						<p class="num">2</p>
						<i class="fa fa-users fa-5x my-3"></i>
						<h5 class="text-danger">Log in</h5>
						<p>Login to the app to start using</p>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="box">
						<p class="num">3</p>
						<i class="fa fa-globe fa-5x my-3"></i>
						<h5 class="text-danger">Browse through</h5>
						<p>Browse through the site to see different outfit and different brand names</p>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="box">
						<p class="num">4</p>
						<i class="fa fa-briefcase fa-5x my-3"></i>
						<h5 class="text-danger">Dashboard Update</h5>
						<p>Click on any of the outfit of your interest if you want the ready made outfit, to succesfully add, you need to provide your measurement. Any of the item/items you choose will be shown in your dashboard</p>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="box">
						<p class="num">5</p>
						<i class="fa fa-female fa-5x my-3"></i>
						<i class="fa fa-male fa-5x my-3"></i>
						<h5 class="text-danger">custom outfit</h5>
						<p>click on custom outfit if you are supplying the cloth to be sewn, it gives you the list of the tailor brand to choose from, choose your desired brand.A pick up person will come to your deisred location to pick up your material</p>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="box">
						<p class="num">6</p>
						<i class="fa fa-credit-card fa-5x my-3"></i>
						<h5 class="text-danger">Pay</h5>
						<p>Pay using our secured payment platform , you can also decide to pay via tranfer, kindly note that payment validates order</p>
					</div>
				</div>
				<div class="col-md-4 text-center m-auto">
					<div class="box">
						<p class="num">7</p>
						<i class="fa fa-truck fa-5x my-3"></i>
						<h5 class="text-danger">Delivery</h5>
						<p>Delivery takes 1-2 working days for ready made outfit and 5 workind days for any custom made outfit. All Delivery os to your delivery address</p>
					</div>
				</div>
			</div>

		<section id="tailor">
			<div class="row">
				<div class="col-12 py-5 text-center">
					<p style="font-size:20px" class="text-danger p-4 mt-5 setbg">Are you a <span style="color:rgb(230,230,0); font-size:30px; font-style:italic">TAILOR</span> looking for an oppurtunity to partner with us? kindly click this</p>
					<button type="button" class="but2" id="btnclick">View Tailor</button>
				</div>
				<div class="col">
					<ul class="unstyle" id="show" style="display:none">
						<li><i class="fa fa-check-circle mr-2 yellow"></i>Sign up as a tailor, kindly fill in the necessary details to create account</li>
						<li><i class="fa fa-user mr-2 yellow mr-2"></i>Login to view your dashboard </li>
						<li><i class="fa fa-list yellow mr-2"></i>List your skills</li>
						<li><i class="fa fa-upload yellow mr-2"></i>Upload your fashion styles</li>
						<li><i class="fa fa-smile yellow mr-2"></i>Wait, let your skill fetch you money!</li>
						
					</ul>
				</div>
			</div>	
		</section>
		<section>
			<!--start of tittle-->
			<div class="row">
				<div class="col my-3 text-center">
					<h1>Contact us</h1>
					<hr style="background-color:red; width:8%">
					<hr style="background-color:red; width:30%">
				</div>
			</div>
			<!--end of tittle-->
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card">
					  <div class="card-body">
					    <form id="form1">
						  <div class="row">
						    <div class="col-6 my-2">
						    	<label>First Name</label><span style="color:red"> *</span>
						      <input type="text" class="form-control" placeholder="First name" id="fname">
						    </div>
						    <div class="col-6 my-2">
						    	<label>Last Name</label><span style="color:red"> *</span>
						      <input type="text" class="form-control" placeholder="Last name" id="lname">
						    </div>
						    <div class="col-12 my-2">
						    	<label>Email Address</label><span style="color:red"> *</span>
						      <input type="text" class="form-control" placeholder="Email Address" id="email">
						    </div>
						    <div class="col-12 my-2">
						    	<label>Telephone</label><span style="color:red"> *</span>
						      <input type="tel" name="phone" class="form-control" id="phone">
						    </div>
						    <div class="col-12 my-2">
						    	<label>Information for us</label>
						      <textarea class="form-control"></textarea>
						    </div>
						    <div class="col">
						    	<button type="submit" class="btn btn-block btn-warning" id="sub">Submit</button>
						    </div>
						  </div>
						</form>
					  </div>
					</div>
				</div>
				<div class="col-md-6 text-center">
					<div class="my-3">
						<i class="fas fa-envelope yellow m-2 fa-3x"></i>
						<h5>funminaima@gmail.com</h5>
					</div>
					<div class="my-3">
						<i class="fas fa-phone yellow m-2 fa-3x"></i>
						<h5>08037478245</h5>
					</div>
					<div class="py-3">
						<a href="#"><i class="fab fa-facebook text-primary fa-3x mx-2"></i></a>
						<a href="#"><i class="fab fa-instagram text-danger fa-3x mx-2"></i></a>
						<a href="#"><i class="fab fa-twitter text-primary fa-3x mx-2"></i></a>
						<a href="#"><i class="fab fa-google text-danger fa-3x mx-2"></i></a>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="row">
				<div class="col">
					<p class="text-center footer">Copyright&copy:Naima 2020</p>
				</div>
			</div>
		</section>

		
	</div>
























	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/style1.js"></script>
</body>
</html>