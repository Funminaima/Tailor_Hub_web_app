<?php
include('Userc.php');
$object=new Userc;

if (isset($_SESSION['user'])) {
	$return=$object->getCartNo($_SESSION['user']);
}
?>