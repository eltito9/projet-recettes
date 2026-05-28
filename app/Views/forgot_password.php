<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Mot de passe oublié</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <h1>Réinitialisation</h1>

        <p class="auth-subtitle">
            Choisissez un nouveau mot de passe pour votre compte.
        </p>

        <form method="POST">

            <div class="form-group">

                <label>Nom utilisateur</label>

                <input
                    type="text"
                    name="username"
                    placeholder="chef_culinaire"
                >

            </div>

            <div class="form-group">

                <label>Nouveau mot de passe</label>

                <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                >

            </div>

            <button type="submit">
                Réinitialiser
            </button>

        </form>

        <div class="auth-separator"></div>

        <p class="auth-bottom">

            Retour à la
            <a href="index.php?page=login">
                connexion
            </a>

        </p>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>