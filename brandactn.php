<?php
include('Userc.php');
$object=new Userc;


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			
			<div class="col">
				<div class="card">
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr class="bg-success">
									<th>Picture</th>
									<th>Brand-name</th>
									<th>Brand-Address</th>
									<th>state located</th>
									<th>Telephone</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody class="bg-secondary text-light">
								
									<?php
									
									$result=$object->displaySearch($_POST['searchbox']);
									
									if (!empty($result)) {
										
									
									foreach ($result as $value) {
									
									
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
									<td><a href="tailor_work.php?tailor_id=<?php echo $tail_id; ?>&bname=<?php echo $brand_name; ?>" class="btn btn-warning">View work</a></td>
									<td><a href="" class="btn btn-dark">connect</a></td>
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

</body>
</html>