<?php
include('Userc.php');
$object= new Userc;
if (isset($_SESSION['user'])) {
	$orderasstring=$object->concat($_SESSION['user']);
	//displaying each customer record
	$a=$object->getCustomer($_SESSION['user']);
}
if (!isset($_SESSION['user'])) {
header('location:index.php');
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
	include('header2.php');
	 ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<h5 class="text-center py-4">
					Complete your order
				</h5>
				<div class="jumbotron text-center">
					<h4 class="py-3"><b>Product(s):</b> <?php echo $orderasstring; ?></h4>
					<h5>Delivery Charge(within Lagos):<b>FREE</b></h5>
					<h5 class="py-3">Grand Total: <b><?php echo number_format($_GET['total'],2);?></b></h5>

					<div class="form-group">
							<input type="text" name="" class="form-control" value="<?php echo ucwords($a['cust_fname']); echo ' '; echo ucwords($a['cust_lname']);?>" readonly>
						</div>
						<div class="form-group">
							<input type="text" name="" class="form-control" value="<?php echo $a['cust_email']; ?>" readonly>
						</div>
						<div class="form-group">
							<input type="text" name="" class="form-control" value="<?php echo $a['cust_phone']; ?>" readonly>
						</div>
						
					<form action="proceedactn.php" method="post">
						<input type="hidden" name="allproducts" value="<?php echo $orderasstring;?>">
						<input type="hidden" name="totalpayable" value="<?php echo $_GET['total'];?>">
						<input type="hidden" name="customerid" value="<?php echo $a['id'];?>">
						
						<div class="form-group">
							<label class="font-weight-bold" style="font-size:20px">Shipping details</label>
							<textarea class="form-control" name="ship" placeholder="Enter your preffered delivery address"></textarea>
						</div>
						<div class="form-group">
							<button type="submit">Pay now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>