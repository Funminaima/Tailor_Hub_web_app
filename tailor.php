<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['tailor'])) {
	$atailor=$object->getATailor($_SESSION['tailor']);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width= device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<style type="text/css">
		#bg-img1{
			background-image: url('photos/4.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			
		}
		.darklayer{
			background-color: rgba(0,0,0,0.7);
			
		}
		#home{
			text-decoration:none;
			color:rgb(230,230,0);
			background-color:black;
			padding:20px;
		}
		
	</style>
</head>
<body>
	<?php
	include('header.php');
	?>
	<div class="container">
		<!-- feedback php -->
		
		<?php
		echo "<div>";
		echo "<h4 class='text-warning px-3'>";
		if (isset($_GET['feedback'])) {
			echo ucwords($atailor['tail_fname']).', '.$_GET['feedback'];
		}
		echo "</h4>";
		echo "</div>";
		?>
		<section class="bg-img1">
		<div class="row py-5" id="bg-img1">
			<div class="col-8 mx-auto text-light py-2 darklayer">
				<h2 class="text-light text-center">TAILOR SIGN UP</h2>
				<form class="text-light" style="margin:0px" action="tsignaction.php" method="post">
					<div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="fname">First Name</label><span style="color:red"> *</span>
					      <input type="text" name="fname" class="form-control" id="fname" required>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="lname">Last Name</label><span style="color:red"> *</span>
					      <input type="text" name="lname" class="form-control" id="lname" required>
					    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEmail4">Email Address</label><span style="color:red"> *</span>
				      <input type="email" name="email" class="form-control" id="inputEmail4" required>
				    </div>
				    <!-- username -->
				    <div class="form-group col-md-6">
					    <label for="uname">User Name</label><span style="color:red"> *</span>
					    <input type="text" name="username" class="form-control" id="uname" required>
				  </div>
				  </div>
				  <div class="form-row">
				  	<div class="form-group col-md-6">
				      <label for="pwd">Password</label><span style="color:red"> *</span>
				      <input type="password" name="pass" class="form-control" id="pwd" required>
				    </div>
					 <div class="form-group col-md-6">
					    <label for="cpwd">Confirm Password</label><span style="color:red"> *</span>
					    <input type="password" name="confirm" class="form-control" id="cpwd" placeholder="" required>
					 </div>
					  
					</div>	  
				  <div class="form-row text-center">
				  	<div class="col">
				  <button type="submit" class="btn btn-danger" id="sign">Sign in</button>
				  	</div>
				  </div>
				</form>
					
				</div>
			</div>
				<!-- <form>
					<div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="fname">First Name</label><span style="color:red"> *</span>
					      <input type="text" class="form-control" id="fname" required>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="lname">Last Name</label><span style="color:red"> *</span>
					      <input type="text" class="form-control" id="lname" required>
					    </div>
				  </div>

				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEmail4">Email</label><span style="color:red"> *</span>
				      <input type="email" class="form-control" id="inputEmail4" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="pwd">Password</label><span style="color:red"> *</span>
				      <input type="password" class="form-control" id="pwd" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="cpwd">Confirm Password</label><span style="color:red"> *</span>
				    <input type="password" class="form-control" id="cpwd" placeholder="" required>
				  </div>
				  <div class="form-group">
				    <label for="inputAddress">Address</label><span style="color:red"> *</span>
				    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
				  </div>
				  <div class="form-group">
				    <label for="inputAddress2">Address 2</label><span style="color:red"> *</span>
				    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
				  </div>
				  <div class="form-group">
				    <label for="cname">Company name</label><span style="color:red"> *</span>
				    <input type="text" class="form-control" id="cname" placeholder="" required>
				  </div>
				  <div class="form-group">
				    <label for="cadd"> Company Address</label><span style="color:red"> *</span>
				    <input type="text" class="form-control" id="cadd" placeholder="" required>
				  </div>
				  <div class="form-group">
				  	<label>Category:</label><span style="color:red"> *</span><br>
				    <label for="cmale"> Male</label>
				    <input type="radio" name="gender" id="cmale" value="male" required>
				    <label for="cfmale" class="ml-2"> Female</label>
				    <input type="radio" id="cfmale" name="gender" value="female" required>
				    <label for="both" class="ml-2"> Both</label>
				    <input type="radio" id="both" name="gender" value="Both" required>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6 my-0">
				      <label for="inputCity">City</label><span style="color:red"> *</span>
				      <input type="text" class="form-control" id="inputCity" required>
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputState">State</label><span style="color:red"> *</span>
				      <select id="inputState" class="form-control" required>
				        <option selected>Choose...</option>
				        <option>...</option>
				      </select>
				    </div>
				    <div class="form-group col-md-2">
				      <label for="inputZip">Zip</label>
				      <input type="text" class="form-control" id="inputZip">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="form-check">
				      <input class="form-check-input" type="checkbox" id="gridCheck">
				      <label class="form-check-label" for="gridCheck">
				        Click here to accept our <a href="">Terms and Condition</a>
				      </label>
				    </div>
				  </div>
				  <button type="submit" class="btn btn-primary" id="sign">Sign in</button>
				</form>
			</div>
		</div>-->
		</section>
	</div>





	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#cpwd').change(function(){
				var pwd=$('#pwd').val();
				var cpwd=$('#cpwd').val();
				if (pwd!=cpwd) {
					alert('your password need to match');
					$('#inputAddress').attr('disabled','disabled')
					$('#sign').attr('disabled','disabled')
				}
				else{
					$('#inputAddress').removeAttr('disabled');
					$('#sign').removeAttr('disabled');
				}
			})



			$('#sign').click(function(){
				var a=$('#gridCheck').prop('checked')
				if (a==false) {
					$('#sign').after('<span style="color:red" class="rmv mx-2">Kindly agree to the terms and condition</span>');
					return false;
				}
				else{
					$('.rmv').remove();
				}

			})
		




		})
	</script>
</body>
</html>