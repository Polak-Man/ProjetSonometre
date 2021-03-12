<?php

session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=espace_membre", "root", "root");

$_SESSION['id'] = 1;
$user['id'] = 1;
header("Location: membres.php?id=".$_SESSION['id']);

?>
