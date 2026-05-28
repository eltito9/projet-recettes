<?php

require_once __DIR__ . '/../models/Recette.php';

/* =========================================================
   CONTRÔLEUR DES RECETTES JSON
   Version simplifiée qui lit les recettes depuis le fichier data.
   ========================================================= */
class RecetteController {

    // Affiche la liste des recettes si l’utilisateur est connecté
    public function index() {

        // Protection d’accès : session obligatoire
        if (!isset($_SESSION['user'])) {

            header('Location: index.php?page=login');
            exit;
        }

        // Chargement des données depuis le modèle fichier JSON
        $recettes = Recette::getAll();

        // Vue de présentation des recettes
        require __DIR__ . '/../Views/recettes.php';
    }
}