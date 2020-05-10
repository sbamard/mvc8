<?php

session_start();

require_once('include/configuration.php');

/**
 * Classe statique Autoloader, execute la méthode inscrire
 * Chargement automatique des classes
 */
Autoloader::inscrire();

// traitement de l'authentification
if (!isset($_SESSION['login'])) {

    $_REQUEST['gestion'] = 'authentification';
} elseif (!isset($_REQUEST['gestion'])) {

    $_REQUEST['gestion'] = 'accueil';
}


//var_dump($_REQUEST);

$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();
