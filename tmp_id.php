<?php

session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=espace_membre", "root", "root");

$_SESSION['id'] = $_GET['id'];
$user['id'] = $_GET['id'];
header("Location: edition_profil_admin.php?id=".$_SESSION['id']);

?>
