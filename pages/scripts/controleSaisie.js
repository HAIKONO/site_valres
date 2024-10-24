//Script de contrôle de Saisie pour :
// - la page de connexion
// - la page de saisie des rapports
// - la page de modification des rapports
// - la page compte, afin de modifier le mot de passe

//page : 1=pageConnexion.php | 2=redigerRapport.php | 3=compte.php


//variable bool shouldPreventDefault pour empêcher l'action php par défaut de 
//l'envoie (submit) des formualires
shouldPreventDefault = true;
//variable messageErreurComplet pour afficher un message contenant plusieurs erreurs
var messageErreurComplet = "";
//variable pour compter le nombre de champs correctement renseignés
var nombreSucces = 0;





//________________________________________________
//CONTROLE DE SAISIE POUR LA PAGE DE CONNEXION  /
//____________________________________________/

//si la page est la numéro 1 (page de connexion)
if (page===1){
	//récupération des id javaScript pour les exploiter
	const form_connexion = document.querySelector("#form_connexion");
	const id = document.querySelector("#id");
	const mdp = document.querySelector("#mdp");
	const messageError = document.querySelector("#erreur");
	const form_envoie = document.querySelector('#envoie');

	//afficher un message d'erreur si les champs remplis
	//ne correspondent à aucune des colonnes de la base de données
	if (connexion=="false"){
		messageErreurComplet="L'identifiant ou le mot de passe sont incorrect"
		setError(form_connexion, messageErreurComplet);
	}


	form.addEventListener("input", e=>{
		verifFormConnexion();
	});

	form_envoie.addEventListener("click", e=>{
		console.log("Connexion from shouldPre:", connexion);
		verifFormConnexion();

		if (shouldPreventDefault==true){
			e.preventDefault();
		}else {connexion="false";}

	});


	function verifFormConnexion(){
		const idValue = id.value.trim();
		const mdpValue = mdp.value.trim();
		let nombreCaractèresID = idValue.length;
		let nombreCaractèresMdp = mdpValue.length;

		//erreurs de l'identifiant

		if (idValue === ""){
			messageErreurComplet+= "\u2023Veuillez renseigner votre identifiant\n";
		}
		else{
			if (!idValue.match(/^[a-zA-Z]/)){
				messageErreurComplet+= "\u2023L'identifiant doit commencer par une lettre\n";
			}
			else if (nombreCaractèresID<7){
				messageErreurComplet+= "\u2023L'identifiant doit faire au moins 7 caractères\n";
			}
			else{nombreSucces+=1;}
		}


		//erreurs du mot de passe
		if (mdpValue === ""){
			messageErreurComplet+= "\u2023Veuillez renseigner votre mot de passe\n";
		}
		else{
			if (nombreCaractèresMdp<6){
				messageErreurComplet+= "\u2023Le mot de passe doit être supérieur à 6 caractères\n";
			}
			else if (nombreCaractèresMdp>20){
				messageErreurComplet+= "\u2023Le mot de passe ne doit pas être supérieur à 20 caractères\n";
			}
			else{nombreSucces+=1;}
		}


		//erreurs des 2 champs
	
		if (idValue === "" && mdpValue === ""){
			messageErreurComplet= "\u2023 Tous les champs doivent être remplis\n";
		}

		
		if (nombreSucces>=2){shouldPreventDefault = false;}
		else{shouldPreventDefault = true;}

		//envoie et affichage de l'erreur
		setError(form, messageErreurComplet);

	}

}




//________________________________________
//CONTROLE DE SAISIE POUR LES RAPPORTS  /
//____________________________________/

//si la page est la numéro 2 (page de saisie des rapports)
if (page===2){
	//récupération des id javaScript pour les exploiter
	const form_rapport = document.querySelector("#rapport");
	const form_envoie = document.querySelector('#envoie');

	const praticien = document.querySelector("#praticien");
	const dateVisite = document.querySelector("#dateVisite");
	const coefficient = document.querySelector("#coefficient");
	const date = document.querySelector("#date");
	const motif = document.querySelector("#motif");
	const bilan = document.querySelector("#bilan");
	const produit1 = document.querySelector("#produit1");
	const produit2 = document.querySelector("#produit2");

	

	form.addEventListener("click", e=>{
		console.log("Connexion from shouldPre:", shouldPreventDefault);
		verifFormRapport();
	});

	form_envoie.addEventListener("click", e=>{
	
		verifFormRapport();
		if (shouldPreventDefault==true){
			e.preventDefault();
		}
		else{
			var confirmation = confirm("Voulez-vous envoyer le formulaire?");

			if (confirmation) {
				// Envoyer le formulaire
				form_rapport.submit(); 
				e.preventDefault();
			}

		}
	});





	function verifFormRapport(){
		//récupération des valeurs des champs du formulaire:
		const praticienValue = praticien.value;
		const dateVisiteValue = dateVisite.value;

		const coeffValue = coefficient.value;

		const motifValue = motif.value;

		const bilanValue = bilan.value;

		const prod1Value = produit1.value;
		const prod2Value = produit2.value;

		let longueurBilan = bilanValue.length;





		
		//Tous les champs ne sont pas remplis
		if (praticienValue==="1" || dateVisiteValue==""  || coeffValue==="1" || motifValue==="1" 
			|| bilanValue==""
		) {
			messageErreurComplet+="\u2023Veuillez remplir tous les champs obligatoires (*)\n";
			nombreSucces=0;
		}
		else{nombreSucces+=1;}

		//Le bilan ne dépasse pas 10 caractères
		if (longueurBilan<10){
			messageErreurComplet+="\u2023Le Bilan doit au moins comporter 10 caractères\n";
			nombreSucces=0;
		}
		else{nombreSucces+=1;}

		//2 fois le même produit
		if (prod1Value===prod2Value && prod1Value!="1"){
			messageErreurComplet+="\u2023Le produit 1 et 2 ne peuvent pas être identiques\n";
			nombreSucces=0;
		}
		else{nombreSucces+=1;}

		//S'il n'y a aucune erreur de saisie
		if (nombreSucces>=3){shouldPreventDefault = false;}

		

		//envoie et affichage de l'erreur
		setError(form, messageErreurComplet);
	}

}






//_________________________________________________________
//CONTROLE DE SAISIE POUR LE CHANGEMENT DE MOT DE PASSE  /
//_____________________________________________________/

//si la page est la numéro 3 (page du compte)
if (page===3){
	//récupération des id javaScript pour les exploiter

}






//__________________________
//FONCTIONS REUTILISEES   /
//______________________/



//fonction d'écriture des erreurs
function setError(target, messageErreur){
	const formControl = form;
	const small = formControl.querySelector('small');

	small.innerText = messageErreur;
	formControl.className = "form error";
	messageErreurComplet = "";
	
}