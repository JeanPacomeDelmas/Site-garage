<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>GarageAC</title>
		<meta charset="utf-8">
		<link rel="stylesheet"  href="vue/style/style.css" />
	</head>
	
	<body>
		<p>ac</p>
		
		<form id="formClient" action="garage.php" method="post">
			<fieldset>
				<fieldset>
					<legend>Recherche d'un client</legend>
					<p>
						<label>Nom du client: </label>
						<input type="text" name="nom" />
					</p>
					<p>
						<label>Date de naissance du client: </label>
						<input type="text" name="date" />
					</p>
					<p>
						<label class="pas_de_style">&nbsp;</label>
						<input type="submit" value="Chercher client" name="chercherClient"/>
						<input type="submit" value="Ajouter client" name="afficherAjouterClient"/>
						<input type="reset" value="Tout effacer" name="effacer"/>
					</p>
					<p>
						<label>Id du client: </label>
						<input type="text" name="id" />
					</p>
					<p>
						<label class="pas_de_style">&nbsp;</label>
						<input type="submit" value="Synthèse client" name="syntheseClient"/>
						<input type="submit" value="Valider" name="valider"/>
					</p>
				</fieldset>
				
				<?php
					echo $contenuAffichageClient;
				?>
				
		</form>
		
		<?php
			var_dump( $contenuAffichage);
		?>
		
		<form id="formDeconnection" action="garage.php" method="post">
			<fieldset>
				<legend>Déconnexion: </legend>
				<p>
					<input type="submit" value="Deconnexion" name="deconnexion"/>
				</p>
			</fieldset>
		</form>
		
	</body>	
</html>
