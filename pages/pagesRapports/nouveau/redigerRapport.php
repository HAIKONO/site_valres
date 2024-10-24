<?php

include '../../scripts/connexionDB.php';

$chemin_Home="../../";

$chemin_CR_Nouveau="";
$chemin_CR_Consulter="../consulter/";

$chemin_Consulter_meds="pagesConsulter/medicaments/";
$chemin_Consulter_prats="pagesConsulter/praticiens/";
$chemin_Consulter_visi="pagesConsulter/visiteurs/";

$chemin_scripts="../../scripts/";
$chemin_img="../../img/";
$chemin_propPages="../../propPages/";

if ($_SESSION['ok']!="ok"){
    session_destroy();
    header("Location: ".$chemin_Home."index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/stylePrincipal.css">
	<script src="../../scripts/controleSaisie.js" async></script>
	<link rel="icon" type="image/png" href="../../img/minilogoo.png">
	<title>GSB | Nouveau Rapport</title>
</head>


	<?php 
	$Inti="| Gestion des visites";
	include '../../propPages/banners2.php';
	?>
<body>
		<div id="body">

			<div id="Titre">Rapport de visite</div>

			<br>

			<form name="rapport "id="rapport" action="pageAjoutRapport.php" method="post">
			<div class= "form" id="form">
    		<table>


        	<tr>

				<!--Champ Praticien-->
				<div class="form-control">
            	<th><label for="Praticien">Praticien(*) :</label></th>
            	<td>
				<select name="praticien" id="praticien" required>
    				<option value="" disabled selected>Selectionnez un Praticien</option>
    				<option value="" disabled>---</option>
    				<?php 
    					// Sélectionnez les colonnes nom et prenoms de la table Praticiens en les concaténant sous le même alias nomEtPrenom
    					$reponse = $bdd->query('SELECT praNum, CONCAT(praNom, " ", praPrenom) AS nomEtPrenom FROM praticien ORDER BY praNom');

    					// Boucle à travers les résultats et créez une option pour chaque nomEtPrenom
    					while ($donnees = $reponse->fetch()) {
    				?>
    				<option value="<?php echo htmlspecialchars($donnees['praNum']); ?>"> 
        			<?php echo htmlspecialchars($donnees['nomEtPrenom']); ?>
    				</option>
    				<?php } ?>
				</select>
            	</td>
				</div>

        	</tr>

        	<tr>

				<!--Checkbox Remplacant-->
				<div class="form-control">
            	<th>Remplacant :</th>
            	<td><input type="checkbox" id="remplacant" name="remplacant" /></td>
				</div>

        	</tr>

        <tr>
			<!--Champ date de visite-->
			<div class="form-control">
            <th>Date de visite(*) :</th>
            <td><input type="date" id="dateVisite" name="dateVisite" maxlength="15" size="25" /></td>
			</div>

        </tr>

        <tr>

			<!--Champ Coefficient-->
			<div class="form-control">
            <th><label for="Coeff">Coefficient(*) :</label></th>
            <td>
                <select name="coefficient" id="coefficient" required>
                    <option value="1" disabled selected value>Selectionnez Coefficient</option>
                    <option value="2" disabled>---</option>
                    <?php
                        $value=3;
                        $coeffNombre=1;
                        while($coeffNombre<=10){
                            echo "<option value='$value'>$coeffNombre</option>";
                            $value+=1; $coeffNombre+=1;
                        }
                    ?>
                </select>
            </td>
			</div>

        </tr>

        <tr>

			<!--Champ Motif-->
			<div class="form-control">
            <th><label for="Motif">Motif(*) :</label></th>
            <td>
                <select name="motif" id="motif" required>
                    <option value="1" disabled selected value>Selectionnez un Motif</option>
                    <option value="2" disabled>---</option>
                    <?php 
                    $reponse = $bdd->query('SELECT nomMotif FROM motifs ORDER BY nomMotif');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                    <option value="<?php echo htmlspecialchars($donnees['nomMotif']); ?>"> 
                        <?php echo htmlspecialchars($donnees['nomMotif']); ?>
                    </option>
                    <?php } ?>
                </select>
            </td>
			</div>

        </tr>

        <tr>

			<!--Champ Bilan--> 
			<div class="form-control">
            <th>Bilan(*) :</th>
            <td><textarea id="bilan" name="bilan" rows="5" cols="55"></textarea></td>
			</div>

        </tr>


    </table>


    <div id="Titre2">Elements présentés</div><br>

    <table>

        <tr>

			<!--Champ produit 1-->
			<div class="form-control">
            <th><label for="Produit1">Produit 1 :</label></th>
            <td>
                <select name="produit1" id="produit1" required>
                    <option value="1">Selectionnez un Produit (Optionnel)</option>
                    <option value="2" disabled>---</option>
                    <?php 
                    $reponse = $bdd->query('SELECT medNomcommercial FROM medicament ORDER BY medNomcommercial');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                    <option value="<?php echo htmlspecialchars($donnees['medNomcommercial']); ?>"> 
                        <?php echo htmlspecialchars($donnees['medNomcommercial']); ?>
                    </option>
                    <?php } ?>
                </select>
            </td>
			</div>

        </tr>

        <tr>

			<!--Champ produit 2-->
			<div class="form-control">
            <th><label for="Produit2">Produit 2 :</label></th>
            <td>
                <select name="produit2" id="produit2" required>
				<option value="1">Selectionnez un Produit (Optionnel)</option>
                    <option value="2" disabled>---</option>
                    <?php 
                    $reponse = $bdd->query('SELECT medNomcommercial FROM medicament ORDER BY medNomcommercial');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                    <option value="<?php echo htmlspecialchars($donnees['medNomcommercial']); ?>"> 
                        <?php echo htmlspecialchars($donnees['medNomcommercial']); ?>
                    </option>
                    <?php } ?>
                </select>
            </td>
			</div>

        </tr>

        <tr>

			<!--Checkbox Documentation Offerte--> 
			<div class="form-control">
            	<th>Documentation Offerte :</th>
            	<td><input type="checkbox" id="docOfferte" name="docOfferte" /></td>
			</div>

        </tr>


    </table>


    <br><br>




				
				<!--Bouton d'annulation-->
				<button type="button" id="annuler">Annuler</button>

				<!--Bouton d'envoie-->
    			<button type="submit" id="envoie">Envoyer</button>

				<!--Message d'erreur-->
				<br>
				<small id="erreur">#Message d'erreur#</small>

			
			</div>
		</form>




		<!--JAVASCRIPT-->
		<script language="javascript" type="text/javascript">
			var page=2;

		//message de prévention avant de quitter
		window.addEventListener("beforeunload", function(event) {
			// Message à afficher dans l'alerte
			var confirmationMessage = ("Êtes-vous sûr de vouloir quitter cette page ?");

			// Afficher le message dans l'alerte
			event.returnValue = confirmationMessage;
			return confirmationMessage;
		});


		//FONCTION POUR CHOISIR D'ANNULER OU PAS LE FORMULAIRE (confirmation)
		document.getElementById("annuler").addEventListener("click", function(){
    		// Affiche une boîte de dialogue avec deux boutons : OK et Annuler
    		var confirmation = confirm("Voulez-vous annuler le formulaire?");
    
    		// Si l'utilisateur clique sur OK
    		if (confirmation) {
        		// Réinitialise le formulaire
        		document.getElementById("rapport").reset(); 
    		}
		});


		</script>




</body>
		</div>


		<?php 
			require_once '../../propPages/footer.php';
		?>






		

</html>