<?php
include('Userc.php');
$object=new Userc;
$object->updateTailorUpload(strip_tags(trim($_POST['product_name'])),strip_tags(trim($_POST['amt'])),ucwords(trim(strip_tags($_POST['text']))),$_GET['uploadid']);

?>