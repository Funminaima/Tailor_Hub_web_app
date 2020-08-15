<?php
include('Userc.php');
$first=$_POST['fname'];
$last=$_POST['lname'];
$email=$_POST['email'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$confirm=$_POST['confirm'];

$object=new Userc;
$object->signUpTailor($first,$last,$email,$username,$pass,$confirm);


?>