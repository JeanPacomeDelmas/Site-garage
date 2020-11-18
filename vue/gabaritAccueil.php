<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>GarageConnexion</title>
		<meta charset="utf-8">
		<link rel="stylesheet"  href="vue/style/style.css" />
	</head>
	
	<body>
		<form id="formConnection" action="garage.php" method="post">
			<fieldset>
				<legend>Vérification d'identité: </legend>
				<p>
					<label>Identifiant: </label>
					<input type="text" name="user" />
				</p>
				<p>
					<label>Mot de passe: </label>
					<input type="text" name="pass" />
				</p>
				<p>
					<input type="submit" value="Connexion" name="connexion"/>
				</p>
			</fieldset>
		</form>
		
		<?php
			var_dump($contenuAffichage);
		?>
		
	</body>	
</html>
