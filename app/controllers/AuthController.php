<?php

require_once __DIR__ . '/../models/User.php';

/*  ╔════════════════════════════════════════════╗
    ║  CONTRÔLEUR D’AUTHENTIFICATION             ║
    ║  Connexion • Déconnexion • Inscription     ║
    ╚════════════════════════════════════════════╝ */
class AuthController {

     // ── Connexion utilisateur ─────────────────────────────────────────────
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // ↳ Récupération des identifiants saisis par l’utilisateur
            // On lit les champs envoyés par le formulaire HTML.
            $username = $_POST['username'];
            $password = $_POST['password'];
        if(empty($username) || empty($password))
{
         $error = "Veuillez remplir tous les champs.";
         require __DIR__ . '/../Views/login.php';
         return;
}
            // ↳ Recherche du compte correspondant au pseudo fourni
            // Le modèle interroge la base de données.
            $user = User::findByUsername($username);

            // ↳ Vérification du mot de passe haché
            if ($user && password_verify($password, $user['password'])) {

                // ↳ Connexion réussie : sauvegarde de l’utilisateur en session
                // La session permet de reconnaître l’utilisateur sur les autres pages.
                $_SESSION['user'] = $user;

                header('Location: index.php?page=recettes');
                exit;

            } else {

                $error = "Identifiants incorrects";
            }
        }

        // ↳ Vue du formulaire de connexion
        // Si aucun formulaire n’a été envoyé, on affiche simplement la page.
        require __DIR__ . '/../Views/login.php';
    }

  

    // ── Déconnexion utilisateur ───────────────────────────────────────────
    public function logout() {

        // On détruit la session puis on renvoie vers la page de connexion.
        session_destroy();

        header('Location: index.php?page=login');

        exit;
    }
    // ── Mot de passe oublié ───────────────────────────────────────────────
    // Version simple du projet d’école : elle réinitialise le mot de passe.
    public function forgotPassword()
{
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        User::updatePassword(
            $username,
            $password
        );

        header('Location: index.php?page=login');

        exit;
    }

    require __DIR__ . '/../Views/forgot_password.php';
}
    // ── Inscription utilisateur ───────────────────────────────────────────
    public function register() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // ↳ Champs envoyés depuis le formulaire d’inscription
        // On récupère les données du futur compte.
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // ↳ Création du compte avec rôle par défaut
         try
        {
            User::create(
                $nom,
                $prenom,
                $username,
                $password
            );
        }
        catch(PDOException $e)
        {
            $error = "Nom d'utilisateur déjà utilisé";

            require __DIR__ . '/../Views/register.php';

            return;
        }


        // ↳ Après inscription, retour vers la connexion
        header('Location: index.php?page=login');

        exit;
    }

    // ↳ Vue du formulaire d’inscription
    require __DIR__ . '/../Views/register.php';
}
}