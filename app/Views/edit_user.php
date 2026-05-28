<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier utilisateur</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <h1>Modifier utilisateur</h1>

        <p class="auth-subtitle">
            Modifiez les informations et le rôle de l’utilisateur.
        </p>

        <form method="POST">

            <div class="form-group">
                <label>Nom</label>

                <input
                    type="text"
                    name="nom"
                    value="<?= htmlspecialchars($user['nom']) ?>"
                >
            </div>

            <div class="form-group">
                <label>Prénom</label>

                <input
                    type="text"
                    name="prenom"
                    value="<?= htmlspecialchars($user['prenom']) ?>"
                >
            </div>

            <div class="form-group">
                <label>Nom d'utilisateur</label>

                <input
                    type="text"
                    name="username"
                    value="<?= htmlspecialchars($user['username']) ?>"
                >
            </div>

            <div class="form-group">
                <label>Rôle</label>

                <select name="role">

                    <option
                        value="user"
                        <?= $user['role'] === 'user' ? 'selected' : '' ?>
                    >
                        Utilisateur
                    </option>

                    <option
                        value="admin"
                        <?= $user['role'] === 'admin' ? 'selected' : '' ?>
                    >
                        Administrateur
                    </option>

                </select>
            </div>

            <button type="submit">
                Modifier
            </button>

        </form>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>