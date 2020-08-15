<?php

include('Userc.php');
$a=strip_tags(trim($_POST['username']));
$b=trim(strip_tags($_POST['pass']));
$object=new Userc;
if ($_POST['Ptype']=='tailor') {
	$object->tailorLogin($a,$b);
	// header("location:tailordash.php")
}
if ($_POST['Ptype']=='customer') {
	$object->customerLogin($a,$b);
}
 


?>

