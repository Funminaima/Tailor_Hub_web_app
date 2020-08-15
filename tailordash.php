<?php
include('Userc.php');
$object=new Userc;
//getting a tailor
//if (isset($_SERVER['HTTP_REFERER'])) {
	$a=$object->getATailor($_SESSION['tailor']);
	if (!isset($_SESSION['tailor'])) {
header('location:index.php');
}

	if ($a['tail_pix']=='') {
	$image="photos/user.png";
	}
	else{
		$image="pix_tailor/".$a['tail_pix'];
	}

$returne=$object->getAllCategoryName($_SESSION['tailor']);
	$cat_name=[];

	foreach($returne as $v){
		$cat_name[]=$v['category_name'];
	}

// 	echo "<pre>";
// print_r($returne);
// echo "<pre>";
// echo "<br>";
// echo "<pre>";
// 	print_r($cat_name);
// 	echo "<pre>";
	

// }
	// else{
	// header("location:login.php");
	// }

include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, fit-to-shrink=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/tdash.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			<div class="col-md-4" id="sidebar">
				<img src="<?php echo $image ?>" alt="profile piture" class="img-fluid rounded-circle" width="70%"><br>
				<small class="text-light">2MB file size accepted</small>
				<form method="post" action="pix_uploadtail.php" enctype="multipart/form-data">
				<input type="file" name="fileUpload">
				<button type="submit" class="btn btn-sm btn-primary my-2">
					<?php
					if ($a['tail_pix']!='') {
						echo "change picture";
					}
					else{
						echo "upload picture";
					}
					?></button>
				</form>
				<!-- first nav with dropdown -->
				<nav>
					<div class="dropdown">
					<a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile Update</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="#" id="personal" onclick="increaseHeight()">Update personal detail</a>
				          <a class="dropdown-item" href="#" id="pwdchange">Change password</a>
			        	</div>
			        </div>
			        <!-- second nav without dropdown -->
					<a href="tailorupload.php" >Upload style</a>
			        <!-- second nav without dropdown -->
					<a href="" >My pictures</a>
					<!-- third nav with dropdown -->
					<?php
					if (isset($_SESSION['tailor'])) {
						$notify=$object->getOrderNo($_SESSION['tailor']);
					}
					
					?>
					<a href="t_order.php" >My orders <span class="badge badge-light"><?php echo $notify; ?></span></a>
					<!-- fourth nav -->
					<a href="">Information</a>
					<!--  nav -->
					<a href="logout.php">log out</a>
				</nav>
			</div>
			
			<!-- main place -->
			<div class="col-md-8">
				<div id="bg-img" style="height:40%;margin:10px 0px">
					
				</div>
				<div class="card text-center" id="greeting">
				  <div class="card-header"  style="background-color: black;color:white">
				    <h1>Welcome</h1>
				  </div>
				  <div class="card-body py-3">
				    <?php
				    echo "<h5 class='card-title'>You are succesfully logged in".' '.$_SESSION['loginTailor'];
				    echo "</h5>";
				    ?>
				    <div class="card-text">
				    	<h4>
				    	<?php
				    	if (isset($_GET['success'])) {
						echo $_GET['success'];
						}
						elseif (empty($a['brand_name']) and empty($a['brand_address']) and empty($a['grnder'])) {
							echo "kindly update your profile";
						}
						else{
							echo "You have an upadated profile";
						}
				    	?>
				    	</h4>
				    </div>
				    
				  </div>
				</div>
				<!-- form for update -->
				<div class="card" style="display:none" id="form">
					<div class="card-body">
						 <form action="update_tail.php" method="post">
							<div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="fname">First Name</label><span style="color:red"> *</span>
							      <input type="text" value="<?php echo $a['tail_fname'] ?>" class="form-control" name="fname" id="fname" required>
							    </div>
							    <div class="form-group col-md-6">
							      <label for="lname">Last Name</label><span style="color:red"> *</span>
							      <input type="text" value="<?php echo $a['tail_lname'] ?>" class="form-control" name="lname" id="lname" required>
							    </div>
						  </div>

						  <div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputEmail4">Email</label><span style="color:red"> *</span>
						      <input type="email" value="<?php echo $a['tail_email'] ?>" class="form-control" name="email" id="inputEmail4" required>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="pwd">Username</label><span style="color:red"> *</span>
						      <input type="text" name="uname" value="<?php echo $a['tail_username']; ?>" class="form-control" id="uname" required>
						    </div>
						   </div>
						   <div class="form-row">
						   	<div class="form-group col-md-6">
						      <label for="tel">Phone</label><span style="color:red"> *</span>
						      <input type="tel" name="phone" class="form-control" value="<?php echo $a['tail_phone']?>" id="tel" required>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="gend">Gender</label><span style="color:red"> *</span>
						      <select class="form-control" name="gender">
						      	<option value="">choose</option>
						      	<option value="male"
						      	<?php
						      	if ($a['tail_gender']=='male') {
						      		echo "selected=selected";
						      	}
						      	?>>Male</option>
						      	<option value="female" 
						      	<?php
						      	if ($a['tail_gender']=='female') {
						      		echo "selected=selected";
						      	}
						      	?>>Female</option>
						      </select>
						    </div>
						    
						  </div>
						  
						  <div class="form-group">
						    <label for="inputAddress">Address</label><span style="color:red"> *</span>
						    <input type="text" name="address" class="form-control" value="<?php echo $a['tail_address']; ?>" id="inputAddress" placeholder="1234 Main St" required>
						  </div>
						  <div class="form-group">
						    <label for="cname">Brand name</label><span style="color:red"> *</span>
						    <input type="text" class="form-control" value="<?php echo $a['brand_name']; ?>" name="brand" id="cname" placeholder="" required>
						  </div>
						  <div class="form-group">
						    <label for="cadd"> Brand Address</label><span style="color:red"> *</span>
						    <input type="text" class="form-control" name="brandadd" value="<?php echo $a['brand_address']; ?>" id="cadd" placeholder="" required>
						  </div>
						  <div class="form-group">
						  	<label>Category:</label><span style="color:red"> *</span><br>
						    <label for="cmale"> Male</label>
						    <input type="checkbox" name="cat[]" id="cmale" value="male"
						    <?php 
						    if (in_array('male', $cat_name))
						    	echo "checked=checked";
						    ?>
						    >
						    <label for="cfmale" class="ml-2"> Female</label>
						    <input type="checkbox" id="cfmale" name="cat[]" value="female" required
						    <?php 
						    if (in_array('female', $cat_name))
						    	echo "checked=checked";
						    ?>
						    >
						    <label for="both" class="ml-2">Kid Male</label>
						    <input type="checkbox" id="both" name="cat[]" value="Kidmale"
						    <?php 
						    if (in_array('Kidmale', $cat_name))
						    	echo "checked=checked";
						    ?>
						    >
						    <label for="both" class="ml-2">Kid female</label>
						    <input type="checkbox" id="both" name="cat[]" value="kidfemale" 
						    <?php 
						    if (in_array('kidfemale', $cat_name))
						    	echo "checked=checked";
						    ?>
						    >
						  </div>
						  <div class="form-row">
						    <div class="form-group col-md-6 my-0">
						      <label for="inputCity">City</label><span style="color:red"> *</span>
						      <input type="text" class="form-control" value="<?php echo $a['city']; ?>" name="city" id="inputCity" required>
						    </div>
						    <div class="form-group col-md-4">
						      <label for="inputState">State</label><span style="color:red"> *</span>
						      <select name="state" class="form-control" required>
						        <?php
						        $state=$object->getAllState2();
						        foreach ($state as $value) {
						        	if ($value['state_id']==$a['tail_state']) {
						        		echo "<option value='{$value['state_id']}' selected='selected'>{$value['state_name']}</option>";
						        	}
						        	else{
						        echo "<option value='{$value['state_id']}'>{$value['state_name']}</option>";
						        	}
						        }
						        
						        ?>
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
				</div>
				<!-- end of form -->
				<!-- start of change pass -->
				<div class="card my-2 bg-color" style="display:none" id="pwdform">
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
						    <small style="color:rgb(230,230,0); cursor:pointer" id="show" onclick="showpwd()">Show password</small>
						  </div>
						  <div class="form-group col-md-6 mx-auto">
						    <label for="confirmpwd"> Confirm New Password</label>
						    <input type="password" class="form-control" id="confirmpwd" name="confirmpassword" required>
						  </div>
						  <div class="mx-auto col-md-6 text-center form-group">
						  <button type="submit" class="btn btn-dark" id="btnpwd">Save</button>
						  </div>
						</form>
					</div>
				</div>
				<!-- end of change pass -->
			</div>
		<!-- end of col -->
		</div>
		
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/tdash.js"></script>
	
</body>
</html>