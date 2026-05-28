<?php

/* =========================================================
   CONTRÔLEUR D’ACCUEIL
   ---------------------------------------------------------
   Ce contrôleur s’occupe des pages publiques simples :
   - accueil
   - catégories

   Il ne fait pas de traitement complexe : il affiche juste
   la bonne vue au bon moment.
   ========================================================= */
class HomeController
{
    public function index()
    {
        // Page d’accueil du site.
        require __DIR__ . '/../Views/home.php';
    }

    public function categories()
    {
        // Page qui présente les grandes familles de recettes.
        require __DIR__ . '/../Views/categories.php';
    }
}