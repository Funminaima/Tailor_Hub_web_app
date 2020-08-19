<?php
include('Userc.php');
$object=new Userc;
$extref=$_GET['reference'];

$obj=curl_init();

$url="https://api.paystack.co/transaction/verify/$extref";

$header=array();
$header[]='content-type: application/json';
$header[]='Authorization: Bearer sk_test_352e2fc64a33f5cebf4401aa1de45a2a86435f0d';


//send header
curl_setopt($obj, CURLOPT_HTTPHEADER, $header);
curl_setopt($obj, CURLOPT_RETURNTRANSFER, true);

curl_setopt($obj, CURLOPT_URL, $url);

//making the curl verify host false
curl_setopt($obj, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($obj, CURLOPT_SSL_VERIFYPEER, false);

$response=curl_exec($obj);
$t=json_decode($response);
echo "<pre>";
print_r($t);
echo "</pre>";

$success=$t->status;
echo $success;
//if ($success==1) {
	$object->updateStatus($success,$extref);
	header('location:index.php');
//}

?>