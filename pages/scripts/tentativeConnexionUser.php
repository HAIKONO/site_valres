
<?php
session_start();





if (isset($_POST['boutonValider'])) {
	$nomLogin = $_POST['id'];
	$mdpLogin = ($_POST['mdp']);

	$db = new PDO('mysql:host=localhost;dbname=mdll', 'root', '');
	$sql = "SELECT * FROM compte WHERE nomLogin = '$nomLogin' AND mdpLogin = '$mdpLogin'";
	$result = $db->prepare($sql);
	$result->execute();


	if ($result->rowCount() > 0) {
		// R�cup�rer les informations de l'utilisateur
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$id= $row['id'];

		$sql = "SELECT * FROM utilisateur WHERE utilisateur.utilisateur_id = '$id'";
		$result = $db->prepare($sql);
		$result->execute();

		$row2 = $result->fetch(PDO::FETCH_ASSOC);
		$_SESSION['nom'] = $row2['nom'];
		$_SESSION['prenom'] = $row2['prenom'];

		$_SESSION['id_statut'] = $row['id_statut'];


		$_SESSION['connecté'] = true;


		header("Location: ../index.php");
	} else {
		header("Location: ../pageConnexion.php");
	}
}


?>