<html>
	<head>
		<title>File Interaction</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php

			$fichier = fopen('compteur.txt', 'r+');		//fihcier txt (oui.txt / compteur.txt / ...)
/*			
//			$ligne1 = fgets($fichier);
//			$ligne2 = fgets($fichier);

			$i = 1;

			while ($i <= 10) {
				$ligne1 = fgets($fichier);
				echo $ligne1 . "<br />";
				$i++;
			}

//			echo $ligne1 . "<br />";
//			echo $ligne2;
*/

			$vues = fgets($fichier);
			$vues++;

			fseek($fichier, 0);
			fputs($fichier, $vues);

			fclose($fichier);

			echo $vues;

		?>
		<br /><a href="index.php">Index</a>
	</body>
</html>