<?php

require_once __DIR__ . '/../models/User.php';

/*  ╔════════════════════════════════════════════╗
    ║  CONTRÔLEUR DES UTILISATEURS               ║
    ║  Administration des comptes et accès       ║
    ╚════════════════════════════════════════════╝ */
class UserController
{
     // ── Vérification centrale du rôle administrateur ─────────────────────
    private function checkAdmin()
    {
        // Petite garde pour éviter qu’un utilisateur classique accède à l’admin.
        if(
            !isset($_SESSION['user'])
            || $_SESSION['user']['role'] !== 'admin'
        )
        {
            die('Accès refusé');
        }
    }

    // ── Liste des utilisateurs ────────────────────────────────────────────
    public function index()
    {
        // Liste complète des comptes, visible seulement par l’administrateur.
        $this->checkAdmin();

        // Le modèle récupère les utilisateurs depuis la base.
        $users = User::all();

        // Vue de gestion des comptes.
        require __DIR__ . '/../Views/users.php';
    }

    // ── Création d’un utilisateur ─────────────────────────────────────────
    public function create()
    {
        // Création autorisée uniquement à l’administrateur.
        $this->checkAdmin();

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // ↳ Données saisies dans le formulaire
            // On récupère les valeurs saisies par l’admin.
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // ↳ Insertion en base avec rôle choisi
            // Le mot de passe est hashé dans le modèle.
            User::create(
                $nom,
                $prenom,
                $username,
                $password,
                $role
            );

            header('Location: index.php?page=users');

            exit;
        }

        require __DIR__ . '/../Views/create_user.php';
    }

    // ── Modification d’un utilisateur ────────────────────────────────────
    public function edit()
    {
        // Modification réservée à l’administrateur.
        $this->checkAdmin();

        // ↳ Identifiant de l’utilisateur ciblé
        $id = $_GET['id'];

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // ↳ Mise à jour des informations de compte
            // On garde seulement les champs utiles à l’édition.
            User::update(
                $id,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['username'],
                $_POST['role']
            );

            header('Location: index.php?page=users');

            exit;
        }

        $user = User::find($id);

        require __DIR__ . '/../Views/edit_user.php';
    }

    // ── Suppression d’un utilisateur ──────────────────────────────────────
    public function delete()
{
    // Suppression réservée à l’administrateur.
    $this->checkAdmin();

    // ↳ Identifiant de l’utilisateur à supprimer
    $id = $_GET['id'];

    // ↳ Protection supplémentaire : un admin ne se supprime pas ici
    $user = User::find($id);

    if($user['role'] === 'admin')
    {
        die("Impossible de supprimer un administrateur.");
    }

    // ↳ Suppression finale
    User::delete($id);

    header('Location: index.php?page=users');
    exit;
}
}