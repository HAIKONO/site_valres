
<body>
	<div id="banner">
		<div id="logoEtInti">
			<a href=""><div class="logo"></div></a><div class="Inti">
                <?php
                echo $Inti;
                ?>
            </div>
		</div>
		<div id="profile">
		<div class="profile_perso"></div><div class="profile">
            <?php
                if (isset ($_SESSION['connecté'])){
					

				}
            ?>
            <br /><a href="">Se déconnecter</a></div></div>
	</div>

    <div id="wrapper">
		<div id="menu">
			<div class="under-menu">
				Outils
				<div class="under-menu-plus">
					Comptes Rendus
					<div class="under-menu-plus-plus">
						<a href="">Nouveaux</a><br />
						<a href="exercice5.html">Consulter</a><br />
					</div>
				</div>

				<div class="under-menu-plus">
					Consulter
					<div class="under-menu-plus-plus">
						<a href="exercice2.html">Médicaments</a><br />
						<a href="exercice5.html">Praticiens</a><br />
						<a href="exercice5.html">Autres visiteurs</a><br />

					</div>
				</div>
			</div>
		</div>
</body>
