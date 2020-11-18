<?php

function afficherAccueil() {
	$contenuAffichage = '';
	require_once('vue/gabaritAccueil.php');
}

function afficherConnexion($fonction_employe) {
	$contenuAffichage = '';
	$contenuAffichageClient = '';
	if ($fonction_employe == 'dirigeant') {
		require_once('vue/gabaritDirigeant.php');
	} else if ($fonction_employe == 'agent') {
		require_once('vue/gabaritAgentAccueil.php');
	} else if ($fonction_employe == 'mecanicien'){
		require_once('vue/gabaritMecanicien.php');
	} else {
		require_once('vue/gabaritAccueil.php');
	}
}

/*function afficherErreur($erreur, $fonction, $lieu) {
	$contenuAffichage = '';
	if ($fonction == 'agent') {
		$contenuAffichageClient = '';
		if ($lieu == 'client') {
			$contenuAffichageClient = $erreur;
			require_once('vue/gabaritAgentAccueil.php');
		}
	} else if ($fonction == 'dirigeant') {
		
	} else if ($fonction == 'mecanicien') {
		
	} else {
		$contenuAffichage = $erreur ;//$contenuAffichage = '<p>' . $erreur . '</p>';
		require_once('vue/gabaritAccueil.php');
	}
}*/

function afficherErreurAgent($erreur) {
	$contenuAffichage = '';
	$contenuAffichageClient = $erreur ;//$contenuAffichageClient = '<p>' . $erreur . '</p>';
	require_once('vue/gabaritAgentAccueil.php');
}

//agent
/*function afficherClient($client) {
	$contenuAffichage = '';
	if ($client == false) {
		$contenuAffichageClient = '<p>Aucun client ne correspond.</p>';
	} else {
		$contenuAffichageClient = '<fieldset>
										<legend>Liste des clients</legend>';
		foreach ($client as $case) {
			$contenuAffichageClient .= ' <p><input type="checkbox" name=" ' . $case -> id_client . '"/>'
									. ' <label> client numéro ' . $case -> id_client . ' : </label>
										<input readonly="readony" value="' . $case -> nom . ' ' . $case -> prenom . ' né le ' . $case -> date_de_naissance . ', habite à ' . $case -> adresse . ', mail: ' . $case -> mail . ', téléphone: ' . $case -> telephone . ' et a un salaire de ' . $case -> salaire . '"/></p><br/>';
		}
		$contenuAffichageClient .= ' <p>
								<label class="pas_de_style">
									&nbsp;
								</label>
								<input type="submit" value="Synthèse client" name="syntheseClient"/>
								<input type="submit" value="Modifier client" name="afficherModifierClient"/>
							</p>
						</fieldset> ';
	}
	require_once('vue/gabaritAgentAccueil.php');
}*/

function afficherSyntheseClient($client) {
	$contenuAffichage = '';
	if ($client == false) {
		$contenuAffichageClient = '<p>Aucun client ne correspond.</p>';
	} else {
		$contenuAffichageClient = '<fieldset>
										<legend>Synthèse du client</legend>
										<fieldset>
											<legend>Identité du client</legend>';
		foreach ($client as $case) {
			$contenuAffichageClient .= ' <p>
											<label>Numéro: </label>
											<input readonly="readony" value="' . $case -> id_client . '" name = "id" />
										</p>
										<p>
											<label>Nom: </label>
											<input readonly="readony" value="' . $case -> nom . '" name = "nom" />
										</p>
										<p>
											<label>Prénom: </label>
											<input readonly="readony" value="' . $case -> prenom . '" name = "prenom" />
										</p>
										<p>
											<label>Date de naissance: </label>
											<input readonly="readony" value="' . $case -> date_de_naissance . '" name = "date" />
										</p>
										<p>
											<label>Adresse: </label>
											<input readonly="readony" value="' . $case -> adresse . '" name = "adresse" />
										</p>
										<p>
											<label>Mail: </label>
											<input readonly="readony" value="' . $case -> mail . '" name = "mail" />
										</p>
										<p>
											<label>Telephone: </label>
											<input readonly="readony" value="' . $case -> telephone . '" name = "tel" />
										</p>
										<p>
											<label>Salaire: </label>
											<input readonly="readony" value="' . $case -> salaire . '" name = "salaire" />
										</p> ';
		}
		$contenuAffichageClient .= ' <p>
								<label class="pas_de_style">
									&nbsp;
								</label>
								<input type="submit" value="Modifier client" name="afficherModifierClient"/>
							</p>
						</fieldset> ';
	}
	require_once('vue/gabaritAgentAccueil.php');
}

