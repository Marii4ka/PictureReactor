<?php


class Database
{

    protected static $dsn;
    protected static $user;
    protected static $pass = '';

    protected static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    private static function connect(){
        self::$dsn = 'mysql:host=127.0.0.1;dbname=pictures';
        self::$user = 'root';

        try {
            $pdo = new PDO(self::$dsn, self::$user, self::$pass);
        } catch (PDOException $e) {
            $e->getMessage();
        }

        return $pdo;
    }

    public static function query($query){
        $statement = self::connect()->prepare($query);
        $statement->execute(self::$options);
        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }
}

?>