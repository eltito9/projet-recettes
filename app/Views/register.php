<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <h1>Inscription</h1>

        <p class="auth-subtitle">
            Créez votre compte et rejoignez la communauté Cuisine du monde
        </p>

        <?php if(isset($error)): ?>
            <p class="auth-error">
                <?= $error ?>
            </p>
        <?php endif; ?>

        <form method="POST" id="registerForm">

            <div class="form-group">
                <label>Nom</label>

                <input
                    type="text"
                    name="nom"
                    id="nom"
                    placeholder="Dupont"
                >

                <small id="nomError"></small>
            </div>

            <div class="form-group">
                <label>Prénom</label>

                <input
                    type="text"
                    name="prenom"
                    id="prenom"
                    placeholder="Jean"
                >

                <small id="prenomError"></small>
            </div>

            <div class="form-group">
                <label>Nom d'utilisateur</label>

                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="chef_culinaire"
                >

                <small id="usernameError"></small>
            </div>

            <div class="form-group">

                <label>Mot de passe</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="••••••••"
                >

                <small id="passwordError"></small>

            </div>

            <button type="submit">
                Créer un compte
            </button>

        </form>

        <div class="auth-separator"></div>

        <p class="auth-bottom">
            Déjà un compte ?
            <a href="index.php?page=login">
                Connexion
            </a>
        </p>

    </section>

</main>

<script>

document.getElementById('registerForm')
.addEventListener('submit', function(e){

    let valid = true;

    document.querySelectorAll('small')
    .forEach(function(error){

        error.textContent = '';
    });

    if(document.getElementById('nom').value.trim() === '')
    {
        document.getElementById('nomError')
        .textContent = 'Nom obligatoire';

        valid = false;
    }

    if(document.getElementById('prenom').value.trim() === '')
    {
        document.getElementById('prenomError')
        .textContent = 'Prénom obligatoire';

        valid = false;
    }

    if(document.getElementById('username').value.trim().length < 3)
    {
        document.getElementById('usernameError')
        .textContent =
        "3 caractères minimum";

        valid = false;
    }

    if(document.getElementById('password').value.length < 4)
    {
        document.getElementById('passwordError')
        .textContent =
        "4 caractères minimum";

        valid = false;
    }

    if(!valid)
    {
        e.preventDefault();
    }

});

</script>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>