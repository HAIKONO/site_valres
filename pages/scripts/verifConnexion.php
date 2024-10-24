<?php 
session_save_path('../sessions');

if ($_SESSION['role']=""){
    header("Location: ../pageConnexion.php");
}

?>