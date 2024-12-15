<?php

namespace App\Core\Model\Databases;

use App\Classes\Utils\CrudUtils;
use Exception;
use PDO;
use PDOException;

class SQL extends CrudUtils {
    
    const DB_HOST = 'localhost';
    const DB_NAME = '';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_CHARSET = 'utf8mb4';

    private static ?PDO $connection;

    public static function connect() {

        try {

            if(!empty(self::$connection)) return self::$connection;

            self::$connection = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME.";charset=".self::DB_CHARSET, self::DB_USER, self::DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            return self::$connection;

        } catch(PDOException | Exception $e) {

            self::setStatus("error", $e->getMessage(), 500);

        }

    }

    public static function desconnect() {
        
        if(!empty(self::$connection)) self::$connection = null;

    }

    public static function startTransaction(bool $autoConnect = false) {

        if($autoConnect) self::connect();

        self::$connection->beginTransaction();

    }

    public static function endTransaction(bool $autoDesconnect = false) {

        self::$connection->commit();

        if($autoDesconnect) self::desconnect();

    }

    public static function rollback() {

        if(!empty(self::$connection)) self::$connection->rollback();

    }

}