<?php

require_once __DIR__ . '/../../config/database.php';

/* ╔════════════════════════════════════════════╗
   ║  MODÈLE RECETTE                           ║
   ║  Requêtes SQL liées aux recettes          ║
   ╚════════════════════════════════════════════╝ */

class Recipe
{
    // ── Liste des recettes ──────────────────────────────────────────────
    public static function all()
    {
        global $pdo;

        $sql = "SELECT * FROM recipes ORDER BY id DESC";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll();
    }

    // ── Création d’une recette ──────────────────────────────────────────
    public static function create(
        $title,
        $description,
        $image,
        $preparation_min,
        $cuisson_min,
        $calories_kcal,
        $proteines_g,
        $difficulte,
        $categorie
    )
    {
        global $pdo;

        $sql = "INSERT INTO recipes(
                    title,
                    description,
                    image,
                    preparation_min,
                    cuisson_min,
                    calories_kcal,
                    proteines_g,
                    difficulte,
                    categorie
                )
                VALUES(
                    :title,
                    :description,
                    :image,
                    :preparation_min,
                    :cuisson_min,
                    :calories_kcal,
                    :proteines_g,
                    :difficulte,
                    :categorie
                )";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'preparation_min' => $preparation_min,
            'cuisson_min' => $cuisson_min,
            'calories_kcal' => $calories_kcal,
            'proteines_g' => $proteines_g,
            'difficulte' => $difficulte,
            'categorie' => $categorie
        ]);
    }

    // ── Suppression d’une recette ───────────────────────────────────────
    public static function delete($id)
    {
        global $pdo;

        $sql = "DELETE FROM recipes WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    }

    // ── Recherche d’une recette ─────────────────────────────────────────
    public static function find($id)
    {
        global $pdo;

        $sql = "SELECT * FROM recipes WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }

    // ── Mise à jour d’une recette ───────────────────────────────────────
    public static function update(
        $id,
        $title,
        $description,
        $preparation_min,
        $cuisson_min,
        $calories_kcal,
        $proteines_g,
        $difficulte,
        $categorie
    )
    {
        global $pdo;

        $sql = "UPDATE recipes
                SET
                    title = :title,
                    description = :description,
                    preparation_min = :preparation_min,
                    cuisson_min = :cuisson_min,
                    calories_kcal = :calories_kcal,
                    proteines_g = :proteines_g,
                    difficulte = :difficulte,
                    categorie = :categorie
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'preparation_min' => $preparation_min,
            'cuisson_min' => $cuisson_min,
            'calories_kcal' => $calories_kcal,
            'proteines_g' => $proteines_g,
            'difficulte' => $difficulte,
            'categorie' => $categorie
        ]);
    }

    public static function findByCategory($categorie)
{
    global $pdo;

    $sql = "SELECT * FROM recipes WHERE categorie = :categorie ORDER BY id DESC";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'categorie' => $categorie
    ]);

    return $stmt->fetchAll();
}

}

