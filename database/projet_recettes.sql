-- =========================================================
-- Base de données : projet_recettes
-- Projet ADB - Cuisine du Monde
-- Fichier d'export / de création de la base
-- =========================================================

CREATE DATABASE IF NOT EXISTS projet_recettes
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE projet_recettes;

-- =========================================================
-- Table USERS
-- =========================================================
CREATE TABLE IF NOT EXISTS users (
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100) NOT NULL,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'user',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Comptes de démonstration (mots de passe hachés)
INSERT INTO users (nom, prenom, username, password, role) VALUES
('Principal', 'Admin', 'admin', '$2y$10$Rzlac/UOW1pLPNvLP88ateiqMg2mEig7AN8SYxY5JamdOY4G0ncIO', 'admin'),
('Jean', 'Dupont', 'jdupont', '$2y$10$0NQPKzoi8U4Fa5lNbrruzujBthkc0/24TWmCl2mAAUlmTenGTgDi2', 'user'),
('Lea', 'Martin', 'lmartin', '$2y$10$me35K5r2LGYzXyAA66XLFejQCuKglGPjBWvfWADS/6OsLvImJ68aC', 'user')
ON DUPLICATE KEY UPDATE username = VALUES(username);

-- =========================================================
-- Table RECIPES
-- =========================================================
CREATE TABLE IF NOT EXISTS recipes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image VARCHAR(255) DEFAULT NULL,
  preparation_min INT NOT NULL DEFAULT 0,
  cuisson_min INT NOT NULL DEFAULT 0,
  calories_kcal INT NOT NULL DEFAULT 0,
  proteines_g INT NOT NULL DEFAULT 0,
  difficulte VARCHAR(50) NOT NULL,
  categorie VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exemple de recette de démonstration
INSERT INTO recipes (
  title,
  description,
  image,
  preparation_min,
  cuisson_min,
  calories_kcal,
  proteines_g,
  difficulte,
  categorie
) VALUES (
  'Poulet curry',
  'Recette de démonstration pour tester l\'affichage des recettes.',
  NULL,
  20,
  30,
  450,
  28,
  'Facile',
  'Asie'
);