function afficherAjouterClient() {
	$contenuAffichage = '';
	$contenuAffichageClient = ' <fieldset>
					<legend>Ajouter un client</legend>
					<p>
						<label>Nom: </label>
						<input type="text" name="nom" />
					</p>
					<p>
						<label>Prénom: </label>
						<input type="text" name="prenom" />
					</p>
					<p>
						<label>Date de naissance: </label>
						<input type = "text" name = "date_de_naissanceA" placeholder = "AAAA" maxlength = "4" />
						<label>/</label>
						<input type = "text" name = "date_de_naissanceM" placeholder = "MM" maxlength = "2" />
						<label>/</label>
						<input type="text" name="date_de_naissanceJ" placeholder = "JJ" maxlength = "2" />
					</p>
					<p>
						<label>Adresse: </label>
						<input type="text" name="adresse" />
					</p>
					<p>
						<label>Mail: </label>
						<input type="text" name="mail" />
					</p>
					<p>
						<label>Téléphone: </label>
						<input type="text" name="telephone" />
					</p>
					<p>
						<label>Salaire: </label>
						<input type="text" name="salaire" />
					</p>
					<p>
						<label class="pas_de_style">&nbsp;</label>
						<input type="submit" value="Ajouter client" name="ajouterClient"/>
						<input type="reset" value="Tout effacer" name="effacer"/>
					</p>
				</fieldset> ';
	require_once('vue/gabaritAgentAccueil.php');
}

function afficherModifierClient($id) {
	$contenuAffichage = '';
	$client = chercherIdClient($id);
	foreach ($client as $case) {
		$contenuAffichageClient = ' <fieldset>
						<legend>Modifier le client </legend>
						<p>
							<label>ID du client: </label>
							<input readonly="readony" name="id" value="' .$case -> id_client. '" />
						</p>
						<p>
							<label>Nouveau nom: </label>
							<input type="text" name="nom" value="' .$case -> nom. '" />
						</p>
						<p>
							<label>Nouveau prénom: </label>
							<input type="text" name="prenom" value="' .$case -> prenom. '" />
						</p>
						<p>
							<label>Nouvelle date de naissance: </label>
							<input type="text" name="date_de_naissance" value="' .$case -> date_de_naissance. '" />
						</p>
						<p>
							<label>Nouvelle adresse: </label>
							<input type="text" name="adresse" value="' . $case -> adresse . '" />
						</p>
						<p>
							<label>Nouveau mail: </label>
							<input type="text" name="mail" value="' . $case -> mail . '" />
						</p>
						<p>
							<label>Nouveau téléphone: </label>
							<input type="text" name="telephone" value="' . $case -> telephone . '" />
						</p>
						<p>
							<label>Nouveau salaire: </label>
							<input type="text" name="salaire" value="' .$case -> salaire. '" />
						</p>
						<p>
							<label class="pas_de_style">&nbsp;</label>
							<input type="submit" value="Modifier client" name="modifierClient"/>
							<input type="reset" value="Tout effacer" name="effacer"/>
						</p>
					</fieldset> ';
	require_once('vue/gabaritAgentAccueil.php');
	}
}

function afficherGestionFinanciere($idIntervention) {
	$contenuAffichage = '';
	if ($idIntervention == false) {
		$contenuAffichageClient = '<p>Aucune intervention pour ce client ne correspond.</p>';
	} else {
		$contenuAffichageClient = '<fieldset>
										<legend>Gestion financiere du client</legend>';
		foreach ($idIntervention as $case) {
			if ($case -> etat == 'attente') {
				$contenuAffichageClient .= ' <p>
												<input type = "checkbox" name = "' . $case -> id_intervention . '"/>'
											. ' <label>' . $case -> nom_intervention . ' du ' . $case -> date . ' : </label>
												<input readonly="readony" value="' . $case -> etat . '" />
											</p><br/>';
			}
		}
		$contenuAffichageClient .= '<p>
										<label class="pas_de_style">
											&nbsp;
										</label>
										<input type="submit" value="Payer" name="payer"/>
									</p>';
		foreach ($idIntervention as $case) {
			if ($case -> etat == 'differe') {
				$contenuAffichageClient .= ' <p>
												<input type = "checkbox" name = "' . $case -> id_intervention . '"/>'
											. ' <label>' . $case -> nom_intervention . ' du ' . $case -> date . ' : </label>
												<input readonly="readony" value="en ' . $case -> etat . '" />
											</p><br/>';
			}
		}
		$contenuAffichageClient .= ' <p>
										<label class="pas_de_style">
											&nbsp;
										</label>
										<input type="submit" value="Demander un différé" name="differe"/>
										<input type="submit" value="Rembourser" name="rembourser"/>
									</p>
								</fieldset> ';
	}
	require_once('vue/gabaritAgentAccueil.php');
}

