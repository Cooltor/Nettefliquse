<?php
session_start();


// 1 - Connexion à la BDD


$pdo = new PDO(
    "mysql:host=localhost;dbname=nettefliquse","root","",
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
    )
);

require_once 'functions.inc.php';

// 2 - Déclarer une variable qui va afficher les messages

$content = '';

define('URL', 'http://localhost/nettefliquse/');
define('RACINE', $_SERVER['DOCUMENT_ROOT']. '/nettefliquse/');

?>
