<?php
include('Userc.php');
$object=new Userc;
$a=$object->getCustomer($_SESSION['user']);//here session is equal to $id of insert_id to get the details of those that sign up

$_SESSION['user'];//here session is equal to $fetch['id on table of customer'] to get the details of those that login directly.
include('header2.php');
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
			<div class="col my-5">
				<div class="card">
					<div class="card-body">
						<table class="table table-striped table-hover">
							<tr>
								<th>First Name:</th>
								<td><?php echo $a['cust_fname'] ?></td>
							</tr>
							<tr>
								<th>Last Name:</th>
								<td><?php echo $a['cust_lname'] ?></td>
							</tr>
							<tr>
								<th>Email:</th>
								<td><?php echo $a['cust_email'] ?></td>
							</tr>
							<tr>
								<th>Phone:</th>
								<td><?php echo $a['cust_phone'] ?></td>
							</tr>
							<tr>
								<th>username</th>
								<td><?php echo $a['username'] ?></td>
							</tr>
							<tr>
								<th>Address</th>
								<td><?php echo $a['address']; ?></td>
							</tr>
							<tr>
								<th>Gender</th>
								<td><?php echo $a['cust_gender']; ?></td>
							</tr>
							
							<tr>
								<th>city</th>
								<td><?php echo $a['city']; ?></td>
							</tr>
							
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<a href="cdashboard.php" class="btn btn-danger">Close</a>
			</div>
			<div class="col-md-6">
				<button type="button" class="btn btn-warning">Update <?php?></button>
			</div>
		</div>
	</div>

</body>
</html>