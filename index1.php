<htlml>
	<head>
		<title>TUTO PHP</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="POST" action="">
			<select name="categorie">
				<option value="Tuto">Tutos</option>
				<option value="Création">Créations</option>
				<option value="Null">Autres</option>
			</select>
			<select name="souscategorie">
				<option >CSS</option>
				<option >HTML</option>
				<option >PHP</option>
			</select>
			<input type="submit" name="OK" />
		</form>
		<?php

		$bdd = new PDO("mysql:host=127.0.0.1;dbname=tuto_para", "root", "root");

		$requete = $bdd->prepare("SELECT * FROM videos WHERE categorie = :cate AND souscategorie = :scate ORDER BY id");
		$requete->execute(array(
			'cate' => $_POST['categorie'], 
			'scate' => $_POST['souscategorie']));
		?>

		<table border ="1">
			
			<?php
			while ($resultat = $requete->fetch()) {
				?>
				<tr>
					<td><?php echo $resultat['id']; ?></td>
					<td><?php echo $resultat['titre']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php echo $resultat['description']; ?></td>
				</tr>
				<?php
			}
			?>
			
		</table>

		<a href="./base_material/index.php">Base material index</a><br />
		<a href="index1.php">...</a><br />
		<a href="index1.php">...</a><br />
		<a href="index1.php">...</a><br />
		<a href="index1.php">...</a><br />
		<a href="index1.php">...</a>

		<br /><br />

		<a href="index1.php">Here</a>

	</body>
</html>