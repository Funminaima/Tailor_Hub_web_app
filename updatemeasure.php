<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['user']) && isset($_POST)) {
	$object->updateMeasurent($_POST);
}

?>