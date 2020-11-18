<?php

require_once('modele/connect.php');
	
function getConnect() {
	$connexion = new PDO('mysql:hoqt=' . SERVEUR . ';dbname=' . BDD, USER, PASSWORD);
	$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connexion -> query('SET NAMES UTF8');
	return $connexion;
}

function checkUser($login, $mdp) {
	$connexion = getConnect();
	$requete = " SELECT nom_employe FROM employe WHERE login = '$login' and mdp = '$mdp' ";
	$resultat = $connexion -> query($requete);
	$resultat -> setFetchMode(PDO::FETCH_OBJ);
	$tableau = $resultat -> fetchall();
	return $tableau;
}

function checkFonctionEmploye($login, $mdp) {
	$connexion = getConnect();
	$requete = " SELECT fonction FROM employe WHERE login='$login' and mdp='$mdp' ";
	$resultat = $connexion -> query($requete);
	$resultat -> setFetchMode(PDO::FETCH_OBJ);
	$tableau = $resultat -> fetchall();
	return $tableau;
}

//agent
function chercherNomDateClient($nom, $date) {
	$connexion = getConnect();
	$requete = " SELECT id_client, nom, prenom, date_de_naissance, adresse, mail, telephone, salaire FROM client WHERE nom = '$nom' and date_de_naissance = '$date' ";
	$resultat = $connexion -> query($requete);
	$resultat -> setFetchMode(PDO::FETCH_OBJ);
	$nomclient = $resultat -> fetchall();
	$resultat -> closeCursor();
	return $nomclient;
}

function chercherIdClient($id) {
	$connexion = getConnect();
	$requete = " SELECT id_client, nom, prenom, date_de_naissance, adresse, mail, telephone, salaire FROM client WHERE id_client = '$id' ";
	$resultat = $connexion -> query($requete);
	$resultat -> setFetchMode(PDO::FETCH_OBJ);
	$idclient = $resultat -> fetchall();
	$resultat -> closeCursor();
	return $idclient;
}

function ajouterClient($nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire) {
	$connexion = getConnect();
	$requete = " INSERT INTO client VALUES (NULL, '$nom', '$prenom', '$date_de_naissance', '$adresse', '$mail', '$telephone', '$salaire') ";
	$resultat = $connexion->query($requete);
	$resultat -> closeCursor();
}

function modifierClient($id, $nom, $prenom, $date_de_naissance, $adresse, $mail, $telephone, $salaire) {
	$connexion = getConnect();
	$requete = " UPDATE client SET nom = '$nom', prenom = '$prenom', date_de_naissance = '$date_de_naissance', adresse = '$adresse', mail = '$mail', telephone = '$telephone', salaire = '$salaire' WHERE id_client = '$id' ";
	$resultat = $connexion->query($requete);
	$resultat -> closeCursor();
}

function chercherInterventionNonPayee($id_client) {
	$connexion = getConnect();
	$requete = " SELECT * FROM intervention WHERE id_client = '$id_client' and (etat = 'attente' or etat = 'differe') ";
	$resultat = $connexion->query($requete);
	$resultat -> setFetchMode(PDO::FETCH_OBJ);
	$idintervention = $resultat -> fetchall();
	$resultat -> closeCursor();
	return $idintervention;
}

