<?php
session_start();

if (isset($_POST['boutonValider'])){
	$identifiant=$_POST['id'];
	$mdp=$_POST['password'];	

	$db = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
	$sql = "SELECT * FROM user WHERE id = '$identifiant' AND mdp = '$mdp'";
	$result = $db->prepare($sql);
	$result->execute();

	if($result->rowCount()>0){
		        // Récupérer les informations de l'utilisateur
		$row = $result->fetch(PDO::FETCH_ASSOC);
        $nom = $row['nom'];
		$prenom = $row['prenom'];
		$ville = $row['ville'];
		$gay = $gay['gay'];

		$toString = ("Salut, ".$prenom." ".$nom. " qui habite a ".$ville." et qui");
		if ($gay==True){$toString=($toString." est gay.");} 
		if ($gay==False) {$toString=($toString." n'est pas gay.");}



        // Afficher le nom de l'utilisateur
        echo $toString;

	}
	else {
		echo("t'existe pas mec");
	}

}

?>