<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier recette</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <h1>Modifier recette</h1>

        <p class="auth-subtitle">
            Modifiez les informations de la recette sélectionnée.
        </p>

        <form method="POST">

            <div class="form-group">

                <label>Titre</label>

                <input
                    type="text"
                    name="title"
                    value="<?= htmlspecialchars($recipe['title']) ?>"
                >

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                ><?= htmlspecialchars($recipe['description']) ?></textarea>

            </div>

            <?php if(!empty($recipe['image'])): ?>

                <div class="form-group">

                    <label>Image actuelle</label>

                    <img
                        src="uploads/<?= htmlspecialchars($recipe['image']) ?>"
                        alt="<?= htmlspecialchars($recipe['title']) ?>"
                        style="
                            width:100%;
                            max-height:260px;
                            object-fit:cover;
                            border-radius:6px;
                        "
                    >

                </div>

            <?php endif; ?>

            <button type="submit">
                Modifier
            </button>

        </form>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>