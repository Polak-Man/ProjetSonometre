<html>
	<head>
		<title>TUTO PHP</title>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="0"; URL="interaction_fichier.php">
	</head>
	<body>
		<?php

			$fichier = fopen('oui.txt', 'r+');

			$vues = fgets($fichier);
			$vues++;

			fseek($fichier, 0);

			fputs($fichier, $vues);

			fclose($fichier);

			echo $vues;

		?>
	</body>
</html>