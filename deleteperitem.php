<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['user'])) {
	//retrieving variable passed through the url
$product_id=$_GET['upload_id'];
	$object->deletePerItem($product_id,$_SESSION['user']);
	header('location:cart.php');
}
?>