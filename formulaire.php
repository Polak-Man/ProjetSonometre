<html>
	<head>
		<title>Formulaire</title>
		<meta charset="utf-8">
	</head>
	<body>
		<fieldset>
			<legend>Formulaire</legend>
			<form method="POST" action="">
<!--				<input type="" name="test"/>										<br />
				<input type="" name="test"/>										<br />
				<input type="" name="test"/>										<br />
				<input type="" name="test"/>										<br />
				<input type="" name="test"/>										<br />-->
				<input type="number" name="text_value" />							<br /> 
				<input type="range" name="test"/>									<br />
				<input type="radio" name="radio"/>Radio 1							<br />
				<input type="radio" name="radio"/>Radio 2							<br />
				<input type="radio" name="radioo"/>Radio optionnel					<br />
				<input type="checkbox" name="check3"/>Check 1						<br />
				<input type="checkbox" name="check4"/>Check 2						<br />
				<input type="date" name="aujourd'hui"/>								<br /><br />
				<input type="text" name="test" size="50" maxlength="25" />			<br />
				<textarea cols="25" rows="5" placeholder="Text"><?php echo $_POST['text_value']; ?></textarea>		<br /><br />
				<input type="email" name="identifiant" placeholder="Identifiant" />	<br />
				<input type="password" name="mdp" placeholder="Mot de passe"/>		<br />
				<select>
					<optgroup label="Groupe 1">
						<option>Option 1</option>
						<option selected="">Option 2</option>
					</optgroup>
					<optgroup label="Groupe 2">
						<option>Option 3</option>
						<option>Option 4</option>
					</optgroup>
				</select>															<br />
				<button type="submit" name="envoyer" >Envoyer</button>
			</form>
		</fieldset>
		<br />
		<?php

			if (isset($_POST['mdp'])) {
				
				if ($_POST['mdp'] == 1234) {
					echo "Connexion en cours";
				}
				elseif (!empty($_POST['mdp'])) {
					echo "Mot de passe incorrect.";
				}
				else {
					echo "Veulliez entrer un mot de passe.";
				}

			}
			else {
				echo "Erreur";
			}
			
		?>
		<br /><a href="index.php">Index</a>
	</body>
</html>