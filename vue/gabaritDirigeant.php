<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>GarageD</title>
		<meta charset="utf-8">
		<link rel="stylesheet"  href="vue/style/style.css" />
	</head>
	
	<body>
		<p>dirigeant</p>
		
		<form id="formDeconnection" action="garage.php" method="post">
			<fieldset>
				<legend>Déconnexion: </legend>
				<p>
					<input type="submit" value="Deconnexion" name="deconnexion"/>
				</p>
			</fieldset>
		</form>
		
		<?php
			echo $contenuAffichage;
		?>
		
	</body>	
</html>
