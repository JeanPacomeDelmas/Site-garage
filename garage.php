<?php

require_once('controleur/controleur.php');
	
try {
	if (isset($_POST['connexion'])) {
		$login = $_POST['user'];
		$mdp = $_POST['pass'];
		ctlConnexion($login, $mdp);
	}
	else if (isset($_POST['deconnexion'])) {
		ctlAccueil();
	} 
	//agent
	else if (isset($_POST['afficherAjouterClient'])) {
		ctlAfficherAjouterClient();
	}
	else if (isset($_POST['ajouterClient'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date_de_naissance = $_POST['date_de_naissanceA'] . '-' . $_POST['date_de_naissanceM'] . '-' . $_POST['date_de_naissanceJ'];
		$adresse = $_POST['adresse'];
		$mail = $_POST['mail'];
		$telephone = $_POST['telephone'];
		$salaire = $_POST['salaire'];
		ctlAjouterClient($nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire);
	}
	else if (isset($_POST['chercherClient'])) {
		$nom = $_POST['nom'];
		$date = $_POST['date'];
		ctlChercherClient($nom, $date);
	}
	else if (isset($_POST['afficherModifierClient'])) {
		ctlAfficherModifierClient($_POST['id']);
	}
	else if (isset($_POST['modifierClient'])) {
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date_de_naissance = $_POST['date_de_naissance'];
		$adresse = $_POST['adresse'];
		$mail = $_POST['mail'];
		$telephone = $_POST['telephone'];
		$salaire = $_POST['salaire'];
		ctlModifierClient($id, $nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire);
	}
	else if (isset($_POST['syntheseClient'])) {
		$id = $_POST['id'];
		ctlSyntheseClient($id);
	}
	else if (isset($_POST['valider'])) {
		
	}
	else {
		ctlAccueil();
	}
	
} catch(Exception $e){
	$erreur = $e -> getMessage();
	ctlErreur($erreur);
}

