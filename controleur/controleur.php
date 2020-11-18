<?php

require_once('modele/modele.php');
require_once('vue/vue.php');

function ctlAccueil() {
	afficherAccueil();
}

function ctlConnexion($login, $mdp) {
	$nom_employe = checkUser($login, $mdp);
	if (!empty($nom_employe)) {
		$fonction_employe = checkFonctionEmploye($login, $mdp);
		afficherConnexion($fonction_employe[0] -> fonction);
	} else {
		throw new Exception("Identifiant ou mot de passe invalide");
	}
}

function ctlErreur($erreur) {
	afficherErreur($erreur);
}

//agent
function ctlAjouterClient($nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire) {
	if (isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($adresse) && isset($mail) && isset($telephone) && isset($salaire)) {
		if (!empty($nom) && !empty($prenom) && !empty($date_de_naissance) && !empty($adresse) && !empty($mail) && !empty($telephone) && !empty($salaire)) {
			ajouterClient($nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire);
		}
		$client = chercherNomDateClient($nom, $date_de_naissance);
		afficherSyntheseClient($client);
	} else {
		throw new Exception("Un des champs est vide.");
	}
}

function ctlChercherClient($nom, $date) {
	if (isset($_POST['nom']) && isset($_POST['date'])) {
		$client = chercherNomDateClient($nom, $date);
		afficherSyntheseClient($client);
	} else {
		throw new Exception("Un champ de recherche est vide.");
	}
}

function ctlModifierClient($id, $nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire) {
	if (isset($id) && isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($adresse) && isset($mail) && isset($telephone) && isset($salaire)) {
		if (!empty($id) && !empty($nom) && !empty($prenom) && !empty($date_de_naissance) && !empty($adresse) && !empty($mail) && !empty($telephone) && !empty($salaire)) {
			modifierClient($id, $nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire);
		}
		$client = chercherIdClient($id);
		afficherSyntheseClient($client);
	} else {
		throw new Exception("Tous les champs de recherche sont vide.");
	}
}

function ctlAfficherModifierClient($id) {
	if (isset($id)) {
		afficherModifierClient($id);
	} else {
		throw new Exception("Pas de client a modifier.");
	}
}

function ctlAfficherAjouterClient() {
	afficherAjouterClient();
}

function ctlSyntheseClient($id) {
	if (isset($_POST['id'])) {
		$client = chercherIdClient($id);
		afficherSyntheseClient($client);
	} else {
		throw new Exception("Le champ de recherche est vide.");
	}
}

function ctlGestionFinanciere($id) {
	if (!empty($_POST['id'])) {
		$idClient = chercherIdClient($id);
		$idIntervention = chercherInterventionNonPayee($idClient);
		afficherGestionFinanciere($idIntervention);
	} else {
		throw new Exception("Le champ de recherche est vide.");
	}
}

