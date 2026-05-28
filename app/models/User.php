<?php

require_once __DIR__ . '/../../config/database.php';

/*  ╔════════════════════════════════════════════╗
    ║  MODÈLE UTILISATEUR                        ║
    ║  Requêtes SQL liées aux comptes            ║
    ╚════════════════════════════════════════════╝ */
class User {

     // ── Création d’un utilisateur ────────────────────────────────────────
    public static function create($nom, $prenom, $username, $password, $role = 'user')
    {
        global $pdo;

        // ↳ Sécurisation du mot de passe avant insertion
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // ↳ Requête préparée pour l’insertion
        $sql = "INSERT INTO users
                (nom, prenom, username, password, role)
                VALUES (:nom, :prenom, :username, :password, :role)";

        $stmt = $pdo->prepare($sql);

        // ↳ Exécution avec paramètres liés
        return $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'username' => $username,
            'password' => $passwordHash,
            'role' => $role
        ]);
    }
    // ── Mise à jour du mot de passe ───────────────────────────────────────
   public static function updatePassword($username, $password)
{
    global $pdo;

    $passwordHash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "UPDATE users
            SET password = :password
            WHERE username = :username";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        'password' => $passwordHash,
        'username' => $username
    ]);
}
    // ── Recherche par username ────────────────────────────────────────────
    public static function findByUsername($username)
    {
        global $pdo;

        // ↳ Requête paramétrée pour éviter les injections SQL
        $sql = "SELECT * FROM users WHERE username = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ── Liste complète des utilisateurs ──────────────────────────────────
    public static function all()
    {
        global $pdo;

        $sql = "SELECT * FROM users ORDER BY id_user DESC";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ── Recherche par identifiant ────────────────────────────────────────
    public static function find($id)
    {
        global $pdo;

        $sql = "SELECT * FROM users WHERE id_user = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ── Suppression d’un utilisateur ─────────────────────────────────────
    public static function delete($id)
    {
        global $pdo;

        $sql = "DELETE FROM users WHERE id_user = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    }

    // ── Mise à jour d’un utilisateur ─────────────────────────────────────
    public static function update($id, $nom, $prenom, $username, $role)
    {
        global $pdo;

        $sql = "UPDATE users
                SET nom = :nom,
                    prenom = :prenom,
                    username = :username,
                    role = :role
                WHERE id_user = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'username' => $username,
            'role' => $role
        ]);
    }
}