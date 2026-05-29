<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter recette</title>
</head>

<body>

<?php require __DIR__ . '/navbar.php'; ?>

<main class="auth-page">

    <section class="auth-card">

        <h1>Ajouter recette</h1>

        <p class="auth-subtitle">
            Ajoutez une nouvelle recette avec son titre, sa description et son image.
        </p>

        <form method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="title">
    </div>

    <div class="form-group">
        <label>Description / instructions</label>
        <textarea  name="description"></textarea>
    </div>

    <div class="form-group">
        <label>Temps de préparation</label>
        <input type="number" name="preparation_min">
    </div>

    <div class="form-group">
        <label>Temps de cuisson</label>
        <input type="number" name="cuisson_min">
    </div>

    <div class="form-group">
        <label>Calories</label>
        <input type="number" name="calories_kcal">
    </div>

    <div class="form-group">
        <label>Protéines</label>
        <input type="number" name="proteines_g">
    </div>

    <div class="form-group">
        <label>Difficulté</label>
        <select name="difficulte">
            <option value="Très facile">Très facile</option>
            <option value="Facile">Facile</option>
            <option value="Moyen">Moyen</option>
            <option value="Difficile">Difficile</option>
        </select>
    </div>

    <div class="form-group">
        <label>Catégorie</label>
        <select name="categorie">
            <option value="Europe">Europe</option>
            <option value="Asie">Asie</option>
            <option value="Afrique">Afrique</option>
            <option value="Amerique">Amérique</option>
        </select>
    </div>

    <button type="submit">
        Ajouter
    </button>

</form>

    </section>

</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>