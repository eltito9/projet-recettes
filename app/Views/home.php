<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="home-page">

    <section class="home-hero">

        <div class="home-content">

            <span class="home-kicker">
                Cuisine du monde
            </span>

            <h1>
                Découvrez des recettes venues du monde entier
            </h1>

            <p>
                Explorez des recettes simples, savoureuses et inspirées de différentes cultures culinaires.
            </p>

            <a href="index.php?page=login" class="home-btn">
                Se connecter
            </a>

        </div>

        <div class="home-image">
            <img src="uploads/iaimage.png" alt="Cuisine du monde">
        </div>

    </section>

    <section class="home-section">

        <h2>Pourquoi utiliser notre site ?</h2>

        <div class="home-cards">

            <div class="home-card">
                <h3>Recettes variées</h3>
                <p>Découvrez des plats inspirés de plusieurs régions du monde.</p>
            </div>

            <div class="home-card">
                <h3>Espace sécurisé</h3>
                <p>Connectez-vous pour accéder aux recettes disponibles.</p>
            </div>

            <div class="home-card">
                <h3>Administration</h3>
                <p>Les administrateurs peuvent gérer les recettes et les utilisateurs.</p>
            </div>

        </div>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>