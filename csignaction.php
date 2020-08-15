<?php
if (!empty($_POST)) {
	
include('Userc.php');
$first=strip_tags(trim($_POST['fname']));
$last=strip_tags(trim($_POST['lname']));
$email=strip_tags(trim($_POST['email']));
$pass=strip_tags(trim($_POST['pwd']));
$confirm=strip_tags(trim($_POST['cpwd']));
$username=strip_tags(trim($_POST['uname']));
$object=new Userc;
$object->signUpCustomer($first,$last,$username,$email,$pass,$confirm);



}
?>

