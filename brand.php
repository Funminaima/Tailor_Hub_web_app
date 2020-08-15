<?php
include('Userc.php');
$object=new Userc;
if (!isset($_SESSION['user'])) {
header('location:index.php');
}
if (isset($_SESSION['user'])) {
	$_SESSION['user'];

	
}



// if (!isset($_SERVER['HTTP_REFERER'])) {
// 	header("location:login.php");
// }


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
			<!-- <div class="col">
				<a href="cdashboard.php" class="btn btn-dark my-2">Back to dashboard</a>
			</div> -->
			<div class="col-md-6 mx-auto form-inline pt-3">
				<label class="mr-2 font-weight-bold">Search by Brand and location</label>
				<input type="text" name="" id="search" class="form-control form-control-lg border-primary" placeholder="Search">
			</div>
		</div>
		<div class="row py-4">
			<div class="col " id="table_data">
				
			</div>
		</div>
		<div class="row " id="table">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr class="bg-dark text-light">
									<th>Picture</th>
									<th>Brand-name</th>
									<th>Brand-Address</th>
									<th>state located</th>
									<th>Telephone</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>
								
									<?php
									$return=$object->getTailorDetails();
									if (!empty($return)) {
										
									foreach ($return as $value) {
										if ($value['tail_pix']=='') {
											$image="photos/user.png";
										}
										else{
											$image="pix_tailor/".$value['tail_pix'];
										}
									$tail_id=$value['id'];
									$brand_name=$value['brand_name'];
									?>
								<tr>
									<td>
										<img src="<?php echo $image; ?>" width="50px"class="img-fluid"></td>
									<td><?php echo $value['brand_name']; ?></td>
									<td><?php echo $value['brand_address']; ?></td>
									<td><?php echo $value['state_name']; ?></td>
									<td><?php echo $value['tail_phone']; ?></td>
									<td><a href="tailor_work.php?tailor_id=<?php echo $tail_id; ?>&bname=<?php echo $brand_name; ?>">View work</a></td>
									<!-- <td><a href="" class="btn btn-dark">connect</a></td> -->
								</tr>
									<?php
										}
											}
									?>
								
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>






	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#search').keydown(function(){
				var search=$(this).val();
				if (search!='') {
					$('#table').hide();
				}
				
				var data2send={"searchbox":search};
				$.ajax({
					url:'brandactn.php',
					method:'POST',
					data:data2send,
					dataType:'text',
					success:function(resp){
						$('#table_data').html(resp);
					}
				});

			});


		});
	</script>
</body>
</html>