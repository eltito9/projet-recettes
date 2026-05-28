<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Utilisateurs</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="admin-page">

    <div class="admin-header">

        <h1>Gestion des utilisateurs</h1>

        <a href="index.php?page=create-user" class="admin-btn">
            Ajouter un utilisateur
        </a>

    </div>

    <table class="admin-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Username</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($users as $user): ?>

                <tr>

                    <td><?= $user['id_user'] ?></td>

                    <td><?= htmlspecialchars($user['nom']) ?></td>

                    <td><?= htmlspecialchars($user['prenom']) ?></td>

                    <td><?= htmlspecialchars($user['username']) ?></td>

                    <td><?= htmlspecialchars($user['role']) ?></td>

                    <td>

                        <div class="admin-actions">

                            <a
                                href="index.php?page=edit-user&id=<?= $user['id_user'] ?>"
                                class="admin-edit"
                            >
                                Modifier
                            </a>

                            <?php if($user['role'] !== 'admin'): ?>

                                <a
                                    href="index.php?page=delete-user&id=<?= $user['id_user'] ?>"
                                    class="admin-delete"
                                    onclick="return confirm('Supprimer cet utilisateur ?')"
                                >
                                    Supprimer
                                </a>

                            <?php else: ?>

                                <span>Protégé</span>

                            <?php endif; ?>

                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>