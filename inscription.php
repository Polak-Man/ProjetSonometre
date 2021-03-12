<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=espace_membre", "root", "root");

if (isset($_POST['forme-inscription'])){
//	echo "saucisse" . "<br />";

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail-conf']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp-conf']);

	if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail-conf']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp-conf'])) {

		$pseudolength = strlen($pseudo);
		if ($pseudolength <= 255) {

			$reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
			$reqpseudo->execute(array($pseudo));
			$pseudoexist = $reqpseudo->rowCount();

			if ($pseudoexist == 0) {
				
				if ($mail == $mail2) {

					if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

						$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
						$reqmail->execute(array($mail));
						$mailexist = $reqmail->rowCount();

						if ($mailexist == 0) {

							if ($mdp == $mdp2) {

								$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
								$insertmbr->execute(array($pseudo, $mail, $mdp));
								$erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
	//							header('Location: index.php');
							}
							else {
								$erreur = "Vos mots de passes ne correspondent pas !";
							}
						}
						else {
							$erreur = "Adresse mail déjà utlisé !";
						}
					}
					else {
						$erreur = "Votre adresse mail n'est pas valide !";
					}
				}
				else {
					$erreur = "Vos adresses mail ne correspondent pas !";
				}
			}
			else {
				$erreur = "Pseudo déjà utilisé !";
			}
		}
		else {
			$erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
		}
	}
	else {
		$erreur = "Tous les champs doivent être complétés !";
	}
}
else {
	echo "erreur";
}

?>

<html>
	<head>
		<title>Inscription</title>
		<meta charset="utf-8">
	</head>
	<body>

		<div align="center">
			<h2>Inscription</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<table>
					<tr>
						<td align="right">
							<label for="pseudo">Pseudo :</label>
						</td>
						<td align="right">
							<input type="text" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" placeholder="Pseudo" />
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="mail">Mail :</label>
						</td>
						<td align="right">
							<input type="email" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" placeholder="Mail" />
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="mail2">Confirmation du Mail :</label>
						</td>
						<td align="right">
							<input type="email" id="mail2" name="mail-conf" value="<?php if(isset($mail2)) { echo $mail2; } ?>" placeholder="Confirmer de votre mail" />
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="mdp">Mot de passe :</label>
						</td>
						<td align="right">
							<input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" />
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="mdp2">Confirmation mot de passe :</label>
						</td>
						<td align="right">
							<input type="password" id="mdp2" name="mdp-conf" placeholder="Confirmer votre mdp" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="center">
							<br />
							<button type="submit" name="forme-inscription" value="Je m'inscis" >OK</button>
						</td>
					</tr>
				</table>
			</form>
			<?php
			if (isset($erreur)) {
				echo '<font color="red">' . $erreur ."</font>";
			}
			?>
		</div>


		<br /><a href="index.php">Index</a>

	</body>
</html>

