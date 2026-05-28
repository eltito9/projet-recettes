<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=10">
    <title>Catégories</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="categories-page">

    <div class="categories-header">

        <span class="recipes-kicker">
            Cuisine du monde
        </span>

        <h1>
            Explorer les continents
        </h1>

        <p>
            Découvrez des recettes inspirées des différentes cultures culinaires du monde.
        </p>

    </div>

    <section class="categories-grid">

        <!-- Europe -->
        <a
            href="index.php?page=category&name=Europe"
            class="category-card"
            style="background-image:url('uploads/cat-europe.png');"
        >

            <div class="category-overlay">

                <h2>Europe</h2>

            </div>

        </a>

        <!-- Asie -->
        <a
            href="index.php?page=category&name=Asie"
            class="category-card"
            style="background-image:url('uploads/cat-asie.png');"
        >

            <div class="category-overlay">

                <h2>Asie</h2>

            </div>

        </a>

        <!-- Afrique -->
        <a
            href="index.php?page=category&name=Afrique"
            class="category-card"
            style="background-image:url('uploads/cat-afrique.png');"
        >

            <div class="category-overlay">

                <h2>Afrique</h2>

            </div>

        </a>

        <!-- Amérique -->
        <a
            href="index.php?page=category&name=Amerique"
            class="category-card"
            style="background-image:url('uploads/cat-amerique.png');"
        >

            <div class="category-overlay">

                <h2>Amérique</h2>

            </div>

        </a>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>