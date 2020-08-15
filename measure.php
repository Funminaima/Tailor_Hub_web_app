<?php
include('Userc.php');
$object=new Userc;
if (isset($_SESSION['user']) || isset($_POST)) {
	$return=$object->measurement($_POST);
if ($return > 0) {
	//echo "<div class='alert alert-success'>Succesful</div>";
	header("location:cdashboard.php");
}
else{
	//echo "<div class='alert alert-danger'>An error occured</div>";
}
}

?>