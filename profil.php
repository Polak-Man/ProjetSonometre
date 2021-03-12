<?php

session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=espace_membre", "root", "root");

if (isset($_GET['id']) AND $_GET['id'] > 0) {
	
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();

?>

<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8">
	</head>
	<body>

		<div align="center">
			<h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
			<br /><br /><br />
			Pseudo = <?php echo $userinfo['pseudo']; ?>
			<br />
			Mail = <?php echo $userinfo['mail']; ?>
			<br />
			<?php
			if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
				if ($_SESSION['id'] == 1) {
					echo "<a href=\"membres.php\">Gestion des membres</a><br />";
				}
				?>
				<a href="edition_profil.php">Editer mon profil</a><br />
				<a href="deconnexion.php">Se déconnecter</a>
				<?php
			}
			?>
		</div>


		<br /><a href="index.php">Index</a>

	</body>
</html>

<?php

}
else {
	header('Location: connexion.php');
}

?>