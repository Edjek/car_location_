<?php

namespace App\Core;

class Database
{
    /**
     * @var string
     */
    private static $host = 'localhost';

    /**
     * @var string
     */
    private static $dbname = 'car_location';

    /**
     * @var string
     */
    private static $username = 'root';

    /**
     * @var string
     */
    private static $password = '';
    /**
     * @var [type]
     */
    private static $connection;

    /**
     * @return void
     */
    public static function initConnection(): void
    {
        // On verifie si $connection a déjà été créée, si c'est pas le cas on la créée
        // Design pattern Singleton : permet d'eviter d'appeler une ressource inutilement
        if (!isset(self::$connection)) {
            try {
                self::$connection = new \PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$dbname . ';charset=utf8',
                    self::$username,
                    self::$password,
                    [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION],
                );
            } catch (\PDOException $e) {
                die("Erreur de connexion à la base de donnée" . $e->getMessage());
            }
        }
    }

    /**
     * @return \PDO
     */
    public static function getConnectionInstance(): \PDO
    {
        return self::$connection;
    }
}
