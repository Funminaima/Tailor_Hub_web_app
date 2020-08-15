<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['user'])) {
	$object->deleteAllFromCart($_SESSION['user']);
		header("location:cart.php");
}

?>