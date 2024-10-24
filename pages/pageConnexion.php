<?php

include 'scripts/connexionDB.php';
$chemin_Home = "";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styleConnexion.css">
	<link rel="icon" type="image/png" href="img/mdll.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
	<title>MDLL | Connexion</title>
	<script>
		var page = 1;
	</script>
	<script src="scripts/controleSaisie.js" async></script>
</head>

<body>



	<div id="wrapper">
		<main>



			<!--<div class="logo"><img src="img/logoGSB.png"></div></a>-->
			<div id="pageVioletFond"></div>
			<div id="pageBlanche">
				<div id="pageBlancheContainer">
					<div class="logo"><img src="img/mdll.png"></div>
					<div class="pageBlancheConnexion">



						<form name="connexion" action="scripts/tentativeConnexionUser.php" method="post">
							<div class="form" id="form">
								<!--Saisie Identifiant-->
								<div class="form-control">
									<br>
									<i class="fa-regular fa-user"></i>Identifiant
									<input type="text" id="id" name="id" maxlength="" size="" placeholder="" />
								</div>


								<!--Saisie Mot de Passe-->
								<div class="form-control">
									<br>
									<i class="fa-solid fa-lock"></i>Mot de Passe<br>
									<input type="password" id="mdp" name="mdp" maxlength="" size="" placeholder="" />
								</div>


								<!--Bouton de Connexion-->
								<br>
								<center>
									<input class="button" type="submit" id="envoie" name="boutonValider" value="Connexion" />
								</center>
								<small error id="erreur">Message d'erreur bababdsh habvs aibib habd </small>
							</div>
					</div>
				</div>
				</form>


			</div>
		</main>

	</div>
	<?php
	require_once 'propPages/footer.php';
	?>
</body>

</html>