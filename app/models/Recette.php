<?php

/* =========================================================
   MODÈLE RECETTE JSON
   Version légère : lecture du fichier data/recettes.json.
   ========================================================= */
class Recette {

    // Retourne toutes les recettes stockées dans le JSON
    public static function getAll() {

        $json = file_get_contents(__DIR__ . '/../../data/recettes.json');

        return json_decode($json, true);

    }

}

// Boucle de rendu éventuelle côté vue ou debug externe
foreach($recipes as $recipe)