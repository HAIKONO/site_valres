<?php

$servername="localhost";
$username="root";
$password="";

try{
    $bdd = new PDO("mysql:host=$servername;dbname=gsb2", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connexion réussie!";*/
}
catch(PDOException $e){
    echo "Erreur : ".$e->getMessage();

}
?>




<?php


    // Récupérer les valeurs soumises dans le formulaire
    $praticienNum = $_POST['praticien'];
    $remplacant = isset($_POST['remplacant']) ? 1 : 0;
    $dateVisite = $_POST['dateVisite'];
    $coefficient = $_POST['coefficient'];

    $motif = $_POST['motif'];
    $bilan = $_POST['bilan'];
    $produit1 = $_POST['produit1'];
    $produit2 = $_POST['produit2'];
    $docOfferte = isset($_POST['docOfferte']) ? 1 : 0;
    $collabMatricule = $_SESSION['id'];

    //entrer une valeur vide si aucun produit n'est choisi
    if ($produit1==1)
        $produit1=NULL;
    if ($produit2==1)
        $produit2=NULL;


// Vérifiez si toutes les données ont été soumises avec succès

    
    $bdd->exec("INSERT INTO rapports (praNum, remplacant, dateVisite, coefficient, motif, bilan, produit1, produit2, docOfferte, collabMatricule)
    VALUES ($praticienNum, $remplacant, '$dateVisite', $coefficient, '$motif', '$bilan', '$produit1', '$produit2', $docOfferte, '$collabMatricule')");
    echo "L'envoie a bien fonctionné avec les données suivantes : ";
    echo $praticienNum;     echo "<br>";
        echo $remplacant;     echo "<br>";
        echo $dateVisite;     echo "<br>";
        echo $coefficient;     echo "<br>";
        echo $motif;     echo "<br>";
        echo $bilan;     echo "<br>";
        echo $produit1;     echo "<br>";
        echo $produit2;     echo "<br>";
        echo $docOfferte;     echo "<br>";
        echo $collabMatricule;



?>

