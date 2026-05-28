<?php
$currentPage = $_GET['page'] ?? 'home';
?>

<!-- =========================================================
    BARRE DE NAVIGATION
    ---------------------------------------------------------
    Elle affiche les liens du site et met en évidence
    la page active.
    ========================================================= -->
<nav class="site-header">

    <div class="nav-logo">

        <a href="index.php?page=home">
            Recettes du monde
        </a>

    </div>

    <div class="nav-center">

    <a
        href="index.php?page=home"
        class="<?= $currentPage === 'home' ? 'active' : '' ?>"
    >
        Accueil
    </a>

    <a
        href="index.php?page=categories"
        class="<?= $currentPage === 'categories' || $currentPage === 'category' ? 'active' : '' ?>"
    >
        Catégories
    </a>

    <a
        href="index.php?page=contact"
        class="<?= $currentPage === 'contact' ? 'active' : '' ?>"
    >
        Contact
    </a>

</div>

    <div class="nav-actions">

        <!-- Si l’utilisateur est connecté, on affiche les liens utiles. -->
        <?php if(isset($_SESSION['user'])): ?>

            <a href="index.php?page=recettes">
                Recettes
            </a>

            <?php if($_SESSION['user']['role'] === 'admin'): ?>

                <!-- Espace réservé à l’administrateur. -->
                <a href="index.php?page=create-recipe">
                    Admin recettes
                </a>

                <a href="index.php?page=users">
                    Utilisateurs
                </a>

            <?php endif; ?>

            <a
                href="index.php?page=logout"
                class="btn-nav"
            >
                Déconnexion
            </a>

        <?php else: ?>

            <!-- Si personne n’est connecté, on propose connexion et inscription. -->
            <a href="index.php?page=login">
                Connexion
            </a>

            <a
                href="index.php?page=register"
                class="btn-nav"
            >
                S’inscrire
            </a>

        <?php endif; ?>

        <img
            class="avatar"
            src="../public/images/avatar.png"
            alt="avatar"
        >

    </div>

</nav>