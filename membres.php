<?
/*Démarrage de la session et déclaration de la BDD*/
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=projet;', 'root', 'root');

/*Vérification de la présence d'authentification, sinon redirrection sur la pages de connexion */

if(!$_SESSION['mdp']){
	header('Location: connexion.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gestion des membres</title>
	<meta charset="utf-8">

</head>
<body>
	<?php
		/*Je récupère les membres de la base de données pour les afficher sur la page*/
		$recupUsers = $bdd->query('SELECT * FROM membres');
		while($user = $recupUsers->fetch()){
		?>
		<p><?= $user['id']; ?>&nbsp;<?= $user['pseudo']; ?>&nbsp;&nbsp;&nbsp;<?= $user['mail']; ?>&nbsp;&nbsp;&nbsp;<?= $user['mot_de_passe']; ?>&nbsp;&nbsp;&nbsp;<a href="suppr.php?id=<?= $user['id']; ?>">	Supprimer le membre</a>&nbsp;&nbsp;&nbsp;<a href="modifier.php?id=<?= $user['id']; ?>">	Modifier</a>



		</p>

		<?php
		}
	?>

</body>
</html>