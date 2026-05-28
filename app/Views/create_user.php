<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter utilisateur</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <h1>Ajouter utilisateur</h1>

        <p class="auth-subtitle">
            Créez un nouvel utilisateur et définissez son rôle.
        </p>

        <form method="POST" id="userForm">

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" id="nom">
                <small id="nomError"></small>
            </div>

            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" id="prenom">
                <small id="prenomError"></small>
            </div>

            <div class="form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" id="username">
                <small id="usernameError"></small>
            </div>

            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" id="password">
                <small id="passwordError"></small>
            </div>

            <div class="form-group">
                <label>Rôle</label>

                <select name="role" id="role">
                    <option value="">Choisir un rôle</option>
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                </select>

                <small id="roleError"></small>
            </div>

            <button type="submit">
                Ajouter
            </button>

        </form>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

<script>
document.getElementById('userForm').addEventListener('submit', function(e){

    let valid = true;

    document.querySelectorAll('small').forEach(function(error){
        error.textContent = '';
    });

    if(document.getElementById('nom').value.trim() === ''){
        document.getElementById('nomError').textContent = 'Nom obligatoire';
        valid = false;
    }

    if(document.getElementById('prenom').value.trim() === ''){
        document.getElementById('prenomError').textContent = 'Prénom obligatoire';
        valid = false;
    }

    if(document.getElementById('username').value.trim().length < 3){
        document.getElementById('usernameError').textContent = "3 caractères minimum";
        valid = false;
    }

    if(document.getElementById('password').value.length < 4){
        document.getElementById('passwordError').textContent = "4 caractères minimum";
        valid = false;
    }

    if(document.getElementById('role').value === ''){
        document.getElementById('roleError').textContent = "Rôle obligatoire";
        valid = false;
    }

    if(!valid){
        e.preventDefault();
    }

});
</script>

</body>
</html>