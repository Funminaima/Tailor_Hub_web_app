<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['user'])) {
	$return=$object->viewCart($_SESSION['user']);
	//another function
	$sumtotal=$object->addTotal($_SESSION['user']);
	//another function
	//$object->deleteAllFromCart($_SESSION['user']);

}
//print_r($sumtotal);
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
	include('header2.php');
	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card">
					<h3>Products in your cart</h3>
					<div class="card-body">
						<?php
						if (empty($sumtotal['SUM(total_price)'])) {
							echo "<div class='alert alert-danger'>There are no items in your cart</div>";
						}
						?>
						<div class="table-responsive">
						<table class="table table-hover">
							<tr>
								<th>Image</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total price</th>
								<th>Remove</th>
							</tr>
							<?php
								foreach ($return as $value) {
								$p_id=$value['product_id'];	
								$image="pix_tailor/".$value['upload_pix'];

								
								
							?>
							<tr>
								<td><img src="<?php echo $image; ?>" class="" height="30%"></td>
								<td><?php echo $value['product_name']; ?></td>
								<td><?php echo $value['order_quantity']; ?></td>
								<td><?php echo $value['order_amt']; ?></td>
								<td><?php echo $value['total_price']; ?></td>
								<td><a href="deleteperitem.php?upload_id=<?php echo $p_id; ?>" onclick="return confirm('are you sure you want to delete this item?')">Remove <i class="fa fa-trash text-danger"></i></a></td>
							</tr>
							<?php
							}
						?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<th>Grand Total: <?php 
								if (!empty($sumtotal['SUM(total_price)'])) {
									echo $sumtotal['SUM(total_price)'];
								}
								else{
									echo "0";
								}
								?></th>
								<td></td>
							</tr>
						</table>
						</div>
							<a href="deleteallcart.php" class="btn btn-warning" type="submit" onclick="return confirm('Are you sure you want to delete all items from cart?')">Clear Cart</a>

							<a href="proceed.php?total=<?php echo $sumtotal['SUM(total_price)'];?>" class="btn btn-primary" name="submit" type="Submit">Check out</a>
						
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>