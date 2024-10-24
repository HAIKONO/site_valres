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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/stylePrincipal.css">
	<link rel="icon" type="image/png" href="../../img/minilogoo.png">
	<title>GSB | Rapport envoyé</title>
</head>


	<?php 
	$Inti="| Rapport Envoyé";
	include '../../propPages/banners2.php';
	?>
		<div id="body">
<?php
            include '../../scripts/ajouterRapport.php';
?>

			<div id="Titre">Le rapport a bien été envoyé</div>
			<a href="../consulter/consulterRapports.php"><button type="button" >M'emmener à la page de consultation</button></a>
</div>  

            <?php 
			include '../../propPages/footer.php';
		?>






		

</html>