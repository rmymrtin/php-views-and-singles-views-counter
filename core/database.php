<?php
class Database
{
    public static function getDB()
    {
        try {
            $host = "localhost"; // Hôte de la base de données
            $dbname = "deval"; // Nom de la base de données
            $user = "root"; // Nom d'utilisateur de la base de données
            $pass = ""; // Mot de passe de la base de données

            $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET utf8");
            return $db;
        } catch (PDOException $e) {
            die('Un probleme est survenu lors de la connexion a la base de donnees :');
        }
    }
}
