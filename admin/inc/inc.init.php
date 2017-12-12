<?php

// Ouverture de session_start()
session_start();

<<<<<<< HEAD
// Déclaration des variables
=======
>>>>>>> d6fab46ddd8ce7e0dcf76b87176e5f66a5329320
$hote = 'localhost'; // Le chemin vers le serveur
$bdd = 'cv'; // Le nom de la base de donnée
$utilisateur ="root"; // Le nom d'utilisateur pour se connecter
$mdp = ''; // Mot de passe local
<<<<<<< HEAD
$msg = '';
=======

>>>>>>> d6fab46ddd8ce7e0dcf76b87176e5f66a5329320
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Déclaration des chemins
define('RACINE_CV', '/site_cv_V2/admin/');
define('URL', 'http://localhost/site_cv_V2/admin/');
<<<<<<< HEAD

=======
// Déclaration des variables
$msg = '';
>>>>>>> d6fab46ddd8ce7e0dcf76b87176e5f66a5329320

// require de mon fichier contenant mes fonctions.
require('inc.fonctions.php');
