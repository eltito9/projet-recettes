<?php

require_once __DIR__ . '/../models/Recipe.php';

/* ╔════════════════════════════════════════════╗
   ║  CONTRÔLEUR DES RECETTES                  ║
   ║  Liste • Création • Suppression • Édition ║
   ╚════════════════════════════════════════════╝ */
class RecipeController
{
   public function show()
{
    // La fiche détail n’est accessible qu’aux utilisateurs connectés.
    if(!isset($_SESSION['user']))
    {
        header('Location: index.php?page=login');
        exit;
    }

    // On récupère l’identifiant de la recette dans l’URL.
    $id = $_GET['id'];

    // Le modèle va chercher la recette correspondante en base.
    $recipe = Recipe::find($id);

    // La vue affiche le détail complet.
    require __DIR__ . '/../Views/recipe_detail.php';
}

    public function index()
    {
        // Liste des recettes disponibles.
        $recipes = Recipe::all();

        // Vue tableau / cartes de recettes.
        require __DIR__ . '/../Views/recettes.php';
    }

    public function create()
    {
        // Réservé à l’administrateur.
        if($_SESSION['user']['role'] !== 'admin')
        {
            die('Accès refusé');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $preparation_min = $_POST['preparation_min'];
            $cuisson_min = $_POST['cuisson_min'];
            $calories_kcal = $_POST['calories_kcal'];
            $proteines_g = $_POST['proteines_g'];
            $difficulte = $_POST['difficulte'];
            $categorie = $_POST['categorie'];

            $image = null;

            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0)
            {
                // Le fichier est simplement déplacé dans le dossier uploads.
                $image = $_FILES['image']['name'];
                $tmpName = $_FILES['image']['tmp_name'];

                move_uploaded_file(
                    $tmpName,
                    'uploads/' . $image
                );
            }

            Recipe::create(
                $title,
                $description,
                $image,
                $preparation_min,
                $cuisson_min,
                $calories_kcal,
                $proteines_g,
                $difficulte,
                $categorie
            );

            header('Location: index.php?page=recettes');
            exit;
        }

        require __DIR__ . '/../Views/create_recipe.php';
    }

    public function delete()
    {
        // Suppression réservée à l’administrateur.
        if($_SESSION['user']['role'] !== 'admin')
        {
            die('Accès refusé');
        }

        // Identifiant de la recette à supprimer.
        $id = $_GET['id'];

        // Suppression en base.
        Recipe::delete($id);

        header('Location: index.php?page=recettes');
        exit;
    }

    public function edit()
    {
        // Modification réservée à l’administrateur.
        if($_SESSION['user']['role'] !== 'admin')
        {
            die('Accès refusé');
        }

        // On lit l’identifiant de la recette à modifier.
        $id = $_GET['id'];

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $preparation_min = $_POST['preparation_min'];
            $cuisson_min = $_POST['cuisson_min'];
            $calories_kcal = $_POST['calories_kcal'];
            $proteines_g = $_POST['proteines_g'];
            $difficulte = $_POST['difficulte'];
            $categorie = $_POST['categorie'];

            Recipe::update(
                $id,
                $title,
                $description,
                $preparation_min,
                $cuisson_min,
                $calories_kcal,
                $proteines_g,
                $difficulte,
                $categorie
            );

            header('Location: index.php?page=recettes');
            exit;
        }

        // Récupération de la recette actuelle pour pré-remplir le formulaire.
        $recipe = Recipe::find($id);

        require __DIR__ . '/../Views/edit_recipe.php';
    }


public function category()
{
    // La page catégorie est réservée aux utilisateurs connectés.
    if(!isset($_SESSION['user']))
    {
        header('Location: index.php?page=login');
        exit;
    }

    // Nom de la catégorie choisi dans l’URL.
    $categorie = $_GET['name'];

    // Récupération des recettes liées à cette catégorie.
    $recipes = Recipe::findByCategory($categorie);

    // Affichage de la page filtrée par catégorie.
    require __DIR__ . '/../Views/category_recipes.php';
}
}