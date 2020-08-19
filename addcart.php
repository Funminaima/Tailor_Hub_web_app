<?php
include('Userc.php');
$object=new Userc;
if (isset($_POST['no'])) {
	$ret=$object->insertOrder($_GET['pro_name'],$_GET['amt'],$_SESSION['user'],$_GET['upload_id'],$_POST['no'],$_GET['amt'] * $_POST['no'],$_GET['t_id']);
}

$object->getCartNo($_SESSION['user']);

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
	include("header2.php");

	?>
	<div class="container">
		<div class="row py-3">
			<div class="col-md-6">
				<?php
				//bringing a response from class
			// 	if (isset($_POST['no'])) {
			// 	echo $ret=$object->insertOrder($_GET['pro_name'],$_GET['amt'],$_SESSION['user'],$_GET['upload_id'],$_POST['no'],$_GET['amt'] * $_POST['no'],$_GET['t_id']);
			// }
				
	
				?>
				<h2><?php echo ucwords($_GET['nameb']); ?></h2>

				<img src="<?php echo $_GET['Upload']; ?>" alt="order pix" style="width:50%; margin:0px"><br>
				<a href="view_work.php" class="btn btn-dark my-2">Continue Shopping</a>
				
			</div>
			<div class="col-md-6" style="border-left:2px solid grey">
				<h2>Product name: <?php echo $_GET['pro_name']; ?></h2>
				<h2>Amount: <?php echo $_GET['amt']; ?></h2>
				<form action="" method="post">
					<div class="form-group row py-3">
						<div class="col-sm-5">
							<label>Quantity: </label>
						</div>
						<div class="col-sm-7">
							<input type="number" name="no" class="form-control">
						</div>
					</div>
					
					<div class="form-group row py-3 mx-auto">
						<button class="btn btn-warning mr-3" name="cart" type="submit" id="btn">Add to Cart <i class="fa fa-shopping-cart"></i></button>
						<a href="cart.php" class="btn btn-dark">View Cart</a>
					</div>
				</form>
			</div>
		</div>

	</div>



	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				e.preventDefault;
				$.ajax({
					url:'showcartn.php',
					method:'POST',
					dataType:'text',
					success:function(resp){
						$('#cart').html(resp);
					}
				});
			});
		});
	</script>
</body>
</html>