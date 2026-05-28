<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=10">
    <title>Catégorie</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="recipes-page">

    <span class="recipes-kicker">
        Cuisine du monde
    </span>

    <h1 class="recipes-title">
        <?= htmlspecialchars($_GET['name']) ?>
    </h1>

    <p class="recipes-intro">
        Découvrez les recettes de cette catégorie.
    </p>

    <section class="recipes-grid">

        <?php if(count($recipes) > 0): ?>

            <?php foreach($recipes as $recipe): ?>

                <article class="recipe-card">

                    <?php if(!empty($recipe['image'])): ?>

                        <img
                            src="uploads/<?= htmlspecialchars($recipe['image']) ?>"
                            alt="<?= htmlspecialchars($recipe['title']) ?>"
                        >

                    <?php endif; ?>

                    <div class="recipe-card-content">

                        <span class="recipe-tag">
                            <?= htmlspecialchars($recipe['categorie']) ?>
                        </span>

                        <h2>
                            <?= htmlspecialchars($recipe['title']) ?>
                        </h2>

                        <p>
                            <?= htmlspecialchars($recipe['description']) ?>
                        </p>

                        <div class="recipe-actions">

                            <a
                                href="index.php?page=recipe-detail&id=<?= $recipe['id'] ?>"
                                class="home-btn"
                            >
                                Voir la recette
                            </a>

                        </div>

                    </div>

                </article>

            <?php endforeach; ?>

        <?php else: ?>

            <p>
                Aucune recette trouvée dans cette catégorie.
            </p>

        <?php endif; ?>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>