<?php
include('Userc.php');
$object=new Userc;
$tailor_id=$_GET['tailor_id'];
$brandname=$_GET['bname'];
$return=$object->displayAstyle($tailor_id);


	$cat=$object->getAllCategoryName($tailor_id);
	$cat_name=[];

	foreach($cat as $v){
		$cat_name[]=$v['category_name'];
		$array_length=count($cat_name);
	}


// echo "<pre>";
// print_r($cat_name);
// echo "</pre>";


?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, fit-to-shrink=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>
	<?php
	include('header2.php');
	?>
	<div class="container">
		<div class="row">
			<!-- start of additiob -->
			
			<div class="col-md-12 text-center">
				<div class="jumbotron" style="background-color: rgba(230,230,0,0.5);">
				  <h1 class="display-4"><?php echo ucwords($brandname); ?></h1>
				  <h3>Category Include: 
				  	<?php
				  	for ($i=0; $i < $array_length ; $i++) { 
				  		echo ucwords(' '.$cat_name[$i].'.');			  	}
				  	?></h3>
				  <p class="lead">
				  	All displayed style are available to order</p>
				  	
				  <hr class="my-4">
				  
				  <a class="btn btn-dark btn-lg" href="brand.php" role="button">Back to all brands</a>
				</div>
			</div>
		</div>
		
		<!-- end of addition -->
		<div class="row">
			<?php
			if (empty($return)) {
				echo "<div class='alert alert-dark text-center'>This particular brand has no styles yet</div>";
			}
			else{
			foreach ($return as $value) {
				$image="pix_tailor/".$value['upload_pix'];

			
			?>
			<div class="col-md-4 py-3">
				<div class="card" style="width:18rem">
					<img src="<?php echo $image; ?>" class="card-img-top" alt="image of styles" style="height:250px">
					<div class="card-body">
						<h5><?php echo ucwords($value['brand_name']); ?></h5>
						<p class="card-text"><?php echo $value['description']; ?></p>
					</div>
				</div>
			</div>
			<?php
			}
					}
				?>
		</div>
	</div>

</body>
</html>