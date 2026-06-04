<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=21">
    <title>Page introuvable</title>
</head>

<body>

    <?php require __DIR__ . '/navbar.php'; ?>

    <main class="not-found-page">

        <section class="not-found-card">

            <span class="not-found-code">404</span>

            <h1>Oups, cette page s’est fait la malle</h1>

            <p class="not-found-text">
                La page que vous cherchez n’existe pas ou a été déplacée.
                Revenez à l’accueil pour continuer votre balade culinaire.
            </p>

            <div class="not-found-actions">
                <a href="index.php?page=home" class="home-btn">Retour à l’accueil</a>
                <a href="index.php?page=recettes" class="not-found-link">Voir les recettes</a>
            </div>

        </section>

    </main>

    <?php require __DIR__ . '/footer.php'; ?>

</body>

</html>