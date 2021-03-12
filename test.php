<htlml>
	<head>
		<title>TUTO PHP</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="POST" action="">
			<input type="text" name="id" placeholder="ID à modifier"><br />
			<input type="text" name="titre" placeholder="Titre" /><br />
			<input type="text" name="description" placeholder="Description" /><br />
			<input type="text" name="categorie" placeholder="Catégorie" /><br />
			<input type="submit" name="OK" /><br /><br />
		</form>

		<?php

		$bdd = new PDO("mysql:host=127.0.0.1;dbname=tuto_para;charset=utf8", "root", "root");

		if (isset($_POST['id']) AND isset($_POST['titre']) AND isset($_POST['description']) AND isset($_POST['categorie'])) {
			
			$requete = $bdd->prepare("UPDATE videos SET titre = ?,  description = ?, categorie = ? WHERE id = ?");
			$requete->execute(array($_POST['titre'], $_POST['description'], $_POST['categorie']), $_POST['id']));

		
		}

		?>

	</body>
</html>