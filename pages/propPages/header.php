<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stylePrincipal.css">
	<link rel="icon" type="image/png" href="img/mdll.png">
</head>



<body>
	<header>
		<div id="logoEtInti">
			<a href="youtube.com/">
				<div class="logo">
				</div>
			</a>
			<div class="Inti">
				<?php
				echo $Inti;
				?>
			</div>
		</div>



		<?php

		if (isset($_SESSION['id_statut'])){

		switch ($_SESSION['id_statut']) {
			case 1:
				$iconClass = "profile_icone1";
				break;
			case 2:
				$iconClass = "profile_icone2";
				break;
			case 3:
				$iconClass = "profile_icone3";
				break;
			case 4:
				$iconClass = "profile_icone4";
				break;
			default:
				$iconClass = "profile_default"; // Classe par défaut si aucune condition n'est remplie
		}
	}

		?>



		<div id="profile">
			<div class="<?php echo $iconClass; ?>"></div>
			<div class="profile">
				<?php


				if (isset($_SESSION['connecté'])) {
					$nom = $_SESSION['nom'];
					$prenom = $_SESSION['prenom'];
					echo $nom . " " . $prenom;
					echo '<br>';
					echo '<a href="' . $chemin_scripts . 'deconnexion.php">Se déconnecter</a>';
				} else {
					
					echo '<a href="pageConnexion.php">';
					echo "Se connecter</a>";
				}
				?>

			</div>
		</div>
	</header>