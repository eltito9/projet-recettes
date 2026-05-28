<?php

/* =========================================================
   CONNEXION BASE DE DONNÉES
   Ce fichier centralise l’accès PDO au projet.
   ========================================================= */
$host = 'localhost';
$dbname = 'projet_recettes';
$user = 'root';
$password = '';

// Essai de connexion sécurisé avec PDO
try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    // Mode d’erreur strict pour mieux détecter les problèmes SQL
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e) {

    // En cas d’échec, on coupe proprement l’exécution avec le message utile
    die($e->getMessage());
}