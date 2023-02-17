<?php
class Hashing
{
    public static $salt;
    public static $pepper;
    public static $passwd;

    public static function getPepper()
    {
        return self::$pepper = get_cfg_var("pepper");
    }

    public static function getPasswd($pass)
    {
        return self::$passwd = hash_hmac("sha256", $pass, self::getPepper());
    }

    public static function setPasswd($pass)
    {
        return self::$passwd = $pass.self::getPepper();
    }

    public static $hash;

    public static function getHash($pass)
    {
        return self::$hash = password_hash(self::setPasswd($pass), PASSWORD_DEFAULT);
    }

    public static $hashtrue;

    public static function checkHash($pass)
    {
        return self::$hashtrue = password_verify(self::setPasswd($pass), self::$hash);
    }
}