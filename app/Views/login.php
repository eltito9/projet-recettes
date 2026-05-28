<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <!-- Formulaire classique de connexion au site. -->
        <h1>Bon retour</h1>

        <p class="auth-subtitle">
            Connectez-vous à votre compte Cuisine du monde
        </p>

        <?php if(isset($error)): ?>
            <p class="auth-error">
                <?= $error ?>
            </p>
        <?php endif; ?>

        <!-- L’utilisateur saisit son pseudo et son mot de passe. -->
        <form method="POST">

            <div class="form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" placeholder="chef_culinaire">
            </div>

            <div class="form-group">

                <div class="password-line">
                    <label>Mot de passe</label>

                    <a href="index.php?page=forgot-password">
                        Oublié ?
                    </a>
                </div>

                <input type="password" name="password" placeholder="••••••••">
            </div>

            <button type="submit">
                Se connecter
            </button>

        </form>

        <div class="auth-separator"></div>

        <p class="auth-bottom">
            Nouveau sur Cuisines du monde ?
            <a href="index.php?page=register">
                Inscription
            </a>
        </p>

    </section>

    <section class="auth-features">

        <div class="auth-feature">
            <div class="auth-feature-icon">🍴</div>

            <h3>Inspiration</h3>

            <p>
                Découvrez des milliers de recettes partagées par la communauté.
            </p>
        </div>

        <div class="auth-feature">
            <div class="auth-feature-icon">👥</div>

            <h3>Communauté</h3>

            <p>
                Échangez avec d’autres passionnés de cuisine du monde entier.
            </p>
        </div>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>