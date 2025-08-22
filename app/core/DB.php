<?php
// app/core/DB.php
namespace Core;
use PDO, PDOException;

class DB {
    private static ?PDO $pdo = null;
    public static function conn(): PDO {
        if (!self::$pdo) {
            $dsn = 'mysql:host=' . \DB_HOST . ';dbname=' . \DB_NAME . ';charset=' . \DB_CHARSET;
            $opts = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            try { self::$pdo = new PDO($dsn, \DB_USER, \DB_PASS, $opts); }
            catch (PDOException $e) { die('DB error: '.$e->getMessage()); }
        }
        return self::$pdo;
    }
}
