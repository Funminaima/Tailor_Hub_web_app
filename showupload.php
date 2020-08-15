<?php
include('Userc.php');
$object=new Userc;

// if (isset($_SESSION['tailor'])) {
	//$return=$object->displayAsTailorInsert($_SESSION['tailor']);
//}

?>
<?php
if (isset($_POST['submit'])) {
	$object->insertPictures($_FILES['fileUpload'],strip_tags(trim($_POST['product'])),strip_tags(trim($_POST['amt'])),ucwords(trim(strip_tags($_POST['desc']))));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			
		

<?php
	if (isset($_SESSION['tailor'])) {
	$return=$object->displayAsTailorInsert($_SESSION['tailor']);
}
			foreach ($return as $value) {
				$image="pix_tailor/".$value['upload_pix'];
				$id=$value['upload_id'];


			
			?>
			<div class="col-md-3 m-1">
				<div class="card" style="width:18rem">
					<img src="<?php echo $image; ?>" class="card-img-top" alt="image of styles" height="250">
					<div class="card-body">
						
						<p class="card-text"><span style="font-weight:bold; font-size: 20px">Name: </span><?php echo $value['upload_name']; ?></p>
						<p class="card-text"><span style="font-weight:bold; font-size: 20px">Amount: </span><?php echo $value['upload_amt']; ?></p>
						<p class="card-text"><?php echo $value['description']; ?></p>
						<a href="deleteupload.php?uploadid=<?php echo $id; ?>" onclick="return confirm('do you really want to delete this image?')" class="btn btn-dark text-center">Delete<i class="fa fa-trash text-danger mx-2"></i></a>
						<!-- update -->
						<!-- <a href="updateupload.php?uploadid=<?php //echo $id; ?>" class="btn btn-warning">Edit<i class="fa fa-pencil-square-o mx-2"></i></a> -->

					</div>
				</div>
			</div>
			<?php
		}
			?>
			</div>
	</div>
			</body>
</html>