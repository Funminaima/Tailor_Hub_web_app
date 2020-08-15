<?php
include('Userc.php');
$object=new Userc;

	$object->inserttransactions($_POST['customerid'],$_POST['allproducts'],$_POST['totalpayable'],$_POST['ship']);

?>