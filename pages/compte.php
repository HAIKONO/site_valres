<?php

include 'scripts/connexionDB.php';

$chemin_Home="";

$chemin_CR_Nouveau="pagesRapports/nouveau/";
$chemin_CR_Consulter="pagesRapports/consulter/";

$chemin_Consulter_meds="pagesConsulter/medicaments/";
$chemin_Consulter_prats="pagesConsulter/praticiens/";
$chemin_Consulter_visi="pagesConsulter/visiteurs/";

$chemin_scripts="scripts/";
$chemin_img="img/";
$chemin_propPages="propPages/";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stylePrincipal.css">
	<link rel="icon" type="image/png" href="img/minilogoo.png">
	<title>GSB | Compte</title>
</head>


	<?php 
	$Inti="| Compte";
	include 'propPages/banners2.php';
	?>
<body>
		<div id="body">
		



			<section id="home">
			<?php
			echo '<div id="Titre3">';
			echo "Information sur le compte";
			echo '</div>';
			echo '<br>';


			echo "Nom : ".$nom;
			echo '<br>';

			echo "Prénom : ".$prenom;
			echo '<br>';

			echo "Ville : ".$_SESSION['ville'];
			echo '<br>';

			echo "Adresse : ".$_SESSION['adresse'];
			echo '<br>';

			echo "Code Postal : ".$_SESSION['cp'];
			echo '<br>';

			echo "Date d'embauche : ".$_SESSION['dateEmbauche'];
			echo '<br>';

			echo "Statut : ".$_SESSION['role'];
			echo '<br>'; echo '<br>';

			echo "Identifiant : ".$_SESSION['id'];
			echo '<br>';

			echo "Mot de passe : ";
			?>
			
			<button type="button" name="bouttonChangerMDP "id="bouttonChangerMDP">Modifier le mot de passe</button>
			<br>

			<form name="changerMDP" id="changerMDP" class="hidden" action="changerMDP.php">
				Ancien mot de passe :<br>
				<input type="text" id="ancienMDP" name="ancienMDP" maxlength="" size="25" placeholder="" /><br>
				Nouveau mot de passe :<br>
				<input type="text" id="nouveauMDP" name="nouveauMDP" maxlength="" size="25" placeholder="" /><br>

				<!--Bouton d'annulation-->
				<button type="button" id="annuler">Annuler</button>

				<!--Bouton d'envoie-->
    			<button type="button" id="envoyer">Confirmer</button>

				$sql="UPDATE user SET [mdp]=$nouveauMDP WHERE id = '$id'";

			</form>

			
				
			



			<script>
					document.getElementById("bouttonChangerMDP").addEventListener("click", function(){
						document.getElementById("bouttonChangerMDP").className="hidden";
						document.getElementById("changerMDP").className="visible";
					})


			//FONCTION POUR CHOISIR D'ANNULER OU PAS LE FORMULAIRE (confirmation)
		document.getElementById("annuler").addEventListener("click", function(){
    		// Affiche une boîte de dialogue avec deux boutons : OK et Annuler
    		var confirmation = confirm("Voulez-vous annuler le formulaire?");
    
    		// Si l'utilisateur clique sur OK
    		if (confirmation) {
        		// Réinitialise le formulaire
        		document.getElementById("changerMDP").reset(); 
				document.getElementById("bouttonChangerMDP").className="visible";
						document.getElementById("changerMDP").className="hidden";
    		}
		});
		</script>

		


</body>
		</div>


		<?php 
			require_once 'propPages/footer.php';
		?>






		

</html>