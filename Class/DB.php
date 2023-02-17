<?php
namespace DB;
use PDO;

class DBClass
{
    private static $dsn;
    private static $username;
    private static $password;
    private static $db;
    public static string $arr;
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
    public static function query($sql, $params=[], $error=null)
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
            if(!$arr) exit($error);
            $stmt = null;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $arr;
    }
}
?>
<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="IMG/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="IMG/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="IMG/favicon-16x16.png">
    <link rel="manifest" href="IMG/manifest.json">
    <link rel="mask-icon" href="IMG/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="IMG/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="HandheldFriendly" content="true" /><meta name="HandheldFriendly" content="true" />
    <link rel="canonical" href="https://www.mhh.de/"/>
</head>
</html>
