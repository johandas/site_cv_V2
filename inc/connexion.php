<?php
// Ouverture de session_start()
session_start();

// Déclaration des variables
$hote = 'localhost'; // Le chemin vers le serveur
$bdd = 'cv'; // Le nom de la base de donnée
$utilisateur ="root"; // Le nom d'utilisateur pour se connecter
$mdp = ''; // Mot de passe local
$msg = '';
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
