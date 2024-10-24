<?php
session_start();


session_destroy();
$_SESSION["connecté"] = null;
header("Location: ../index.php");
exit();
?>
