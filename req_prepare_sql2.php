<htlml>
	<head>
		<title>TUTO PHP</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="POST" action="">
			<label>Entrez un nombre :</label>
			<input type="text" name="id" value="<?php if(isset($_POST['id'])) { echo $_POST['id'];} ?>" />
			<input type="submit" name="OK" />
		</form>
		<?php
		if (isset($_POST['id'])) {
			$bdd = new PDO("mysql:host=127.0.0.1;dbname=tuto_para", "root", "root");

			$requete = $bdd->prepare("SELECT * FROM videos WHERE id = :id ORDER BY id");
			$requete->execute(array(
				'id' => $_POST['id']
			));
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
		}
		?>
			
		</table>
	</body>
</html>