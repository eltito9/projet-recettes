<?php

/* =========================================================
    POINT D’ENTRÉE PRINCIPAL
    ---------------------------------------------------------
    Rôle :
    - démarrer la session
    - charger les contrôleurs
    - envoyer l’utilisateur vers la bonne page

    Idée simple : une seule porte d’entrée pour tout le site.
    Le paramètre `page` de l’URL décide quelle action lancer.
    ========================================================= */
session_start();

// Contrôleurs du projet : utilisateurs, authentification et recettes
// Ici on prépare les "outils" avant d’analyser la page demandée.
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/RecipeController.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';

// Instances utilisées par le routeur maison
$authController = new AuthController();
$recipeController = new RecipeController();
$userController = new UserController();

// Page courante demandée via l’URL ; login par défaut
// Si rien n’est précisé, on affiche la page de connexion.
$page = $_GET['page'] ?? 'login';

// Navigation simple par paramètre GET
// Chaque cas correspond à une fonctionnalité du site.
if($page === 'login')
{
    $authController->login();
}
elseif($page === 'register')
{
    $authController->register();
}
elseif($page === 'home')
{
    $controller = new HomeController();
    $controller->index();
}
elseif($page === 'categories')
{
    $controller = new HomeController();
    $controller->categories();
}
elseif($page === 'logout')
{
    $authController->logout();
}
elseif($page === 'recipe-detail')
{
    $recipeController->show();
}
elseif($page === 'recettes')
{
    $recipeController->index();
}
elseif($page === 'create-recipe')
{
    $recipeController->create();
}
elseif($page === 'forgot-password')
{
    $authController->forgotPassword();
}
elseif($page === 'delete-recipe')
{
    $recipeController->delete();
}
elseif($page === 'edit-recipe')
{
    $recipeController->edit();
}
elseif($page === 'users')
{
    $userController->index();
}
elseif($page === 'create-user')
{
    $userController->create();
}
elseif($page === 'edit-user')
{
    $userController->edit();
}
elseif($page === 'delete-user')
{
    $userController->delete();
}
elseif($page === 'category')
{
    $recipeController->category();
}elseif($page === 'contact')
{
    require __DIR__ . '/../app/Views/contact.php';
}