<?php
include('Userc.php');
$object=new Userc;
if (!isset($_SESSION['tailor'])) {
	header("location:tailordash.php");
}


if (isset($_SESSION['tailor'])) {
	$return=$object->displayAsTailorInsert($_SESSION['tailor']);
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
	<?php
	include('header.php');
	?>
	<div class="container-fluid">
		<div class="row  ">
			<div class="col-md-12 text-center">
				<?php
				if (isset($_POST['submit'])) {
				$object->insertPictures($_FILES['fileUpload'],strip_tags(trim($_POST['product_name'])),strip_tags(trim($_POST['amt'])),ucwords(trim(strip_tags($_POST['text']))));
				}
				?>
				
				<div class="jumbotron" style="background-color: rgba(0,0,0,0.2);">
					
						<form action="" method="post" enctype="multipart/form-data">
				
						<input type="file" name="fileUpload" class="mb-2" id="pix"><br>
						<label style="color:red">Product Name:</label>
						<input type="text" name="product_name" placeholder="Name of product" id="p_name"><br><br>
						<label style="color:red">Amount:</label>
						<input type="text" name="amt" placeholder="Enter amount of product" id="amt"><br><br>
						<textarea name="text" cols="40" rows="5" placeholder="Say something about the image" id="desc"></textarea><br>
						<hr class="my-4">
						<input type="submit" name="submit" value="upload" class="btn btn-success" id="btn">
					
						</form>
					
				</div>
			</div>
			
		</div>
		<div class="row" id="displaypic">
			<?php
			foreach ($return as $value) {
				$image="pix_tailor/".$value['upload_pix'];
				$id=$value['upload_id'];


			
			?>
			<div class="col-md-3 mt-2">
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



	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				// e.preventDefault;
				var a=$('#pix').val();
				var b=$('#p_name').val();
				var c=$('#amt').val();
				var d=$('#desc').val();
				if (b==''||c==''||d=='') {
					alert("all fields are required");
					return false;
				}

				

				data2send={"pix":a,"product":b,"amt":c,"desc":d};
				$.ajax({
					url:'showupload.php',
					data:data2send,
					method:'POST',
					dataType:'text',
					success:function(resp){
						$('#displaypic').html(resp);
					}
				})
			})
		})
	</script>
</body>

</html>