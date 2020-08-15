<?php
include('Userc.php');
$object=new Userc;
$object->UploadTailorPix($_FILES['fileUpload']);

echo "<pre>";
print_r($_FILES);
echo "</pre>";
?>