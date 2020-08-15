<?php
include('Userc.php');
$object=new Userc;
if (isset($_POST['submit'])) {
	$object->insertPictures($_FILES['fileUpload'],$_POST['text']);
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
</head>
<body>
	<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="py-3">
				<h1 class="text-center">WE BRING YOU BEST OF STYLE FROM OUR BRANDS</h1>
				<p class="text-danger text-center">All uploaded styles are from registered brands</p>
				</div>
			</div>
		</div>
		<div class="row">
				<?php
				$return=$object->displayViewWork();
				foreach ($return as $value) {
					$image="pix_tailor/".$value['upload_pix'];
					$upload_id=$value['upload_id'];
					$tail_id=$value['id'];
					$amt=$value['upload_amt'];
					$name=$value['brand_name'];
					$p_name=$value['upload_name'];
				
				?>
				
				<div class="col-md-4 my-2">
					<div class="card" style="width:18rem;">
					<img src="<?php echo $image; ?>" class="card-img-top" alt="image of styles" style="height:200px">
					<div class="card-body">
						<h5 class="card-text"><?php echo ucwords($value['brand_name']); ?></h5>
						<p class="card-text"><span style="font-weight:bold; font-size: 20px">Name: </span><?php echo $value['upload_name']; ?></p>
						<p class="card-text"><span style="font-weight:bold; font-size: 20px">Amount: </span><?php echo $value['upload_amt']; ?></p>
						<p class="card-text"><?php echo $value['description']; ?></p>
						
						
					</div>
					</div>
				</div>
				
				<?php
					}
				?>
					
				</div>
			</div>
		</div>
	</div>







	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>