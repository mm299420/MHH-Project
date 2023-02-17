<?php
namespace Page;
use PDO;

class DBClass
{
    private static $dsn;
    private static $username;
    private static $password;
    private static $db;
    public static $arr;
    public static $lastInsertId = null;

    public static function login($dsn, $username, $password): void {
        self::$dsn = $dsn;
        self::$username = $username;
        self::$password = $password;
    }

    public static function connect(): void
    {
        $options = [
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];
        try {
            self::$db = new PDO(self::$dsn, self::$username, self::$password, $options);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public static function lastInsertId()
    {
        return (self::$db->lastInsertId() ? self::$pdo->lastInsertId() : null);
    }
    public static function query($sql, $params=[])
    {
        self::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
        self::connect();
        $arr = array();
        try {
            $stmt = self::$db->prepare($sql);
            try {
                $stmt->execute($params);
            } catch (Exception $x) {
                $stmt->execute(array($params));
            }
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!$arr) exit('No rows');
            $stmt = null;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $arr;
    }
    public static function update($table, $column1, $value1, $column2, $value2)
    {
        self::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
        self::connect();
        $sql = "UPDATE $table SET $column1 = ? WHERE $column2 = ?";
        $stmt = self::$db->prepare($sql);
        try {
            $stmt->execute([$value1, $value2]);
        } catch (Exception $x) {
            $stmt->execute(array($value1, $value2));
        }
    }
    public static function UpdatePost($table, $column1, $value1, $column2, $value2, $column3, $value3, $column4, $value4)
    {
        self::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
        self::connect();
        $sql = "UPDATE $table SET $column1 = ?, $column2 = ?, $column3 = ? WHERE $column4 = ?";
        $stmt = self::$db->prepare($sql);
        try {
            $stmt->execute([$value1, $value2, $value3, $value4]);
        } catch (Exception $x) {
            $stmt->execute(array($value1, $value2, $value3, $value4));
        }
    }
    public static function CreatePost($table, $column1, $value1, $column2, $value2, $column3, $value3, $column4, $value4, $column5, $value5)
    {
        self::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
        self::connect();
        $sql = "INSERT INTO $table ($column1, $column2, $column3, $column4, $column5) VALUES (?, ?, ?, ?, ?)";
        $stmt = self::$db->prepare($sql);
        try {
            $stmt->execute([$value1, $value2, $value3, $value4, $value5]);
        } catch (Exception $x) {
            $stmt->execute(array($value1, $value2, $value3, $value4, $value5));
        }
    }

}
