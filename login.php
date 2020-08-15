<?php
include('Userc.php');
$object=new Userc;
// $a=$object->getCustomer($_SESSION['user']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, fit-to-shrink=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<style type="text/css">
		.bg-img{
			background-image: url(photos/6.jpg);
			background-size:cover;
		}
		.height{
			min-height:100vh;
		}
		.bgcolor{
			background-color:rgba(0,0,0,0.4);
		}
	</style>
</head>
<body>
	<?php
	include('header.php');
	?>
	<div class="container">
		<div class="row bg-img height  align-items-center">
			<div class="col-md-8 mx-auto text-center">
				<h2 class="text-light">LOGIN FORM</h2>
				<form class="bgcolor text-light py-3" action="loginaction.php" method="POST">
					<div class="form-group d-flex justify-content-center">
						<div class="form-row col-md-6">
							<label for="uname">Username</label>
							<input type="text" name="username" value="" id="uname" class="form-control" required>
						</div>
					</div>
					<div class="form-group d-flex justify-content-center">
						<div class="form-row col-md-6">
							<label for="uname">Password</label>
							<input type="Password" name="pass" value="" id="pwd" class="form-control mb-3" required>
						</div>
					</div>
					<div class="form-group d-flex justify-content-center">
						<div class="form-row col-md-6">
							<label class="mr-4">Login as</label>
							<input type="radio" name="Ptype" value="tailor" required><span style=""class="mr-2">Tailor</span>
							<input type="radio" name="Ptype" value="customer" required>customer
						</div>
					</div>
					<div class="form-group d-flex justify-content-center">
						<div class="form-row col-md-6">
							<button type="submit" class="btn btn-warning m-auto" id="btn">Login</button>
							<label class="text-light">Dont have an account yet?click <a href="index.html" style="color:red">Here</a>to go to our sign up page.
							</label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>