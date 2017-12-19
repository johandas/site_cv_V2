<?php
// Ouverture de session_start()
session_start();

// Déclaration des variables
$hote = 'localhost'; // Le chemin vers le serveur
$bdd = 'cv'; // Le nom de la base de donnée
$utilisateur ="root"; // Le nom d'utilisateur pour se connecter
$mdp = ''; // Mot de passe local

$msg = ''; // variable pour les messages d'erreurs ou de réussite
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Déclaration des chemins
define('RACINE_CV', '/site_cv_V2bis/admin/');
define('URL', 'http://localhost/site_cv_V2bis/');

// require de mon fichier contenant mes fonctions.
require('inc.fonctions.php');
