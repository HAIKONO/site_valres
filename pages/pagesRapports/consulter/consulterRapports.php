<?php

include '../../scripts/connexionDB.php';

$chemin_Home="../../";

$chemin_CR_Nouveau="../nouveau/";
$chemin_CR_Consulter="";

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
	<title>GSB | Consulter les Rapports</title>
</head>


	<?php 
	$Inti="| Consultation des Rapports";
	include $chemin_propPages.'banners2.php';
	?>  
<body>
		<div id="body">



			<div id="Titre">Rapports</div>

			<?php 
   

    $matri = $_SESSION['id']; // Récupération du numéro de matricule à partir de la session

    // Requête SQL avec jointure pour obtenir les rapports de visite et les motifs associés
    $reqSQL = "SELECT 
                r.id, 
                r.collabMatricule, 
                r.praNum, 
                r.dateVisite, 
				r.date,
                r.bilan, 
                m.nomMotif
            FROM 
                rapports r
            JOIN 
                motifs m 
			ON 
                r.motif = m.nomMotif

            WHERE 
                r.collabMatricule = :matricule"; // Utilisation d'un marqueur de paramètre nommé :matricule

// Préparation de la requête SQL
$stmt = $bdd->prepare($reqSQL);

// Exécution de la requête en passant le paramètre $matricule dans un tableau associatif
$stmt->execute([':matricule' => $matri]);

// Récupération des résultats
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Début de la génération du tableau HTML pour afficher les résultats
    echo "<table border='1'>";
    echo "<tr><th>Numero du rapport</th><th>ID Utilisateur</th><th>Numéro du praticien</th><th>Date du rapport</th><th>Bilan du rapport</th><th>Motif du rapport</th></tr>";

    // Boucle pour parcourir chaque ligne de résultats
    foreach ($resultats as $ligne) {
        // Affichage de chaque ligne du tableau HTML avec les données récupérées
        echo "<tr>";
        echo "<td>" . htmlspecialchars($ligne['id']) . "</td>"; // Numero du rapport
        echo "<td>" . htmlspecialchars($ligne['collabMatricule']) . "</td>"; // Numéro de matricule
        echo "<td>" . htmlspecialchars($ligne['praNum']) . "</td>"; // Numéro du praticien
        echo "<td>" . htmlspecialchars($ligne['dateVisite']) . "</td>"; // Date du rapport
        echo "<td>" . htmlspecialchars($ligne['bilan']) . "</td>"; // Bilan du rapport
        echo "<td>" . htmlspecialchars($ligne['nomMotif']) . "</td>"; // Motif du rapport
        echo "</tr>";
    }

    // Fermeture du tableau HTML
    echo "</table>";
?>


			
</body>
		</div>


		<?php 
			require_once '../../propPages/footer.php';
		?>






		

</html>