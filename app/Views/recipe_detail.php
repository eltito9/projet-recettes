<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=10">
    <title>Détail recette</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="detail-page">

    <?php if(!empty($recipe['image'])): ?>

        <section class="detail-hero" style="background-image:url('uploads/<?= htmlspecialchars($recipe['image']) ?>');">

            <div class="detail-overlay">

                <span class="recipe-tag">Recette</span>

                <h1>
                    <?= htmlspecialchars($recipe['title']) ?>
                </h1>

            </div>

        </section>

    <?php endif; ?>

    <section class="detail-content">

       <div class="recipe-infos">

    <div class="recipe-info-card">
        <span>⏱</span>
        <strong>
            <?= $recipe['preparation_min'] ?> min
        </strong>
        <p>Préparation</p>
    </div>

    <div class="recipe-info-card">
        <span>🔥</span>
        <strong>
            <?= $recipe['calories_kcal'] ?> kcal
        </strong>
        <p>Calories</p>
    </div>

    <div class="recipe-info-card">
        <span>🥩</span>
        <strong>
            <?= $recipe['proteines_g'] ?> g
        </strong>
        <p>Protéines</p>
    </div>

    <div class="recipe-info-card">
        <span>⭐</span>
        <strong>
           <?= htmlspecialchars($recipe['difficulte'] ?? '') ?>
        </strong>
        <p>Difficulté</p>
    </div>

</div>

<div class="recipe-description">

    <h2>Description</h2>

    <p>
        <?= htmlspecialchars($recipe['description']) ?>
    </p>

</div>

        <a href="index.php?page=recettes" class="home-btn">
            Retour aux recettes
        </a>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>