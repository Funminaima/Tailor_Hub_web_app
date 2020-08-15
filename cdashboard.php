<?php

include('Userc.php');
$object=new Userc;
if (!isset($_SERVER['HTTP_REFERER'])) {

	header("location:login.php");
}
if (!isset($_SESSION['loginCust'])) {
header('location:index.php');
}
$a=$object->getCustomer($_SESSION['user']);

//picture upload
if ($a['cust_pix']=='') {
	$image="photos/user.png";
}
else{
	$image="pix/".$a['cust_pix'];
}

//update measure
$object->getAMeasurement($_SESSION['user']);
include('header2.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, fit-to-shrink=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/cdash.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="background-color:black">
			<div class="col">
				<div class="bg-color py-3">
					<h2 class="text-light text-center"><i class="fas fa-chart-bar mr-2"></i>My dashboard</h2>
				</div>
			</div> 
		</div>
		<div class="row">
			<!-- sidebar -->
			<div class="col-md-4" id="sidebar">
				<?php
				if (isset($_SESSION['error'])) {
					
				}
				?>
				<img src="<?php echo $image ?>" alt="profile piture" class="img-fluid rounded-circle" width="70%"><br>
				<small class="text-light">2MB file size accepted</small>
				<form method="post" action="pix_uploadcust.php" enctype="multipart/form-data">
				<input type="file" name="fileUpload">

				<button type="submit" class="btn btn-success my-2">
					<?php
					if ($a['cust_pix']=='') {
						echo "Upload picture";
					}
					else{
						echo "change picture";
					}
					?></button>
				</form>
				<nav>
					<!-- first nav with dropdown -->
					<div class="dropdown">
					<a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile Update</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="#" id="personal">Update personal detail</a>
				          <a class="dropdown-item" href="#" id="pwdchange">Change password</a>
			        	</div>
			        </div>
			        <!-- second nav without dropdown -->
					<a href="brand.php" >All Brands</a>
			        <!-- second nav without dropdown -->
					<a href="view_work.php" >Outfit Categories</a>
					<!-- second nav without dropdown -->
					<a href="cust_profile.php" id="profile">My Profile</a>
					<!-- third nav with dropdown -->
					<div class="dropdown">
						<a href="#" class="dropdown-toggle dropdown-toggle-split" id="dropdownMenuCustom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Custom Outfit</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuCustom">
						<a class="dropdown-item" href="#" id="custom_f">Male/Female</a>
						
						</div>
					</div>
					
					<!-- fifth nav -->
					<a href="logout.php">Log out</a>
				</nav>
			</div>
			<!-- main-place -->
			<div class="col-md-8">
				<div class="bg-danger text-light my-1 p-2 text-center">
					
				</div>
				<div id="bg-img" style="height:40%;margin:10px 0px">
					
				</div>
				<div class="card text-center" id="greeting">
				  <div class="card-header"  style="background-color: black;color:white">
				    <h1>Welcome</h1>
				  </div>
				  <div class="card-body py-3">
				    <?php
				    
				    echo "<h5 class='card-title'>You are succesfully logged in".' '.$_SESSION['loginCust'];
				    echo "</h5>";
				    ?>
				    <div>				    
				    	<h4 class="card-text py-2">
				    		<?php
							if (isset($_GET['success'])) {
								echo $_GET['success'];
							}
							elseif (empty($a['cust_gender']) and empty($a['city'])) {
								echo "Kindly update your profile";
							}
							else{
								echo "You have an updated profile";
							}
							?>
				    	</h4>
				    </div>
				    <a href="view_work.php" class="btn btn-danger">shop</a>
				  </div>
				</div>
				<!-- start of form -->
				<div class="card mt-4" style="display:none" id="form">
					<div class="card-body">
						<form action="updatecust.php" method="post">
							<div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="fname">First Name</label><span style="color:red"> *</span>
							      <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $a['cust_fname']; ?>"required>
							    </div>
							    
							    <div class="form-group col-md-6">
							      <label for="lname">Last Name</label><span style="color:red"> *</span>
							      <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $a['cust_lname']; ?>" required>
							    </div>
						  </div>
	
						  <div class="form-row">
						    <div class="form-group col">
						      <label for="inputEmail">Email Address</label><span style="color:red"> *</span>
						      <input type="email" name="email" class="form-control" value="<?php echo $a['cust_email']; ?>" id="inputEmail" required>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col">
						      <label for="tel">Phone</label><span style="color:red"> *</span>
						      <input type="tel" name="phone" class="form-control" value="<?php echo $a['cust_phone']?>" id="tel" required>
						    </div>
						  </div>
						  <div class="form-row">	
						    <div class="form-group col">
						      <label for="pwd">Username</label><span style="color:red"> *</span>
						      <input type="text" name="uname" value="<?php echo $a['username']; ?>" class="form-control" id="uname" required>
						    </div>
						  </div>
						  
							<div class="form-row">
							<div class="form-group col-md-6">
							    <label for="msure"> Size</label><span style="color:red"> *</span>
							    <select id="msure" class="form-control" name="measure">
							        <option value="">Choose...</option>
							        <option value="size8" 
							        <?php
							        if ($a['size']=='size8') {
							        	echo "selected='selected'";
							        }
							        ?>>size 8</option>
							        <option value="size10"
							        <?php
							        if ($a['size']=='size10') {
							        	echo "selected=selected";
							        }
							        ?>>size 10</option>
							        <option value="size12"
							        <?php
							        if ($a['size']=='size12') {
							        	echo "selected=selected";
							        }
							        ?>>size 12</option>
							        <option value="size 14"
							        <?php
							        if ($a['size']=='size14') {
							        	echo "selected=selected";
							        }
							        ?>>size 14</option>
							        <option value="size16"
							        <?php
							        if ($a['size']=='size16') {
							        	echo "selected=selected";
							        }
							        ?>>size 16</option>
							        <option value="size18"
							        <?php
							        if ($a['size']=='size18') {
							        	echo "selected=selected";
							        }
							        ?>>size 18</option>
							      </select>
							  </div>
							  <div class="form-group col-md-6">
							  	<label>Gender:</label><span style="color:red"> *</span><br>
							    <label for="cmale"> Male</label>
							    <input type="radio" name="gender" id="cmale" value="male" required <?php
							    if ($a['cust_gender']=='male') {
							    	echo "checked=checked";
							    }
							    ?>
							    >
							    <label for="cfmale" class="ml-2"> Female</label>
							    <input type="radio" id="cfmale" name="gender" value="female" required 
							    <?php
							    if ($a['cust_gender']=='female') {
							    	echo "checked=checked";
							    }
							    ?>
							    >
							  </div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col">
							    <label for="inputAddress">Address</label><span style="color:red"> *</span>
							    <input type="text" name="inputAddress"  class="form-control" value="<?php echo $a['address']; ?>" id="inputAddress" placeholder="1234 Main St" required>
						  	</div>
						  </div>
						  
						 <div class="form-row">
						 	<div class="form-group col-md-6">
						      <label for="inputCity">City</label><span style="color:red"> *</span>
						      <input type="text" value="<?php echo $a['city']; ?>" name="city" class="form-control" id="inputCity" required>
						    </div>
						    <div class="form-group col-md-4">
						      <label for="inputState">State</label><span style="color:red"> *</span>
						      <?php 
						      //$object->getAllState();
						      $stateselect=$object->getAllstate2();
						      echo "<select name='state' class='form-control'>";
          foreach ($stateselect as $val) {
            if ($a['state']==$val['state_id']) {
             echo "<option value='{$val['state_id']}' selected=selected>{$val['state_name']}</option>";
            }
            else{
              echo "<option value='{$val['state_id']}'>{$val['state_name']}</option>";
            }
            
          }
         echo "</select>";
						      ?>
						    </div>
						    <div class="form-group col-md-2">
						      <label for="inputZip">Zip</label>
						      <input type="text" name="zip" class="form-control" id="inputZip">
						    </div>
						 </div>
						 <div class="form-row text-center">
						  	<div class="col">
						  <button type="submit" class="btn btn-danger" id="sign">Update</button>
						  	</div>
						  </div>
						</form>
					</div>
				</div>
				<!-- end of form -->

				<!-- start of change pass -->
				<div class="card card-color my-2" style="display:none" id="pwdform">
					<div class="card-body">
						<form>
							<div></div>
						  <div class="form-group col-md-6 mx-auto">
						    <label for="oldpwd">Old Password</label>
						    <input type="password" class="form-control" id="oldpwd" name="oldpassword" required>
						  </div>
						  <div class="form-group col-md-6 mx-auto">
						    <label for="newpwd">New Password</label>
						    <input type="password" class="form-control" id="newpwd" name="newpassword" required>
						    <small style="color:red; cursor:pointer" id="show" onclick="showpwd()">Show password</small>
						  </div>
						  <div class="form-group col-md-6 mx-auto">
						    <label for="confirmpwd"> Confirm New Password</label>
						    <input type="password" class="form-control" id="confirmpwd" name="confirmpassword" required>
						  </div>
						  <div class="mx-auto col-md-6 text-center form-group">
						  <button type="submit" class="btn btn-danger" id="btnpwd">Save</button>
						  </div>
						</form>
					</div>
				</div>
				<!-- end of change pass -->
				<!-- start of custom outfit for female -->
				<div class="card text-center my-2 mx-auto" style="width:70%;display:none" id="female">
					<div class="card-header" style="background-color: rgb(230,230,0);color:black">
						<h5>Kindly enter your measurement: FEMALE/MALE</h5>
						<small>Fill the input that applies to your gender</small>
					</div>
					<div class="card-body">
						<div id="msg"></div>
						<form action="measure.php" method="post">
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Choose Gender</label>
								<div class="col-md-6 mx-auto">
								<select name="measure" class="form-control" id="measure">
									<option value="">Choose</option>
									<option value="m">Male</option>
									<option value="f">Female</option>
								</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Length:</label>
								<div class="col-md-6 mx-auto">
								<input type="number" value="<?php echo $value['m_length']; ?>" name="length" id="length" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Burst:</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="Burst" id="burst" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Waist</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="waist" id="waist" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto"> Top Length:</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="t_length" id="top_l" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Trouser Length:</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="trouser_length" id="tl" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Shoulder</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="shoulder" id="shoulder" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Hip</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="Hip" id="hip" class="form-control"d>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">Arm</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="arm" id="arm" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 mx-auto">stomach</label>
								<div class="col-md-6 mx-auto">
								<input type="number" name="stomach" id="st" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4" style="color:red">Call me for more information</label>
								<div class="col-md-7">
								<input type="checkbox" name="call" id="call" class="mx-2"><span style="color:red">Call Me</span>
								</div>
							</div>
							<div class="form-group row">
								<button type="submit" id="btn" class="btn btn-danger col-md-6 mx-auto">Save</button>
							</div>
						</form>
					</div>
				</div>
				<!-- end of custom outfit for female -->

			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/Cdash.js"></script>
	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$('#btn').click(function(){
		// 		var gender=$('#measure').val();
		// 		var l=$('#length').val();
		// 		var b=$('#burst').val();
		// 		var w=$('#waist').val();
		// 		var tl=$('#top_l').val();
		// 		var trouser=$('#tl').val();
		// 		var shoulder=$('#shoulder').val();
		// 		var hip=$('#hip').val();
		// 		var arm=$('#arm').val();
		// 		var stomach=$('#st').val();
		// 		//converting to json
		// 		var data={"measure":gender,"length":l,"burst":b,"waist":w,"top_l":tl,"trouser":trouser,"shoulder":shoulder,"hip":hip,"arm":arm,"stomach":stomach}
		// 		$.ajax({
		// 			url:'measure.php',
		// 			data:data,
		// 			type:'POST',
		// 			dataType:'text',
		// 			success:function(msg){
		// 				$('#msg').html(msg);
		// 			}
		// 		});
		// 	})

		// })
	</script>
</body>
</html>