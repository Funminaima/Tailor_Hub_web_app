<?php
include('Userc.php');
$object=new Userc;
if(isset($_SESSION['user'])){
	$a=$object->getCustomer($_SESSION['user']);
}	
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
		#bg-img{
			background-image: url(photos/5.jpg);
			background-size:cover;
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
		echo "<h4 class='text-primary px-3'>";
		if (isset($_GET['feedback'])) {
			echo $a['cust_fname'].', '.$_GET['feedback'];
		}
		echo "</h4>";
		echo "</div>";
		?>
		<section id="bg-img">
			<div class="row py-5">
				<div class="col-md-4">
				</div>
				<div class="col-md-6 mr-1">
					<h2 class="text-light">CUSTOMER SIGN UP</h2>
					<form class="text-light" style="margin:0px" action="csignaction.php" method="post">
					<div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="fname">First Name</label><span style="color:red"> *</span>
					      <input type="text" name="fname" class="form-control" id="fname" required>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="lname">Last Name</label><span style="color:red"> *</span>
					      <input type="text"  name="lname" class="form-control" id="lname" required>
					    </div>
				  </div>
				  <div class="form-group">
					    <label for="uname">User Name</label><span style="color:red"> *</span>
					    <input type="text"  name="uname" class="form-control" id="uname" required>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEmail4">Email Address</label><span style="color:red"> *</span>
				      <input type="email"  name="email" class="form-control" id="inputEmail4" required>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="pwd">Password</label><span style="color:red"> *</span>
				      <input type="password"  name="pwd" class="form-control" id="pwd" required>
				    </div>
				  </div>
				  <div class="form-row">
					  <div class="form-group col">
					    <label for="cpwd">Confirm Password</label><span style="color:red"> *</span>
					    <input type="password"  name="cpwd" class="form-control" id="cpwd" placeholder="" required>
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
		</section>

	</div>

	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#cpwd').change(function(){
				var a=$('#pwd').val();
				var b=$('#cpwd').val();
				if (a!=b) {
					alert('password has to match')
					$('#sign').attr('disabled','disabled' );
				}
				else{
					$('#sign').removeAttr('disabled');
				}

			})
			$('#sign').click(function(){
				var measure=$('#msure').val();
				var city=$('#inputCity').val();
				var state=$('#inputState').val()
				if (measure.lowerCase().trim()==''|| state.lowerCase().trim()=='' || city.lowerCase().trim()=='') {
					alert('All asterik field are required');
					return false;
				}
				
				
			})









		})
	</script>
</body>
</html>