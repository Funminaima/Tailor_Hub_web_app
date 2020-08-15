<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['tailor'])) {
	$return=$object->notifytailor($_SESSION['tailor']);
}

?>
<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<?php
						if (empty($return)) {
								echo "<div class='alert alert-dark'>You have no order(s) yet</div>";
							}
							else{
						?>
						<div class="table-responsive">
						<table class="table table-bordered">
							
							<tr  class="bg-dark text-light">
								
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Phone</th>
								<th>Delivery Address</th>
								<th>Product name</th>
								<th>Product Price</th>
								<th>quantity</th>
								<th>size</th>
								<th>Transaction number</th>
								<th>Date of order</th>
								
							</tr>
							<?php
							
							
							foreach ($return as $value) {
								
							
							?>
							<tr>
								
								<td><?php echo $value['cust_fname'];?></td>
								<td><?php echo $value['cust_lname'];?></td>
								<td><?php echo $value['cust_gender'];?></td>
								<td><?php echo $value['cust_phone'];?></td>
								<td><?php echo $value['shipping_details'];?></td>
								<td><?php echo $value['product_name'];?></td>
								<td><?php echo $value['order_amt'];?></td>
								<td><?php echo $value['order_quantity'];?></td>
								<td><?php echo $value['size'];?></td>
								<td><?php echo $value['trans_no'];?></td>
								<td><?php echo $value['order_date'];?></td>
								<!-- <td><button type="button" class="btn btn-danger">oder Detail</button></td> -->
							</tr>
							<?php
							}
								}
							?>
							
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</body>
</html>