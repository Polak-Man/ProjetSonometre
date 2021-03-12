<?php
	foreach ($_POST as $key => $value)
		${$key}=$val;
	foreach ($_GET as $key => $value)
		${$key}=$val;
?>
<!DOCTYPE html>
<html lang="fr">
<html>
<head>
	<link type="text/css" rel="stylesheet" href="configurateur.css">
	<title>Configurer le SonomètreS</title>
	<meta charset="utf-8">

</head>
<body>
		<?php
			$message='Bienvenue sur la page de Configuration !';
				echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
?>
<div id="Titre">
	<H1>Configurer la récupération de données.</H1>
</div>

<p class="sous-titres" id="titre-duree">Durée de récupération des échantillons</p>
	<form method="POST" name="" action="reception.php" id="formulaire">
			<input id="h-deb"type="" name="" placeholder="Heure de début"><br />
			<input id="h-fin" type="" name="" placeholder="heure de fin"><br />
			<button name="durr"id="btn-valid-duree"type="submit" class="btn btn-md btn-outline-danger" data-target="#config-last">Valider</button>

<p class="sous-titres" id="titre-freq">Fréquece d'échantillonnage</p>
			<input id="nmbr00" type="number" placeholder="Secondes"name="frs" min="0" max="59"><br />
			<input id="nmbr01" type="number" placeholder="Minutes"name="frm" min="0" max="59"><br />
			<input id="nmbr02" type="number" placeholder="Heures"name="frh" min="0" max="24"><br />
			<button name="freqq"id="btn-valid-freq"type="button" class="btn btn-md btn-outline-danger" data-target="#config-freq">Valider</button>
</form>
	<div id="carre">
		<div class="text-carre">
		<p>Merci de remplir tous les champs,<br />
		 00 lorsque = 0</p>
</div>
</div>
	

</body>

</html>