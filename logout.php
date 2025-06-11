<?php
session_start();
session_unset();       
session_destroy();      

header("Location: loginH.php"); // Redirect ke halaman login
exit;
?>
