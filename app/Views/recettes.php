<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=10">
    <title>Recettes</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="recipes-page">

    <!-- Titre principal de la page liste des recettes. -->
    <span class="recipes-kicker">
        Cuisine du monde
    </span>

    <h1 class="recipes-title">
        Nos recettes
    </h1>

    <p class="recipes-intro">
        Découvrez une sélection de recettes simples et savoureuses inspirées des cuisines du monde.
    </p>

    <section class="recipes-grid">

        <!-- On parcourt toutes les recettes reçues depuis le contrôleur. -->
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
                        <?= htmlspecialchars($recipe['categorie'] ?? 'Recette') ?>
                    </span>

                    <h2>
                        <?= htmlspecialchars($recipe['title']) ?>
                    </h2>

                    <p>
                        <?= htmlspecialchars($recipe['description']) ?>
                    </p>

                    <div class="recipe-meta">

                        <span>
                            ⏱ <?= $recipe['preparation_min'] ?? 0 ?> min
                        </span>

                        <span>
                            🍳 <?= $recipe['cuisson_min'] ?? 0 ?> min
                        </span>

                        <span>
                            🔥 <?= $recipe['calories_kcal'] ?? 0 ?> kcal
                        </span>

                        <span>
                            ⭐ <?= htmlspecialchars($recipe['difficulte'] ?? '') ?>
                        </span>

                    </div>

                    <div class="recipe-actions">

                        <a
                            href="index.php?page=recipe-detail&id=<?= $recipe['id'] ?>"
                            class="home-btn"
                        >
                            Voir la recette
                        </a>

                        <?php if($_SESSION['user']['role'] === 'admin'): ?>

                            <!-- Seul l’admin peut modifier ou supprimer. -->
                            <a
                                href="index.php?page=edit-recipe&id=<?= $recipe['id'] ?>"
                                class="admin-edit"
                            >
                                Modifier
                            </a>

                            <a
                                href="index.php?page=delete-recipe&id=<?= $recipe['id'] ?>"
                                class="admin-delete"
                            >
                                Supprimer
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </article>

        <?php endforeach; ?>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>