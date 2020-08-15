<?php
session_start();
session_unset('user');
session_unset('loginTailor');
session_unset('loginCust');
session_unset('tailor');
session_destroy();

header("location:index.php");
?>