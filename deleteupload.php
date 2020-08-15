<?php
include('Userc.php');
$object=new Userc;
$object->deleteAPicture($_GET['uploadid']);
header("location:tailorupload.php");

?>