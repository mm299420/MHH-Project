<?php

namespace DB;

class Hash
{
    public static $salt;
    public static $pepper;
    public static $passwd;
    public static $hash;

    public static function setPepper()
    {
        return self::$pepper = get_cfg_var("pepper");
    }

    public static function setPasswd($pass)
    {
        return self::$passwd = hash_hmac("sha256", $pass, self::getPepper());
    }
    public static function setSalt() {
        return self::$salt = bin2hex(random_bytes(32));
    }

    public static function hash($password)
    {
        self::setPepper();
        self::setSalt();
        $hash = hash('sha256', self::$pepper . $password . self::$salt);
        return self::$salt . ':' . $hash;
    }

    public static $hashtrue;

    public static function verifyHash($password, $hash)
    {
        list($salt, $hash) = explode(':', $hash);
        return self::$hashtrue = hash('sha256', self::$pepper . $password . $salt) === $hash;
    }
}