<?php
// Ouverture de session_start()
session_start();
// Déclaration des variables
$hote = 'db717621239.db.1and1.com'; // Le chemin vers le serveur
$bdd = 'db717621239'; // Le nom de la base de donnée
$utilisateur ="dbo717621239"; // Le nom d'utilisateur pour se connecter
$mdp = 'Aqwzsx08$'; // Mot de passe local
$msg = '';
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Déclaration des chemins
define('RACINE_CV', 'www.johan-da-silva.fr/admin/');
define('URL', 'http://www.johan-da-silva.fr/');

// require de mon fichier contenant mes fonctions.
require('inc.fonctions.php');
