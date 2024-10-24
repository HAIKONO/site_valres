<?php

include 'scripts/connexionDB.php';


$chemin_Home = "";

$chemin_CR_Nouveau = "pagesRapports/nouveau/";
$chemin_CR_Consulter = "pagesRapports/consulter/";

$chemin_Consulter_meds = "pagesConsulter/medicaments/";
$chemin_Consulter_prats = "pagesConsulter/praticiens/";
$chemin_Consulter_visi = "pagesConsulter/visiteurs/";

$chemin_scripts = "scripts/";
$chemin_img = "img/";
$chemin_propPages = "propPages/";
?>

<!DOCTYPE html>
<html>

<head>
	<title>MDLL | Accueil</title>
</head>


<?php
$Inti = "| Accueil";
include 'propPages/header.php';
?>

<body>
	<main>

		<!--Entrez votre choix : </br>


			<select id="Elements">
				<option value="option1">Elément 1</option>
				<option value="option2">Elément 2</option>
				<option value="option3">Elément 3</option>
			</select>

			<button id="elementRetenu">Quel est l'élément retenu?</button>

			<script language="javascript" type="text/javascript">

				document.getElementById("elementRetenu").addEventListener("click", function () {
					var selectedOption = document.getElementById("Elements").value;

					switch (selectedOption) {
						case "option1":
							alert("Vous avez sélectionné l'élément 1");
							break;
						case "option2":
							alert("Vous avez sélectionné l'élément 2");
							break;
						case "option3":
							alert("Vous avez sélectionné l'élément 3");
							break;
					}
				});
			</script>-->
		<section id="home">
			<?php
			if (isset($_SESSION["connecté"])) {
				echo '<div id="Titre3">';
				echo "Bonjour, " . $nom . " " . $prenom . ".";
				echo '</div>';

				
			} else {
				echo '<div id="Titre3">';
				echo "Bienvenue sur le site de la MDLL";
				echo '</div>';
			}
			?>

			<div id="presentation">

				<div class="textePresentation">
					<p>La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes
					ligues sportives régionales et à d’autres structures hébergées.</p>
					<p>pour commencer, veuillez vous connecter</p>
				</div>

				<div class="imgPresentation">
					<img src="img/imgPresentation2.jpg" alt="jsp">
				</div>

			</div>


			<!--<h4>Comptes Rendus</h4>
			<div id="vignettesAccueil">
				<a href="pagesRapports/nouveau/redigerRapport.php">
					<div class="vignetteAccueil"><img src="img/vignette_Accueil_Nouveau.jpg"><b>Nouveau</b><br />Rédiger un nouveau rapport</div>
				</a>
				<a href="pagesRapports/consulter/consulterRapports.php">
					<div class="vignetteAccueil"><img src="img/vignette_Accueil_Consulter.jpg"><b>Consulter</b><br />Consulter les rapports</div>
				</a>
			</div>

			<h4>Consulter</h4>
			<div id="vignettesAccueil">
				<div class="vignetteAccueil"><a href="redigerRapport.php"><img src="img/vignette_Accueil_Medicaments.jpg"><b>Medicaments</b><br />Consulter les médicaments</div></a>
				<div class="vignetteAccueil"><a href=""><img src="img/vignette_Accueil_Praticiens.jpg"><b>Praticiens</b><br />Consulter les praticiens</div></a>
				<div class="vignetteAccueil"><a href=""><img src="img/vignette_Accueil_Consulter.jpg"><b>Autres visiteurs</b><br />Consulter les [...]</div></a>
			</div>

			<section id="annonces">
				<h4>Annonces</h4>
				<div id="vignettesAccueil">
					<div class="vignetteAccueil"><a href="redigerRapport.php"><img src="https://www.metier.org/wp-content/uploads/2022/12/chercheur-dans-un-laboratoire-1280x720.jpg"><b>Cancer</b><br />La recherche avance</div></a>
					<div class="vignetteAccueil"><a href=""><img src="https://cdn.futura-sciences.com/cdn-cgi/image/width=1024,quality=60,format=auto/sources/images/pharmacien_2.jpeg"><b>tuto</b><br />Comment vendre plus de médicaments</div></a>
					<div class="vignetteAccueil"><a href=""><img src="https://media.carians.fr/deuxiemeavis/blog/le-diagnostic-medical-les-etapes-pour-trouver-votre-maladie.png"><b>Nouvelle formation</b><br />Prescrivez des rdv inutiles</div></a>
				</div>
				<div id="vignettesAccueil">
					<div class="vignetteAccueil"><a href=""><img src="https://olinn.eu/sites/default/files/styles/bandeau_mobile/public/images/materiel-medical_0.png?itok=-RYXmAT4"><b>Choc</b><br />Ce scanner IRM va vous surprendre</div></a>
					<div class="vignetteAccueil"><a href=""><img src="https://resize.elle.fr/original/var/plain_site/storage/images/loisirs/series/grey-s-anatomy-shonda-rhimes-s-exprime-sur-la-fin-de-la-serie-3970735/95693381-1-fre-FR/Grey-s-Anatomy-Shonda-Rhimes-s-exprime-sur-la-fin-de-la-serie.jpg"><b>Grey's anatomy le retour</b><br />askip</div></a>
				</div>-->


		</main>
</body>


<?php
require_once 'propPages/footer.php';
?>








</html>