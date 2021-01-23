<?php
class Database
{
    public static function getDB()
    {
        try {
            $host = "localhost"; // Host
            $dbname = "deval"; // Database name
            $user = "root"; // Username
            $pass = ""; // Password

            $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET utf8");
            return $db;
        } catch (PDOException $e) {
            die('Error :');
        }
    }
}
