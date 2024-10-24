<?php

$servername="localhost";
$username="root";
$password="";

try{
    $bdd = new PDO("mysql:host=$servername;dbname=mdll;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connexion réussie!";*/
}
catch(PDOException $e){
    echo "Erreur : ".$e->getMessage();

}



// Démarrer la session PHP
session_start();
//session_save_path('../../sessions');

?>

