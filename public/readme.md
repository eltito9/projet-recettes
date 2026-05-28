# Projet ADB — Cuisine du Monde

## Liens utiles

- Figma : https://www.figma.com/design/FwGpbqsf6AsbU9RLHeer7T/Projet-ADB-Cuisine-du-monde
- Trello : https://trello.com/b/MC5hiYEl/projet-adb

## Lancement du projet (WAMP)

1. Copier le projet dans `c:\wamp64\www\projet-recettes`
2. Créer la base de données `projet_recettes` (via phpMyAdmin)
3. Vérifier la configuration dans `config/database.php`
4. Ouvrir : `http://localhost/projet-recettes/public/index.php`

## Injection CSV des utilisateurs (consigne ADB)

Le fichier demandé par les consignes est présent ici :

- `data/users_seed.csv`

Ce CSV contient des utilisateurs avec mots de passe déjà **hachés** (compatibles `password_verify()`).

### Import dans phpMyAdmin

1. Ouvrir la table `users`
2. Onglet **Importer**
3. Sélectionner le fichier `data/users_seed.csv`
4. Format : **CSV**
5. Délimiteur de colonnes : `;`
6. Lancer l’import

### Si phpMyAdmin affiche encore une erreur de colonnes

- Vérifier que l’import se fait bien dans la table `users`
- Vérifier que le séparateur est `;`
- Vérifier que les anciennes données de test ont été supprimées avant l’import si besoin

## Base de données SQL

Le fichier SQL à fournir avec le projet est ici :

- `database/projet_recettes.sql`

Il contient :

- la création de la base `projet_recettes`
- la table `users`
- la table `recipes`
- des données de démonstration

## Comptes de démonstration (après import CSV)

- Admin :
  - `username` : `admin`
  - `password` : `Admin1234`

- Utilisateur 1 :
  - `username` : `jdupont`
  - `password` : `User1234`

- Utilisateur 2 :
  - `username` : `lmartin`
  - `password` : `Chef1234`

## Publication GitHub

- Le dépôt doit être réglé en **public** avant la remise finale.
- Vérifie aussi que le fichier SQL et le CSV sont bien présents dans le dépôt.
