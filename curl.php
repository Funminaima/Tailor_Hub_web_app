<?php
include('Userc.php');
$object=new Userc;
//recall from class

	$transid=$_SESSION['trans_id'];
	if (isset($_SESSION['trans_id'])) {
		$return=$object->gettransdetails($transid);
	}
if (isset($_SESSION['user'])) {
	$cust_data=$object->getCustomer($_SESSION['user']);
}

echo ucwords($cust_data['cust_fname'])."You are paying for ".number_format($return['grand_total'],2)." transaction with ref no "."<b>".$return['trans_no']."</b><br>";
echo "Please wait while we enable your transaction";

//make curl call
$data=json_encode(['email'=>$cust_data['cust_email'], 'amount'=>$return['grand_total'] * 100]);



$header=array();
$header[]='content-type: application/json';
$header[]='Authorization: Bearer sk_test_352e2fc64a33f5cebf4401aa1de45a2a86435f0d';

$obj=curl_init();

$url="https://api.paystack.co/transaction/initialize";



curl_setopt($obj, CURLOPT_POSTFIELDS, $data);
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

echo curl_error($obj);

curl_close($obj);

//picking response
$url=$t->data->authorization_url;

//picking the refrence number
$reference=$t->data->reference;

//update your data with query
$object->updateRefrence($reference,$_SESSION['trans_id']);
// echo $url;
header("location:$url");
?>