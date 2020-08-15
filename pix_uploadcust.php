<?php
include('Userc.php');
$object=new Userc;
$object->uploadPicture($_FILES['fileUpload']);

echo "<pre>";
print_r($_FILES);
echo "</pre>";
?>